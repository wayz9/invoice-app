<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Client extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function getTotalIncomeFromAllInvoicesAttribute(): string
    {
        $strExp = Str::of(calculateTotal($this->invoices, Invoice::INVOICE_ACTIVE))->explode('.');

        return Str::of($strExp[0] . '<span class="text-gray-400">.' . $strExp[1] . '</span>');
    }
}
