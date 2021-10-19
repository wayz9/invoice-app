<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Invoice</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            -o-tab-size: 4;
            tab-size: 4;
            font-family: 'Open Sans';
        }

        hr {
            border: none;
            height: 1px;
            background-color: #E4E4E7;
            margin-bottom: 16px;
        }

        .inline-block {
            display: inline-block;
        }

        table {
            display: table;
            min-width: 100%;
            border-collapse: collapse
        }

        th {
            font-weight: 500;
            color: #71717A;
        }

        .py-3 {
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .pr-6 {
            padding-right: 1.5rem;
        }

        .pl-6 {
            padding-left: 1.5rem;
        }

        td {
            font-weight: 500;
            color: #18181b;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .py-10px {
            padding-bottom: 13px;
            padding-top: 6px;
        }

        .px-4 {
            padding-left: 16px;
            padding-right: 16px;
        }
    </style>
</head>

<body style="background-color: white">
    <div>
        <div style="font-weight: 800; font-size: 28px; color: #18181b; margin-bottom: 20px;">Invoice #{{ $invoice->invoice_number }}</div>
        <div style="font-size: 16px; color: #71717A;">Date: <span style="color: #27272A">{{ $invoice->issue_date->format('d F Y') }}</span></div>
        <div style="font-size: 16px; color: #71717A;">Due Date: <span style="color: #27272A">{{ $invoice->due_date->format('d F Y') }}</span></div>
    </div>
    <hr style="margin-top: 48px;">
    <div style="width: 100%;">
        <div class="inline-block" style="width: 49%; margin-top: 48px;">
            <div style="font-weight: 500; font-size: 18px; color: #18181b; margin-bottom: 2px;">{{ $client->name }}</div>
            <div style="font-size: 16px; color: #71717A;">{{ $client->street_address }},</div>
            <div style="font-size: 16px; color: #71717A;">{{ $client->city }}, {{ $client->zip_code }} {{ $client->country }}</div>
            <div style="font-size: 16px; color: #71717A;">VAT ID: {{ $client->vat_in }}</div>
            <div style="font-size: 16px; color: #71717A;">MB: {{ $client->company_identifier }}</div>
        </div>
        <div class="inline-block text-right" style="width: 49%; vertical-align: top; margin-top: -31px;">
            <div style="font-weight: 500; font-size: 18px; color: #18181b; margin-bottom: 2px;">{{ auth()->user()->name }}</div>
            <div style="font-size: 16px; color: #71717A;">{{ auth()->user()->email }}</div>
        </div>
    </div>
    <div style="width: 100%; margin-top: 40px;">
        <table>
            <thead style="background: #F4F4F5; border-radius: 8px; overflow: hidden;">
                <tr>
                    <th class="py-10px text-left px-4" style="font-size: 16px;">Product / Service</th>
                    <th class="py-10px text-right pr-6" style="font-size: 16px;">Qty</th>
                    <th class="py-10px text-left pl-6" style="font-size: 16px;">Price</th>
                    <th class="py-10px text-right px-4" style="font-size: 16px;">Total</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($invoice->items as $item)
                <tr>
                    <td class="py-3 px-4" style="font-size: 16px;">{{ $item->title }}</td>
                    <td class="py-3 pr-6 text-right" style="font-size: 16px;">{{ $item->qty }}</td>
                    <td class="py-3 pl-6" style="font-size: 16px;">$ {{ to_money($item->converted_price) }}</td>
                    <td class="py-3 px-4 text-right" style="font-size: 16px;">$ {{ to_money($item->total) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr style="margin-top: 24px;">
    <div style="margin-top: 32px; width: 100%">
        <div class="inline-block text-right" style="width: 65%">
            <div style="color: #71717A; font-size: 16px;">Subtotal</div>
        </div>
        <div class="inline-block text-right" style="width: 34%;">
            <div style="color: #18181b; font-size: 16px; font-weight: 500; padding-right: 12px; ">$ {{ to_money($invoice->subtotal()) }}</div>
        </div>
    </div>
    <div style="margin-top: 24px; width: 100%">
        <div class="inline-block text-right" style="width: 65%">
            <div style="color: #71717A; font-size: 16px;">Tax (6%)</div>
        </div>
        <div class="inline-block text-right" style="width: 34%;">
            <div style="color: #18181b; font-size: 16px; font-weight: 500; padding-right: 12px; ">$ 44.21</div>
        </div>
    </div>
    <div style="margin-top: 24px; width: 100%">
        <div class="inline-block text-right" style="width: 65%">
            <div style="color: #18181b; font-size: 16px;">Total</div>
        </div>
        <div class="inline-block text-right" style="width: 34%;">
            <div style="color: #18181b; font-size: 18px; font-weight: 700; padding-right: 12px; ">$ {{ to_money($invoice->subtotal()) }}</div>
        </div>
    </div>
    <div style="width: 100; height: 160px;">

    </div>
    <div class="fixed bottom-16 left-12" style="font-size: 14px; color: #71717A">
        *Invoice is valid without stamp & signature
    </div>
</body>

</html>
