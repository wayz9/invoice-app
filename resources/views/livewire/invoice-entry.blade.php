<li x-data="{open : false, edit: @entangle('editModalStatus'), deleteModal : @entangle('deleteModalStatus')}">
    <div class="py-3.5 px-6 flex items-center justify-between bg-white rounded-lg ring-1 ring-inset ring-zinc-50"
        :class="{'rounded-t-lg' : open, 'rounded-lg' : !open}">
        <div class="flex items-center gap-5">
            <span class="text-zinc-500">
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                </svg>
            </span>
            <div>
                <div class="flex items-center gap-x-2">
                    <div class="text-base font-semibold text-zinc-900">{{ $invoice->name }}</div>
                    @if ($invoice->is_draft)
                    <x-badge class="bg-zinc-100 text-zinc-700">Draft</x-badge>
                    @endif

                    @if ($invoice->is_paid)
                    <x-badge class="bg-lime-50 text-lime-700">Paid</x-badge>
                    @endif

                    @if ($invoice->is_overdue)
                    <x-badge class="bg-purple-50 text-purple-700">Overdue</x-badge>
                    @endif
                </div>
                <div class="text-sm text-zinc-600">#{{ $invoice->invoice_number }}</div>
            </div>
        </div>
        <div class="flex items-center gap-7">
            <div x-data="{options : false}" class="relative">
                <button x-on:click="options = !options" type="button"
                    class="inline-flex py-2.5 px-3.5 items-center gap-7 bg-zinc-100 focus:bg-zinc-200/50 ring-1 ring-inset ring-zinc-200/50 text-zinc-800 text-sm font-medium rounded-md">
                    <span>Options</span>
                    <span class="inline-flex">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </button>
                <div x-cloak
                    class="absolute mt-1 w-44 origin-top-right right-0 bg-white z-40 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" x-show="options" x-on:click.away="options = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" aria-orientation="vertical"
                    aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        @if (!$invoice->is_paid)
                        <button type="button" x-on:click="edit = !edit" x-on:click="options = false"
                            class="text-zinc-700 w-full font-medium hover:bg-zinc-100 hover:text-zinc-900 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>Edit Invoice</span>
                        </button>
                        @endif
                        <div class="px-4 py-2 text-sm">
                            <span>Download</span>
                        </div>
                        <ul class="flex flex-col" role="menuitem" tabindex="-1">
                            <li x-on:click="options = false" wire:click="download('modern')"
                                class="flex items-center gap-2 text-sm py-1.5 pl-8 hover:bg-zinc-100 cursor-pointer text-zinc-700 w-full font-medium hover:text-zinc-900">
                                <span>Modern PDF</span>
                                <span class="px-1.5 text-xs leading-5 rounded bg-lime-50 font-semibold text-lime-700">NEW</span>
                            </li>
                            <li x-on:click="options = false" wire:click="download('classic')"
                                class="flex items-center gap-2 text-sm py-1.5 pl-8 hover:bg-zinc-100 cursor-pointer text-zinc-700 w-full font-medium hover:text-zinc-900">
                                <span>Classic PDF</span>
                            </li>
                        </ul>
                        @if (!$invoice->is_paid)
                        <button type="button" x-on:click="options = false" wire:click="markAsPaid()"
                            class="text-zinc-700 w-full font-medium hover:bg-zinc-100 hover:text-zinc-900 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>Mark as PAID</span>
                        </button>
                        <button type="button" wire:click="emailPDFToRecipient()" x-on:click="options = false"
                            class="text-zinc-700 w-full font-medium hover:bg-zinc-100 hover:text-zinc-900 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>1-click email</span>
                        </button>
                        @endif
                        <button type="button" x-on:click="options = false" wire:click="showDeleteModal()"
                            class="text-zinc-700 w-full font-medium hover:bg-zinc-100 hover:text-zinc-900 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>
                                Delete
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <button x-on:click="open = !open" type="button" class="inline-flex text-zinc-800 focus:outline-none">
                <span class="inline-flex transform transition-all" :class="{'rotate-180' : open}">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
    <div x-show="open" x-collapse class="flex flex-col">
        <div class="px-[4.5rem] bg-white">
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
                        <td class="pr-6 py-6">
                            <div class="mb-1 text-sm text-zinc-600 font-normal">Product /
                                Services:</div>
                            <div class="text-base font-medium text-zinc-900 max-w-md w-full">{{ $item->title }}</div>
                        </td>
                        <td class="px-6 py-6">
                            <div class="mb-1 text-sm text-zinc-600 font-normal">QTY:</div>
                            <div class="text-base font-medium text-zinc-900">{{ $item->qty }}</div>
                        </td>
                        <td class="px-6 py-6">
                            <div class="mb-1 text-sm text-zinc-600 font-normal">Price:</div>
                            <div class="text-base font-medium text-zinc-900">$ {{ to_money($item->converted_price) }}
                            </div>
                        </td>
                        <td class="pl-6 py-6 text-right">
                            <div class="mb-1 text-sm text-zinc-600 font-normal">Total:</div>
                            <div class="text-base font-medium text-zinc-900">$ {{ $item->total }}</div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="py-6">
                            <div class="text-sm text-zinc-900 font-medium">No invoice items found.</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-[4.5rem] py-3 flex items-center justify-between bg-white ">
            <button type="button" wire:click="download()"
                class="inline-flex items-center gap-1 text-sm font-medium text-lime-600">
                <span>Download as PDF</span>
                <span class="inline-flex">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </span>
            </button>
            <div class="text-xl font-bold text-zinc-800">$ {{ to_money($invoice->subtotal()) }}</div>
        </div>
    </div>

    @if (!$invoice->is_paid)
        @livewire('invoice-edit-modal', ['invoice' => $invoice, 'email' => $email])
    @endif

    <x-modal name="deleteModal">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div
                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-semibold text-zinc-900" id="modal-title">
                        Delete Invoice
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-zinc-600 font-medium">
                            Are you sure you want to delete this invoice? All items with this invoice will be
                            deleted too.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-zinc-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button wire:click="delete()" type="button"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                Delete
            </button>
            <button @click="deleteModal = false" type="button"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-zinc-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-zinc-700 hover:bg-zinc-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-zinc-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Cancel
            </button>
        </div>
    </x-modal>
</li>
