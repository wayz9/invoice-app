<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Support\Arr;
use Tests\TestCase;

class InvoiceControllerTest extends TestCase
{
    public function test_creates_new_blank_invoice()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $client = Client::factory()->for($user)->create();

        $response = $this->post('/invoice', Invoice::factory()->for($client)->raw());
        $response->assertOk();

        $this->assertCount(1, Invoice::all());
    }

    public function test_updates_existing_invoice()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $client = Client::factory()->for($user)->create();
        $invoice = Invoice::factory()->for($client)->create();

        $response = $this->put("/invoice/{$invoice->id}", array_merge([
            'name' => 'Invoice name is now updated',
            Arr::except(Invoice::factory()->for($client)->raw(), 'name')
        ]));

        $response->assertOk();

        $this->assertEquals('Invoice name is now updated', Invoice::find($invoice->id)->name);
    }

    public function test_if_invoice_items_are_returned_along_with_invoice()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $client = Client::factory()->for($user)->create();
        $invoice = Invoice::factory()->for($client)->create();

        $invoice->items()->createMany(InvoiceItem::factory(3)->raw());

        $response = $this->get("/invoice/{$invoice->id}");

        $response->assertOk();

        $this->assertArrayHasKey('client', $response);
        $this->assertArrayHasKey('items', $response);
        $this->assertCount(3, $response['items']);
    }
}
