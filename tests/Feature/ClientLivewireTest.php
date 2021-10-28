<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class ClientLivewireTest extends TestCase
{
    /** @test */
    public function itListsClientsForAuthenticatedUser()
    {
        $user = User::factory()->create();
        Client::factory(5)->for($user)->create();

        Livewire::actingAs($user)
            ->test('index-client')
            ->assertCount('clients', 5);

        $this->assertEquals(0, $user->clients()->first()->invoices_count);
    }

    /** @test */
    public function itLoadsInvoicesWithClient()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();

        Invoice::factory(5)->for($client)->create();

        Livewire::actingAs($user)
            ->test('show-client', ['client' => $client])
            ->assertSet('client', $client)
            ->assertSet('client.invoices', $client->invoices)
            ->assertCount('client.invoices', 5);
    }

    /** @test */
    public function itPreventsUserFromSeeingOtherUsersClients()
    {
        $user = User::factory()->create();
        $clients = Client::factory(5)->for(User::factory()->create())->create();

        Livewire::actingAs($user);
        $this->get(route('client.show', $clients->first()))
            ->assertForbidden();
    }

    /** @test */
    public function itSearchesClientsByName()
    {
        $user = User::factory()->create();
        $client = Client::factory(3)->for($user)->create();
        Client::factory(['name' => 'Cool Guy'])->for($user)->create();
        Invoice::factory(5)->for($client->first())->create();

        Livewire::actingAs($user)
            ->test('index-client')
            ->set('search', 'Cool')
            ->assertSet('search', 'Cool')
            ->assertCount('clients', 1);
    }

    /** @test */
    public function itFiltersClientsWithInvoices()
    {
        $user = User::factory()->create();
        $client = Client::factory(3)->for($user)->create();
        Invoice::factory(5)->for($client->first())->create();

        Livewire::actingAs($user)
            ->test('index-client')
            ->set('filterBy', 'with')
            ->assertSet('filterBy', 'with')
            ->assertCount('clients', 1);
    }

    /** @test */
    public function itFiltersClientsWithoutInvoices()
    {
        $user = User::factory()->create();
        $client = Client::factory(3)->for($user)->create();
        Invoice::factory(5)->for($client->first())->create();

        Livewire::actingAs($user)
            ->test('index-client')
            ->set('filterBy', 'without')
            ->assertSet('filterBy', 'without')
            ->assertCount('clients', 2);
    }

    /** @test */
    public function itChecksIfCreateClientModalIsLoaded()
    {
        $user = User::factory()->create();
        Livewire::actingAs($user);

        $this->get(route('client.index'))
            ->assertSeeLivewire('add-client-form')
            ->assertOk();
    }

    /** @test */
    public function itCreatesNewClient()
    {
        $user = User::factory()->create();
        $client = Client::factory()->raw();

        Livewire::actingAs($user)
            ->test('add-client-form')
            ->set('name', $client['name'])
            ->set('email', $client['email'])
            ->set('street_address', $client['street_address'])
            ->set('city', $client['city'])
            ->set('zip_code', $client['street_address'])
            ->set('country', $client['country'])
            ->set('vat_in', "399735006")
            ->set('company_identifier', "399735006")
            ->call('create')
            ->assertHasNoErrors()
            ->assertEmitted('created')
            ->assertEmitted('closeModal')
            ->assertDispatchedBrowserEvent('toast-success');

        $this->assertCount(1, $user->clients);
    }

    /** @test */
    public function itChecksIfEditClientModalIsLoaded()
    {
        $user = User::factory()->create();
        Livewire::actingAs($user);

        $client = Client::factory()->for($user)->create();

        $this->get(route('client.index', $client))
            ->assertSeeLivewire('client-entry')
            ->assertSeeLivewire('edit-client-form')
            ->assertOk();
    }

    /** @test */
    public function itEditsTheClient()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();

        Livewire::actingAs($user)
            ->test('edit-client-form', ['client' => $client])
            ->set('client.name', 'New Name')
            ->assertSet('client.name', 'New Name')
            ->call('update')
            ->assertHasNoErrors()
            ->assertEmitted('updated')
            ->assertEmitted('closeEditModal')
            ->assertDispatchedBrowserEvent('toast-success');

        $client->refresh();
        $this->assertEquals('New Name', $client->name);
    }

    /** @test */
    public function itDeletesClientAndItsInvoices()
    {
        $user = User::factory()->create();
        $client = Client::factory()->for($user)->create();
        Invoice::factory(5)->for($client)->create();

        Livewire::actingAs($user)
            ->test('client-entry', ['client' => $client])
            ->call('delete')
            ->assertEmitted('deleted')
            ->assertDispatchedBrowserEvent('toast-success');

        $this->assertEmpty($client->fresh());
        $this->assertDatabaseCount('invoices', 0);
    }
}
