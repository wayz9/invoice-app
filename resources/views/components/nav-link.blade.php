<li class="group">
    <a href="{{ $href }}" class="py-2 px-3 flex items-center justify-between text-gray-300 {{ (request()->url() == $href) ? 'bg-dark-700 text-white' : 'bg-transparent hover:bg-dark-700 hover:text-white' }} transition-colors rounded-lg">
        <div class="flex items-center gap-x-2.5">
            <span class="inline-flex">
                {{ $icon }}
            </span>
            <span class="text-sm font-medium">{{ $slot }}</span>
        </div>
        {{ $extra ?? '' }}
    </a>
</li>
