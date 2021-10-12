<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class CreateInvoice extends Component
{
    public Client $client;

    public $name;
    public $invoice_number;
    public $issue_date;
    public $due_date;

    protected $rules = [
        'name' => ['required', 'string'],
        'invoice_number' => ['required', 'string'],
        'issue_date' => ['required', 'date'],
        'due_date' => ['required', 'date'],
    ];

    public function create()
    {
        $data = $this->validate();
        $this->client->invoices()->create($data);

        $this->reset(['name', 'invoice_number', 'issue_date', 'due_date']);
        $this->emitTo('show-client', 'created');
        $this->emitTo('show-client', 'closeModal');

        $this->dispatchBrowserEvent('toast-success', ['message' => 'Invoice has been successfully created!']);
    }

    public function render()
    {
        return view('livewire.create-invoice');
    }
}
