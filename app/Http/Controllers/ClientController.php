<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::query()
            ->with('invoices')
            ->where('user_id', auth()->user()->id)
            ->get();

        return $client;
    }

    public function store(ClientRequest $request)
    {
        auth()->user()->clients()->create($request->validated());
    }
}
