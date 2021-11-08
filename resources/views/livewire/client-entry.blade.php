<li x-data="{open: false, deleteModal: @entangle('deleteModal'), editModal: @entangle('editModal')}">
    <div class="py-3.5 px-6 flex items-center justify-between bg-white dark:bg-zinc-800/60 rounded-lg ring-1 ring-inset ring-zinc-50 dark:ring-zinc-800"
        :class="{'rounded-t-lg' : open, 'rounded-lg' : !open}">
        <div class="flex items-center gap-5">
            <span class="text-zinc-500 dark:text-zinc-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </span>
            <div>
                <div class="flex items-center gap-x-2">
                    <a href="{{ route('client.show', ['client' => $client]) }}"
                        class="text-base font-semibold text-zinc-900 dark:text-zinc-100">{{ $client->name }}</a>
                    @if ($client->wasRecentlyCreated)
                    <x-badge class="bg-primary-50 text-primary-700 dark:bg-zinc-700/25 dark:text-primary-400">Recently
                        Added</x-badge>
                    @endif
                </div>
                <div class="text-sm font-medium text-zinc-600 dark:text-zinc-400">{{ $client->street_address }}, {{
                    $client->city }}, {{ $client->country }}</div>
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
                        <a href="{{ route('client.show', ['client' => $client]) }}"
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
    <div x-show="open" x-collapse class="flex flex-col rounded-b-lg">
        <div class="grid grid-cols-2 py-6 gap-5 bg-white dark:bg-zinc-800/60">
            <div class="px-[4.5rem] flex flex-col gap-y-8">
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Name:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->name }}</div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Address:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100 max-w-[16rem]">{{
                        $client->street_address }},{{ $client->city }} {{ $client->zip_code }}, {{ $client->country }}
                    </div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">MB (matični broj):</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->company_identifier
                        ?? 'None found' }}</div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">PIB:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->vat_in ?? 'None
                        found' }}</div>
                </div>
            </div>
            <div class="px-[4.5rem] flex flex-col gap-y-8">
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Email:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->email }}</div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Tel / Fax:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->contact_number ??
                        'No contact phone found.' }}</div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Invoices:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">{{ $client->invoices_count }}
                        @choice('invoice|invoices', $client->invoices_count) found</div>
                </div>
                <div>
                    <div class="mb-1 text-sm text-zinc-600 dark:text-zinc-400">Web:</div>
                    <div class="text-base font-medium text-zinc-900 dark:text-zinc-100">www.baito.rs</div>
                </div>
            </div>
        </div>
    </div>

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
                invoices<br>connected to this client will be removed.
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

    @livewire('edit-client-form', ['client' => $client], key("edit-client-form-{$client->id}"))
</li>