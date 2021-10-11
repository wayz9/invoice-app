<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Arr;
use Livewire\Component;

class InvoiceEditModal extends Component
{
    public Invoice $invoice;
    public string $email;
    public $name, $issue_date, $due_date;
    public $items = [];

    protected $rules = [
        'name' => ['required', 'string'],
        'issue_date' => ['required', 'date'],
        'due_date' => ['required', 'date'],

        'items' => ['array', 'nullable'],
        'items.*.title' => ['required', 'string'],
        'items.*.qty' => ['required', 'integer', 'min:1'],
        'items.*.price' => ['required', 'integer']
    ];

    protected $messages = [
        'items.*.title.required' => 'Item name is required.',
        'items.*.price.integer' => 'Price must be in cents, without commas and dots!',
        'items.*.price.required' => 'Price field is required.',
        'items.*.qty.integer' => 'Quantity must be a number!',
        'items.*.qty.min' => 'Quantity should be at least 1.',
    ];

    public function mount()
    {
        $this->name = $this->invoice->name;
        $this->issue_date = $this->invoice->issue_date->format("Y-m-d");
        $this->due_date = $this->invoice->due_date->format("Y-m-d");
        $this->items = $this->invoice->items->toArray();
    }

    public function addInvoiceItem()
    {
        $this->items[] = ['id' => null, 'title' => '', 'price' => '', 'qty' => '1'];
    }

    public function removeInvoiceItem($index)
    {
        if ($this->items[$index]['id'] != null) {
            InvoiceItem::find($this->items[$index]['id'])->delete();
        }

        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function update()
    {
        $validatedData = $this->validate();

        if ($validatedData['items']) {
            foreach ($validatedData['items'] as $item) {
                $this->invoice->items()->updateOrCreate(['id' => $item['id']], [
                    'title' => $item['title'],
                    'qty' => $item['qty'],
                    'price' => $item['price']
                ]);
            }
        }

        $this->invoice->update(Arr::except($validatedData, 'items'));
        $this->emitUp('closeModal');
        $this->emitTo('show-client', 'updated');

        return $this->dispatchBrowserEvent('toast-success', ['message' => 'Invoice has been updated successfully.']);
    }

    public function render()
    {
        return view('livewire.invoice-edit-modal');
    }
}
