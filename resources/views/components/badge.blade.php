@props(['status'])

@php
    switch ($status) {
        case 0:
            $status = 'draft';
            break;

        case 1:
            $status = 'active';
            break;

        case 2:
            $status = 'paid';
            break;
    }
@endphp

<span class="text-xs leading-5 px-1.5 rounded font-medium uppercase bg-green-50 text-emerald-600">
    {{ $status ?? $slot }}
</span>
