<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $clients = [];
        $invoices = [];

        if(strlen($this->search) > 2){
            $clients = auth()->user()->clients()->search('name', $this->search)->get();

            // Return search results of invoices searched by name that belong to auth user
            $invoices = Invoice::whereHas('client', function(Builder $query) {
                $query->whereUserId(auth()->user()->id);
            })->search('name', $this->search)->get();
        }

        return view('livewire.search', compact('clients', 'invoices'));
    }
}
