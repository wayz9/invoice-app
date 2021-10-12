<?php

use App\Http\Livewire\IndexClient;
use App\Http\Livewire\ShowClient;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'active_user'])->group(function () {
    Route::get('/', IndexClient::class)->name('client.index');
    Route::get('/client/{client}', ShowClient::class)->name('client.show');
});
