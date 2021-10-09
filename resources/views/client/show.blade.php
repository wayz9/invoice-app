<x-admin-layout page="{{ $client->name }}" desc="Show invoices and details about client">
    <div class="mb-16">
        <div class="py-5 px-6 inline-flex gap-x-12 bg-white rounded-xl">
            <div>
                <div class="mb-2 text-sm font-medium text-gray-400 uppercase tracking-wider">Total Received</div>
                <div class="mb-5 flex items-center gap-1.5">
                    <span class="text-lg font-medium text-gray-500">$</span>
                    <span class="text-4xl font-bold text-gray-800">{!! $client->total_income_from_all_invoices !!}</span>
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
                        <div class="text-gray-800 text-base font-medium">{{ calculateTotal($client->invoices, 0) }}</div>
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
                    <input type="text" name="search" autocomplete="off" id="search"
                        class="py-2.5 px-[2.875rem] block w-full text-sm font-medium rounded-lg bg-gray-200/50 focus:outline-none focus:bg-gray-200 placeholder-gray-600"
                        placeholder="Search">

                    <span class="absolute inset-y-0 left-3 flex items-center justify-center text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <select
                class="py-2.5 pl-4 text-sm font-medium rounded-lg bg-gray-200/50 focus:outline-none focus:bg-gray-200 text-gray-600">
                <!-- Nasty hack to avoid JS :P -->
                <option selected disabled hidden>Filter</option>
                <option value="all">Show All</option>
                <option value="all">Drafted</option>
                <option value="all">Active</option>
                <option value="all">Overdue</option>
            </select>
        </div>
    </div>
    <div class="flex flex-col gap-y-6">
        @foreach ($client->invoices as $invoice)
            @livewire('invoice-entry', ['invoice' => $invoice, 'email' => $client->email], key($invoice->id))
        @endforeach
    </div>
</x-admin-layout>
