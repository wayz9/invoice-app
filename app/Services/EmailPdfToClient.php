<?php

namespace App\Services;

use App\Mail\InvoicePDF;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class EmailPdfToClient
{
    public static function send(Invoice $invoice, string $email)
    {
        $pdf =  PDF::loadView(
            'templates.invoice',
            [
                'invoice' => $invoice,
                'client' => $invoice->client
            ]
        )->output();

        Mail::to($email)->send(new InvoicePDF($invoice, $pdf));
    }
}
