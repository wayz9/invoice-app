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
        class="block w-full py-2 px-4 rounded-md ring-1 ring-inset ring-zinc-200 dark:ring-zinc-600/5 focus:outline-none focus:ring-zinc-400 dark:focus:ring-zinc-600/50 text-base font-medium text-zinc-900 dark:text-zinc-100 dark:bg-zinc-700/30 placeholder-zinc-500 dark:placeholder-zinc-400"
        placeholder="{{ $placeholder }}">
    <span class="absolute inset-y-0 right-0 mr-3 flex items-center justify-center text-zinc-500 dark:text-zinc-400">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="18" height="18" viewBox="0 0 16 16"><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/></svg>
    </span>
</div>
