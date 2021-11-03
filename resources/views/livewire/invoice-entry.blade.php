<li x-data="{open : false, edit: @entangle('editModalStatus'), deleteModal : @entangle('deleteModalStatus')}">
    <div class="py-3.5 px-6 flex items-center justify-between bg-white dark:bg-zinc-800/60 rounded-lg ring-1 ring-inset ring-zinc-50 dark:ring-zinc-800"
        :class="{'rounded-t-lg' : open, 'rounded-lg' : !open}">
        <div class="flex items-center gap-5">
            <span class="text-zinc-500 dark:text-zinc-300">
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                </svg>
            </span>
            <div>
                <div class="flex items-center gap-x-2">
                    <div class="text-base font-semibold text-zinc-900 dark:text-zinc-100">{{ $invoice->name }}</div>
                    @if ($invoice->is_draft)
                    <x-badge class="bg-zinc-100 dark:bg-zinc-700/25 text-zinc-700 dark:text-zinc-400">Draft</x-badge>
                    @endif

                    @if ($invoice->is_paid)
                    <x-badge class="bg-lime-50 dark:bg-zinc-700/25 text-lime-700 dark:text-lime-400">Paid</x-badge>
                    @endif

                    @if ($invoice->is_overdue)
                    <x-badge class="bg-purple-50 dark:bg-zinc-700/25 text-purple-700 dark:text-purple-400">Overdue
                    </x-badge>
                    @endif
                </div>
                <div class="text-sm text-zinc-600 dark:text-zinc-400">#{{ $invoice->invoice_number }}</div>
            </div>
        </div>
        <div class="flex items-center gap-7">
            <div x-data="{options : false}" class="relative">
                <button x-on:click="options = !options" type="button"
                    class="inline-flex py-2.5 px-3.5 items-center gap-7 bg-zinc-100 dark:bg-zinc-700/30 focus:bg-zinc-200/50 ring-1 ring-inset ring-zinc-200/50 dark:ring-zinc-600/5 text-zinc-800 dark:text-zinc-300 text-sm font-medium rounded-md dark:focus:ring-zinc-600">
                    <span>Options</span>
                    <span class="inline-flex">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </button>
                <div x-cloak
                    class="absolute mt-1 w-52 origin-top-right right-0 bg-white dark:bg-zinc-800 z-40 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
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
                            class="text-zinc-700 dark:text-zinc-300 w-full font-medium hover:bg-zinc-100 dark:hover:bg-zinc-700/25 hover:text-zinc-900 dark:hover:text-zinc-100 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>Edit Invoice</span>
                        </button>
                        @endif
                        <div class="px-4 py-2 text-sm">
                            <span class="text-zinc-700 dark:text-zinc-300">Download</span>
                        </div>
                        <ul class="flex flex-col" role="menuitem" tabindex="-1">
                            <li x-on:click="options = false" wire:click="download('modern')"
                                class="flex items-center justify-between text-sm py-1.5 pl-8 pr-4 hover:bg-zinc-100 dark:hover:bg-zinc-700/25 cursor-pointer text-zinc-700 dark:text-zinc-300 w-full font-medium hover:text-zinc-900 dark:hover:text-zinc-100">
                                <span>Modern PDF</span>
                                <x-badge class="bg-lime-50 dark:bg-zinc-700/25 text-lime-700 dark:text-lime-400">New
                                </x-badge>
                            </li>
                            <li x-on:click="options = false" wire:click="download('classic')"
                                class="flex items-center gap-2 text-sm py-1.5 pl-8 hover:bg-zinc-100 dark:hover:bg-zinc-700/25 cursor-pointer text-zinc-700 dark:text-zinc-300 w-full font-medium hover:text-zinc-900 dark:hover:text-zinc-100">
                                <span>Classic PDF</span>
                            </li>
                        </ul>
                        @if (!$invoice->is_paid)
                        <button type="button" x-on:click="options = false" wire:click="markAsPaid()"
                            class="text-zinc-700 dark:text-zinc-300 w-full font-medium hover:bg-zinc-100 dark:hover:bg-zinc-700/25 hover:text-zinc-900 dark:hover:text-zinc-100 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>Mark as PAID</span>
                        </button>
                        <label for="{{ "auto_emails.$invoice->id" }}"
                            class="text-zinc-700 dark:text-zinc-300 w-full font-medium hover:bg-zinc-100 dark:hover:bg-zinc-700/25 hover:text-zinc-900 dark:hover:text-zinc-100 px-4 py-2 text-sm flex items-center justify-between">
                            <div class="flex items-center gap-1">
                                <div>Auto Emails</div>
                                <span x-data="{tooltip : 'When enabled a client will received email when invoice is overdue.'}" x-tooltip.max-width.256="tooltip">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                                </span>
                            </div>
                            <label for="{{ "auto_emails.$invoice->id" }}" class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input wire.model="autoEmails" {{ $autoEmails ? 'checked' : '' }}
                                        wire:change="toggleAutoEmails()" type="checkbox" id="{{ "
                                        auto_emails.$invoice->id" }}" class="sr-only peer">
                                    <div
                                        class="h-3.5 w-9 bg-zinc-400 peer-disabled:bg-zinc-500 peer-disabled:cursor-not-allowed peer-checked:bg-lime-800 rounded-full">
                                    </div>
                                    <div
                                        class="absolute -left-px bottom-[-3px] w-5 h-5 rounded-full shadow-none bg-zinc-500 peer-checked:bg-lime-500 dark:peer-checked:bg-lime-400 peer-checked:translate-x-[18px] peer-disabled:bg-zinc-300 peer-disabled:cursor-not-allowed transition">
                                    </div>
                                </div>
                            </label>
                        </label>
                        <button type="button" wire:click="emailPDFToRecipient()" x-on:click="options = false"
                            class="text-zinc-700 dark:text-zinc-300 w-full font-medium hover:bg-zinc-100 dark:hover:bg-zinc-700/25 hover:text-zinc-900 dark:hover:text-zinc-100 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>1-click email</span>
                        </button>
                        @endif
                        <button type="button" x-on:click="options = false" wire:click="showDeleteModal()"
                            class="text-zinc-700 dark:text-zinc-300 w-full font-medium hover:bg-zinc-100 dark:hover:bg-zinc-700/25 hover:text-zinc-900 dark:hover:text-zinc-100 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>
                                Delete
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <button x-on:click="open = !open" type="button"
                class="inline-flex text-zinc-800 dark:text-zinc-100 focus:outline-none">
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
        <div class="px-[4.5rem] bg-white dark:bg-zinc-800/60">
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
                            <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400 font-normal">Product /
                                Services:</div>
                            <div class="text-base font-medium text-zinc-900 dark:text-zinc-200 max-w-md w-full">{{
                                $item->title }}</div>
                        </td>
                        <td class="px-6 py-6">
                            <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400 font-normal">QTY:</div>
                            <div class="text-base font-medium text-zinc-900 dark:text-zinc-200">{{ $item->qty }}</div>
                        </td>
                        <td class="px-6 py-6">
                            <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400 font-normal">Price:</div>
                            <div class="text-base font-medium text-zinc-900 dark:text-zinc-200">$ {{
                                to_money($item->converted_price) }}
                            </div>
                        </td>
                        <td class="pl-6 py-6 text-right">
                            <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400 font-normal">Total:</div>
                            <div class="text-base font-medium text-zinc-900 dark:text-zinc-200">$ {{ $item->total }}
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="py-6">
                            <div class="text-sm text-zinc-900 dark:text-zinc-100 font-medium">No invoice items found.
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-[4.5rem] py-3 flex items-center justify-between bg-white dark:bg-zinc-800/60 rounded-b-lg">
            <button type="button" wire:click="download()"
                class="inline-flex items-center gap-1 text-sm font-medium text-lime-600 dark:text-lime-400">
                <span>Download as PDF</span>
                <span class="inline-flex">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </span>
            </button>
            <div class="text-xl font-bold text-zinc-800 dark:text-zinc-100">$ {{ to_money($invoice->subtotal()) }}</div>
        </div>
    </div>

    @if (!$invoice->is_paid)
    @livewire('invoice-edit-modal', ['invoice' => $invoice, 'email' => $email])
    @endif

    <x-modal name="deleteModal" class="!max-w-md">
        <div class="py-9 px-10 flex flex-col items-center relative">
            <span class="text-red-900 dark:text-red-400 mb-7">
                <svg width="60" height="60" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 60 60">
                    <path stroke="currentColor" stroke-miterlimit="10" stroke-width="2"
                        d="m5.964 22.566 3.622 30.9A4 4 0 0 0 13.559 57h24.886a3.999 3.999 0 0 0 3.972-3.531L46.2 21H14.4" />
                    <path stroke="currentColor" stroke-miterlimit="10" stroke-width="2"
                        d="m46.634 7.033-43.002 8a2 2 0 0 0-1.593 2.364l1.078 5.697 46.937-8.71-1.091-5.763a1.999 1.999 0 0 0-2.329-1.588Z" />
                    <path stroke="currentColor" stroke-miterlimit="10" stroke-width="2"
                        d="m33.87 9.408-.906-4.787a2 2 0 0 0-2.332-1.587l-12 2a1.999 1.999 0 0 0-1.593 2.363l.94 4.967" />
                    <path fill="currentColor" d="M9 17H7v2h2v-2ZM13 16h-2v2h2v-2ZM17 15h-2v2h2v-2Z" />
                    <path stroke="currentColor" stroke-miterlimit="10" stroke-width="2"
                        d="M26 27v25M33.352 45.831l1.63-18.752M32.827 51.867l.323-3.72M18.648 45.831l-1.63-18.752M19.172 51.867l-.323-3.72M52.357 17.434l6.331-2.876M52.463 20.469 56.6 24.6" />
                </svg>
            </span>
            <h1 class="mb-2.5 text-2xl font-bold text-zinc-900 dark:text-zinc-100 text-center">Are you sure?</h1>
            <p class="mb-9 font-medium text-zinc-600 dark:text-zinc-400 text-center">This action is permanent, all
                items<br> from this invoice will be deleted too.
            </p>
            <div class="flex items-center justify-center gap-4">
                <button x-on:click="deleteModal = false"
                    class="px-4 py-2.5 bg-transparent dark:focus:ring-offset-zinc-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-zinc-300">
                    <span class="text-sm font-semibold text-zinc-600 dark:text-zinc-300">Cancel</span>
                </button>
                <button type="button" wire:click="delete()"
                    class="px-4 py-2.5 bg-red-600 dark:bg-zinc-700/60 dark:focus:ring-offset-zinc-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-700">
                    <span class="text-sm font-semibold text-red-100 dark:text-red-400">Delete</span>
                </button>
            </div>
            <div class="absolute top-8 right-8">
                <button type="button" x-on:click="deleteModal = false" class="dark:text-zinc-300 text-zinc-800">
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
        </div>
    </x-modal>

    <div wire:loading wire:target="download,emailPDFToRecipient"
        class="fixed inset-0 z-50 w-screen h-screen dark:bg-black/40 bg-black/70">
        <div class="flex flex-col items-center justify-center text-center h-full">
            <span class="mb-2 text-zinc-100 text-lg font-semibold">
                Processing
            </span>
            <span class="text-sm font-medium text-zinc-300">Please wait...</span>
        </div>
    </div>
</li>