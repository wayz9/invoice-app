<li x-data="{open: false, deleteModal: @entangle('deleteModal'), editModal: @entangle('editModal')}">
    <div class="py-3.5 px-6 flex items-center justify-between bg-white dark:bg-zinc-800/60 rounded-lg ring-1 ring-inset ring-zinc-50 dark:ring-zinc-800"
        :class="{'rounded-t-lg' : open, 'rounded-lg' : !open}">
        <div class="flex items-center gap-5">
            <span class="text-zinc-500 dark:text-zinc-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-7 h-7" viewBox="0 0 16 16">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                </svg>
            </span>
            <div>
                <div class="flex items-center gap-x-2">
                    <a href="{{ route('client.show', ['client' => $client]) }}" class="text-base font-semibold text-zinc-900 dark:text-zinc-100">{{ $client->name }}</a>
                    @if ($client->wasRecentlyCreated)
                        <x-badge class="bg-lime-50 text-lime-700 dark:bg-zinc-700/25 dark:text-lime-400">Recently Added</x-badge>
                    @endif
                </div>
                <div class="text-sm font-medium text-zinc-600 dark:text-zinc-400">{{ $client->street_address }}, {{ $client->city }}, {{ $client->country }}</div>
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
                    class="absolute mt-1 w-44 origin-top-right right-0 bg-white dark:bg-zinc-800 z-40 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" x-show="options" x-on:click.away="options = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" aria-orientation="vertical"
                    aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="{{ route('client.show', ['client' => 1]) }}"
                            class="text-zinc-700 font-medium hover:bg-zinc-100 hover:text-zinc-900 block px-4 py-2 text-sm dark:hover:bg-zinc-700/25 dark:hover:text-zinc-100 dark:text-zinc-300"
                            role="menuitem" tabindex="-1">View Client</a>
                        <button type="button" x-on:click="options = false; editModal = true"
                            class="text-zinc-700 w-full font-medium hover:bg-zinc-100 hover:text-zinc-900 flex items-center px-4 py-2 text-sm dark:hover:bg-zinc-700/25 dark:hover:text-zinc-100 dark:text-zinc-300"
                            role="menuitem" tabindex="-1">
                            <span>
                                Edit Client
                            </span>
                        </button>
                        <button type="button" x-on:click="options = false; deleteModal = true"
                            class="text-zinc-700 w-full font-medium hover:bg-zinc-100 hover:text-zinc-900 flex items-center px-4 py-2 text-sm dark:hover:bg-zinc-700/25 dark:hover:text-zinc-100 dark:text-zinc-300"
                            role="menuitem" tabindex="-1">
                            <span>
                                Delete
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <button x-on:click="open = !open" type="button" class="inline-flex text-zinc-800 dark:text-zinc-100 focus:outline-none">
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
        <div class="grid grid-cols-2 py-6 gap-5 bg-white dark:bg-zinc-800/60">
            <div class="px-[4.5rem] flex flex-col gap-y-8">
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Name:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->name }}</div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Address:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100 max-w-[16rem]">{{ $client->street_address }},{{ $client->city }} {{ $client->zip_code }}, {{ $client->country }}</div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">MB (matični broj):</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->company_identifier ?? 'None found' }}</div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">PIB:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->vat_in ?? 'None found' }}</div>
                </div>
            </div>
            <div class="px-[4.5rem] flex flex-col gap-y-8">
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Email:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->email }}</div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Tel / Fax:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->contact_number ?? 'No contact phone found.' }}</div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Invoices:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->invoices_count }} @choice('invoice|invoices', $client->invoices_count) found</div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Web:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">www.baito.rs</div>
                </div>
            </div>
        </div>
    </div>

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
                    <h3 class="text-lg leading-6 font-medium text-zinc-900" id="modal-title">
                        Delete Client
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-zinc-500">
                            Are you sure you want to delete this client? All of your invoices will be permanently
                            deleted.
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

    @livewire('edit-client-form', ['client' => $client], key("edit-client-form-{$client->id}"))
</li>
