@props(['status'])

@php
    switch ($status) {
        case 'team':
            $clasess = 'badge badge-primary';
            break;
        case 'private':
            $clasess = 'badge badge-info';
            break;
        case 'public':
            $clasess = 'badge badge-default';
            break;

        default:
            $clasess = 'badge badge-default';
            break;
    }

@endphp

<span {{ $attributes->merge(['class' => $clasess]) }}>
    {{ $slot }}
</span>
