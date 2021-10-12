<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class ShowClient extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Client $client;
    public string $search = '';
    public string $filterBy = '';
    public string $pageName;
    public string $desc;

    protected $listeners = ['deleted' => '$refresh', 'updated' => '$refresh'];

    public function mount()
    {
        $this->authorize('view', $this->client);
        $this->pageName = $this->client->name;
        $this->desc = 'Show invoices and details about client';
    }

    public function render()
    {
        $invoices = $this->client
            ->invoices()
            ->when($this->filterBy == 'active', fn(Builder $query) => $query->where('status', Invoice::INVOICE_ACTIVE))
            ->when($this->filterBy == 'paid', fn(Builder $query) => $query->where('status', Invoice::INVOICE_PAID))
            ->when($this->filterBy == 'draft', fn(Builder $query) => $query->where('status', Invoice::INVOICE_DRAFT))
            ->when($this->filterBy == 'overdue', fn(Builder $query) => $query->where('due_date', '<', now()->format('Y-m-d')))
            ->search('name', $this->search)
            ->paginate(10);

        return view('livewire.show-client', compact('invoices'))
                ->layout('layouts.admin', ['pageName' => $this->pageName, 'desc' => $this->desc]);
    }
}
