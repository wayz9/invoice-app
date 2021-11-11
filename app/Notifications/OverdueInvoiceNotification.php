<?php

namespace App\Notifications;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OverdueInvoiceNotification extends Notification
{
    use Queueable;

    public function __construct(public Invoice $invoice) {}

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Overdue Invoice',
            'message' => "Invoice with ID of {$this->invoice->invoice_number} is now overdue, please resend the invoice to client or mark it as paid.",
        ];
    }
}
