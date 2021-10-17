<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IndexClient extends Component
{
    public bool $addClientModal = false;
    public string $filterBy = '';
    public string $search = '';

    protected $listeners = [
        'deleted' => '$refresh',
        'created' => '$refresh',
        'closeModal' => 'closeAddClientModal',
    ];

    public function getClientsProperty(): Collection
    {
        return Client::query()
            ->whereUserId(auth()->user()->id)
            ->when($this->filterBy == 'with', fn(Builder $builder) => $builder->has('invoices'))
            ->when($this->filterBy == 'without', fn(Builder $builder) => $builder->doesntHave('invoices'))
            ->when($this->filterBy == 'recent', fn(Builder $builder) => $builder->orderBy('created_at', 'DESC'))
            ->when($this->filterBy == 'oldest', fn(Builder $builder) => $builder->orderBy('created_at', 'ASC'))
            ->search('name', $this->search)
            ->get();
    }

    public function closeAddClientModal(): void
    {
        $this->addClientModal = false;
    }

    public function render(): View
    {
        return view('livewire.index-client')
            ->layout('layouts.admin', ['heading' => 'Clients']);
    }
}
