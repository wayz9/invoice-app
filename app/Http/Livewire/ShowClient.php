<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class ShowClient extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Client $client;
    public string $search = '';
    public string $filterBy = '';
    public string $heading;
    public bool $createInvoiceModal = false;

    protected $listeners = [
        'deleted' => '$refresh',
        'updated' => '$refresh',
        'created' => '$refresh',
        'closeModal' => 'closeCreateInvoiceModal'
    ];

    public function mount()
    {
        $this->authorize('view', $this->client);
        $this->heading = $this->client->name;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getInvoicesProperty(): LengthAwarePaginator
    {
        return $this->client
            ->invoices()
            ->with('items')
            ->when($this->filterBy == 'active', fn (Builder $query) => $query->activeInvoice())
            ->when($this->filterBy == 'paid', fn (Builder $query) => $query->where('status', Invoice::INVOICE_PAID))
            ->when($this->filterBy == 'draft', fn (Builder $query) => $query->where('status', Invoice::INVOICE_DRAFT))
            ->when($this->filterBy == 'overdue', fn (Builder $query) => $query->whereDate('due_date', '<', now()->format('Y-m-d')))
            ->search('name', $this->search)
            ->paginate(10);
    }

    public function closeCreateInvoiceModal() { $this->createInvoiceModal = false; }

    public function render()
    {
        return view('livewire.show-client')
            ->layout('layouts.admin', ['heading' => $this->heading]);
    }
}
