<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    protected $dates = ['issue_date', 'due_date'];

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function getFileNameAttribute(): string
    {
        return "invoice_{$this->invoice_number}.pdf";
    }

    public function getIsPaidAttribute(): bool
    {
        return $this->status == self::INVOICE_PAID
            ? true
            : false;
    }

    public function getIsDraftAttribute(): bool
    {
        return $this->status == self::INVOICE_DRAFT
            ? true
            : false;
    }

    public function getIsOverdueAttribute(): bool
    {
        return ($this->due_date->isPast() && $this->status != self::INVOICE_PAID)
            ? true
            : false;
    }

    public function subtotal(): string
    {
        return $this->items->sum(fn(InvoiceItem $item) => $item->total);
    }

    public function scopeActiveInvoice(Builder $builder): Builder
    {
        return $builder->whereRaw('"'.now()->format('Y-m-d').'" between `issue_date` and `due_date`')
            ->where('status', '!=', self::INVOICE_PAID);
    }
}
