<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class InvoiceEditModal extends Component
{
    public Invoice $invoice;
    public string $email;
    public $name, $issue_date, $due_date;
    public array $inputs = [];
    public $i = 1;

    protected $rules = [
        'name' => ['required', 'string'],
        'issue_date'=> ['required', 'date'],
        'due_date'=> ['required', 'date'],
    ];

    public function mount()
    {
        $this->name = $this->invoice->name;
        $this->issue_date = $this->invoice->issue_date->format("Y-m-d");
        $this->due_date = $this->invoice->due_date->format("Y-m-d");
    }

    public function update()
    {
        $validatedData = $this->validate();

        $this->invoice->update($validatedData);
        $this->emitUp('closeModal');

        return $this->dispatchBrowserEvent('toast-success', ['message' => 'Invoice has been updated successfully.']);
    }

    public function render()
    {
        return view('livewire.invoice-edit-modal');
    }
}
