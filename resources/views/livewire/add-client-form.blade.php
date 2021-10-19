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
                            <label for="name" class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Client
                                name</label>
                            <input type="text" wire:model.defer="name"
                                class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 text-base font-medium text-zinc-900 dark:text-zinc-100 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30"
                                required>
                        </div>
                        <x-validation-message name="name" />
                    </div>
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <label for="email" class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Email
                                address</label>
                            <input type="text" wire:model.defer="email"
                                class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30 text-base font-medium text-zinc-900 dark:text-zinc-100"
                                required>
                        </div>
                        <x-validation-message name="email" />
                    </div>
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <label for="vat_in" class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Tax Number
                                (VAT)</label>
                            <input type="text" wire:model.defer="vat_in"
                                class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30 text-base font-medium text-zinc-900 dark:text-zinc-100">
                        </div>
                        <x-validation-message name="vat_in" />
                    </div>
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <label for="company_identifier"
                                class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Matični broj
                                (MB)</label>
                            <input type="text" wire:model.defer="company_identifier"
                                class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30 text-base font-medium text-zinc-900 dark:text-zinc-100">
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
                            <label for="street_address"
                                class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Street Address</label>
                            <input type="text" wire:model.defer="street_address"
                                class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30 text-base font-medium text-zinc-900 dark:text-zinc-100"
                                required>
                        </div>
                        <x-validation-message name="street_address" />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-y-1.5">
                            <label for="city"
                                class="text-sm font-medium text-zinc-600 dark:text-zinc-400">City</label>
                            <input type="text" wire:model.defer="city"
                                class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30 text-base font-medium text-zinc-900 dark:text-zinc-100"
                                required>
                        </div>
                        <div class="flex flex-col gap-y-1.5">
                            <label for="zip_code" class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Zip
                                Code</label>
                            <input type="text" wire:model.defer="zip_code"
                                class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30 text-base font-medium text-zinc-900 dark:text-zinc-100"
                                required>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <label for="country"
                                class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Country</label>
                            <input type="text" wire:model.defer="country"
                                class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30 text-base font-medium text-zinc-900 dark:text-zinc-100"
                                required>
                        </div>
                        <x-validation-message name="country" />
                    </div>
                    <div>
                        <div class="flex flex-col gap-y-1.5">
                            <label for="contact_number"
                                class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Contact phone</label>
                            <input type="text" wire:model.defer="contact_number"
                                class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30 text-base font-medium text-zinc-900 dark:text-zinc-100">
                        </div>
                        <x-validation-message name="contact_number" />
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2.5 bg-lime-700 dark:bg-zinc-700/60 dark:focus:ring-offset-zinc-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-700">
                <span class="text-sm font-semibold text-lime-100 dark:text-lime-400">Save Changes</span>
            </button>
        </div>
    </form>
</x-modal>
