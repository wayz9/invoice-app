<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Services\EmailPdfToClient;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;

class InvoiceEntry extends Component
{
    public Invoice $invoice;
    public string $email;
    public bool $modalStatus = false;
    public bool $editModalStatus = false;

    protected $listeners = ['closeModal' => 'closeEditModal'];

    public function emailPDFToRecipient()
    {
        if (!$this->invoice->items()->exists()) {
            return $this->dispatchBrowserEvent('toast-error',
                ['message' => 'Invoice should contain at least one item!']
            );
        }

        EmailPdfToClient::send($this->invoice, $this->email);
    }

    public function showDeleteModal(): void
    {
        $this->modalStatus = true;
    }

    public function closeEditModal()
    {
        $this->editModalStatus = false;
    }

    public function closeModal(): void
    {
        $this->modalStatus = false;
    }

    public function delete()
    {
        $this->invoice->delete();
        $this->closeModal();

        $this->emitUp('deleted');
    }

    public function download()
    {
        $pdf = PDF::loadView('templates.invoice', ['invoice' => $this->invoice, 'client' => $this->invoice->client])
            ->output();

        return response()->streamDownload(fn() => print($pdf), $this->invoice->file_name, ['mime' => 'application/pdf']);
    }

    public function render()
    {
        return view('livewire.invoice-entry');
    }
}
