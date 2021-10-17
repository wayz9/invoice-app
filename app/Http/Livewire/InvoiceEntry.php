<?php

namespace App\Http\Livewire;

use App\Jobs\EmailPdfToClient;
use App\Models\Invoice;
use App\Traits\ToastResponse;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InvoiceEntry extends Component
{
    use ToastResponse;

    public Invoice $invoice;
    public string $email;
    public bool $deleteModalStatus = false;
    public bool $editModalStatus = false;

    protected $listeners = ['closeModal' => 'closeEditModal'];

    public function emailPDFToRecipient()
    {
        if (!$this->invoice->items()->exists()) {
            return $this->toast('error', 'Invoice should contain at least one item!');
        }

        if ($this->invoice->is_paid || $this->invoice->is_draft) {
            return $this->toast('error', 'Only active invoices can be emailed!');
        }

        dispatch(new EmailPdfToClient($this->invoice, $this->email));

        return $this->toast('success', 'Invoice has been emailed successfully.');
    }

    public function delete()
    {
        $this->invoice->delete();

        $this->closeDeleteModal();
        $this->emitUp('deleted');

        return $this->toast('success', 'Invoice deleted successfully.');
    }

    public function markAsPaid()
    {
        $this->invoice->update(['status' => Invoice::INVOICE_PAID]);
        $this->emitUp('updated');

        return $this->toast('success', 'Invoice marked as PAID successfully.');
    }

    public function download($style = 'classic'): StreamedResponse
    {
        $pdf = PDF::loadView(
            "invoices.{$style}",
            [
                'invoice' => $this->invoice,
                'client' => $this->invoice->client
            ]
        )
        ->setPaper([0, 0, 720, 1440])
        ->output();

        return response()->streamDownload(fn () => print($pdf), $this->invoice->file_name, ['mime' => 'application/pdf']);
    }

    public function showDeleteModal(): void
    {
        $this->deleteModalStatus = true;
    }

    public function closeEditModal(): void
    {
        $this->editModalStatus = false;
    }

    public function closeDeleteModal(): void
    {
        $this->deleteModalStatus = false;
    }

    public function render(): View
    {
        return view('livewire.invoice-entry');
    }
}
