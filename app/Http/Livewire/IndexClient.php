<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IndexClient extends Component
{
    public Collection $clients;
    public $pageName = 'Clients';
    public $desc = 'List all of your clients';
    public bool $addClientModal = false;

    protected $listeners = [
        'deleted' => '$refresh',
        'created' => '$refresh',
        'closeModal' => 'closeAddClientModal',
    ];

    public function mount()
    {
        $this->clients = Client::query()
            ->withCount('invoices')
            ->where('user_id', auth()->user()->id)
            ->get();
    }

    public function closeAddClientModal()
    {
        $this->addClientModal = false;
    }

    public function render()
    {
        return view('livewire.index-client')
            ->layout('layouts.admin', ['pageName' => $this->pageName, 'desc' => $this->desc]);
    }
}
