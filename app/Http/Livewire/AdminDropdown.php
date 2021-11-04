<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminDropdown extends Component
{
    public function getListeners()
    {
        $userId = auth()->user()->id;

        return [
            "echo-private:App.Models.User.{$userId},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => '$refresh',
        ];
    }

    public function render()
    {
        return view('livewire.admin-dropdown');
    }
}
