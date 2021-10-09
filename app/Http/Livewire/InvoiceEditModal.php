<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class InvoiceEditModal extends Component
{
    public Invoice $invoice;
    public string $email;

    public function render()
    {
        return view('livewire.invoice-edit-modal');
    }
}
