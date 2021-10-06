@props(['rating' => 0])

<div
    class="absolute flex items-center justify-center text-center text-xs md:text-base leading-3 md:leading-4 font-semibold text-white w-8 md:w-10 h-8 md:h-10 right-3 md:right-4 -bottom-4 rounded-full ring-1 ring-inset {{ ($rating > 50 && $rating != 0) ? 'ring-cyan-400' : 'ring-rose-400' }} {{ ($rating == 0) ?? 'ring-gray-400' }} bg-gray-900">
    {{ $rating ?? $slot }}
</div>
