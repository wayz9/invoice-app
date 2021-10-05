<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
{
    public function show(Invoice $invoice)
    {
        $invoice->load('client', 'items');

        return $invoice;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => ['required', 'integer'],
            'issue_date' => ['required', 'date'],
            'due_date' => ['nullable', 'date'],
            'name' => ['nullable', 'string'],
        ]);

        Invoice::create($data);
    }

    public function update(Invoice $invoice, Request $request)
    {
        $data = $request->validate([
            'client_id' => [Rule::when(!$invoice->exists, ['required', 'integer']) ],
            'issue_date' => ['nullable', 'date'],
            'due_date' => ['nullable', 'date'],
            'name' => ['nullable', 'string'],
        ]);

        $invoice->update($data);

        return response('Ok', 200);
    }
}
