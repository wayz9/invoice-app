<div x-data="{addClientModal : @entangle('addClientModal')}" @toast-error="Toastr.error(event.detail.message);"
@toast-success="Toastr.success(event.detail.message);">
    <div class="mb-14 flex justify-end">
        <button @click="addClientModal = true" type="button"
            class="py-2.5 px-6 inline-flex items-center gap-1.5 rounded-md bg-indigo-500 text-white font-medium text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="inline-flex -ml-1.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </span>
            <span>Add Client</span>
        </button>
    </div>
    <div class="mb-12 grid gap-y-6">
        @forelse ($clients as $client)
            @livewire('client-entry', ['client' => $client], key($client->id))

            @empty
            <div class="py-24 flex flex-col items-center justify-center text-center">
                <div class="mb-12">
                    <img src="{{ asset('svg/undraw_email_capmpaign.svg') }}"
                        alt="Email Campaign Placeholder for Empty Search..." class="h-52">
                </div>
                <h3 class="mb-2 text-xl font-semibold text-gray-800">There is nothing here</h3>
                <p class="mb-8 text-sm text-gray-600">Add a new client to begin<br> sending invoices.</p>
                <button @click="addClientModal = true" type="button" class="py-2.5 px-6 inline-flex items-center gap-1.5 rounded-md bg-indigo-500 text-white font-medium text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="inline-flex -ml-1.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </span>
                    <span>Add Client</span>
                </button>
            </div>
        @endforelse
    </div>
    @livewire('add-client-form')
</div>
