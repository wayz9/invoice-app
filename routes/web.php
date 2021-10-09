<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Mail\InvoicePDF;
use App\Models\Invoice;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'active_user'])->group(function () {
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::get('/client/{client}', [ClientController::class, 'show'])->name('client.show');
    Route::post('/client', [ClientController::class, 'store'])->name('client.store');

    Route::resource('client', ClientController::class)->only('index', 'show', 'store');

    Route::post('/invoice' , [InvoiceController::class, 'store'])->name('invoice.store');
    Route::put('/invoice/{invoice}' , [InvoiceController::class, 'update'])->name('invoice.update');

    Route::put('/invoice/{invoice}' , [InvoiceItemController::class, 'update'])->name('invoice.item.update');
});
