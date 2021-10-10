@props(['placeholder' => 'Pick a date', 'options' => []])

@php
    $options = array_merge([
    'dateFormat' => 'Y-m-d',
    'enableTime' => false,
    'altFormat' => 'j F Y',
    'altInput' => true,
    'minDate' => 'today'
    ], $options);
@endphp

<div class="relative" wire:ignore>
    <input {{ $attributes }} x-data="{value: @entangle($attributes->wire('model')), instance: undefined}" x-init="() => {
            $watch('value', value => instance.setDate(value, true));
            instance = flatpickr($refs.input, {{ json_encode((object)$options) }});
        }" x-ref="input" x-bind:value="value"
        class="text-sm text-gray-900 block w-full py-2.5 px-3.5 rounded-lg bg-gray-200/50 focus:bg-gray-200 focus:outline-none placeholder-gray-500"
        placeholder="{{ $placeholder }}">
    <span class="absolute inset-y-0 right-0 mr-3 flex items-center justify-center text-gray-500">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
    </span>
</div>
