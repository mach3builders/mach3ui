@props([
    'position' => 'bottom-start',
])

@php
    $id = 'dropdown-' . uniqid();
@endphp

<div
    {{ $attributes->class(['relative inline-block select-none']) }}
    x-data="{ open: false, id: '{{ $id }}', position: '{{ $position }}' }"
    style="anchor-scope: --dropdown-trigger;"
    data-dropdown
>
    {{ $slot }}
</div>
