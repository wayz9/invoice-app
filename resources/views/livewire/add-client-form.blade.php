<x-modal name="addClientModal" class="!max-w-3xl">
    <form wire:submit.prevent="create" class="py-6 px-8">
        <div class="mb-9 flex items-center justify-between">
            <div class="relative">
                <h2 class="text-xl font-bold text-zinc-900 dark:text-zinc-100">Add Client</h2>
                <span class="block w-12 h-0.5 bg-lime-600 dark:bg-lime-400"></span>
            </div>
            <button type="button" x-on:click="addClientModal = false">
                <svg class="w-5 h-5 text-zinc-800 dark:text-zinc-200" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 16 16">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"
                        clip-rule="evenodd" />
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="mb-8 grid grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-bold text-zinc-900 dark:text-zinc-100 mb-6">Client Information</h3>
                <div class="space-y-7">
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <x-label>Client name</x-label>
                            <x-input required wire:model.defer="name" />
                        </div>
                        <x-validation-message name="name" />
                    </div>
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <x-label>Email address</x-label>
                            <x-input required wire:model.defer="email" />
                        </div>
                        <x-validation-message name="email" />
                    </div>
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <x-label>Tax Number (VAT)</x-label>
                            <x-input wire:model.defer="vat_in" />
                        </div>
                        <x-validation-message name="vat_in" />
                    </div>
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <x-label>Matični broj (MB)</x-label>
                            <x-input wire:model.defer="company_identifier" />
                        </div>
                        <x-validation-message name="company_identifier" />
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-bold text-zinc-900 dark:text-zinc-100 mb-6">Contact Details</h3>
                <div class="space-y-7">
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <x-label>Street Address</x-label>
                            <x-input required wire:model.defer="street_address" />
                        </div>
                        <x-validation-message name="street_address" />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-y-1.5">
                            <x-label>City</x-label>
                            <x-input required wire:model.defer="city" />
                        </div>
                        <div class="flex flex-col gap-y-1.5">
                            <x-label>Zip Code</x-label>
                            <x-input required wire:model.defer="zip_code" />
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <x-label>Country</x-label>
                            <x-input required wire:model.defer="country" />
                        </div>
                        <x-validation-message name="country" />
                    </div>
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <x-label>Contact Phone</x-label>
                            <x-input wire:model.defer="contact_number" />
                        </div>
                        <x-validation-message name="contact_number" />
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <x-button type="submit">
                Save Changes
            </x-button>
        </div>
    </form>
</x-modal>
