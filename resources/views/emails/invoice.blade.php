@component('mail::message')
# Invoice {{ $invoice->invoice_number }}

We have attached an invoice with this email.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
