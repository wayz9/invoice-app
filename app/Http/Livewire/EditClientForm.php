<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class EditClientForm extends Component
{
    public Client $client;

    public $name;
    public $email;
    public $address_line1;
    public $contact_number;
    public $address_line2;
    public $vat_in;
    public $company_identifier;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email'],
        'address_line1' => ['required', 'string'],
        'address_line2' => ['nullable', 'string'],
        'contact_number' => ['nullable', 'string'],
        'vat_in' => ['required', 'string', 'max:9'],
        'company_identifier' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->name = $this->client->name;
        $this->email = $this->client->email;
        $this->address_line1 = $this->client->address_line1;
        $this->contact_number = $this->client->contact_number;
        $this->address_line2 = $this->client->address_line2;
        $this->vat_in = $this->client->vat_in;
        $this->company_identifier = $this->client->company_identifier;
    }

    public function update()
    {
        $this->validate();
        $this->client->update($this->validate());

        $this->emitUp('updated');
        $this->emitUp('closeEditModal');

        return $this->dispatchBrowserEvent('toast-success', ['message' => 'Client has been edited successfully.']);
    }

    public function render()
    {
        return view('livewire.edit-client-form');
    }
}
