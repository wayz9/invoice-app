<div class="flex flex-col gap-y-5">
    @foreach ($this->notifications as $notification)
        @if ($notification->type == 'App\Notifications\OverdueInvoiceNotification')
        <div
            class="py-3.5 px-6 flex items-center justify-between gap-12 bg-white ring-inset ring-zinc-50 dark:bg-zinc-800/60 dark:ring-zinc-800 rounded-lg">
            <div class="flex items-center gap-5">
                <span class="inline-flex text-zinc-500 dark:text-zinc-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                        class="bi bi-question-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                    </svg>
                </span>
                <div>
                    <div class="text-base font-semibold text-zinc-900 dark:text-zinc-200">
                        Overdue Invoice
                    </div>
                    <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium">Invoice with # {{
                        $notification->data['invoice_number'] }} is now overdue, please resend the invocie to client or mark
                        it as paid.</p>
                </div>
            </div>
            <div class="flex flex-col gap-y-3 justify-between">
                <button type="button"
                    class="inline-flex focus:outline-none text-zinc-400 dark:text-zinc-300 hover:text-zinc-600 dark:hover:text-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                        <path fill-rule="evenodd"
                            d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
                    </svg>
                </button>
                <button type="button"
                    class="inline-flex focus:outline-none text-zinc-400 dark:text-zinc-300 hover:text-zinc-600 dark:hover:text-lime-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                    </svg>
                </button>
            </div>
        </div>
        @endif
    @endforeach
</div>