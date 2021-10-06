<li x-data="{open : false}" class="group">
    <button type="button" @click="open = !open"
        class="py-2 px-3 w-full flex items-center justify-between text-gray-300 transition-colors rounded-lg"
        :class="{'bg-dark-700 text-white' : open, 'bg-transparent hover:bg-dark-700 hover:text-white' : !open}">
        <div class="flex items-center gap-x-2.5">
            <span class="inline-flex">
                {{ $icon }}
            </span>
            <span class="text-sm font-medium">{{ $name ?? 'Default Collapse' }}</span>
        </div>
        <span class="transform transition-all" :class="{'rotate-90' : open}">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7">
                </path>
            </svg>
        </span>
    </button>
    <ul x-show="open" x-collapse class="mt-1 flex flex-col gap-y-1">
        {{ $slot }}
    </ul>
</li>
