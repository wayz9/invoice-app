<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'active_user'])->group(function () {
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::post('/client', [ClientController::class, 'store'])->name('client.store');

    Route::post('/invoice' , [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice/{invoice}' , [InvoiceController::class, 'show'])->name('invoice.show');
    Route::put('/invoice/{invoice}' , [InvoiceController::class, 'update'])->name('invoice.update');

    Route::put('/invoice/{invoice}' , [InvoiceItemController::class, 'update'])->name('invoice.item.update');
});

Route::get('/pdf', function(){
    $pdf = PDF::loadView('templates.invoice');
    return $pdf->download('invoice.pdf');

    return view('templates.invoice');
});
