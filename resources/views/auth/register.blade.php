<x-guest-layout pageName="Sign Up">
    <h1 class="text-2xl font-semibold text-center">Sign Up to Aquire</h1>
    <div class="text-center mt-2 font-medium text-gray-600">Already have an account? <a
            href="{{ route('login') }}" class="font-semibold text-indigo-500">Login here!</a></div>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mt-9 md:mt-11">
            <label for="full_name" class="font-medium">Full Name</label>
            <x-input id="full_name" name="name" required class="block w-full text-base font-medium"/>
            <x-validation-message name="name" />
        </div>
        <div class="mt-7 md:mt-8 flex flex-col space-y-1.5">
            <label for="email" class="font-medium">Email</label>
            <x-input id="email" name="email" required class="block w-full text-base font-medium"/>
            <x-validation-message name="email" />
        </div>
        <div x-data="{password : ''}" class="mt-7 md:mt-8">
            <div class="flex flex-col space-y-1.5">
                <label for="password" class="font-medium">Password</label>
                <div x-data="{type : true}" class="relative">
                    <input x-model="password" :type="type ? 'password' : 'text'" id="password" name="password"
                        class="block w-full py-2.5 px-4 text-base font-medium bg-gray-100 rounded-lg border-none focus:outline-none focus:ring-0 focus:border-0 focus:bg-gray-200 transition-all"
                        required>
                    <div class="absolute inset-y-0 flex items-center justify-center right-0 mr-2.5">
                        <button x-on:click="type = !type" type="button" class="text-gray-600 transition-all" tabindex="-1">
                            <svg class="w-6 h-6 transition-all" :class="{'hidden' : !type, 'block' : type}" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <svg x-cloak class="w-6 h-6 transition-all" :class="{'block' : !type, 'hidden' : type}" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <x-validation-message name="password" />
            </div>
            <div class="mt-2">
                <span class="text-xs font-semibold text-gray-600 uppercase">Password Strength</span>
                <div class="mt-1.5 flex items-center space-x-3">
                    <div class="h-1.5 w-1/4 rounded-full"
                        x-bind:class="password.length > 8 ? 'bg-indigo-500' : 'bg-gray-100'"></div>
                    <div class="h-1.5 w-1/4 rounded-full"
                        x-bind:class="password.length > 8 && password.match(/[\d]/) ? 'bg-indigo-500' : 'bg-gray-100'">
                    </div>
                    <div class="h-1.5 w-1/4 rounded-full"
                        x-bind:class="password.length > 8 && password.match(/[\d]/) && password.match(/[A-Z]/) ? 'bg-indigo-500' : 'bg-gray-100'">
                    </div>
                    <div class="h-1.5 w-1/4 rounded-full"
                        x-bind:class="password.length > 8 && password.match(/[`!@#$%^&*()_+\-=\[\]{};:\\|,.<>\/?~]/) ? 'bg-indigo-500' : 'bg-gray-100'">
                    </div>
                </div>
            </div>
            <div class="mt-2 text-xs font-medium text-gray-600">Use 8 or more characters with a mix of letters, numbers
                & symbols.</div>
        </div>
        <div class="mt-7 md:mt-8 flex flex-col space-y-1.5">
            <label for="confirm_password" class="font-medium">Confirm Password</label>
            <div x-data="{type : true}" class="relative">
                <input :type="type ? 'password' : 'text'" id="confirm_password" name="password_confirmation"
                    class="block w-full py-2.5 px-4 text-base font-medium bg-gray-100 rounded-lg border-none focus:outline-none focus:ring-0 focus:border-0 focus:bg-gray-200 transition-all"
                    required>
                <x-validation-message name="password_confirmation" />
                <div class="absolute inset-y-0 flex items-center justify-center right-0 mr-2.5">
                    <button x-on:click="type = !type" type="button" class="text-gray-600 transition-all" tabindex="-1">
                        <svg class="w-6 h-6 transition-all" :class="{'hidden' : !type, 'block' : type}" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        <svg x-cloak class="w-6 h-6 transition-all" :class="{'block' : !type, 'hidden' : type}" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="mt-4 md:mt-5 flex items-center space-x-2">
            <input type="checkbox" name="tos" id="tos" class="w-6 h-6 rounded-md bg-gray-100 focus:ring-indigo-500 focus:outline-none border-none text-indigo-500">
            <label for="tos" class="text-sm font-medium">I agree to the <a href="#"
                    class="font-semibold text-indigo-500">Terms of Service</a></label>
        </div>
        <x-button type="submit"
            class="mt-4 md:mt-5 block w-full font-semibold text-base leading-5 text-white bg-indigo-500 focus:ring-indigo-500">
            Register
        </x-button>
    </form>
</x-guest-layout>
