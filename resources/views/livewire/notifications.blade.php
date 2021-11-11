<div>
    <h3 class="text-lg font-bold text-zinc-800 dark:text-zinc-300 mb-4">Unread</h3>
    <div class="mb-24 flex flex-col gap-y-5">
        @forelse (auth()->user()->unreadNotifications as $notification)
        <div
            class="py-3.5 px-6 flex items-center justify-between gap-12 bg-white ring-inset ring-zinc-50 dark:bg-zinc-800/60 dark:ring-zinc-800 rounded-lg {{ $notification->read() ? 'opacity-70' : ''}}">
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
                        {{ $notification->data['title'] }}
                    </div>
                    <p class="text-zinc-600 dark:text-zinc-400 text-sm font-medium">
                        {!! $notification->data['message'] !!}
                    </p>
                </div>
            </div>
            <div x-data="{options : false}" class="inline-block relative">
                <button x-on:click="options = true" type="button"
                    class="p-2 rounded-full dark:text-zinc-300 text-zinc-600 hover:bg-zinc-100 dark:hover:bg-zinc-700/40  focus:outline-none focus:ring-1 focus:ring-primary-500 dark:focus:ring-primary-400 focus:text-zinc-800 dark:focus:text-primary-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-more-vertical">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="12" cy="5" r="1"></circle>
                        <circle cx="12" cy="19" r="1"></circle>
                    </svg>
                </button>
                <div x-cloak
                    class="absolute mt-1 w-36 origin-top-right right-0 bg-white dark:bg-zinc-800 z-40 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" x-show="options" x-on:click.away="options = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" aria-orientation="vertical"
                    aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1">
                        <button type="button" wire:click="markAsRead('{{ $notification->id }}')" wire:loading.attr="disabled"
                            class="text-zinc-700 dark:text-zinc-300 w-full font-medium hover:bg-zinc-100 dark:hover:bg-zinc-700/25 hover:text-zinc-900 dark:hover:text-zinc-100 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>Mark as Read</span>
                        </button>
                        <button type="button" wire:click="delete('{{ $notification->id }}')" wire:loading.attr="disabled"
                            class="text-zinc-700 dark:text-zinc-300 w-full font-medium hover:bg-zinc-100 dark:hover:bg-zinc-700/25 hover:text-red-600 dark:hover:text-red-400 flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1">
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="italic font-medium text-zinc-500 dark:text-zinc-300">You have no new notifications.</p>
        @endforelse
    </div>

    <h3 class="text-lg font-bold text-zinc-800 dark:text-zinc-300 mb-6">Read</h3>
    <div class="flex flex-col gap-y-5">
        @forelse (auth()->user()->readNotifications as $notification)
        <div
            class="py-3.5 px-6 flex items-center justify-between gap-12 bg-white/50 ring-inset ring-zinc-50 dark:bg-zinc-800/25 dark:ring-zinc-800 rounded-lg">
            <div class="flex items-center gap-5">
                <span class="inline-flex text-zinc-400 dark:text-zinc-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                        class="bi bi-question-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                    </svg>
                </span>
                <div>
                    <div class="text-base font-semibold text-zinc-600 dark:text-zinc-400">
                        {{ $notification->data['title'] }}
                    </div>
                    <p class="text-zinc-400 dark:text-zinc-500 text-sm font-medium">
                        {!! $notification->data['message'] !!}
                    </p>
                </div>
            </div>
            <button type="button" wire:click="delete('{{ $notification->id }}')" wire:loading.attr="disabled"
                class="p-2.5 rounded-full dark:text-zinc-300 text-zinc-600 hover:bg-zinc-100 dark:hover:bg-zinc-700/20 focus:outline-none hover:text-red-500 dark:hover:text-red-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-trash-2">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>
            </button>
        </div>
        @empty
        <p class="italic font-medium text-zinc-500 dark:text-zinc-300">You don't have any notifications.</p>
        @endforelse
    </div>
</div>