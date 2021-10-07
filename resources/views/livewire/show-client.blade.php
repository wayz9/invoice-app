<div class="grid gap-y-6">
    @foreach ($clients as $client)
        @livewire('client-entry', ['client' => $client], key($client->id))
    @endforeach
</div>
