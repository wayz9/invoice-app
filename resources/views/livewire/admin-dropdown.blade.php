<div x-data="{open : false}" class="flex items-center justify-between relative">
    <div class="flex items-center gap-2.5">
        <div class="flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1517849845537-4d257902454a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt="Profile Picture" class="rounded-md w-10 h-10">
        </div>
        <div>
            <div class="text-sm font-semibold text-zinc-300">{{ auth()->user()->name }}</div>
            <div class="text-sm text-zinc-400">{{ auth()->user()->email }}</div>
        </div>
    </div>
    <div class="relative inline-block">
        <button x-on:click="open = !open" type="button" class="focus:outline-none">
            <span class="text-zinc-300">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z" />
                </svg>
            </span>
        </button>
        <div x-show="open" role="menu" x-cloak
            class="absolute origin-bottom-right mb-4 right-0 bottom-full z-50 w-40 rounded-lg bg-zinc-800 focus:outline-none"
            x-on:click.away="open = false" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95" aria-orientation="vertical"
            aria-labelledby="menu-button" tabindex="-1">
            <div class="flex flex-col py-1">
                <a href="{{ route('notifications') }}"
                    class="py-2 px-3.5 flex items-center justify-between hover:bg-zinc-700/25 transition-colors text-zinc-300">
                    <div class="flex items-center gap-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="18"
                                height="18" viewBox="0 0 16 16">
                                <path
                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                            </svg>
                        </span>
                        <span class="text-sm font-medium">Notifications</span>
                    </div>
                    @if (count(auth()->user()->notifications) >= 1)
                    <span class="relative inline-flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-300 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-400"></span>
                    </span>
                    @endif
                </a>
                <div
                    class="py-2 px-3.5 flex items-center justify-between hover:bg-zinc-700/25 transition-colors text-zinc-300">
                    <label for="theme_toggle" class="flex items-center gap-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="18"
                                height="18" viewBox="0 0 16 16">
                                <path
                                    d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                                <path
                                    d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                            </svg>
                        </span>
                        <span class="text-sm font-medium">Theme</span>
                    </label>
                    <x-toggle name="theme_toggle" x-model="theme_toggle" />
                </div>
                <a href="#"
                    class="py-2 px-3.5 flex items-center gap-2 hover:bg-zinc-700/25 transition-colors text-zinc-300">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="18"
                            height="18" viewBox="0 0 16 16">
                            <path
                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                            <path
                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                        </svg>
                    </span>
                    <span class="text-sm font-medium">Settings</span>
                </a>
                <div x-data>
                    <a href="#" x-on:click.prevent="$refs.logout.submit()"
                        class="py-2 px-3.5 flex items-center gap-2 hover:bg-zinc-700/25 transition-colors text-zinc-300">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="18"
                                height="18" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                            </svg>
                        </span>
                        <span class="text-sm font-medium">Sign Out</span>
                    </a>
                    <form x-ref="logout" action="{{ route('logout') }}" method="POST"
                        class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (count(auth()->user()->notifications) >= 1)
    <span x-show="!open" class="absolute -top-1 -right-1 inline-flex h-2 w-2">
        <span
            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-300 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-400"></span>
    </span>
    @endif
</div>