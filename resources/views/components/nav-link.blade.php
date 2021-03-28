@props(['active', 'icon', 'route'])

@php
$classes = ($active ?? false)
            ? 'active'
            : '';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    <a href="{{ $route }}">
        <i class="{{ $icon }}"></i> <span class="nav-label">
            {{ $slot }}
        </span>
    </a>
</li>

