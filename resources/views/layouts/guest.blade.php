<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aquire - {{ $heading }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/png" sizes="36x36" href="{{ asset('favicon.png') }}">

    <!-- Sripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="antialiased">
    <div class="flex min-h-screen">
        <div class="w-full xl:w-1/2 flex">
            <div class="max-w-md w-full flex flex-col mx-auto py-[52px] px-6">
                <div class="flex-grow">
                    {{ $slot }}
                </div>
                <p class="text-sm font-medium text-zinc-500">&copy;2021 Invoice App - All rights reserved</p>
            </div>
        </div>
        <div class="w-1/2 hidden xl:flex bg-zinc-900 relative">
            <div class="absolute top-0 left-0 z-0 select-none">
                <img src="{{ asset('svg/stairs.svg') }}" alt="Stairs SVG" class="w-60 h-60" draggable="false">
            </div>
            <div class="absolute bottom-0 right-0 z-0 select-none">
                <img src="{{ asset('svg/stairs.svg') }}" alt="Stairs SVG" class="w-60 h-60 transform -rotate-180"
                    draggable="false">
            </div>
            <div class="absolute top-1 right-1 z-0 select-none">
                <img src="{{ asset('svg/dots.svg') }}" alt="Dots SVG" class="w-64 h-64" draggable="false">
            </div>
            <div class="absolute z-10 top-40 inset-x-0 flex items-center justify-center px-12 select-none">
                <img src="{{ asset('images/widgets.png') }}" alt="Widgets" draggable="false" class="max-h-[332px]">
            </div>
            <div class="absolute z-0 top-[310px] left-2 select-none">
                <img src="{{ asset('svg/arrow.svg') }}" alt="Arrow" draggable="false" class="h-[344px]">
            </div>
            <div
                class="absolute w-20 h-20 top-[108px] left-[307px] rounded-full bg-zinc-800 text-primary-400 flex items-center justify-center">
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 40 40">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M3.333 30.962A18.45 18.45 0 1 0 14.3 1.968" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M8.57 27.597a12.3 12.3 0 1 0 7.311-19.329" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M24.415 17.837a6.15 6.15 0 1 0-4.703 9.2" />
                </svg>
            </div>
            <div
                class="absolute w-20 h-20 top-[396px] left-[158px] rounded-full bg-zinc-800 text-primary-400 flex items-center justify-center">
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 40 40">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M3.333 30.962A18.45 18.45 0 1 0 14.3 1.968" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M8.57 27.597a12.3 12.3 0 1 0 7.311-19.329" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M24.415 17.837a6.15 6.15 0 1 0-4.703 9.2" />
                </svg>
            </div>
            <div
                class="absolute w-20 h-20 top-[456px] right-[180px] rounded-full bg-zinc-800 text-primary-400 flex items-center justify-center">
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 40 40">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M3.333 30.962A18.45 18.45 0 1 0 14.3 1.968" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M8.57 27.597a12.3 12.3 0 1 0 7.311-19.329" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M24.415 17.837a6.15 6.15 0 1 0-4.703 9.2" />
                </svg>
            </div>
            <div class="absolute top-[620px] flex flex-col items-center justify-center inset-x-0">
                <h1 class="mb-7 text-3xl font-bold text-zinc-100 text-center">Turn your ideas<br>into reality</h1>
                <p class="text-zinc-300 font-medium text-center">Consistent quality and experience across<br>all
                    platforms and devices.</p>
            </div>
        </div>
    </div>
</body>

</html>