<div x-data="{addClientModal: @entangle('addClientModal')}">
    <div class="mb-12 grid md:grid-cols-3 xl:grid-cols-4 gap-6">
        <div class="py-3.5 px-4 space-y-1.5 rounded-lg bg-white dark:bg-zinc-800/60 ring-1 ring-inset ring-zinc-50 dark:ring-zinc-800/60">
            <div class="text-sm font-medium text-zinc-600 dark:text-zinc-300">Total Received</div>
            <div class="flex items-center gap-2.5">
                <span class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">$18,950.00</span>
                <div class="pl-1 flex items-center bg-lime-50 dark:bg-zinc-700/25 rounded">
                    <span class="text-xs font-semibold leading-5 text-lime-600 dark:text-lime-400">
                        24K
                    </span>
                    <span class="inline-flex text-lime-600 dark:text-lime-400 transform rotate-[-135deg]">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Total Income</div>
        </div>
        <div class="py-3.5 px-4 space-y-1.5 rounded-lg bg-white dark:ring-zinc-800/60 ring-1 ring-inset ring-zinc-50 dark:bg-zinc-800/60">
            <div class="text-sm font-medium text-zinc-600 dark:text-zinc-300">Clients</div>
            <div class="flex items-center gap-2.5">
                <span class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">{{ auth()->user()->clients()->count() }}</span>
                <div class="pl-1 flex items-center bg-lime-50 dark:bg-zinc-700/25 text-lime-600 dark:text-lime-400 rounded">
                    <span class="text-xs font-semibold leading-5">
                        15
                    </span>
                    <span class="inline-flex transform rotate-[-135deg]">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Your Clients</div>
        </div>
        <div class="py-3.5 px-4 space-y-1.5 rounded-lg bg-white dark:ring-zinc-800/60 ring-1 ring-inset ring-zinc-50 dark:bg-zinc-800/60">
            <div class="text-sm font-medium text-zinc-600 dark:text-zinc-300">Invoices</div>
            <div class="flex items-center gap-2.5">
                <span class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">451</span>
                <div class="pl-1 flex items-center bg-red-50 dark:bg-zinc-700/25 text-red-600 dark:text-red-400 rounded">
                    <span class="text-xs font-semibold leading-5">
                        12
                    </span>
                    <span class="inline-flex transform -rotate-45">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Invoices Created</div>
        </div>
    </div>
    <section>
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100">Clients</h2>
                <div class="text-sm font-medium text-zinc-600 dark:text-zinc-400">List of all of your clients </div>
            </div>
            <button x-on:click="addClientModal = true" type="button"
                class="px-4 py-2.5 inline-flex items-center gap-2 bg-lime-700 dark:bg-zinc-800/50 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-700 text-lime-100 dark:focus:ring-offset-zinc-800 dark:text-lime-400">
                <span class="inline-flex -ml-1">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M8 3a.625.625 0 0 1 .625.625v3.75h3.75a.625.625 0 1 1 0 1.25h-3.75v3.75a.625.625 0 1 1-1.25 0v-3.75h-3.75a.625.625 0 0 1 0-1.25h3.75v-3.75A.625.625 0 0 1 8 3Z" />
                    </svg>
                </span>
                <span class="text-sm font-semibold">Add Client</span>
            </button>
        </div>
        <div class="mb-8 flex items-center justify-between">
            <div class="relative max-w-xs w-full">
                <input type="text" wire:model.debounce.500ms="search"
                    class="w-full block py-2.5 pl-[42px] pr-3.5 text-sm font-medium placeholder-zinc-500 dark:placeholder-zinc-400 text-zinc-900 dark:text-zinc-50 focus:outline-none focus:ring-zinc-200 dark:focus:ring-zinc-700 rounded-md ring-1 ring-inset ring-zinc-50 dark:ring-zinc-700/25 dark:bg-zinc-800/50"
                    placeholder="Search a Client" autocomplete="off">
                <div class="absolute inset-y-0 left-3.5 flex items-center justify-center text-zinc-600 dark:text-zinc-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </div>
                <div class="absolute inset-y-0 right-3 flex items-center justify-center text-zinc-600 dark:text-zinc-500">
                    <svg wire:loading class="animate-spin h-6 w-6 text-zinc-600" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" class="opacity-25" stroke-width="1.5"
                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z" />
                        <path stroke="currentColor" class="opacity-75" stroke-width="1.5"
                            d="M22 12A10 10 0 0 0 2.492 8.904" />
                    </svg>
                </div>
            </div>
            <select wire:model="filterBy"
                class="py-2.5 pl-3.5 text-sm font-medium text-zinc-900 dark:text-zinc-50 focus:outline-none focus:ring-zinc-200 dark:focus:ring-zinc-700 rounded-md ring-1 ring-inset ring-zinc-50 dark:ring-zinc-700/25 dark:bg-zinc-800/50">
                <option value="">Show All</option>
                <option value="with">With Invoices</option>
                <option value="without">Without Invoices</option>
                <option value="recent">Newest First</option>
                <option value="oldest">Oldest First</option>
            </select>
        </div>
    </section>
    <ul class="mb-8 grid gap-y-6">
        @forelse ($this->clients as $client)
            @livewire('client-entry', ['client' => $client], key("client-entry-{$client->id}"))
        @empty
        <div class="py-24 flex flex-col items-center justify-center text-center">
            <div class="mb-14">
                <img src="{{ asset('svg/undraw_email_capmpaign.svg') }}"
                    alt="Email Campaign Placeholder for Empty Search..." class="h-52">
            </div>
            <h3 class="mb-4 text-xl font-semibold text-zinc-800 dark:text-zinc-200">There is nothing here</h3>
            <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">To add a client click on<br><span
                    class="font-semibold text-zinc-900 dark:text-zinc-100">Add Client</span> button above
            </p>
        </div>
        @endforelse
    </ul>

    @livewire('add-client-form')
</div>
