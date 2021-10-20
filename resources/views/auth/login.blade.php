<x-guest-layout heading="Login">
    <a href="#" class="mb-12 inline-block text-lime-500 focus:outline-none">
        <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 40 40">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                d="M3.333 30.962A18.45 18.45 0 1 0 14.3 1.968" />
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                d="M8.57 27.597a12.3 12.3 0 1 0 7.311-19.329" />
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                d="M24.415 17.837a6.15 6.15 0 1 0-4.703 9.2" />
        </svg>
    </a>
    <h1 class="mb-3 text-[28px] leading-9 font-bold text-zinc-900">Login</h1>
    <p class="mb-10 text-base font-medium text-zinc-600">See your growth and get consulting support!</p>
    <a href="#"
        class="mb-10 py-2.5 px-6 flex items-center gap-2.5 justify-center ring-1 ring-inset ring-zinc-200 focus:ring-zinc-400 focus:outline-none rounded-lg">
        <span class="flex-shrink-0">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path fill="#4285F4"
                    d="M23.745 12.27c0-.79-.07-1.54-.19-2.27h-11.3v4.51h6.47c-.29 1.48-1.14 2.73-2.4 3.58v3h3.86c2.26-2.09 3.56-5.17 3.56-8.82Z" />
                <path fill="#34A853"
                    d="M12.255 24c3.24 0 5.95-1.08 7.93-2.91l-3.86-3c-1.08.72-2.45 1.16-4.07 1.16-3.13 0-5.78-2.11-6.73-4.96h-3.98v3.09C3.515 21.3 7.565 24 12.255 24Z" />
                <path fill="#FBBC05"
                    d="M5.525 14.29c-.25-.72-.38-1.49-.38-2.29s.14-1.57.38-2.29V6.62h-3.98a11.86 11.86 0 0 0 0 10.76l3.98-3.09Z" />
                <path fill="#EA4335"
                    d="M12.255 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C18.205 1.19 15.495 0 12.255 0c-4.69 0-8.74 2.7-10.71 6.62l3.98 3.09c.95-2.85 3.6-4.96 6.73-4.96Z" />
            </svg>
        </span>
        <span class="text-sm font-semibold text-zinc-800">Sign in with Google</span>
    </a>
    <p
        class="mb-10 flex items-center justify-center text-sm font-medium text-zinc-400 bg-white text-center after:bg-zinc-200 after:h-px after:flex-1 before:bg-zinc-200 before:h-px before:flex-1 after:ml-1 before:mr-1">
        or Sign In with Email</p>
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-7">
            <x-label for="email">Email</x-label>
            <x-input required name="email" id="email" />
            <x-validation-message name="email" />
        </div>
        <div class="mb-5">
            <x-label for="password">Password</x-label>
            <x-input type="password" required name="password" id="password" />
            <x-validation-message name="password" />
        </div>
        <div class="mb-9 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <input type="checkbox" name="remember" id="remember_me"
                    class="w-6 h-6 rounded focus:outline-none text-lime-600 checked:text-lime-600 ring-1 ring-inset ring-zinc-200 focus:ring-lime-600 checked:ring-lime-600">
                <x-label for="remember_me">Remember me</x-label>
            </div>
            <a href="#" class="text-sm font-semibold text-lime-600 focus:outline-none">Forgot password?</a>
        </div>
        <x-button type="submit" class="mb-6 block w-full">
            Login
        </x-button>
        <p class="text-sm font-medium text-zinc-600">Not registered yet? <a href="{{ route('register') }}"
                class="font-semibold text-lime-600 focus:outline-none">Create an Account</a></p>
    </form>
</x-guest-layout>
