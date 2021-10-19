<x-modal name="createNewInvoice" class="!max-w-md">
    <form wire:submit.prevent="create" class="py-6 px-8 flex flex-col">
        <div class="mb-9 flex items-center justify-between">
            <div class="relative">
                <h2 class="text-xl font-bold text-zinc-900 dark:text-zinc-100">Create Invoice</h2>
                <span class="block w-12 h-0.5 bg-lime-600 dark:bg-lime-400"></span>
            </div>
            <button type="button" x-on:click="createNewInvoice = false">
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
        <div class="mb-12 flex flex-col space-y-7">
            <div>
                <div class="flex flex-col gap-y-1.5">
                    <x-label>Invoice name</x-label>
                    <x-input wire:model.defer="name" />
                </div>
                <x-validation-message name="name" />
            </div>
            <div>
                <div class="flex flex-col gap-y-1.5">
                    <x-label>#- Invoice number</x-label>
                    <x-input wire:model.defer="invoice_number" />
                </div>
                <x-validation-message name="invoice_number" />
            </div>
            <div>
                <div class="flex flex-col gap-y-1.5">
                    <x-label>Issue Date</x-label>
                    <x-date-picker wire:model.defer="issue_date" />
                </div>
                <x-validation-message name="issue_date" />
            </div>
            <div>
                <div class="flex flex-col gap-y-1.5">
                    <x-label>Due Date</x-label>
                    <x-date-picker wire:model.defer="due_date" />
                </div>
                <x-validation-message name="due_date" />
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2.5 bg-lime-700 dark:bg-zinc-700/60 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 focus:ring-lime-700">
                <span class="text-sm font-semibold text-lime-100 dark:text-lime-400">Create Invoice</span>
            </button>
        </div>
    </form>
</x-modal>
