<button {{ $attributes->merge(['class' => 'px-4 py-2.5 bg-lime-700 dark:bg-zinc-700/60 dark:focus:ring-offset-zinc-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-700 text-sm font-semibold text-lime-100 dark:text-lime-400']) }}>
    {{ $slot }}
</button>
