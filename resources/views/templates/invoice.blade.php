<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Invoice</title>
    <style>
        *,
        ::before,
        ::after {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: currentColor;
        }

        body {
            margin: 0;
            line-height: inherit;
        }


        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px;
        }

        table {
            text-indent: 0;
            border-color: inherit;
            border-collapse: collapse;
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            -o-tab-size: 4;
            tab-size: 4;
            font-family: Inter var, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .bg-gray-200 {
            background-color: #e5e7eb;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .bg-white {
            background-color: #FFF;
        }

        .max-w-\[595px\] {
            max-width: 595px;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .relative {
            position: relative;
        }

        .py-10 {
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        .px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .text-gray-900 {
            color: #111827;
        }


        .mb-12 {
            margin-bottom: 3rem;
        }

        .text-gray-600 {
            color: #4b5563;
        }

        .mb-1 {
            margin-bottom: 0.25rem;
        }

        .mt-9 {
            margin-top: 2.25rem;
        }

        .block {
            display: block;
        }

        .border-none {
            border-style: none;
        }

        .h-px {
            height: 1px;
        }

        .text-gray-800 {
            color: #1f2937;
        }

        .font-bold {
            font-weight: 700;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .min-w-full {
            min-width: 100%;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-10px {
            padding-top: 0.625rem;
            padding-bottom: 0.625rem;
        }

        .bg-gray-100 {
            background-color: #f3f4f6;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .pt-4 {
            padding-top: 1rem;
        }

        .ml-auto {
            margin-left: auto;
        }

        .border-t {
            border-top-width: 1px;
        }

        .flex-col {
            flex-direction: column;
        }

        .border-gray-200 {
            border-color: #e5e7eb;
        }

        .w-full {
            width: 100%;
        }

        .absolute {
            position: absolute;
        }

        .bottom-10 {
            bottom: 2.5rem;
        }

        .left-8 {
            left: 2rem;
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .text-gray-400 {
            color: #9ca3af;
        }

        .italic {
            font-style: italic;
        }

        .w-1\/2 {
            width: 50%;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .text-gray-700 {
            color: #374151;
        }

        .float-right {
            float: right;
        }

        .float-left {
            float: left;
        }

        .clear-both {
            clear: both;
        }

        .h-10 {
            height: 40px;
        }

        .leading-5 {
            line-height: 20px;
        }
    </style>
</head>

<body>
    <div class="max-w-[595px] mx-auto bg-white min-h-screen relative">
        <div class="py-10 px-8">
            <div class="mb-6 text-2xl font-bold text-gray-900">Invoice #54</div>
            <div class="mb-12 text-sm text-gray-600">
                <div class="mb-1">Date: 03.08.2021</div>
                <div>Due Date: 17.03.2021</div>
            </div>
            <hr class="mb-12 block border-none h-px bg-gray-200">
            <div>
                <div class="text-sm float-left w-1/2">
                    <div class="mb-1 text-gray-800 font-bold">Philip Baier</div>
                    <div class="text-gray-600 leading-5">437 Lucy Lane,</div>
                    <div class="text-gray-600 leading-5">Georgetown, IN 47122</div>
                    <div class="text-gray-600 leading-5">VAT ID: <span class="text-gray-800">2529105102</span></div>
                    <div class="text-gray-600 leading-5">MB: <span class="text-gray-800">68291060</span></div>
                </div>
                <div class="text-sm float-right w-1/2">
                    <div class="mb-1 text-gray-800 font-bold">Vukasin Vitorovic</div>
                    <div class="text-gray-600 leading-5">ventusblade1@gmail.com</div>
                </div>
                <div class="clear-both"></div>
            </div>
            <div class="mt-9 rounded-md">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-10px text-sm font-bold text-gray-600 text-left">Items</th>
                            <th class="px-4 py-10px text-sm font-bold text-gray-600 text-right">QTY</th>
                            <th class="px-4 py-10px text-sm font-bold text-gray-600 text-left">Price</th>
                            <th class="px-4 py-10px text-sm font-bold text-gray-600 text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="pt-4 px-4 text-gray-900 text-left text-sm">Round Metal Sunglasess</td>
                            <td class="pt-4 px-4 text-gray-900 text-right text-sm">1</td>
                            <td class="pt-4 px-4 text-gray-900 text-left text-sm">
                                $161,00
                            </td>
                            <td class="pt-4 px-4 text-gray-900 text-right text-sm">
                                $161,00
                            </td>
                        </tr>
                        <tr>
                            <td class="pt-4 px-4 text-gray-900 text-left text-sm">Cool crazy items</td>
                            <td class="pt-4 px-4 text-gray-900 text-right text-sm">4</td>
                            <td class="pt-4 px-4 text-gray-900 text-left text-sm">
                                $125,00
                            </td>
                            <td class="pt-4 px-4 text-gray-900 text-right text-sm">
                                $500,00
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-4 mt-9 pt-4 border-t border-gray-200 px-4">
                <div class="mb-4 text-sm text-gray-600">
                    <div class="float-left w-1/2">Subtotal</div>
                    <div class="float-right w-1/2">$260,00</div>
                    <div class="clear-both"></div>
                </div>
                <div class="text-sm text-gray-600">
                    <div class="float-left w-1/2">VAT (15%)</div>
                    <div class="float-right w-1/2">$41,00</div>
                    <div class="clear-both"></div>
                </div>
            </div>
            <div class="py-10px px-4 text-sm bg-gray-100">
                <div class="text-gray-700 float-left w-1/2">Amount</div>
                <div class="font-bold float-right w-1/2 text-gray-900">$5140,00</div>
                <div class="clear-both"></div>
            </div>
            <div class="absolute bottom-10 left-8 text-sm text-gray-400 italic">
                *Invoice is valid without stamp & signature
            </div>
        </div>
    </div>
</body>

</html>
