<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice App - {{ $heading ?? '' }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/png" sizes="36x36" href="{{ asset('favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body class="antialiased font-sans bg-zinc-900">
    <div x-data="{nav : false, theme_toggle: $persist(false)}" class="relative flex"
        @toast-error="Toastr.error(event.detail.message);" @toast-success="Toastr.success(event.detail.message);"
        x-init="$watch('theme_toggle', () => {
        document.documentElement.classList.toggle('dark')}); if(theme_toggle){document.documentElement.classList.add('dark')};">
        <nav x-cloak
            class="z-30 fixed xl:sticky top-0 max-w-xs w-full h-screen flex flex-col flex-shrink-0 bg-zinc-900 overflow-y-auto scrollbar scrollbar-thin scrollbar-thumb-zinc-800 overscroll-contain transform xl:transform-none xl:opacity-100 duration-200"
            :class="{'translate-x-0 ease-in opacity-100': nav, '-translate-x-full ease-out opacity-0': !nav}">
            <div class="mb-6 py-6 px-5">
                <a href="#" class="inline-block -ml-1 text-primary-400">
                    <svg class="h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 145 37">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.344 25.125a12 12 0 1 0 7.133-18.857" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.75 22.938a8 8 0 1 0 4.755-12.572" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M22.055 16.59a4 4 0 1 0-3.058 5.983" />
                        <path fill="#fff"
                            d="M42.332 24V11.22h2.484V24h-2.484Zm13.682 0h-2.412v-5.292c0-.756-.132-1.308-.396-1.656-.264-.348-.63-.522-1.098-.522-.324 0-.654.084-.99.252a3.036 3.036 0 0 0-.882.702 2.634 2.634 0 0 0-.576 1.008V24h-2.412v-9.432h2.178v1.746c.348-.588.852-1.05 1.512-1.386.66-.348 1.404-.522 2.232-.522.588 0 1.068.108 1.44.324.372.204.66.486.864.846.204.348.342.744.414 1.188.084.444.126.894.126 1.35V24Zm4.477 0-3.474-9.432h2.502l2.377 7.236 2.394-7.236h2.285L63.12 24h-2.627Zm11.398.18c-1.031 0-1.92-.222-2.663-.666a4.684 4.684 0 0 1-1.692-1.8 5.055 5.055 0 0 1-.595-2.412c0-.876.199-1.686.595-2.43a4.688 4.688 0 0 1 1.71-1.782c.743-.456 1.626-.684 2.645-.684 1.02 0 1.897.228 2.629.684a4.517 4.517 0 0 1 1.71 1.782c.396.744.594 1.554.594 2.43 0 .864-.198 1.668-.594 2.412a4.643 4.643 0 0 1-1.71 1.8c-.733.444-1.609.666-2.629.666Zm-2.465-4.878c0 .552.107 1.044.323 1.476.216.42.51.75.882.99s.792.36 1.26.36c.457 0 .87-.12 1.243-.36.371-.252.665-.588.881-1.008.228-.432.343-.924.343-1.476 0-.54-.114-1.02-.343-1.44a2.497 2.497 0 0 0-.882-1.008 2.166 2.166 0 0 0-1.242-.378c-.468 0-.888.126-1.26.378-.372.24-.666.576-.882 1.008-.216.42-.323.906-.323 1.458Zm9.026-6.048V10.86h2.412v2.394H78.45Zm0 10.746v-9.432h2.412V24H78.45Zm8.98.18c-1.02 0-1.903-.228-2.647-.684a4.78 4.78 0 0 1-1.728-1.8 4.936 4.936 0 0 1-.612-2.412c0-.876.198-1.686.594-2.43a4.648 4.648 0 0 1 1.728-1.782c.745-.444 1.626-.666 2.647-.666 1.031 0 1.907.222 2.627.666.733.444 1.278 1.026 1.638 1.746l-2.358.72c-.42-.72-1.062-1.08-1.925-1.08-.469 0-.889.12-1.26.36a2.37 2.37 0 0 0-.883.99c-.216.42-.324.912-.324 1.476 0 .552.108 1.044.324 1.476.228.42.528.756.9 1.008.373.24.787.36 1.243.36.431 0 .828-.102 1.188-.306.372-.216.63-.486.774-.81l2.358.72c-.325.708-.864 1.296-1.62 1.764-.744.456-1.632.684-2.664.684Zm10.054 0c-1.02 0-1.902-.222-2.646-.666a4.727 4.727 0 0 1-1.71-1.764 4.936 4.936 0 0 1-.612-2.412c0-.888.198-1.704.594-2.448a4.613 4.613 0 0 1 1.728-1.8c.744-.456 1.632-.684 2.664-.684 1.032 0 1.914.228 2.646.684a4.427 4.427 0 0 1 1.674 1.782c.396.732.594 1.524.594 2.376 0 .312-.018.582-.054.81h-7.29c.06.732.33 1.308.81 1.728.492.42 1.056.63 1.692.63.48 0 .93-.114 1.35-.342.432-.24.726-.552.882-.936l2.07.576c-.348.72-.906 1.314-1.674 1.782-.768.456-1.674.684-2.718.684Zm-2.466-5.652h4.932c-.072-.708-.342-1.278-.81-1.71-.456-.444-1.014-.666-1.674-.666-.648 0-1.206.222-1.674.666-.456.432-.714 1.002-.774 1.71Zm16.337-7.308h2.52L118.573 24h-2.556l-1.188-3.186h-4.464L109.195 24h-2.556l4.716-12.78Zm3.024 7.848-1.764-5.274-1.836 5.274h3.6Zm11.014 5.112c-.744 0-1.392-.168-1.944-.504a3.629 3.629 0 0 1-1.296-1.332v5.49h-2.412V14.568h2.106v1.62a3.772 3.772 0 0 1 1.35-1.296c.564-.324 1.2-.486 1.908-.486.852 0 1.608.222 2.268.666a4.561 4.561 0 0 1 1.566 1.764c.384.732.576 1.542.576 2.43 0 .924-.18 1.758-.54 2.502a4.48 4.48 0 0 1-1.458 1.764c-.612.432-1.32.648-2.124.648Zm-.81-2.052c.492 0 .918-.132 1.278-.396.372-.276.66-.63.864-1.062a3.17 3.17 0 0 0 .324-1.404c0-.528-.114-1.002-.342-1.422a2.533 2.533 0 0 0-.936-1.008 2.372 2.372 0 0 0-1.332-.378c-.456 0-.912.15-1.368.45-.456.3-.762.678-.918 1.134v2.214c.216.528.546.972.99 1.332.444.36.924.54 1.44.54Zm12.218 2.052c-.744 0-1.392-.168-1.944-.504a3.629 3.629 0 0 1-1.296-1.332v5.49h-2.412V14.568h2.106v1.62a3.772 3.772 0 0 1 1.35-1.296c.564-.324 1.2-.486 1.908-.486.852 0 1.608.222 2.268.666a4.561 4.561 0 0 1 1.566 1.764c.384.732.576 1.542.576 2.43 0 .924-.18 1.758-.54 2.502a4.48 4.48 0 0 1-1.458 1.764c-.612.432-1.32.648-2.124.648Zm-.81-2.052c.492 0 .918-.132 1.278-.396.372-.276.66-.63.864-1.062a3.17 3.17 0 0 0 .324-1.404c0-.528-.114-1.002-.342-1.422a2.533 2.533 0 0 0-.936-1.008 2.372 2.372 0 0 0-1.332-.378c-.456 0-.912.15-1.368.45-.456.3-.762.678-.918 1.134v2.214c.216.528.546.972.99 1.332.444.36.924.54 1.44.54Z" />
                        <path fill="currentColor" d="M142.503 24v-2.592h1.98V24h-1.98Z" />
                    </svg>
                </a>
            </div>
            <div class="flex-grow flex flex-col justify-between">
                <div>
                    <div class="mb-12">
                        <div class="ml-6 mb-3 text-xs uppercase text-zinc-400 font-medium">Main</div>
                        <ul class="flex flex-col gap-y-3">
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-layers">
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg>
                                </x-slot>
                                Dashboard
                            </x-nav-link>
                            <x-nav-link :href="route('client.index')">
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </x-slot>
                                Clients
                            </x-nav-link>
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-file-text">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                </x-slot>
                                Invoices
                                <x-slot name="extra">
                                    <span
                                        class="px-1.5 text-xs leading-5 rounded bg-zinc-800 font-semibold text-primary-400">
                                        12
                                    </span>
                                </x-slot>
                            </x-nav-link>
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-dollar-sign">
                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                </x-slot>
                                Payments
                            </x-nav-link>
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-inbox">
                                        <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                        <path
                                            d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                                        </path>
                                    </svg>
                                </x-slot>
                                Archive
                            </x-nav-link>
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-settings">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path
                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                        </path>
                                    </svg>
                                </x-slot>
                                Settings
                            </x-nav-link>
                        </ul>
                    </div>
                    <div>
                        <div class="ml-6 mb-3 text-xs uppercase text-zinc-400 font-medium">Help</div>
                        <ul class="flex flex-col gap-y-3">
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-box">
                                        <path
                                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                        </path>
                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                    </svg>
                                </x-slot>
                                Changelog
                                <x-slot name="extra">
                                    <span
                                        class="px-1.5 text-xs leading-5 rounded bg-zinc-800 font-semibold text-primary-400">
                                        v1.3.5
                                    </span>
                                </x-slot>
                            </x-nav-link>
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-aperture">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                                        <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                                        <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                                        <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                                        <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                                        <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                                    </svg>
                                </x-slot>
                                Help Center
                            </x-nav-link>
                        </ul>
                    </div>
                </div>
                <div class="pb-8 px-6">
                    <div x-data="{open : false, notifications: {{ auth()->user()->unreadNotifications()->count() }} }"
                        class="flex items-center justify-between relative">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-bell">
                                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                                </svg>
                                            </span>
                                            <span class="text-sm font-medium">Notifications</span>
                                        </div>
                                        <span x-show="notifications" class="relative inline-flex h-2 w-2">
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-300 opacity-75"></span>
                                            <span
                                                class="relative inline-flex rounded-full h-2 w-2 bg-primary-400"></span>
                                        </span>
                                    </a>
                                    <div
                                        class="py-2 px-3.5 flex items-center justify-between hover:bg-zinc-700/25 transition-colors text-zinc-300">
                                        <label for="theme_toggle" class="flex items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-moon">
                                                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                                </svg>
                                            </span>
                                            <span class="text-sm font-medium">Theme</span>
                                        </label>
                                        <x-toggle name="theme_toggle" x-model="theme_toggle" />
                                    </div>
                                    <a href="#"
                                        class="py-2 px-3.5 flex items-center gap-2 hover:bg-zinc-700/25 transition-colors text-zinc-300">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-settings">
                                                <circle cx="12" cy="12" r="3"></circle>
                                                <path
                                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="text-sm font-medium">Settings</span>
                                    </a>
                                    <div x-data>
                                        <a href="#" x-on:click.prevent="$refs.logout.submit()"
                                            class="py-2 px-3.5 flex items-center gap-2 hover:bg-zinc-700/25 transition-colors text-zinc-300">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-log-out">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                    <polyline points="16 17 21 12 16 7"></polyline>
                                                    <line x1="21" y1="12" x2="9" y2="12"></line>
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
                        <span x-show="!open && notifications" class="absolute -top-1 -right-1 inline-flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-300 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-400"></span>
                        </span>
                    </div>
                </div>
            </div>
        </nav>
        <main
            class="bg-zinc-100 dark:bg-zinc-900 dark:border-l dark:border-zinc-800 flex-grow flex flex-col justify-between xl:rounded-l-3xl min-h-screen">
            <div class="pt-6 pb-28 px-10 max-w-screen-xl w-full mx-auto">
                <h1 class="mb-9 text-xl font-bold text-zinc-900 dark:text-zinc-50 tracking-[0.01em]">{{ $heading }}</h1>
                {{ $slot }}
            </div>
            <footer
                class="py-4 text-sm text-center font-medium bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-300 border-t border-zinc-100 dark:border-zinc-800 rounded-bl-3xl">
                &copy; 2021 Invoice App - All rights reserved.
            </footer>
        </main>
    </div>
    @livewireScripts
</body>

</html>