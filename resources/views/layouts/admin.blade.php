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
    <div x-data="{nav : false, theme_toggle: $persist(false)}" class="relative flex" @toast-error="Toastr.error(event.detail.message);"
    @toast-success="Toastr.success(event.detail.message);" x-init="$watch('theme_toggle', () => {
        document.documentElement.classList.toggle('dark')}); if(theme_toggle){document.documentElement.classList.add('dark')};">
        <nav x-cloak
            class="z-30 fixed xl:sticky top-0 max-w-xs w-full h-screen flex flex-col flex-shrink-0 bg-zinc-900 overflow-y-auto scrollbar scrollbar-thin scrollbar-thumb-zinc-800 overscroll-contain transform xl:transform-none xl:opacity-100 duration-200"
            :class="{'translate-x-0 ease-in opacity-100': nav, '-translate-x-full ease-out opacity-0': !nav}">
            <div class="mb-6 py-6 px-5">
                <a href="#" class="inline-block -ml-1">
                    <img src="{{ asset('logo-invapp.svg') }}" alt="Invoice App" class="h-10">
                </a>
            </div>
            <div class="flex-grow flex flex-col justify-between">
                <div>
                    <div class="mb-12">
                        <div class="ml-6 mb-3 text-xs uppercase text-zinc-400 font-medium">Main</div>
                        <ul class="flex flex-col gap-y-3">
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                    </svg>
                                </x-slot>
                                Dashboard
                            </x-nav-link>
                            <x-nav-link :href="route('client.index')">
                                <x-slot name="icon">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                </x-slot>
                                Clients
                            </x-nav-link>
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                        <path
                                            d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                    </svg>
                                </x-slot>
                                Invoices
                                <x-slot name="extra">
                                    <span
                                        class="px-1.5 text-xs leading-5 rounded bg-zinc-800 font-semibold text-lime-400">
                                        12
                                    </span>
                                </x-slot>
                            </x-nav-link>
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                        <path
                                            d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                                    </svg>
                                </x-slot>
                                Payments
                            </x-nav-link>
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </x-slot>
                                Archive
                            </x-nav-link>
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                        <path
                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
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
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z" />
                                    </svg>
                                </x-slot>
                                Changelog
                                <x-slot name="extra">
                                    <span
                                        class="px-1.5 text-xs leading-5 rounded bg-zinc-800 font-semibold text-lime-400">
                                        v1.0.0
                                    </span>
                                </x-slot>
                            </x-nav-link>
                            <x-nav-link href="#">
                                <x-slot name="icon">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                    </svg>
                                </x-slot>
                                Help Center
                            </x-nav-link>
                        </ul>
                    </div>
                </div>
                <div class="pb-8 px-6">
                    <div class="flex items-center justify-between">
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
                        <div x-data="{open : false}" class="relative inline-block">
                            <button x-on:click="open = !open" type="button" class="focus:outline-none">
                                <span class="text-zinc-300">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z" />
                                    </svg>
                                </span>
                            </button>
                            <div x-show="open" role="menu"
                                class="absolute origin-bottom-right mb-4 right-0 bottom-full z-50 w-40 rounded-lg bg-zinc-800 focus:outline-none"
                                x-on:click.away="open = false" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95" aria-orientation="vertical"
                                aria-labelledby="menu-button" tabindex="-1">
                                <div class="flex flex-col py-1">
                                    <a href="#"
                                        class="py-2 px-3.5 flex items-center gap-2 hover:bg-zinc-700/25 transition-colors text-zinc-300">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="18"
                                                height="18" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                            </svg>
                                        </span>
                                        <span class="text-sm font-medium">Notifications</span>
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
                                        <label for="theme_toggle" class="flex items-center cursor-pointer">
                                            <div class="relative">
                                                <input type="checkbox" id="theme_toggle" x-model="theme_toggle"
                                                    class="sr-only peer">
                                                <div
                                                    class="h-3.5 w-9 bg-zinc-400 peer-disabled:bg-zinc-500 peer-disabled:cursor-not-allowed peer-checked:bg-lime-800 rounded-full">
                                                </div>
                                                <div
                                                    class="absolute -left-px bottom-[-3px] w-5 h-5 rounded-full shadow-none bg-zinc-500 peer-checked:bg-lime-500 dark:peer-checked:bg-lime-400 peer-checked:translate-x-[18px] peer-disabled:bg-zinc-300 peer-disabled:cursor-not-allowed transition">
                                                </div>
                                            </div>
                                        </label>
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
                    </div>
                </div>
            </div>
        </nav>
        <main class="bg-zinc-100 dark:bg-zinc-900 dark:border-l dark:border-zinc-800 flex-grow xl:rounded-l-3xl min-h-screen">
            <div class="py-6 px-10 max-w-screen-xl mx-auto">
                <h1 class="mb-9 text-xl font-bold text-zinc-900 dark:text-zinc-50 tracking-[0.01em]">{{ $heading }}</h1>
                {{ $slot }}
            </div>
        </main>
    </div>
    @livewireScripts
</body>

</html>
