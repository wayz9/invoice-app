<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::query()
            ->with('invoices', 'invoices.items')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('client.index', compact('clients'));
    }

    public function store(ClientRequest $request)
    {
        auth()->user()->clients()->create($request->validated());
    }
}
