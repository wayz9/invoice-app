<?php

use App\Models\Invoice;
use Illuminate\Support\Collection;

if (!function_exists('calculateSubtotal')) {
    function calculateSubtotal(Collection $items)
    {
        $subtotal = [];

        foreach ($items as $item) {
            $subtotal[] = $item->qty * $item->converted_price;
        }

        return (!$subtotal) ? 0 : number_format(collect($subtotal)->sum(), 2);
    }
}


if (!function_exists('calculateTotal')) {
    function calculateTotal(Collection $invoices, int $status = Invoice::INVOICE_ACTIVE)
    {
        $total = [];

        $invoices = $invoices->where('status', $status);

        foreach ($invoices as $invoice) {
            $total[] = calculateSubtotal($invoice->items);
        }

        return (!$total) ? 0 : number_format(collect($total)->sum(), 2);
    }
}

if (!function_exists('to_cents')) {
    function to_cents($value)
    {
        return (int) (string) ((float) preg_replace("/[^0-9.]/", "", $value) * 100);
    }
}
