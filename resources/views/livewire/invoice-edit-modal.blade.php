<x-slide-over name="edit">
    <form form wire:submit.prevent="update" class="flex flex-col justify-between flex-grow">
        <div>
            <div class="mb-8 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="inline-flex text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                    </span>
                    <span class="text-lg font-semibold text-gray-800">Edit Invoice</span>
                </div>
                <button @click="edit = !edit" type="button" class="inline-flex text-gray-500">
                    <span class="inline-flex">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </span>
                </button>
            </div>
            <div class="mb-5 flex items-center justify-between">
                <div class="text-xl font-medium text-gray-600">{{ $invoice->invoice_number }}</div>
                <div class="flex items-center gap-0.5 text-indigo-500">
                    <!-- This is a part of the design -->
                    <span class="inline-flex">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </span>
                    <div class="mt-0.5 uppercase tracking-wide text-xs font-medium">
                        Copy Payment Code
                    </div>
                </div>
            </div>
            <div class="mb-8 text-sm">
                <div class="mb-1 text-gray-600">Recipient Email</div>
                <div class="font-medium text-gray-800">{{ $email }}</div>
            </div>
            <div>
                <div class="mb-8">
                    <label for="name" class="block mb-1 text-sm text-gray-600">Invoice Name (Project / Description)</label>
                    <input type="text" wire:model.defer="name" class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 focus:bg-gray-200 focus:outline-none" required>
                    <span class="text-xs text-red-500">@error('name') {{ $message }} @enderror</span>
                </div>
                <div class="mb-11 grid grid-cols-2 gap-4">
                    <div>
                        <label for="issue_date" class="block mb-1 text-sm text-gray-600">Issue Date</label>
                        <x-date-picker wire:model.defer="issue_date" required />
                    </div>
                    <div>
                        <label for="due_date" class="block mb-1 text-sm text-gray-600">Due Date</label>
                        <x-date-picker wire:model.defer="due_date" required />
                    </div>
                </div>
                <div class="mb-11">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="text-left pr-1.5 text-sm font-normal text-gray-600">Item</th>
                                <th class="text-right px-1.5 text-sm font-normal text-gray-600">Qty</th>
                                <th class="text-left px-1.5 text-sm font-normal text-gray-600">Price</th>
                                <th class="text-left px-1.5 text-sm font-normal text-gray-600">Total</th>
                                <th class="sr-only pl-1.5 text-sm font-normal text-gray-600">Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($invoice->items as $item)
                            <tr>
                                <td class="pr-1.5 pt-2">
                                    <input type="text" value="{{ $item->title }}" class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 focus:bg-gray-200 focus:outline-none placeholder-gray-500">
                                </td>
                                <td class="px-1.5 pt-2">
                                    <input type="text" value="{{ $item->qty }}" class="block max-w-[3rem] w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 focus:bg-gray-200 focus:outline-none placeholder-gray-500">
                                </td>
                                <td class="px-1.5 pt-2">
                                    <input type="text" value="{{ $item->converted_price }}" class="block w-full max-w-[5rem] py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 focus:bg-gray-200 focus:outline-none placeholder-gray-500">
                                </td>
                                <td class="px-1.5 pt-2">
                                    <div class="text-sm text-gray-800">$0</div>
                                </td>
                                <td class="pl-1.5 pt-2 text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 flex items-center justify-between">
                        <button type="button" class="inline-flex items-center gap-0.5 text-indigo-500 focus:outline-none">
                            <span class="inline-flex">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </span>
                            <span class="text-xs font-medium tracking-wide uppercase">
                                Add Item
                            </span>
                        </button>
                        <span class="text-sm text-gray-600">
                            Total<span class="pl-3 text-base font-semibold text-gray-800">$0</span>
                        </span>
                    </div>
                </div>
                <div>
                    <label for="additional_notes" class="block mb-1 text-sm text-gray-600">Additional Notes <span class="text-gray-500">(optional)</span></label>
                    <textarea class="block w-full py-2.5 px-3.5 rounded-lg text-sm text-gray-800 bg-gray-200/50 focus:bg-gray-200 focus:outline-none placeholder-gray-500 resize-none" rows="4"></textarea>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-6 justify-end">
            <button type="button" class="text-sm font-medium text-gray-500 focus:outline-none">
                Save as Draft
            </button>
            <button type="submit" class="py-2 px-5 text-white bg-indigo-500 text-sm uppercase rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                Save
            </button>
        </div>
    </form>
</x-slide-over>
