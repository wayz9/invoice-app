<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateInvoice;
use App\Http\Livewire\InvoiceEditModal;
use App\Http\Livewire\InvoiceEntry;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

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
}
