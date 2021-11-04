<?php

namespace Tests\Feature;

use App\Mail\InvoicePDF;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;
use Barryvdh\DomPDF\Facade as PDF;

class InvoiceLivewireTest extends TestCase
{
    /** @test */
    public function itChecksIfCreateModalIsLoaded()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();
        Livewire::actingAs($user);

        $this->get(route('client.show', $client))
            ->assertOk()
            ->assertSeeLivewire('create-invoice');
    }

    /** @test */
    public function itFiltersPaidInvoices()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();
        Invoice::factory(5)->for($client)->create();
        Invoice::factory()->paid()->for($client)->create();

        Livewire::actingAs($user)
            ->test('show-client', ['client' => $client, 'heading' => $client->name])
            ->set('filterBy', 'paid')
            ->assertSet('filterBy', 'paid')
            ->assertCount('invoices', 1);
    }

    /** @test */
    public function itFiltersDraftInvoices()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();
        Invoice::factory(5)->for($client)->create();
        Invoice::factory()->draft()->for($client)->create();

        Livewire::actingAs($user)
            ->test('show-client', ['client' => $client, 'heading' => $client->name])
            ->set('filterBy', 'draft')
            ->assertSet('filterBy', 'draft')
            ->assertCount('invoices', 1);
    }

    /** @test */
    public function itFiltersOverdueInvoices()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();
        Invoice::factory(5)->for($client)->create();
        Invoice::factory()->overdue()->for($client)->create();

        Livewire::actingAs($user)
            ->test('show-client', ['client' => $client, 'heading' => $client->name])
            ->set('filterBy', 'overdue')
            ->assertSet('filterBy', 'overdue')
            ->assertCount('invoices', 1);
    }

    /** @test */
    public function itFiltersInvoicesByItsName()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();
        Invoice::factory(2)->for($client)->create();
        Invoice::factory(['name' => 'Cool Invoice'])->for($client)->create();

        Livewire::actingAs($user)
            ->test('show-client', ['client' => $client, 'heading' => $client->name])
            ->set('search', 'Cool ')
            ->assertSet('search', 'Cool ')
            ->assertCount('invoices', 1);
    }

    /** @test */
    public function itPreventsFromCreatingInvoiceWithDueDateGreaterThanIssueDate()
    {
        Livewire::actingAs($user = User::factory()->create())
            ->test('create-invoice', ['client' => Client::factory()->for($user)->create()])
            ->set('name', 'Bad Invoice')
            ->set('invoice_number', "69291029")
            ->set('issue_date', now()->subDays(4)->format('Y-m-d'))
            ->set('due_date', now()->subDays(10)->format('Y-m-d'))
            ->call('create')
            ->assertHasErrors('due_date');

        $this->assertDatabaseCount('invoices', 0);
    }

    /** @test */
    public function itPreventsFromCreatingInvoiceWithIssueDateInPast()
    {
        Livewire::actingAs($user = User::factory()->create())
            ->test('create-invoice', ['client' => Client::factory()->for($user)->create()])
            ->set('name', 'Bad Invoice')
            ->set('invoice_number', "69291029")
            ->set('issue_date', now()->subDay()->format('Y-m-d'))
            ->set('due_date', now()->addDay(5)->format('Y-m-d'))
            ->call('create')
            ->assertHasErrors('issue_date');

        $this->assertDatabaseCount('invoices', 0);
    }

    /** @test */
    public function itCreatesNewInvoiceForTheClient()
    {
        Livewire::actingAs($user = User::factory()->create())
            ->test('create-invoice', ['client' => Client::factory()->for($user)->create()])
            ->set('name', 'Cool Invoice Name')
            ->set('invoice_number', '501029501')
            ->set('issue_date', now()->addDay()->format('Y-m-d'))
            ->set('due_date', now()->addWeek()->format('Y-m-d'))
            ->call('create')
            ->assertHasNoErrors()
            ->assertEmitted('created')
            ->assertEmitted('closeModal')
            ->assertDispatchedBrowserEvent('toast-success')
            ->assertCount('client.invoices', 1);
    }

    /** @test */
    public function itChecksIfInvoiceIsLoadedWithItemsAndItsPassedToEditSlideOver()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();
        $invoice = Invoice::factory()->for($client)->create();

        InvoiceItem::factory(5)->for($invoice)->create();
        $invoice->load('items');

        Livewire::actingAs($user)
            ->test('invoice-entry', ['invoice' => $invoice, 'email' => $client->email])
            ->assertSet('email', $client->email)
            ->assertSet('invoice', $invoice)
            ->assertSet('invoice.items', $invoice->items)
            ->assertCount('invoice.items', 5);

        Livewire::actingAs($user)
            ->test('invoice-edit-modal', ['invoice' => $invoice])
            ->assertSet('invoice', $invoice)
            ->assertSet('invoice.items', $invoice->items);
    }

    /** @test */
    public function itDeletesAnInvoiceWithItems()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();
        $invoice = Invoice::factory()->for($client)->create();

        InvoiceItem::factory(5)->for($invoice)->create();
        $client->load('invoices');
        $invoice->load('items');

        Livewire::actingAs($user)
            ->test('invoice-entry', ['invoice' => $invoice, 'email' => $client->email])
            ->assertSet('email', $client->email)
            ->assertSet('invoice', $invoice)
            ->assertSet('invoice.items', $invoice->items)
            ->call('delete')
            ->assertEmitted('deleted')
            ->assertDispatchedBrowserEvent('toast-success');

        $client->refresh();

        $this->assertCount(0, $client->invoices);
        $this->assertDatabaseCount('invoice_items', 0);
    }

    /** @test */
    public function itMarksAnInvoiceAsPaid()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();

        Livewire::actingAs($user)
            ->test('invoice-entry', ['invoice' => $invoice, 'email' => $client->email])
            ->call('markAsPaid')
            ->assertEmitted('updated')
            ->assertDispatchedBrowserEvent('toast-success');

        $invoice->refresh();
        $this->assertTrue($invoice->is_paid);
    }

    /** @test */
    public function itEmailsAnPdfToClient()
    {
        Mail::fake();
        $user = User::factory()->create();
        Livewire::actingAs($user);
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

        Mail::send(new InvoicePDF($invoice, $pdf));
        Mail::assertSent(InvoicePDF::class, function ($mail) {
            $mail->build();
            return count($mail->rawAttachments) == 1;
        });
    }

    /** @test */
    public function itDownloadsPdfFile()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();

        Livewire::actingAs($user)
            ->test('invoice-entry', ['invoice' => $invoice, 'email' => $client->email])
            ->call('download')
            ->assertFileDownloaded($invoice->file_name);
    }

    /** @test */
    public function itDeletesSingleInvoiceItem()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();
        $invoice->load('items');

        Livewire::actingAs($user)
            ->test('invoice-edit-modal', ['invoice' => $invoice, 'email' => $client->email])
            ->assertSet('items', $invoice->items->toArray())
            ->call('removeInvoiceItem', 1)
            ->assertCount('items', 4);

        $invoice->refresh();
        $this->assertCount(4, $invoice->items);
    }

    /** @test */
    public function itAddsEmptyRowToItemsArray()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();
        $invoice->load('items');

        Livewire::actingAs($user)
            ->test('invoice-edit-modal', ['invoice' => $invoice, 'email' => $client->email])
            ->assertSet('items', $invoice->items->toArray())
            ->call('addInvoiceItem')
            ->assertCount('items', 6);

        $invoice->refresh();
        $this->assertCount(5, $invoice->items);
    }

    /** @test */
    public function itAddsNewItemToInvoice()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();

        $invoice = Invoice::factory()->for($client)->create();
        InvoiceItem::factory(5)->for($invoice)->create();
        $invoice->load('items');

        Livewire::actingAs($user)
            ->test('invoice-edit-modal', ['invoice' => $invoice, 'email' => $client->email])
            ->assertSet('items', $invoice->items->toArray())
            ->set('items.5.id', null)
            ->set('items.5.title', 'New cool title added')
            ->set('items.5.qty', 6)
            ->set('items.5.price', 1000)
            ->assertSet('items.5.title', 'New cool title added')
            ->call('update')
            ->assertHasNoErrors()
            ->assertEmitted('closeModal')
            ->assertEmitted('updated')
            ->assertDispatchedBrowserEvent('toast-success');

        $invoice->refresh();
        $this->assertCount(6, $invoice->items);
    }
}
