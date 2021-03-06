<div
    class="py-3.5 px-6 flex items-center justify-between gap-12 bg-white ring-inset ring-zinc-50 dark:bg-zinc-800/60 dark:ring-zinc-800 rounded-lg">
    <div class="flex items-center gap-5">
        <span class="inline-flex text-zinc-500 dark:text-zinc-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-clock"
                viewBox="0 0 16 16">
                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
            </svg>
        </span>
        <div>
            <div class="text-base font-semibold text-zinc-900 dark:text-zinc-200">
                Reminder Message
            </div>
            <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium">Reminder to send another Invoice to "<a
                    href="{{ route('client.show', ['client'=>$notification->data['id']]) }}" class="font-semibold">{{
                    $notification->data['name'] }}</a>" based on previous records.</p>
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
            class="inline-flex focus:outline-none text-zinc-400 dark:text-zinc-300 hover:text-zinc-600 dark:hover:text-primary-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
        </button>
    </div>
</div>