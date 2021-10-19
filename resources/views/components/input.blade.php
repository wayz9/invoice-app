@props(['type' => 'text'])

<input type="{{ $type }}" {{ $attributes->merge(['class' => 'block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 focus:outline-none focus:ring-zinc-400 dark:focus:ring-zinc-600/50 dark:ring-zinc-600/5 dark:bg-zinc-700/30 text-base font-medium text-zinc-900 dark:text-zinc-100']) }}>
