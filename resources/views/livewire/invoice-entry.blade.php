<div x-data="{open : false, edit: false}" @toast="Toastr.error(event.detail.message);">
    <div class="mb-0.5 py-3.5 px-6 flex items-center justify-between bg-white ring-1 ring-inset ring-gray-200 transition-all"
        :class="{'rounded-t-xl' : open, 'rounded-xl' : !open}">
        <div class="flex items-center gap-5">
            <span class="inline-flex text-gray-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </span>
            <div>
                <div class="text-base font-medium text-gray-900">{{ $invoice->name }}</div>
                <p class="text-sm text-gray-600">{{ $invoice->invoice_number }}</p>
            </div>
        </div>
        <div class="flex items-center gap-6">
            <div x-data="{show : false}" class="relative inline-block">
                <button @click="show = !show" type="button"
                    class="py-2 pl-3.5 pr-2.5 inline-flex items-center gap-4 bg-gray-100 focus:bg-gray-200 rounded">
                    <span class="text-sm text-gray-600">Options</span>
                    <span class="inline-flex">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </span>
                </button>
                <div x-cloak
                    class="absolute mt-1 w-44 origin-top-right right-0 bg-white z-40 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" x-show="show" x-on:click.away="show = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" aria-orientation="vertical"
                    aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <button type="button" @click="edit = !edit"
                            class="text-gray-700 w-full hover:bg-gray-100 hover:text-gray-900 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>Edit Invoice</span>
                        </button>
                        <button type="button" wire:click="emailPDFToRecipient()"
                            class="text-gray-700 w-full hover:bg-gray-100 hover:text-gray-900 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">1-click email</button>
                        <button type="button"
                            class="text-gray-700 w-full hover:bg-gray-100 hover:text-gray-900 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>
                                Delete
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <button type="button" @click="open = !open" class="p-1.5">
                <span class="inline-flex text-gray-500 transition-transform" :class="{'rotate-180' : open}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </span>
            </button>
        </div>
    </div>
    <div x-show="open" class="flex flex-col divide-y divide-gray-100" x-collapse>
        <div class="pb-6 px-[4.75rem] bg-white">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="pr-6 pb-1"></th>
                        <th class="pb-1 px-6"></th>
                        <th class="pb-1 px-6"></th>
                        <th class="pl-6 pb-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invoice->items as $item)
                    <tr>
                        <td class="pr-6 py-6 max-w-md">
                            <div class="mb-1 text-sm text-gray-600 font-normal">Product / Services:</div>
                            <div class="text-base font-medium text-gray-800 line-clamp-1">{{ $item->title }}</div>
                        </td>
                        <td class="px-6 py-6">
                            <div class="mb-1 text-sm text-gray-600 font-normal">QTY:</div>
                            <div class="text-base font-medium text-gray-800">{{ $item->qty }}</div>
                        </td>
                        <td class="px-6 py-6">
                            <div class="mb-1 text-sm text-gray-600 font-normal">Price:</div>
                            <div class="text-base font-medium text-gray-800">${{ $item->converted_price }}</div>
                        </td>
                        <td class="pl-6 py-6 text-right">
                            <div class="mb-1 text-sm text-gray-600 font-normal">Total:</div>
                            <div class="text-base font-medium text-gray-800">${{ $item->total }}</div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="py-6">
                            <div class="mb-1 text-sm text-gray-600 font-normal">No invoice items found.</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-[4.75rem] py-3 flex items-center justify-between bg-white ">
            <a href="#" class="inline-flex items-center gap-1 text-sm font-medium text-indigo-500">
                <span>Download as PDF</span>
                <span class="inline-flex">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </span>
            </a>
            <div class="text-xl font-bold text-gray-800">${{ calculateSubtotal($invoice->items) }}</div>
        </div>
    </div>

    @livewire('invoice-edit-modal', ['invoice' => $invoice, 'email' => $email])
</div>
