<button {{ $attributes->merge(['class' => 'py-3 px-5 font-medium rounded-lg focus:ring-1 sm:focus:ring-2 focus:ring-offset-1 sm:focus:ring-offset-2 focus:outline-none transition-all']) }}>
    {{ $slot }}
</button>
