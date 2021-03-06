<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Traits\ToastResponse;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateInvoice extends Component
{
    use ToastResponse;

    public Client $client;

    public $name;
    public $invoice_number;
    public $issue_date;
    public $due_date;

    protected $rules = [
        'name' => ['required', 'string'],
        'invoice_number' => ['required', 'string'],
        'issue_date' => ['required', 'date', 'after_or_equal:now'],
        'due_date' => ['required', 'date', 'after:issue_date'],
    ];

    public function create()
    {
        $data = $this->validate();

        $this->client->invoices()->create($data);

        $this->reset(['name', 'invoice_number', 'issue_date', 'due_date']);
        $this->resetErrorBag();
        $this->emitTo('show-client', 'created');
        $this->emitTo('show-client', 'closeModal');

        $this->toast('success', 'Invoice has been successfully created');
    }

    public function render(): View
    {
        return view('livewire.create-invoice');
    }
}
