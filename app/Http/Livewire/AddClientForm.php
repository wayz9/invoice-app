<?php

namespace App\Http\Livewire;

use App\Traits\ToastResponse;
use Livewire\Component;

class AddClientForm extends Component
{
    use ToastResponse;

    public $name;
    public $email;
    public $street_address;
    public $city;
    public $zip_code;
    public $country;
    public $contact_number;
    public $vat_in;
    public $company_identifier;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email'],
        'street_address' => ['required', 'string'],
        'city' => ['required', 'string'],
        'zip_code' => ['required', 'string'],
        'country' => ['required', 'string'],
        'contact_number' => ['nullable', 'string'],
        'vat_in' => ['nullable', 'string', 'max:9'],
        'company_identifier' => ['nullable', 'string'],
    ];

    public function create()
    {
        $this->validate();
        auth()->user()->clients()->create($this->validate());

        $this->emitUp('closeModal');
        $this->emitTo('index-client', 'created');
        return $this->toast('success', 'Client has been added successfully.');
    }


    public function render()
    {
        return view('livewire.add-client-form');
    }
}
