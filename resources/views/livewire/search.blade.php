<div x-data="{open : true}" class="relative z-20 lg:max-w-[16rem] w-full">
    <div class="relative">
        <input type="text" wire:model.debounce.500ms="search" @focus="open = true" autocomplete="off"
            id="search"
            class="py-2.5 px-[2.875rem] block w-full text-sm font-medium rounded-xl bg-gray-200/50 focus:outline-none focus:bg-gray-200 placeholder-gray-600"
            placeholder="Search">

        <span class="absolute inset-y-0 left-3 flex items-center justify-center text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </span>

        <span class="absolute inset-y-0 right-3 flex items-center justify-center text-gray-600">
            <svg wire:loading class="animate-spin h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" class="opacity-25" stroke-width="1.5"
                    d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z" />
                <path stroke="currentColor" class="opacity-75" stroke-width="1.5" d="M22 12A10 10 0 0 0 2.492 8.904" />
            </svg>
        </span>
    </div>
    @if (strlen($search) > 2)
    <div x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95" @keydown.escape.window="open = false"
        @mousedown.away="open = false"
        class="md:mt-1 z-20 origin-top-right md:origin-top top-0 md:top-auto right-12 md:right-auto absolute w-[22.5rem] md:left-[-52px] bg-white rounded-xl shadow-md overflow-hidden"
        tabindex="-1">
        <div class="py-2.5 pl-5 pr-3.5 flex items-center justify-between">
            <div class="font-semibold text-dark-700">Search</div>
            <div class="relative">
                <button type="button"
                    class="focus:outline-none p-1.5 rounded-md focus:bg-gray-100 hover:bg-gray-100 text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        @if (!$clients->isEmpty())
        <div class="text-xs py-2 px-5 bg-gray-50 text-gray-500 font-semibold uppercase">
            Clients
        </div>
        <ul class="py-4 px-5 flex flex-col gap-y-2">
            @foreach ($clients as $client)
            <li>
                <a href="{{ route('client.show', $client) }}" class="flex items-center gap-x-2 text-sm">
                    <span class="text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </span>
                    <div class="text-dark-700">{{ $client->name }}</div>
                </a>
            </li>
            @endforeach
        </ul>
        @endif
        @if (!$invoices->isEmpty())
        <div class="text-xs py-2 px-5 bg-gray-50 text-gray-500 font-semibold uppercase">
            Invoices
        </div>
        <ul class="py-4 px-5 flex flex-col gap-y-2">
            @foreach ($invoices as $invoice)
            <li class="flex items-center gap-x-2 text-sm">
                <span class="text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </span>
                <div class="text-dark-700">
                    <div>{{ $invoice->name }}</d>
                        <div class="text-gray-400">#{{ $invoice->invoice_number }}</div>
                    </div>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
    @endif
</div>
