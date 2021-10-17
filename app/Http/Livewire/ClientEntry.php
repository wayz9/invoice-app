<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Traits\ToastResponse;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ClientEntry extends Component
{
    use ToastResponse;

    public Client $client;
    public bool $deleteModal = false;
    public bool $editModal = false;

    protected $listeners = [
        'closeEditModal' => 'closeEditModal',
        'updated' => '$refresh'
    ];

    public function delete()
    {
        $this->client->invoices()->delete();
        $this->client->delete();

        $this->closeDeleteModal();
        $this->emitUp('deleted');

        return $this->toast('success', 'Client has been deleted successfully.');
    }

    public function closeDeleteModal(): void
    {
        $this->deleteModal = false;
    }

    public function closeEditModal(): void
    {
        $this->editModal = false;
    }

    public function render(): View
    {
        return view('livewire.client-entry');
    }
}
