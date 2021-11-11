<?php

namespace App\Http\Livewire;

use App\Traits\ToastResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    public function markAsRead($id)
    {
        try {
            $notification = auth()->user()->notifications()->findOrFail($id);
            $notification->markAsRead();

            return $this->toast('success', 'Notification has been marked as read.');
        } catch (ModelNotFoundException $e) {
            $this->emitSelf('$refresh');
            return $this->toast('error', 'Notification has been already marked as read.');
        }
    }

    public function delete($id)
    {
        try {
            $notification = auth()->user()->notifications()->findOrFail($id);
            $notification->delete();

            return $this->toast('success', 'Notification has been deleted.');
        } catch (ModelNotFoundException $e) {
            $this->emitSelf('$refresh');
            return $this->toast('error', 'Notification has been already deleted.');
        }
    }

    public function render()
    {
        return view('livewire.notifications')
            ->layout('layouts.admin', ['heading' => 'Notifications']);
    }
}
