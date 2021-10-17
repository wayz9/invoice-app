<div x-data="{createNewInvoice : @entangle('createInvoiceModal')}">
    <div class="mb-12 grid grid-cols-3 gap-6">
        <div class="py-5 px-6 flex items-start gap-x-9 bg-white rounded-lg ring-1 ring-inset ring-zinc-50">
            <div>
                <div class="mb-2.5 text-xs font-medium uppercase text-zinc-600">Total Received</div>
                <div class="mb-5 flex items-center gap-1.5">
                    <span class="text-xl font-medium text-zinc-600">$</span>
                    <span class="text-4xl font-bold text-zinc-900">{{ to_money($client->total_income) }}</span>
                </div>
                <span class="whitespace-nowrap px-2 py-0.5 text-sm font-medium bg-lime-50 text-lime-700 rounded-full">
                    +10% from last month
                </span>
            </div>
            <div class="space-y-5">
                <dl>
                    <dd class="mb-1 text-sm font-medium leading-4 text-yellow-500">Pending</dd>
                    <dt class="text-base font-semibold text-zinc-800">$10,059.90</dt>
                </dl>
                <dl>
                    <dd class="mb-1 text-sm font-medium leading-4 text-zinc-400">In Draft</dd>
                    <dt class="text-base font-semibold text-zinc-800">$4,215.90</dt>
                </dl>
            </div>
        </div>
        <div class="py-5 px-6 bg-white rounded-lg ring-1 ring-inset ring-zinc-50">
            <div class="mb-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="inline-flex p-1 rounded-full bg-zinc-900 text-lime-400">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                        </svg>
                    </span>
                    <span class="text-base font-semibold text-zinc-800"><span
                            class="text-zinc-400">quickpay.me/</span>vukasin</span>
                </div>
                <div class="flex-shrink-0 flex items-center gap-5">
                    <button type="button" class="focus:outline-none text-zinc-600">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </button>
                    <button type="button" class="focus:outline-none text-zinc-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" viewBox="0 0 16 16">
                            <path
                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path
                                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="bg-lime-50/50 py-1.5 px-2.5">
                <p class="mb-3 text-zinc-500 text-sm font-medium">Quickpay let’s you receive payments on the
                    fly,
                    generate a link and you are good to go!</p>
                <a href="#" class="text-xs font-semibold uppercase text-lime-600">Learn More</a>
            </div>
        </div>
    </div>
    <section>
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-zinc-900">Invoices</h2>
                <div class="text-sm font-medium text-zinc-600">List of all of your invoices </div>
            </div>
            <button x-on:click="createNewInvoice = true" type="button"
                class="px-4 py-2.5 inline-flex items-center gap-2 bg-lime-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-700">
                <span class="inline-flex -ml-1">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                        <path fill="#ECFCCB"
                            d="M8 3a.625.625 0 0 1 .625.625v3.75h3.75a.625.625 0 1 1 0 1.25h-3.75v3.75a.625.625 0 1 1-1.25 0v-3.75h-3.75a.625.625 0 0 1 0-1.25h3.75v-3.75A.625.625 0 0 1 8 3Z" />
                    </svg>
                </span>
                <span class="text-sm font-semibold text-lime-100">Create Invoice</span>
            </button>
        </div>
        <div class="mb-8 flex items-center justify-between">
            <div class="relative max-w-xs w-full">
                <input type="text" wire:model.debounce.500ms="search"
                    class="w-full block py-2.5 pl-[42px] pr-3.5 text-sm font-medium placeholder-zinc-500 text-zinc-900 focus:outline-none focus:ring-zinc-200 rounded-md ring-1 ring-inset ring-zinc-50"
                    placeholder="Search an Invoice" autocomplete="off">
                <div class="absolute inset-y-0 left-3.5 flex items-center justify-center text-zinc-600">
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
                class="py-2.5 pl-3.5 text-sm font-medium text-zinc-900 focus:outline-none focus:ring-zinc-200 rounded-md ring-1 ring-inset ring-zinc-50">
                <option value="">Show All</option>
                <option value="active">Active</option>
                <option value="paid">Paid</option>
                <option value="overdue">Overdue</option>
                <option value="draft">Draft</option>
            </select>
        </div>
        <ul class="mb-8 grid gap-y-6">
            @forelse ($invoices as $invoice)
            @livewire('invoice-entry', ['invoice' => $invoice, 'email' => $client->email], key($invoice->id))
            @empty
            <div class="py-24 flex flex-col items-center justify-center text-center">
                <div class="mb-14">
                    <img src="{{ asset('svg/undraw_email_capmpaign.svg') }}"
                        alt="Email Campaign Placeholder for Empty Search..." class="h-52">
                </div>
                <h3 class="mb-4 text-xl font-semibold text-zinc-800">There is nothing here</h3>
                <p class="text-sm font-medium text-zinc-600">Create an invoice by clicking the<br><span
                        class="font-semibold text-zinc-900">Create Invoice</span> button above
                </p>
            </div>
            @endforelse
        </ul>
        <div>
            {{ $invoices->links() }}
        </div>
    </section>

    @livewire('create-invoice', ['client' => $client])
</div>
