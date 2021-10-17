<li>
    <a href="{{ $href }}"
        class="py-3 px-6 flex items-center justify-between {{ (request()->url() == $href) ? 'bg-zinc-800/40 text-white' : 'hover:bg-zinc-800/40 hover:text-white' }} transition-colors">
        <div class="flex items-center gap-x-2.5 text-zinc-300">
            <span>
                {{ $icon }}
            </span>
            <span class="text-sm font-semibold">{{ $slot }}</span>
        </div>
        {{ $extra ?? '' }}
    </a>
</li>
