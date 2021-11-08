<x-slide-over name="edit">
    <div class="mb-6 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="inline-flex">
                <svg class="w-6 h-6 text-zinc-800 dark:text-zinc-200" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
            </span>
            <h2 class="text-xl font-bold text-zinc-900 dark:text-zinc-100">Edit Invoice</h2>
        </div>
        <button x-on:click="edit = false" type="button" class="inline-flex text-zinc-800 dark:text-zinc-200 focus:outline-none">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                <path fill="currentColor" fill-rule="evenodd"
                    d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"
                    clip-rule="evenodd" />
                <path fill="currentColor" fill-rule="evenodd"
                    d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div class="mb-6 flex items-center justify-between">
        <span class="text-xl font-semibold text-zinc-700 dark:text-zinc-200">#{{ $invoice->invoice_number }}</span>
        <button type="button"
            class="inline-flex items-center justify-center gap-2.5 text-xs font-medium uppercase text-primary-700 dark:text-primary-400 focus:outline-none">
            <span class="inline-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
            </span>
            <span>Copy Payment Code</span>
        </button>
    </div>
    <div class="mb-2 flex items-center gap-3">
        <span class="inline-flex p-1 rounded-full bg-zinc-900 text-primary-400">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
            </svg>
        </span>
        <span class="text-base font-semibold text-zinc-800 dark:text-zinc-100">
            <span class="text-zinc-400">quickpay.me/</span>vukasin
        </span>
    </div>
    <div class="mb-6 py-2.5 px-3.5 flex items-center justify-between rounded bg-primary-50/50 dark:bg-zinc-700/50 text-primary-600 dark:text-primary-400">
        <p class="text-sm font-medium">QuickPay is enabled!</p>
        <span>
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/><path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/></svg>
        </span>
    </div>
    <div class="mb-6">
        <div x-data="{tooltip : 'Email that was added when registering new client.'}"
            class="mb-1.5 flex items-center gap-1.5 text-zinc-600 dark:text-zinc-400">
            <span class="font-medium text-sm">Recipient Email</span>
            <span x-tooltip="tooltip" class="inline-flex text-zinc-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
        </div>
        <div class="mb-2.5 text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $email }}</div>
        <a href="#" class="block text-sm font-medium text-primary-700 dark:text-primary-400 text-right">How do I change recipient email?</a>
    </div>
    <form wire:submit.prevent="update">
        <div class="mb-7 flex flex-col gap-y-1.5">
            <label for="name" class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Invoice Name</label>
            <x-input required wire:model.defer="name" />
            <x-validation-message name="name" />
        </div>
        <div class="mb-7 grid grid-cols-2 gap-5">
            <div class="flex flex-col gap-y-1.5">
                <label for="issue_date" class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Issue Date</label>
                <x-date-picker wire:model.defer="issue_date" required />
                <x-validation-message name="issue_date" />
            </div>
            <div class="flex flex-col gap-y-1.5">
                <label for="due_date" class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Due Date</label>
                <x-date-picker wire:model.defer="due_date" required />
                <x-validation-message name="due_date" />
            </div>
        </div>
        <div class="mb-6">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="text-left text-sm font-medium text-zinc-600 dark:text-zinc-400">Item / Service</th>
                        <th class="text-right text-sm font-medium text-zinc-600 dark:text-zinc-400 px-[7px]">Qty</th>
                        <th class="text-left text-sm font-medium text-zinc-600 dark:text-zinc-400 px-[7px]">Price</th>
                        <th class="text-left text-sm font-medium text-zinc-600 dark:text-zinc-400">Total</th>
                        <th class="sr-only pl-[7px]">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $index => $item)
                    <tr x-data="{qty: @entangle("items.{$index}.qty").defer, price: @entangle("items.{$index}.price").defer}">
                        <td class="pt-4">
                            <input type="text" wire:model.defer="items.{{ $index }}.title"
                                class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 text-base font-medium text-zinc-900 dark:text-zinc-100 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30"
                                required>
                        </td>
                        <td class="pt-4 px-[7px]">
                            <div class="flex items-end justify-end">
                                <input type="number" wire:model.defer="items.{{ $index }}.qty" x-model="qty"
                                    class="block max-w-[51px] w-full py-2 px-4 rounded-md text-center ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 text-base font-medium text-zinc-900 dark:text-zinc-100 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30"
                                    required>
                            </div>
                        </td>
                        <td class="pt-4 px-[7px]">
                            <input type="number" wire:model.defer="items.{{ $index }}.price" x-model="price"
                                class="block max-w-[4.85rem] w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 text-base font-medium text-zinc-900 dark:text-zinc-100 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30"
                                required>
                        </td>
                        <td class="pt-4 text-base font-medium text-zinc-900 dark:text-zinc-100"
                            x-text="'$' + Number(qty * price / 100).toFixed(2);">
                            $0
                        </td>
                        <td x-data="{warning : 'Delete'}" class="pt-4 pl-[7px]">
                            <button x-tooltip="warning" type="button" wire:click="removeInvoiceItem({{ $index }})"
                                wire:loading.attr="disabled"
                                class="text-zinc-600 dark:text-zinc-400 hover:text-red-600 dark:hover:text-red-400 transition-colors pt-1 focus:outline-none">
                                <span>
                                    <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </span>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="pt-4 text-sm font-medium text-zinc-900 dark:text-zinc-100 italic" colspan="5">No items found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-1">
                <x-validation-message name="items.*.price" />
                <x-validation-message name="items.*.qty" />
                <x-validation-message name="items.*.title" />
            </div>
        </div>
        <div class="mb-8 flex items-center justify-between">
            <button wire:click="addInvoiceItem()" type="button" class="inline-flex gap-1 items-center text-primary-600 dark:text-primary-400">
                <span class="inline-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4" viewBox="0 0 16 16">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="text-xs font-semibold uppercase">Add Item</span>
            </button>
            <div class="flex items-center gap-3.5">
                <span class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Total</span>
                <span class="text-base font-semibold text-zinc-900 dark:text-zinc-100">${{ to_money($invoice->subtotal()) }}</span>
            </div>
        </div>
        <div class="mb-12 flex flex-col gap-y-1.5">
            <label for="notes" class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Notes (optional)</label>
            <textarea rows="3"
                class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 text-base font-medium text-zinc-900 dark:text-zinc-100 resize-none dark:ring-zinc-600/5 dark:focus:ring-zinc-600/50 dark:bg-zinc-700/30"></textarea>
            <span class="text-xs block text-right font-medium text-zinc-500">
                Please do not use HTML in here.
            </span>
        </div>
        <div class="flex items-center justify-between">
            <a href="#"
                class="text-xs font-semibold text-zinc-600 dark:text-zinc-500 uppercase focus:outline-none cursor-not-allowed">Preview</a>
            <div class="flex items-center gap-4">
                <button type="button" class="text-sm font-medium text-zinc-600 dark:text-zinc-300 focus:outline-none">
                    Save as Draft
                </button>
                <x-button type="submit">
                    Save Invoice
                </x-button>
            </div>
        </div>
    </form>
</x-slide-over>
