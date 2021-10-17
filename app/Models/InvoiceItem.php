<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceItem extends Model
{
    use HasFactory;

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function getConvertedPriceAttribute(): string
    {
        return $this->price / 100;
    }

    public function getTotalAttribute(): string
    {
        return $this->qty * $this->converted_price;
    }
}
