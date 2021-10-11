<div x-data="{open : false, edit: @entangle('editModalStatus')}" @toast-error="Toastr.error(event.detail.message);"
    @toast-success="Toastr.success(event.detail.message);">
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
                <div class="flex items-center gap-1.5">
                    <div class="text-base font-medium text-gray-900">{{ $invoice->name }}</div>
                    <x-badge status="{{ $invoice->status }}" />
                </div>
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
                        <button type="button" @click="show = false" wire:click="download()"
                            class="text-gray-700 w-full hover:bg-gray-100 hover:text-gray-900 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>Download as PDF</span>
                        </button>
                        @if (!$invoice->is_paid)
                        <button type="button" @click="show = false" wire:click="markAsPaid()"
                            class="text-gray-700 w-full hover:bg-gray-100 hover:text-gray-900 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>Mark as PAID</span>
                        </button>
                        @endif
                        <button type="button" wire:click="emailPDFToRecipient()" @click="open = false"
                            class="text-gray-700 w-full hover:bg-gray-100 hover:text-gray-900 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">1-click email</button>
                        <button type="button" wire:click="showDeleteModal()" @click="open = false"
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
        <div class="px-[4.75rem] bg-white">
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
            <button type="button" wire:click="download()"
                class="inline-flex items-center gap-1 text-sm font-medium text-indigo-500">
                <span>Download as PDF</span>
                <span class="inline-flex">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </span>
            </button>
            <div class="text-xl font-bold text-gray-800">${{ calculateSubtotal($invoice->items) }}</div>
        </div>
    </div>

    @if ($invoice->is_paid)
        @livewire('invoice-edit-modal', ['invoice' => $invoice, 'email' => $email])
    @endif

    <div x-data="{deleteModal : @entangle('modalStatus')}">
        <x-modal name="deleteModal">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Delete Invoice
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to delete this invoice? All items with this invoice will be
                                deleted too.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button wire:click="delete()" type="button"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Delete
                </button>
                <button @click="deleteModal = false" type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </x-modal>
    </div>
</div>
