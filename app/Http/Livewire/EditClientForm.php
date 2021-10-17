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
        'client.address_line1' => ['required', 'string'],
        'client.address_line2' => ['nullable', 'string'],
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
