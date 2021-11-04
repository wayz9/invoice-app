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
                    @livewire('admin-dropdown')
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