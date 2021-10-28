@props(['name'])

<div x-on:keydown.window.escape="{{ $name }} = false" x-cloak x-show="{{ $name }}"
    class="fixed inset-0 z-40 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="absolute inset-0 overflow-hidden">
        <div x-show="{{ $name }}" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="absolute inset-0 bg-zinc-900/20 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-y-0 right-0 max-w-full flex">
            <div x-show="{{ $name }}"
                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                {{ $attributes->merge(['class' => 'relative w-screen max-w-[36rem]']) }}>
                <div class="bg-white dark:bg-zinc-900">
                    <div
                    class="h-full py-6 px-8 flex flex-col bg-white dark:bg-zinc-800/50 border-l border-zinc-100 dark:border-zinc-800 overflow-y-auto">
                    {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
