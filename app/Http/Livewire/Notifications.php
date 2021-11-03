<?php

namespace App\Http\Livewire;

use App\Traits\ToastResponse;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Livewire\Component;

class Notifications extends Component
{
    use ToastResponse;

    public function getListeners()
    {
        $userId = auth()->user()->id;

        return [
            "echo-private:App.Models.User.{$userId},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => '$refresh',
        ];
    }

    public function getNotificationsProperty(): DatabaseNotificationCollection
    {
        return auth()->user()->notifications;
    }

    public function render()
    {
        return view('livewire.notifications')
            ->layout('layouts.admin', ['heading' => 'Notifications']);
    }
}
