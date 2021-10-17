<?php

namespace App\Jobs;

use App\Mail\InvoicePDF;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailPdfToClient implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public Invoice $invoice,
        public string $email,
        public string $style = 'classic'
    ){}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pdf =  PDF::loadView(
            "invoices.{$this->style}",
            ['invoice' => $this->invoice,'client' => $this->invoice->client]
        )
        ->setPaper([0, 0, 720, 1440])
        ->output();

        Mail::to($this->email)->send(new InvoicePDF($this->invoice, $pdf));
    }
}
