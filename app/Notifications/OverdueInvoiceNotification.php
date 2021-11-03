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
            'invoice_number' => $this->invoice->invoice_number,
        ];
    }
}
