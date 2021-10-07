<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class ClientEntry extends Component
{
    public Client $client;

    public function delete()
    {
        $this->client->invoices()->delete();

        $this->client->delete();

        $this->emitUp('deleted');
    }

    public function render()
    {
        return view('livewire.client-entry');
    }
}
