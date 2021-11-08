<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Modern 2</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Raleway';
            font: 'Raleway';
            vertical-align: top;
            font-feature-settings: 'pnum', 'lnum';
        }

        .custom-numbers { 
            font-family: 'Open Sans', sans-serif;
        }

        .heading {
            font-weight: 800;
            font-size: 36px;
            line-height: 40px;
            color: #18181b;
        }

        .paragraph {
            color: #3f3f46;
            font-weight: 600;
            font-size: 16px;
            line-height: 24px;
        }

        .paragraphtop {
            color: #71717a;
            font-weight: 500;
            margin-bottom: 2px;
            text-align: right;
        }

        .inline-block {
            display: inline-block;
        }

        hr {
            border: none;
            height: 1px;
            background-color: #E4E4E7;
            margin-bottom: 16px;
        }

        table {
            display: table;
            min-width: 100%;
            border-collapse: collapse
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .pr-8 {
            padding-right: 32px;
        }

        .pl-8 {
            padding-left: 32px;
        }

        th {
            font-weight: 500;
            color: #71717A;
        }

        .py-6 {
            padding-top: 24px;
            padding-bottom: 24px;
        }

        td {
            font-weight: 600;
            color: #18181b;
        }
    </style>
</head>

<body style="background: white">
    <div style="width: 100%; margin-bottom: 36px;">
        <div class="inline-block" style="width: 49%;">
            <div class="heading">Salespoint</div>
            <div class="paragraph custom-numbers">202-555-0826</div>
        </div>
        <div class="inline-block" style="width: 50%;">
            <div class="paragraphtop">{{ auth()->user()->name }}</div>
            <div class="paragraphtop">{{ auth()->user()->email }}</div>
            <div class="paragraphtop custom-numbers">#{{ $invoice->invoice_number }}</div>
        </div>
    </div>
    <div>
        <div
            style="background-image: url(https://cdn.dribbble.com/users/3742223/screenshots/14447917/media/aac06eff93837676ecd89e2b8d1c4c4f.jpg); height: 200px; border-radius: 16px; background-position: center; background-size: cover; width: 100%;">
        </div>
    </div>
    <div style="width: 100%; margin-top: 40px; margin-bottom: 32px;">
        <div class="inline-block" style="width: 37%; vertical-align:top">
            <div style="margin-bottom: 24px;">
                <div style="color: #52525b; font-weight: 500; margin-bottom: 4px">Billed To:</div>
                <div style="font-weight: 600; color: #18181b;">
                    {{ $client->name }}
                </div>
            </div>
            <div>
                <div style="font-weight: 600; color: #18181b;">
                    {{ $client->street_address }}
                </div>
                <div class="custom-numbers" style="font-weight: 600; color: #18181b;">
                    {{ $client->city }} {{ $client->zip_code }}
                </div>
                <div style="font-weight: 600; color: #18181b;">
                    {{ $client->country }}
                </div>
            </div>
        </div>
        <div class="inline-block" style="width: 33%; vertical-align:top">
            <div style="margin-bottom: 24px;">
                <div style="color: #52525b; font-weight: 500; margin-bottom: 4px">Issue Date:</div>
                <div class="custom-numbers" style="font-weight: 600; color: #18181b;">
                    {{ $invoice->issue_date->format('d/m/Y') }}
                </div>
            </div>
            <div>
                <div style="color: #52525b; font-weight: 500; margin-bottom: 4px">Due Date:</div>
                <div class="custom-numbers" style="font-weight: 600; color: #18181b;">
                    {{ $invoice->due_date->format('d/m/Y') }}
                </div>
            </div>
        </div>
        <div class="inline-block" style="width: 29%; text-align: right; vertical-align:top">
            <div>
                <div style="color: #27272A; font-weight: 500; margin-bottom: 4px">Total:</div>
                <div class="custom-numbers" style="font-weight: 600; color: #18181b; font-size: 28px; line-height: 36px;">
                    ${{ to_money($invoice->subtotal()) }}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <table>
        <thead>
            <tr>
                <th class="text-left">Description</th>
                <th class="text-right pr-8">Rate</th>
                <th class="text-left pl-8">Qty</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->items as $item)
            <tr>
                <td class="py-6">{{ $item->title }}</td>
                <td class="custom-numbers py-6 text-right pr-8">${{ to_money($item->converted_price) }}</td>
                <td class="custom-numbers py-6 pl-8">{{ $item->qty }}</td>
                <td class="custom-numbers py-6 text-right">${{ to_money($item->total) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <div style="width: 100%; margin-top: 32px; margin-bottom: 24px;">
        <div class="inline-block" style="width: 75%">
            <div class="text-right" style="font-weight: 500; color: #71717A">
                Subtotal
            </div>
        </div>
        <div class="inline-block" style="width: 24%">
            <div class="text-right custom-numbers" style="font-weight: 600; color: #18181b">
                {{ to_money($invoice->subtotal()) }}
            </div>
        </div>
    </div>
    <div style="width: 100%; margin-top: 24px;">
        <div class="inline-block" style="width: 75%">
            <div class="text-right custom-numbers" style="font-weight: 500; color: #71717A">
                Tax (0%)
            </div>
        </div>
        <div class="inline-block" style="width: 24%">
            <div class="text-right custom-numbers" style="font-weight: 600; color: #18181b">
                0.00
            </div>
        </div>
    </div>
    <div style="width: 100%; margin-top: 32px;">
        <div class="inline-block" style="width: 75%">
            <div class="text-right" style="font-weight: 600; color: #18181b">
                Amount Due (USD)
            </div>
        </div>
        <div class="inline-block" style="width: 24%">
            <div class="text-right custom-numbers" style="font-weight: 700; color: #18181b">
                ${{ to_money($invoice->subtotal()) }}
            </div>
        </div>
    </div>
</body>

</html>