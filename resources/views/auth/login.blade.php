<x-guest-layout pageName="Sign In">
    <h1 class="text-2xl mb-1.5 font-bold text-center">Sign In to Aquire</h1>
    <div class="text-center text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="font-medium text-indigo-500">Register here!</a></div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mt-9 md:mt-11 flex flex-col space-y-1.5">
            <label for="email" class="font-medium">Email</label>
            <x-input id="email" name="email" required class="block w-full text-base font-medium"/>
        </div>
        <div class="mt-7 md:mt-8 flex flex-col space-y-1.5">
            <div class="flex items-center justify-between">
                <label for="password" class="font-medium">Password</label>
                <a href="#" class="text-sm font-medium text-indigo-500">Forgot Password?</a>
            </div>
            <x-input type="password" id="password" name="password" required class="block w-full text-base font-medium"/>
        </div>
        <div class="mt-4 md:mt-5 flex items-center space-x-2">
            <input type="checkbox" name="remember_me" id="remember_me" class="w-6 h-6 rounded-md bg-gray-100 focus:ring-indigo-500 focus:outline-none border-none text-indigo-500">
            <label for="remember_me">Remember me</label>
        </div>
        <x-button type="submit" class="mt-4 md:mt-5 block w-full font-medium text-base leading-5 text-white bg-indigo-500 focus:ring-indigo-500">
            Sign in
        </x-button>
    </form>
    <div class="py-3.5 md:py-4 text-center text-sm font-medium text-gray-600 uppercase">
        Or
    </div>
    <div class="flex flex-col space-y-4">
        <x-button type="button" class="flex justify-center items-center space-x-2.5 bg-gray-100 hover:bg-gray-200 focus:bg-gray-200 text-gray-600 focus:ring-gray-600">
            <span>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 11.2573C22 17.5335 17.6316 22 11.1803 22C4.99508 22 0 17.0855 0 11C0 4.91452 4.99508 0 11.1803 0C14.1918 0 16.7254 1.08669 18.6775 2.87863L15.6344 5.75726C11.6537 1.97823 4.25123 4.81694 4.25123 11C4.25123 14.8367 7.36639 17.946 11.1803 17.946C15.6074 17.946 17.2664 14.8234 17.5279 13.2044H11.1803V9.42097H21.8242C21.9279 9.98427 22 10.5254 22 11.2573Z" fill="currentColor"/>
                </svg>
            </span>
            <span class="text-sm font-semibold">Sign In With Google</span>
        </x-button>
        <x-button type="button" class="flex justify-center items-center space-x-2.5 bg-gray-100 hover:bg-gray-200 focus:bg-gray-200 text-gray-600 focus:ring-gray-600">
            <span>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.6427 0.00110005H2.3573C1.73249 0.00109978 1.13323 0.249155 0.691215 0.690759C0.249198 1.13236 0.000583121 1.73139 0 2.3562L0 19.6427C0 20.2679 0.248358 20.8675 0.690437 21.3096C1.13252 21.7516 1.73211 22 2.3573 22H9.097V14.52H6.0038V11H9.097V8.316C9.097 5.2646 10.9142 3.5783 13.6972 3.5783C15.0293 3.5783 16.423 3.8159 16.423 3.8159V6.8112H14.8874C13.3749 6.8112 12.903 7.7506 12.903 8.7142V11H16.28L15.741 14.52H12.903V22H19.6427C20.2677 22 20.8671 21.7518 21.3092 21.31C21.7512 20.8681 21.9997 20.2688 22 19.6438V2.3562C21.9997 1.7312 21.7512 1.13189 21.3092 0.690048C20.8671 0.248207 20.2677 -6.80469e-08 19.6427 0V0.00110005Z" fill="currentColor"/>
                </svg>
            </span>
            <span class="text-sm font-semibold">Sign In With Facebook</span>
        </x-button>
        <x-button type="button" class="flex justify-center items-center space-x-2.5 bg-gray-100 hover:bg-gray-200 focus:bg-gray-200 text-gray-600 focus:ring-gray-600">
            <span>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.35847 17.7144C7.35847 17.8054 7.25645 17.8781 7.12782 17.8781C6.98145 17.8918 6.87944 17.819 6.87944 17.7144C6.87944 17.6234 6.98145 17.5506 7.11008 17.5506C7.24315 17.537 7.35847 17.6097 7.35847 17.7144ZM5.97903 17.5097C5.94798 17.6006 6.03669 17.7053 6.16976 17.7326C6.28508 17.7781 6.41815 17.7326 6.44476 17.6416C6.47137 17.5506 6.3871 17.446 6.25403 17.405C6.13871 17.3732 6.01008 17.4187 5.97903 17.5097ZM7.93952 17.4323C7.81089 17.4642 7.72218 17.5506 7.73548 17.6552C7.74879 17.7462 7.86411 17.8054 7.99718 17.7735C8.12581 17.7417 8.21452 17.6552 8.20121 17.5642C8.1879 17.4778 8.06814 17.4187 7.93952 17.4323ZM10.8581 0C4.70605 0 0 4.79025 0 11.0999C0 16.1449 3.09597 20.4621 7.51814 21.9815C8.08589 22.0861 8.28548 21.7267 8.28548 21.431C8.28548 21.149 8.27218 19.5932 8.27218 18.6378C8.27218 18.6378 5.16734 19.3202 4.51532 17.2822C4.51532 17.2822 4.00968 15.9584 3.28226 15.6172C3.28226 15.6172 2.26653 14.903 3.35323 14.9166C3.35323 14.9166 4.45766 15.0076 5.06532 16.0903C6.03669 17.8463 7.66452 17.3413 8.29879 17.0411C8.40081 16.3132 8.68911 15.8083 9.00847 15.508C6.52903 15.226 4.02742 14.8575 4.02742 10.4812C4.02742 9.23021 4.36452 8.60243 5.07419 7.80178C4.95887 7.50609 4.58185 6.28692 5.18952 4.71291C6.11653 4.41722 8.25 5.94118 8.25 5.94118C9.1371 5.68643 10.0907 5.55451 11.0355 5.55451C11.9802 5.55451 12.9339 5.68643 13.821 5.94118C13.821 5.94118 15.9544 4.41267 16.8815 4.71291C17.4891 6.29147 17.1121 7.50609 16.9968 7.80178C17.7065 8.60698 18.1411 9.23476 18.1411 10.4812C18.1411 14.8712 15.5286 15.2214 13.0492 15.508C13.4573 15.8674 13.8032 16.5498 13.8032 17.6188C13.8032 19.1519 13.7899 21.0489 13.7899 21.4219C13.7899 21.7176 13.994 22.077 14.5573 21.9724C18.9927 20.4621 22 16.1449 22 11.0999C22 4.79025 17.0101 0 10.8581 0ZM4.31129 15.69C4.25363 15.7355 4.26694 15.8401 4.34234 15.9266C4.41331 15.9993 4.51532 16.0312 4.57298 15.972C4.63064 15.9266 4.61734 15.8219 4.54194 15.7355C4.47097 15.6627 4.36895 15.6309 4.31129 15.69ZM3.83226 15.3215C3.80121 15.3807 3.84556 15.4534 3.93427 15.4989C4.00524 15.5444 4.09395 15.5308 4.125 15.4671C4.15605 15.408 4.11169 15.3352 4.02298 15.2897C3.93427 15.2624 3.86331 15.276 3.83226 15.3215ZM5.26935 16.941C5.19839 17.0002 5.225 17.1366 5.32702 17.2231C5.42903 17.3277 5.55766 17.3413 5.61532 17.2686C5.67298 17.2094 5.64637 17.0729 5.55766 16.9865C5.46008 16.8819 5.32702 16.8682 5.26935 16.941ZM4.76371 16.2723C4.69274 16.3178 4.69274 16.4361 4.76371 16.5407C4.83468 16.6453 4.95444 16.6908 5.0121 16.6453C5.08306 16.5862 5.08306 16.4679 5.0121 16.3633C4.95 16.2586 4.83468 16.2132 4.76371 16.2723Z" fill="currentColor"/>
                </svg>
            </span>
            <span class="text-sm font-semibold">Sign In With GitHub</span>
        </x-button>
    </div>
</x-guest-layout>
