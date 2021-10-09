<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoicePDF extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Invoice $invoice, public $pdf)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Invoice #{$this->invoice->invoice_number}")
            ->markdown('emails.invoice')
            ->attachData(
                $this->pdf,
                $this->invoice->file_name,
                ['mime' => 'application/pdf']
            );
    }
}
