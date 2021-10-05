<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Tests\TestCase;

class InvoiceItemControllerTest extends TestCase
{
    public function test_adding_items_to_invoice()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $client = Client::factory()->for($user)->create();
        $invoice = Invoice::factory()->for($client)->create();

        $response = $this->post("/invoice/{$invoice->id}", ['items' => InvoiceItem::factory(3)->raw()]);

        $response->assertOk();
        $this->assertCount(3, InvoiceItem::all());
    }
}
