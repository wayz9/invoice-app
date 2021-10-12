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

<span class="text-xs leading-5 px-1.5 rounded font-medium uppercase @if($status == 'draft') bg-gray-100 text-gray-700 @endif @if($status == 'active') bg-green-50 text-green-600 @endif @if($status == 'paid') bg-indigo-50 text-indigo-600 @endif">
    {{ $status ?? $slot }}
</span>
