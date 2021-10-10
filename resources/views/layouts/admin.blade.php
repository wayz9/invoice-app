<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aquire Dashboard</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body class="antialiased font-sans bg-gray-50">
    <div x-data="{nav : false}" class="relative flex">
        <nav x-cloak
            class="z-30 fixed xl:sticky top-0 pb-5 flex-shrink-0 h-screen max-w-xs w-full flex flex-col bg-dark-800 overflow-y-auto scrollbar scrollbar-thin scrollbar-thumb-dark-600 overscroll-contain transform xl:transform-none xl:opacity-100 duration-200"
            :class="{'translate-x-0 ease-in opacity-100' : nav, '-translate-x-full ease-out opacity-0' : !nav}"
            @mousedown.away="nav = false">
            <div class="py-8 px-6 mb-4">
                <a href="/" class="inline-flex">
                    <img src="{{ asset('logo.svg') }}" alt="Aquire Cyan" class="h-9">
                </a>
            </div>
            <div class="px-4 mb-10">
                <div class="px-3 mb-4">
                    <div class="text-xs uppercase font-semibold text-indigo-400 tracking-little">General</div>
                    <div class="text-xs leading-tiny text-gray-300">Browse movies and tv shows</div>
                </div>
                <ul class="flex flex-col gap-y-1">
                    <x-nav-link href="#">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </x-slot>
                        Dashboard
                    </x-nav-link>
                    <x-nav-link :href="route('client.index')">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </x-slot>
                        Clients
                    </x-nav-link>
                    <x-nav-link href="#">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z">
                                </path>
                            </svg>
                        </x-slot>
                        Movies
                    </x-nav-link>
                    <x-nav-link href="#">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                        </x-slot>
                        TV Shows
                    </x-nav-link>
                </ul>
            </div>
            <div class="px-4 mb-10">
                <div class="px-3 mb-4">
                    <div class="text-xs uppercase font-semibold text-indigo-400 tracking-little">Features</div>
                    <div class="text-xs leading-tiny text-gray-300">Available features of Aquire</div>
                </div>
                <ul class="flex flex-col gap-y-1">
                    <x-nav-link href="#">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                </path>
                            </svg>
                        </x-slot>
                        Favorites
                    </x-nav-link>
                    <x-nav-link href="#">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </x-slot>
                        My Ratings
                    </x-nav-link>
                    <x-nav-link href="#">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                                </path>
                            </svg>
                        </x-slot>
                        Challenges
                        <x-slot name="extra">
                            <span
                                class="px-1.5 h-5 inline-flex items-center justify-center text-xs font-semibold text-indigo-400 rounded bg-dark-600">12</span>
                        </x-slot>
                    </x-nav-link>
                    <x-nav-link href="#">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </x-slot>
                        Watchlist
                    </x-nav-link>
                    <x-nav-link href="#">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </x-slot>
                        Help Center
                    </x-nav-link>
                    <x-nav-link href="#">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                        </x-slot>
                        Chat
                    </x-nav-link>
                </ul>
            </div>
            <div class="px-4 mb-10">
                <div class="px-3 mb-4">
                    <div class="text-xs uppercase font-semibold text-indigo-400 tracking-little">Genres</div>
                    <div class="text-xs leading-tiny text-gray-300">Jump to specific genre</div>
                </div>
                <ul class="flex flex-col gap-y-1">
                    <x-nav-list name="Movie Genres">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z">
                                </path>
                            </svg>
                        </x-slot>
                        <x-nav-list-item href="#">
                            Placeholder
                        </x-nav-list-item>
                    </x-nav-list>
                    <x-nav-list name="TV Show Genres">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                        </x-slot>
                        <x-nav-list-item href="#">
                            Placeholder 2
                        </x-nav-list-item>
                    </x-nav-list>
                </ul>
            </div>
            <div class="px-4">
                <div class="px-3 mb-4">
                    <div class="text-xs uppercase font-semibold text-indigo-400 tracking-little">Documentation</div>
                    <div class="text-xs leading-tiny text-gray-300">Recent changes to the website</div>
                </div>
                <ul class="flex flex-col gap-y-1">
                    <x-nav-link href="#">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </x-slot>
                        Docs & Guide
                    </x-nav-link>
                    <x-nav-link href="#">
                        <x-slot name="icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                </path>
                            </svg>
                        </x-slot>
                        Changelog
                    </x-nav-link>
                </ul>
            </div>
        </nav>
        <main class="flex-grow overflow-hidden">
            <div class="p-4 lg:px-6 py-5 xl:px-8 xl:py-7 max-w-[85rem] mx-auto">
                <div class="mb-10">
                    <div class="flex flex-wrap items-center justify-between gap-2.5 md:gap-4">
                        <div
                            class="flex flex-grow sm:flex-grow-0 sm:flex-row-reverse items-center justify-between sm:justify-start sm:gap-4">
                            <div>
                                <h1 class="text-lg lg:text-xl xl:text-2xl font-semibold text-gray-900">{{ $pageName }}
                                </h1>
                                <p class="text-sm text-gray-600">{{ $desc }}</p>
                            </div>
                            <button type="button" @click="nav = !nav"
                                class="p-2 flex xl:hidden items-center justify-center rounded-xl bg-gray-200/50 text-gray-600 focus:outline-none focus:bg-gray-200">
                                <span class="inline-flex">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div class="flex flex-grow md:flex-grow-0 items-center gap-4">
                            <div class="w-full lg:max-w-[256px] relative">
                                <input type="text" name="search" autocomplete="off" id="search"
                                    class="py-2.5 px-[2.875rem] block w-full text-sm font-medium rounded-xl bg-gray-200/50 focus:outline-none focus:bg-gray-200 placeholder-gray-600"
                                    placeholder="Search">

                                <span class="absolute inset-y-0 left-3 flex items-center justify-center text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </span>
                            </div>
                            <button type="button"
                                class="p-2 flex items-center justify-center rounded-xl bg-gray-200/50 text-gray-600 focus:outline-none focus:bg-gray-200">
                                <span class="inline-flex">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                            <div x-data="{open : false}" class="relative inline-flex">
                                <button @click="open = !open" type="button"
                                    class="w-10 h-10 rounded-xl focus:outline-none">
                                    <img src="https://images.unsplash.com/photo-1517849845537-4d257902454a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="Profile Picture" class="rounded-xl">
                                </button>
                                <span
                                    class="block absolute bottom-[-2px] left-[-2px] w-2.5 h-2.5 rounded-full ring-1 ring-inset ring-green-600 bg-green-500"></span>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95" @click.away="open = false"
                                    @keydown.escape.window="open = false"
                                    class="origin-top-right z-50 absolute right-0 mt-12 w-[15.25rem] rounded-xl bg-white shadow-md"
                                    tabindex="-1">
                                    <div class="pt-4 px-5 text-sm">
                                        <div class="text-gray-600">Signed in as</div>
                                        <div class="font-medium text-dark-700">{{ auth()->user()->email }}</div>
                                    </div>
                                    <ul class="py-3 flex flex-col">
                                        <li>
                                            <a href="#"
                                                class="py-2 px-4 flex items-center gap-2.5 text-gray-600 bg-transparent hover:bg-gray-100/50 focus:outline-none focus:bg-gray-100/50">
                                                <span class="inline-flex">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <span class="text-sm font-medium">Profile</span>
                                            </a>
                                        </li>
                                        <li class="py-2 px-4 flex items-center justify-between cursor-pointer">
                                            <label for="theme"
                                                class="flex items-center gap-2.5 text-gray-600 cursor-pointer">
                                                <span class="inline-flex">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <span class="text-sm font-medium">Dark Theme</span>
                                            </label>
                                            <label for="theme" x-data="{theme : $persist(false)}"
                                                class="flex items-center cursor-pointer">
                                                <div class="relative">
                                                    <input type="checkbox" id="theme" x-model="theme"
                                                        class="sr-only peer">
                                                    <div
                                                        class="h-3.5 w-9 bg-gray-200 peer-checked:bg-indigo-100 rounded-full">
                                                    </div>
                                                    <div
                                                        class="absolute -left-px bottom-[-3px] w-5 h-5 rounded-full shadow-none bg-gray-500 peer-checked:bg-indigo-500 peer-checked:translate-x-[18px] peer-checked:shadow-indigo-md transition">
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="py-2 px-4 flex items-center gap-2.5 text-gray-600 bg-transparent hover:bg-gray-100/50 focus:outline-none focus:bg-gray-100/50">
                                                <span class="inline-flex">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <span class="text-sm font-medium">Account Settings</span>
                                            </a>
                                        </li>
                                        <li class="inline-block">
                                            <div
                                                class="flex items-center justify-between py-2 px-4 bg-transparent hover:bg-gray-100/50 focus:bg-gray-100/50 cursor-pointer">
                                                <div class="flex items-center gap-2.5 text-gray-600">
                                                    <span class="inline-flex">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <span class="text-sm font-medium">Change Status</span>
                                                </div>
                                                <div class="inline-flex text-gray-600">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5" d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </li>
                                        <li x-data="{signOutForm : null}">
                                            <form x-ref="signOutForm" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <a href="#" @click.prevent="$refs.signOutForm.submit()"
                                                    class="py-2 px-4 flex items-center gap-2.5 text-gray-600 bg-transparent hover:bg-gray-100/50 focus:outline-none focus:bg-gray-100/50">
                                                    <span class="inline-flex">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <span class="text-sm font-medium">Sign Out</span>
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $slot }}
            </div>
        </main>
    </div>
    @livewireScripts
</body>

</html>
