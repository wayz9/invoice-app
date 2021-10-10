<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class ClientEntry extends Component
{
    public Client $client;
    public string $name;
    public string $issueDate;
    public bool $modalStatus = false;

    public function delete()
    {
        $this->client->invoices()->delete();
        $this->client->delete();

        $this->closeModal();

        $this->emitUp('deleted');
    }

    public function showModal(): void
    {
        $this->modalStatus = true;
    }

    public function closeModal(): void
    {
        $this->modalStatus = false;
    }

    public function render()
    {
        return view('livewire.client-entry');
    }
}
