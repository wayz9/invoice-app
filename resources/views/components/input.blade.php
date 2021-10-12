@props(['type' => 'text'])

<input type="{{ $type }}" {{ $attributes->merge(['class' => 'py-2.5 px-4 rounded-lg text-sm bg-gray-200/50 focus:bg-gray-200 focus:outline-none border-none focus:ring-0 placeholder-gray-600']) }}>
