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

    public function getConvertedPriceAttribute()
    {
        return number_format($this->price / 100, 2);
    }

    public function getTotalAttribute()
    {
        return number_format($this->qty * $this->converted_price, 2);
    }
}
