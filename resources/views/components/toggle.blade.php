<label for="{{ $name }}" class="flex items-center cursor-pointer">
    <div class="relative">
        <input {{ $attributes }} type="checkbox" id="{{ $name }}" class="sr-only peer">
        <div
            class="h-3.5 w-9 bg-zinc-400 peer-disabled:bg-zinc-500 peer-disabled:cursor-not-allowed peer-checked:bg-lime-800 rounded-full">
        </div>
        <div
            class="absolute -left-px bottom-[-3px] w-5 h-5 rounded-full shadow-none bg-zinc-500 peer-checked:bg-lime-500 dark:peer-checked:bg-lime-400 peer-checked:translate-x-[18px] peer-disabled:bg-zinc-300 peer-disabled:cursor-not-allowed transition">
        </div>
    </div>
</label>