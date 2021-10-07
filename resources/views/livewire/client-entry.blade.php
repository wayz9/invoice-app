<div class="divide-y divide-gray-100">
    <div class="flex items-center bg-white py-3.5 rounded-t-xl">
        <div class="px-6 max-w-xs w-full">
            <div class="text-sm text-gray-500">Client</div>
            <div class="text-base font-medium text-gray-800">{{ $client->name }}</div>
        </div>
        <div class="px-6 max-w-md w-full">
            <div class="text-sm text-gray-500">Address</div>
            <div class="text-base font-medium text-gray-800">{{ $client->address_line1 }}</div>
        </div>
        <div class="px-6 flex-grow">
            <div class="text-sm text-gray-500">Total</div>
            <div class="text-base font-medium text-gray-800">${{ calculateTotal($client->invoices) }}</div>
        </div>
        <div x-data="{show : false}" class="px-6 relative">
            <button @click="show = !show" type="button"
                class="py-2 pl-3 pr-4 flex items-center gap-2 text-gray-600 text-sm font-medium rounded-md bg-gray-200/50 focus:outline-none focus:bg-gray-200">
                <span class="inline-flex">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </span>
                <span>Options</span>
            </button>
            <div class="absolute w-48 bg-white mt-2 right-6 origin-top-right z-50 rounded-lg shadow ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" x-show="show" x-on:click.away="show = false"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95" aria-orientation="vertical"
                aria-labelledby="menu-button" tabindex="-1">
                <ul class="py-3 flex flex-col" role="none">
                    <li>
                        <a href="#"
                            class="py-2 px-4 flex items-center gap-2.5 text-gray-600 bg-transparent hover:bg-gray-100/50 focus:outline-none focus:bg-gray-100/50">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </span>
                            <span class="text-sm font-medium">View Client</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="py-2 px-4 flex w-full items-center gap-2.5 text-gray-600 bg-transparent hover:bg-gray-100/50 focus:outline-none focus:bg-gray-100/50">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </span>
                            <span class="text-sm font-medium">Edit Details</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="py-2 px-4 flex items-center gap-2.5 text-gray-600 bg-transparent hover:bg-gray-100/50 focus:outline-none focus:bg-gray-100/50">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </span>
                            <span class="text-sm font-medium">Create Invoice</span>
                        </a>
                    </li>
                    <li>
                        <button type="button" wire:click="delete()"
                            class="py-2 px-4 flex w-full items-center gap-2.5 text-gray-600 bg-transparent hover:bg-gray-100/50 focus:outline-none focus:bg-gray-100/50">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </span>
                            <span class="text-sm font-medium">Delete Client</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @foreach ($client->invoices as $invoice)
    <div class="py-3.5 px-6 bg-white flex items-center justify-between">
        <a href="#" class="text-sm font-medium text-cyan-700">{{ $invoice->name }}</a>
        <div class="text-sm font-medium text-gray-800">${{ calculateSubtotal($invoice->items) }}</div>
    </div>
    @endforeach
</div>
