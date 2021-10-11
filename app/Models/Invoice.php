<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    const INVOICE_DRAFT = 0;
    const INVOICE_ACTIVE = 1;
    const INVOICE_PAID = 2;

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getFileNameAttribute()
    {
        $invoiceNumber = Str::replace('#', '', $this->invoice_number);

        $invoiceNumber == '' ?? $invoiceNumber = 'unknown';

        return "invoice_{$invoiceNumber}.pdf";
    }

    public function getIsPaidAttribute()
    {
        return $this->status == Invoice::INVOICE_PAID ? true : false;
    }
}
