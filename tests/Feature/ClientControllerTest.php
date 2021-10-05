<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    public function test_lists_all_clients_for_current_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Client::factory(5)->for($user)->create();

        $response = $this->get('/client');
        $response->assertOk();

        $this->assertCount(5, Client::all());
    }

    public function test_returns_client_with_invoices()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();

        $this->actingAs($user);

        Invoice::factory(2)->for($client)->create();

        $response = $this->get('/client');
        $response->assertOk()
            ->assertJsonCount(1)
            ->assertJsonCount(2, '0.invoices');
    }

    public function test_if_user_can_add_a_client()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/client', Client::factory()->raw());

        $response->assertOk();

        $this->assertCount(1, Client::all());
    }
}
