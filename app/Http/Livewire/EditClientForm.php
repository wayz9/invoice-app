<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Traits\ToastResponse;
use Livewire\Component;

class EditClientForm extends Component
{
    use ToastResponse;

    public Client $client;

    protected $rules = [
        'client.name' => ['required', 'string', 'max:255'],
        'client.email' => ['required', 'email'],
        'client.street_address' => ['required', 'string'],
        'client.city' => ['required', 'string'],
        'client.zip_code' => ['required', 'string'],
        'client.country' => ['required', 'string'],
        'client.contact_number' => ['nullable', 'string'],
        'client.vat_in' => ['nullable', 'string', 'max:9'],
        'client.company_identifier' => ['nullable', 'string', 'max:8'],
    ];

    public function update()
    {
        $this->validate();
        $this->client->save();

        $this->emitUp('updated');
        $this->emitUp('closeEditModal');

        return $this->toast('success', 'Client has been edited successfully.');
    }

    public function render()
    {
        return view('livewire.edit-client-form');
    }
}
