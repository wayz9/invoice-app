<div x-data="{open : false}">
    <div
        class="mb-0.5 py-3.5 px-6 flex items-center justify-between bg-white ring-1 ring-inset ring-gray-200" :class="{'rounded-t-xl' : open, 'rounded-xl' : !open}">
        <div class="flex items-center gap-5">
            <span class="inline-flex text-gray-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </span>
            <div>
                <a href="{{ route('client.show', ['client' => $client]) }}" class="text-base font-medium text-gray-900">{{ $client->name }}</a>
                <p class="text-sm text-gray-600">{{ $client->address_line1 }}</p>
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
                <div x-cloak class="absolute mt-1 w-44 origin-top-right right-0 bg-white z-40 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" x-show="show" x-on:click.away="show = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" aria-orientation="vertical"
                    aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="{{ route('client.show', ['client' => $client]) }}" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 block px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">View Client</a>
                        <a href="#" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 block px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">Create Invoice</a>
                        <button wire:click="showModal()" type="button"
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
    <div x-show="open" x-collapse>
        <div class="flex flex-col gap-y-8 bg-white py-6 px-[4.75rem]">
            <div>
                <div class="mb-1 text-sm text-gray-600">Name:</div>
                <div class="text-base font-medium text-gray-900">{{ $client->name }}</div>
            </div>
            <div>
                <div class="mb-1 text-sm text-gray-600">Address:</div>
                <div class="text-base font-medium text-gray-900">{{ $client->address_line1 }}</div>
            </div>
            <div>
                <div class="mb-1 text-sm text-gray-600">Phone:</div>
                <div class="text-base font-medium text-gray-900">+381 / 69285912</div>
            </div>
            <div>
                <div class="mb-1 text-sm text-gray-600">VAT IN:</div>
                <div class="text-base font-medium text-gray-900">25019201123</div>
            </div>
            <div>
                <div class="mb-1 text-sm text-gray-600">Invoices:</div>
                <div class="text-base font-medium text-gray-900">
                    {{ $client->invoices_count }} @choice('invoice|invoices', $client->invoices_count) found
                </div>
            </div>
        </div>
    </div>

    <div x-data="{deleteModal : @entangle('modalStatus')}">
        <x-modal name="deleteModal">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"
                            id="modal-title">
                            Delete Client
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to delete this client? All of your invoices will be permanently deleted.
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
