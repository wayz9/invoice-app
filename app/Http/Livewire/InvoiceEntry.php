<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Services\EmailPdfToClient;
use Livewire\Component;

class InvoiceEntry extends Component
{
    public Invoice $invoice;
    public string $email;

    public function emailPDFToRecipient()
    {
        if (!$this->invoice->items()->exists()) {
            return $this->dispatchBrowserEvent('toast',
                ['message' => 'Invoice should contain at least one item!']
            );
        }

        EmailPdfToClient::send($this->invoice, $this->email);
    }

    public function render()
    {
        return view('livewire.invoice-entry');
    }
}
