<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IndexClient extends Component
{
    public Collection $clients;

    protected $listeners = ['deleted' => '$refresh'];

    public function render()
    {
        return view('livewire.index-client');
    }
}
