<x-guest-layout heading="Register">
    <a href="#" class="mb-12 inline-block text-primary-500 focus:outline-none">
        <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 40 40">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                d="M3.333 30.962A18.45 18.45 0 1 0 14.3 1.968" />
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                d="M8.57 27.597a12.3 12.3 0 1 0 7.311-19.329" />
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                d="M24.415 17.837a6.15 6.15 0 1 0-4.703 9.2" />
        </svg>
    </a>
    <h1 class="mb-3 text-[28px] leading-9 font-bold text-zinc-900">Register</h1>
    <p class="mb-10 text-base font-medium text-zinc-600">Become a member now, enter credentials below.</p>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-7">
            <x-label for="name">Full name</x-label>
            <x-input required name="name" id="name" />
            <x-validation-message name="name" />
        </div>
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
        <div class="mb-9">
            <x-label for="password_confirmation">Confirm password</x-label>
            <x-input type="password" required name="password_confirmation" id="password_confirmation" />
            <x-validation-message name="password_confirmation" />
        </div>
        <x-button type="submit" class="mb-6 block w-full">
            Register
        </x-button>
        <p class="text-sm font-medium text-zinc-600">Already a member? <a href="{{ route('login') }}"
                class="font-semibold text-primary-600 focus:outline-none">Login here</a></p>
    </form>
</x-guest-layout>
