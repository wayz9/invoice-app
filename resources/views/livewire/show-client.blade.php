<div>
    <div class="mb-16">
        <div class="py-5 px-6 inline-flex gap-x-12 bg-white rounded-xl">
            <div>
                <div class="mb-2 text-sm font-medium text-gray-400 uppercase tracking-wider">Total Received</div>
                <div class="mb-5 flex items-center gap-1.5">
                    <span class="text-lg font-medium text-gray-500">$</span>
                    <span class="text-4xl font-bold text-gray-800">{!! $client->total_income_from_all_invoices
                        !!}</span>
                </div>
                <span class="py-0.5 px-2 text-sm text-emerald-600 bg-emerald-50 rounded-full">+10% since last
                    month</span>
            </div>
            <ul class="flex flex-col gap-y-6">
                <ul class="list-disc text-indigo-500">
                    <li>
                        <div class="text-sm font-medium">Pending</div>
                        <div class="text-gray-800 text-base font-medium">$85,254<span class="text-gray-500">.58</span>
                        </div>
                    </li>
                </ul>
                <ul class="list-disc text-yellow-500">
                    <li>
                        <div class="text-sm font-medium">In Drafts</div>
                        <div class="text-gray-800 text-base font-medium">{{ calculateTotal($client->invoices, 0) }}
                        </div>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="mb-8 flex items-center justify-between flex-wrap gap-6">
        <div>
            <div class="mb-1 text-xl font-semibold text-gray-900">Invoices</div>
            <div class="text-sm text-gray-600">Managa invoices for your clients</div>
        </div>
        <div class="flex items-center gap-4">
            <div class="lg:max-w-xs">
                <div class="w-full relative">
                    <input type="text" wire:model="search" autocomplete="off" id="search"
                        class="py-2.5 px-[2.875rem] block w-full text-sm font-medium rounded-lg bg-gray-200/50 focus:outline-none focus:bg-gray-200 placeholder-gray-600"
                        placeholder="Search">

                    <span class="absolute inset-y-0 left-3 flex items-center justify-center text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <span wire:loading.delay class="absolute inset-y-0 right-3 flex items-center justify-center text-gray-600">
                        <svg class="animate-spin h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" class="opacity-25" stroke-width="1.5"
                                d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z" />
                            <path stroke="currentColor" class="opacity-75" stroke-width="1.5" d="M22 12A10 10 0 0 0 2.492 8.904" />
                        </svg>
                    </span>
                </div>
            </div>
            <select wire:model="filterBy"
                class="py-2.5 pl-4 text-sm font-medium rounded-lg bg-gray-200/50 focus:outline-none focus:bg-gray-200 text-gray-600">
                <option selected disabled hidden>Filter</option>
                <option value="draft">Drafted</option>
                <option value="active">Active</option>
                <option value="overdue">Overdue</option>
            </select>
        </div>
    </div>
    <div class="mb-12 flex flex-col gap-y-6">
        @forelse ($invoices as $invoice)
        @livewire('invoice-entry', ['invoice' => $invoice, 'email' => $client->email], key($invoice->id))

        @empty
        <div class="py-24 flex flex-col items-center justify-center text-center">
            <div class="mb-14">
                <img src="{{ asset('svg/undraw_email_capmpaign.svg') }}"
                    alt="Email Campaign Placeholder for Empty Search..." class="h-52">
            </div>
            <h3 class="mb-4 text-xl font-semibold text-gray-800">There is nothing here</h3>
            <p class="text-sm text-gray-600">Create an invoice by clicking the<br>New Invoice button and get started</p>
        </div>
        @endforelse
    </div>
    <div>
        {{ $invoices->links() }}
    </div>
</div>
