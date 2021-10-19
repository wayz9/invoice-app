<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateInvoice;
use App\Http\Livewire\InvoiceEditModal;
use App\Http\Livewire\InvoiceEntry;
use App\Mail\InvoicePDF;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\isEmpty;

class InvoiceLivewireTest extends TestCase
{
    /** @test */
    public function check_if_create_invoice_modal_is_present()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $client = Client::factory()->for($user)->create();

        $this->get(route('client.show', $client))
            ->assertSeeLivewire('create-invoice')
            ->assertOk();
    }


    /** @test */
    public function create_new_invoice_for_client()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $client = Client::factory()->for($user)->create();

        Livewire::test(CreateInvoice::class, ['client' => $client])
            ->set('name', 'Cool Invoice Name')
            ->set('invoice_number', '501029501')
            ->set('issue_date', now()->addDay()->format('Y-m-d'))
            ->set('due_date', now()->addWeek()->format('Y-m-d'))
            ->call('create')
            ->assertHasNoErrors()
            ->assertEmitted('created')
            ->assertEmitted('closeModal')
            ->assertDispatchedBrowserEvent('toast-success');

        $this->assertCount(1, $client->invoices);
    }


    /** @test */
    public function check_if_edit_invoice_is_present_and_invoice_is_passed_to_it()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();

        $invoice->load('items');

        Livewire::test(InvoiceEntry::class, ['invoice' => $invoice, 'email' => $client->email])
            ->assertSet('email', $client->email)
            ->assertSet('invoice', $invoice)
            ->assertSet('invoice.items', $invoice->items);

        Livewire::test(InvoiceEditModal::class, ['invoice' => $invoice])
            ->assertSet('invoice', $invoice)
            ->assertSet('invoice.items', $invoice->items);
    }

    /** @test */
    public function deletes_an_invoice()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();

        $client->load('invoices');
        $invoice->load('items');

        Livewire::test(InvoiceEntry::class, ['invoice' => $invoice, 'email' => $client->email])
            ->assertSet('email', $client->email)
            ->assertSet('invoice', $invoice)
            ->assertSet('invoice.items', $invoice->items)
            ->call('delete')
            ->assertEmitted('deleted')
            ->assertDispatchedBrowserEvent('toast-success');

        $this->assertCount(0, $client->refresh()->invoices);
    }


    /** @test */
    public function marks_an_invoice_as_paid()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();

        Livewire::test(InvoiceEntry::class, ['invoice' => $invoice, 'email' => $client->email])
            ->call('markAsPaid')
            ->assertEmitted('updated')
            ->assertDispatchedBrowserEvent('toast-success');

        $this->assertTrue($invoice->refresh()->is_paid);
    }

    /** @test */
    public function email_a_classic_pdf_to_recipient()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();

        $pdf =  PDF::loadView(
            "invoices.classic",
            [
                'invoice' => $invoice,
                'client' => $client
            ]
        )
        ->setPaper([0, 0, 720, 1440])
        ->output();

        Mail::fake();

        Mail::send(new InvoicePDF($invoice, $pdf));
        Mail::assertSent(InvoicePDF::class, function($mail) {
            $mail->build();
            return count($mail->rawAttachments) == 1;
        });
    }

    /** @test */
    public function a_pdf_file_can_be_downloaded()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();

        Livewire::test(InvoiceEntry::class, ['invoice' => $invoice, 'email' => $client->email])
            ->call('download')
            ->assertFileDownloaded($invoice->file_name);
    }

    /** @test */
    public function deletes_a_single_invoice_item()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();
        $invoice->load('items');

        Livewire::test(InvoiceEditModal::class, ['invoice' => $invoice, 'email' => $client->email])
            ->assertSet('items', $invoice->items->toArray())
            ->call('removeInvoiceItem', 1)
            ->assertCount('items', 4);

        $this->assertCount(4, $invoice->refresh()->items);
    }

    /** @test */
    public function add_empty_fieldset_to_form()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();
        $invoice->load('items');

        Livewire::test(InvoiceEditModal::class, ['invoice' => $invoice, 'email' => $client->email])
            ->assertSet('items', $invoice->items->toArray())
            ->call('addInvoiceItem')
            ->assertCount('items', 6);

        $this->assertCount(5, $invoice->refresh()->items);
    }

    /** @test */
    public function add_a_new_item_to_invoice()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();
        $invoice->load('items');

        Livewire::test(InvoiceEditModal::class, ['invoice' => $invoice, 'email' => $client->email])
            ->assertSet('items', $invoice->items->toArray())
            ->set('items.5.id', null)
            ->set('items.5.title', 'New cool title added')
            ->set('items.5.qty', 6)
            ->set('items.5.price', 1000)
            ->call('update')
            ->assertHasNoErrors()
            ->assertEmitted('closeModal')
            ->assertEmitted('updated')
            ->assertDispatchedBrowserEvent('toast-success');

        $this->assertCount(6, $invoice->refresh()->items);
    }
}
