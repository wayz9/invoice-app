<x-modal name="editModal" class="!max-w-4xl">
    <form wire:submit.prevent="update" class="py-5 px-6">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">Edit Client - "{{ $client->name }}"</h2>
                <p class="text-sm text-gray-600">Here you can add a new client and immediately send them invoices.</p>
            </div>
            <button type="button" @click="editModal = false" class="focus:outline-none text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="mb-8 grid grid-cols-2 gap-14">
            <div>
                <h3 class="mb-5 text-base font-semibold text-gray-800">Client Information</h3>
                <div class="mb-7">
                    <label for="name" class="block mb-1 text-sm text-gray-600">Client name:</label>
                    <input type="text" wire:model.defer="client.name"
                        class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 @error('name') bg-red-200 @enderror focus:bg-gray-200 focus:outline-none"
                        required>
                    <x-validation-message name="name" />
                </div>
                <div class="mb-7">
                    <label for="email" class="block mb-1 text-sm text-gray-600">Client email:</label>
                    <input type="text" wire:model.defer="client.email"
                        class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 @error('email') bg-red-200 @enderror focus:bg-gray-200 focus:outline-none"
                        required>
                    <span class="text-xs font-medium text-gray-500">Same email will be used when sending the invoice.</span>
                    <x-validation-message name="email" />
                </div>
                <div class="mb-7">
                    <label for="vat_in" class="block mb-1 text-sm text-gray-600">VAT Number:</label>
                    <input type="text" wire:model.defer="client.vat_in"
                        class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 @error('vat_in') bg-red-200 @enderror focus:bg-gray-200 focus:outline-none"
                        required>
                    <x-validation-message name="vat_in" />
                </div>
                <div class="mb-10">
                    <label for="company_identifier" class="block mb-1 text-sm text-gray-600">MB (Maticni broj):</label>
                    <input type="text" wire:model.defer="client.company_identifier"
                        class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 @error('company_identifier') bg-red-200 @enderror focus:bg-gray-200 focus:outline-none"
                        required>
                    <x-validation-message name="company_identifier" />
                </div>
            </div>
            <div>
                <h3 class="mb-5 text-base font-semibold text-gray-800">Contact Information</h3>
                <div class="mb-7">
                    <label for="address_line1" class="block mb-1 text-sm text-gray-600">Address Line 1:</label>
                    <input type="text" wire:model.defer="client.address_line1"
                        class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 @error('address_line1') bg-red-200 @enderror focus:bg-gray-200 focus:outline-none"
                        required>
                    <x-validation-message name="address_line1" />
                </div>
                <div class="mb-7">
                    <label for="address_line2" class="block mb-1 text-sm text-gray-600">Address Line 2 (optional):</label>
                    <input type="text" wire:model.defer="client.address_line2"
                        class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 @error('address_line2') bg-red-200 @enderror focus:bg-gray-200 focus:outline-none">
                    <x-validation-message name="address_line2" />
                </div>
                <div class="mb-7">
                    <label for="contact_number" class="block mb-1 text-sm text-gray-600">Contact Number (optional):</label>
                    <input type="text" wire:model.defer="client.contact_number"
                        class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 @error('contact_number') bg-red-200 @enderror focus:bg-gray-200 focus:outline-none">
                    <x-validation-message name="contact_number" />
                </div>
            </div>
        </div>
        <div class="flex items-center gap-1 justify-end">
            <button type="button" @click="editModal = false" class="py-2 px-5 text-sm font-medium text-gray-600 focus:outline-none">
                Cancel
            </button>
            <button wire:loading.attr="disabled" type="submit" class="py-2 px-5 text-white bg-indigo-500 text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                Save
            </button>
        </div>
    </form>
</x-modal>
