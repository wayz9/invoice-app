<x-modal name="createNewInvoice">
    <form wire:submit.prevent="create" class="py-5 px-6 flex flex-col">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">Create Invoice</h2>
                <p class="text-sm text-gray-600">Create a new invoice for current client.</p>
            </div>
            <button type="button" @click="createNewInvoice = false" class="focus:outline-none text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div>
            <div class="mb-6">
                <label for="name" class="block mb-1 text-sm text-gray-600">Invoice name:</label>
                <input type="text" wire:model.defer="name"
                    class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 @error('name') bg-red-200 @enderror focus:bg-gray-200 focus:outline-none"
                    required>
                <x-validation-message name="name" />
            </div>
            <div class="mb-6">
                <label for="invoice_number" class="block mb-1 text-sm text-gray-600">Invoice number:</label>
                <input type="text" wire:model.defer="invoice_number"
                    class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 @error('invoice_number') bg-red-200 @enderror focus:bg-gray-200 focus:outline-none"
                    required>
                <x-validation-message name="invoice_number" />
            </div>
            <div class="mb-6">
                <label for="issue_date" class="block mb-1 text-sm text-gray-600">Issue date:</label>
                <x-date-picker wire:model.defer="issue_date" required />
                <x-validation-message name="issue_date" />
            </div>
            <div class="mb-6">
                <label for="due_date" class="block mb-1 text-sm text-gray-600">Due date:</label>
                <x-date-picker wire:model.defer="due_date" required />
                <x-validation-message name="due_date" />
            </div>
        </div>
        <div class="flex items-center gap-1 justify-end">
            <button type="button" @click="addClientModal = false" class="py-2 px-5 text-sm font-medium text-gray-600 focus:outline-none">
                Cancel
            </button>
            <button wire:loading.attr="disabled" wire:click.delay.longest type="submit" class="py-2 px-5 text-white bg-indigo-500 text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                Save
            </button>
        </div>
    </form>
</x-modal>
