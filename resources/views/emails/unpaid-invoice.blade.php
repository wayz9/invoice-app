@component('mail::message')
# Invoice Overdue
*ID\# {{ $invoice->invoice_number }}*

### Invoice is due for {{ $invoice->due_date->diffInDays(now()) }} day/s

## Amount to pay ${{ to_money($invoice->subtotal()) }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
