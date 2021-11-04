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
            'id' => $this->client->id,
            'name' => $this->client->name,
        ];
    }
}
