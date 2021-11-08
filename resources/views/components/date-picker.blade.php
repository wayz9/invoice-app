@props(['placeholder' => 'Pick a date', 'options' => []])

@php
    $options = array_merge([
    'dateFormat' => 'Y-m-d',
    'enableTime' => false,
    'altFormat' => 'j F Y',
    'altInput' => true,
    'minDate' => 'today',
    ], $options);
@endphp

<div class="relative" wire:ignore>
    <input {{ $attributes }} x-data="{value: @entangle($attributes->wire('model')), instance: undefined}" x-init="() => {
            $watch('value', value => instance.setDate(value, true));
            instance = flatpickr($refs.input, {{ json_encode((object)$options) }});
        }" x-ref="input" x-bind:value="value"
        class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 dark:ring-zinc-600/5 focus:outline-none focus:ring-zinc-400 dark:focus:ring-zinc-600/50 text-base font-medium text-zinc-900 dark:text-zinc-100 dark:bg-zinc-700/30 placeholder-zinc-500 dark:placeholder-zinc-400"
        placeholder="{{ $placeholder }}">
    <span class="absolute inset-y-0 right-0 mr-3 flex items-center justify-center text-zinc-500 dark:text-zinc-400">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
    </span>
</div>
