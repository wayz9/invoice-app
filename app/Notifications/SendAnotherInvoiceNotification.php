<?php

namespace App\Notifications;

use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SendAnotherInvoiceNotification extends Notification
{
    use Queueable;

    public function __construct(public Client $client){}

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Send Another Invoice',
            'message' => 'Reminder to send another Invoice to "<a href='. route('client.show', $this->client) .' class="font-semibold">'. $this->client->name .'</a>" based on previous records.'
        ];
    }
}
