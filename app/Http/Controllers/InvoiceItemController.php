<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    public function store(Request $request, Invoice $invoice)
    {
        $data = $request->validate([
            'items' => ['required', 'array'],
            'items.*.title' => ['required', 'string'],
            'items.*.qty' => ['required', 'integer'],
            'items.*.price' => ['required', 'integer'],
        ]);

        $invoice->items()->createMany($data['items']);
    }
}
