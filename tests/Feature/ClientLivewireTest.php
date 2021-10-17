<?php

namespace Tests\Feature;

use App\Http\Livewire\AddClientForm;
use App\Http\Livewire\IndexClient;
use App\Http\Livewire\ShowClient;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ClientLivewireTest extends TestCase
{
    /** @test */
    public function can_see_a_list_clients()
    {
        $user = User::factory()->create();
        Client::factory(5)->for($user)->create();

        $this->actingAs($user);

        Livewire::test(IndexClient::class)->assertCount('clients', 5);
    }

    /** @test */
    public function user_can_view_only_their_clients()
    {
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();

        $clients = Client::factory(5)->for($user)->create();

        $this->actingAs($anotherUser);
        $this->get(route('client.show', $clients->first()))->assertForbidden();
    }

    /** @test */
    public function user_can_add_new_client()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $this->get(route('client.index'))->assertSeeLivewire('add-client-form');

        Livewire::test(AddClientForm::class)
            ->set('name', 'Client Name')
            ->set('email', 'email@email.com')
            ->set('address_line1', 'address something 11')
            ->set('vat_in', "399735006")
            ->set('company_identifier', "399735006")
            ->call('create')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('toast-success');

        $this->assertCount(1, $user->clients);
    }

    /** @test */
    public function test_if_items_are_passed_with_invoice()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $client = Client::factory()->for($user)->create();
        Invoice::factory(5)->for($client)->create();

        Livewire::test(ShowClient::class, ['client' => $client])
            ->assertSet('client', $client)
            ->assertSet('client.invoices', $client->invoices);
    }
}
