<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class EditClientForm extends Component
{
    public Client $client;

    protected $rules = [
        'client.name' => ['required', 'string', 'max:255'],
        'client.email' => ['required', 'email'],
        'client.street_address' => ['required', 'string'],
        'client.city' => ['required', 'string'],
        'client.zip_code' => ['required', 'string'],
        'client.country' => ['required', 'string'],
        'client.contact_number' => ['nullable', 'string'],
        'client.vat_in' => ['required', 'string', 'max:9'],
        'client.company_identifier' => ['required', 'string'],
    ];

    public function update()
    {
        $this->validate();
        $this->client->save();

        $this->emitUp('updated');
        $this->emitUp('closeEditModal');

        return $this->dispatchBrowserEvent('toast-success', ['message' => 'Client has been edited successfully.']);
    }

    public function render()
    {
        return view('livewire.edit-client-form');
    }
}
