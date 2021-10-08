<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::query()
            ->withCount('invoices')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('client.index', compact('clients'));
    }

    public function show(Client $client)
    {
        $client->load('invoices', 'invoices.items');

        return view('client.show', compact('client'));
    }

    public function store(ClientRequest $request)
    {
        auth()->user()->clients()->create($request->validated());
    }
}
