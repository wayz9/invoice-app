<?php

use Illuminate\Support\Collection;

if(! function_exists('calculateSubtotal')){
    function calculateSubtotal(Collection $items)
    {
        $subtotal = [];

        foreach($items as $item){
            $subtotal[] = $item->qty * $item->price;
        }

        if(!$subtotal){
            return 0;
        }

        return collect($subtotal)->sum() / 100;
    }
}


if(! function_exists('calculateTotal')){
    function calculateTotal(Collection $invoices, int $status = 1)
    {
        $total = [];

        $invoices = $invoices->where('status', $status);

        foreach($invoices as $invoice) {
            $total[] = calculateSubtotal($invoice->items);
        }

        if(!$total){
            return '0.00';
        }

        return collect($total)->sum();
    }
}
