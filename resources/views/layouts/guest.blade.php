<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aquire - {{ $pageName }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="favicon.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Sripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="relative antialiased font-sans transition-all text-gray-800 bg-gray-50">
    <div class="relative z-10 min-h-screen flex flex-col items-center justify-center">
        <a href="#" class="block my-6 md:my-10 focus:outline-none">
            <img src="{{ asset('logo-dark-text.svg') }}" alt="Logo Dark Text" class="h-10">
        </a>
        <div class="py-8 md:py-[2.875rem] px-6 md:px-[2.625rem] max-w-lg w-full bg-white rounded-xl drop-shadow-custom border border-gray-100">
            {{ $slot }}
        </div>
        <div class="my-6 md:my-9 flex items-center justify-center gap-x-6 text-sm font-medium text-gray-600">
            <a href="#">Privacy Policy</a>
            <a href="#">About</a>
            <a href="#">Terms of Service</a>
        </div>
    </div>
</body>
</html>
