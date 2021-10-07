<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ShowClient extends Component
{
    public Collection $clients;

    protected $listeners = ['deleted' => '$refresh'];

    public function render()
    {
        return view('livewire.show-client');
    }
}
