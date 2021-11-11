<div x-data="{createNewInvoice : @entangle('createInvoiceModal')}">
    <div class="mb-12 grid lg:grid-cols-3 gap-6">
        <div
            class="py-5 px-6 flex items-start gap-x-9 bg-white dark:bg-zinc-800/60 rounded-lg ring-1 ring-inset ring-zinc-50 dark:ring-zinc-800">
            <div>
                <div class="mb-2.5 text-xs font-medium uppercase text-zinc-600 dark:text-zinc-300">Total Received</div>
                <div class="mb-5 flex items-center gap-1.5">
                    <span class="text-xl font-medium text-zinc-600 dark:text-zinc-400">$</span>
                    <span class="text-4xl font-bold text-zinc-900 dark:text-zinc-50">{{ to_money($client->total_income)
                        }}</span>
                </div>
                <span
                    class="whitespace-nowrap px-2 py-0.5 text-sm font-medium bg-primary-50 dark:bg-zinc-700/50 text-primary-700 dark:text-primary-400 rounded-full">
                    +10% from last month
                </span>
            </div>
            <div class="space-y-5">
                <dl>
                    <dd class="mb-1 text-sm font-medium leading-4 text-yellow-500 dark:text-yellow-400">Pending</dd>
                    <dt class="text-base font-semibold text-zinc-800 dark:text-zinc-200">$10,059.90</dt>
                </dl>
                <dl>
                    <dd class="mb-1 text-sm font-medium leading-4 text-zinc-400 dark:text-zinc-300">In Draft</dd>
                    <dt class="text-base font-semibold text-zinc-800 dark:text-zinc-200">$4,215.90</dt>
                </dl>
            </div>
        </div>
        <div
            class="py-5 px-6 bg-white dark:bg-zinc-800/60 rounded-lg ring-1 ring-inset ring-zinc-50 dark:ring-zinc-800">
            <div class="mb-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="inline-flex p-1 rounded-full bg-zinc-900 text-primary-400">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                        </svg>
                    </span>
                    <span class="text-base font-semibold text-zinc-800 dark:text-zinc-50"><span
                            class="text-zinc-400 dark:text-zinc-300">quickpay.me/</span>vukasin</span>
                </div>
                <div class="flex-shrink-0 flex items-center gap-5">
                    <button type="button" class="focus:outline-none text-zinc-600 dark:text-zinc-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    </button>
                    <button type="button" class="focus:outline-none text-zinc-600 dark:text-zinc-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                    </button>
                </div>
            </div>
            <div class="bg-primary-50/50 dark:bg-zinc-700/25 py-1.5 px-2.5 rounded">
                <p class="mb-3 text-zinc-500 dark:text-zinc-300 text-sm font-medium">Quickpay let’s you receive payments
                    on the
                    fly,
                    generate a link and you are good to go!</p>
                <a href="#" class="text-xs font-semibold uppercase text-primary-600 dark:text-primary-400">Learn More</a>
            </div>
        </div>
    </div>
    <section>
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">Invoices</h2>
                <div class="text-sm font-medium text-zinc-600 dark:text-zinc-400">List of all of your invoices </div>
            </div>
            <button x-on:click="createNewInvoice = true" type="button"
                class="px-4 py-2.5 inline-flex items-center gap-2 bg-primary-500 text-white dark:text-primary-400 dark:bg-zinc-800/50 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 focus:ring-primary-700">
                <span class="inline-flex -ml-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </span>
                <span class="text-sm font-semibold">Create Invoice</span>
            </button>
        </div>
        <div class="mb-8 flex items-center justify-between">
            <div class="relative max-w-xs w-full">
                <input type="text" wire:model.debounce.500ms="search"
                    class="w-full block py-2.5 pl-[42px] pr-3.5 text-sm font-medium placeholder-zinc-500 dark:placeholder-zinc-400 text-zinc-900 dark:text-zinc-50 focus:outline-none focus:ring-zinc-200 dark:focus:ring-zinc-700 rounded-md ring-1 ring-inset ring-zinc-50 dark:ring-zinc-700/25 dark:bg-zinc-800/50"
                    placeholder="Search an Invoice" autocomplete="off">
                <div
                    class="absolute inset-y-0 left-3.5 flex items-center justify-center text-zinc-600 dark:text-zinc-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </div>
                <div class="absolute inset-y-0 right-3 flex items-center justify-center text-zinc-600">
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
                <option value="active">Active</option>
                <option value="paid">Paid</option>
                <option value="overdue">Overdue</option>
                <option value="draft">Draft</option>
            </select>
        </div>
        <ul class="mb-12 grid gap-y-6">
            @forelse ($this->invoices as $invoice)
            @livewire('invoice-entry', ['invoice' => $invoice, 'email' => $client->email],
            key("invoice-key-{$invoice->id}"))
            @empty
            <div class="py-24 flex flex-col items-center justify-center text-center">
                <div class="mb-14">
                    <img src="{{ asset('svg/undraw_email_capmpaign.svg') }}"
                        alt="Email Campaign Placeholder for Empty Search..." class="h-52">
                </div>
                <h3 class="mb-4 text-xl font-semibold text-zinc-800 dark:text-zinc-100">There is nothing here</h3>
                <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Create an invoice by clicking
                    the<br><span class="font-semibold text-zinc-900 dark:text-zinc-100">Create Invoice</span> button
                    above
                </p>
            </div>
            @endforelse
        </ul>
        <div>
            {{ $this->invoices->links() }}
        </div>
    </section>

    @livewire('create-invoice', ['client' => $client])
</div>