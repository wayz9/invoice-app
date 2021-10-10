<div class="mb-12 grid gap-y-6">
    @forelse ($clients as $client)
        @livewire('client-entry', ['client' => $client], key($client->id))

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
