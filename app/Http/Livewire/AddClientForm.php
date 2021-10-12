<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddClientForm extends Component
{
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

    public function create()
    {
        $this->validate();
        auth()->user()->clients()->create($this->validate());

        $this->emitUp('closeModal');

        return $this->dispatchBrowserEvent(
            'toast-success',
            ['message' => 'Client has been added successfully.']
        );
    }


    public function render()
    {
        return view('livewire.add-client-form');
    }
}
