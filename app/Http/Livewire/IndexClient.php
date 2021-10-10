<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IndexClient extends Component
{
    public Collection $clients;
    public string $pageName = 'Clients';
    public string $desc = 'List all of your clients';

    public function mount()
    {
        $this->clients = Client::query()
            ->withCount('invoices')
            ->where('user_id', auth()->user()->id)
            ->get();
    }

    protected $listeners = ['deleted' => '$refresh'];

    public function render()
    {
        return view('livewire.index-client')
            ->layout('layouts.admin', ['pageName' => $this->pageName, 'desc' => $this->desc]);
    }
}
