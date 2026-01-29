@props([
    'size' => null,
])

@php
    $width_class = match ($size) {
        'sm' => 'w-1/3',
        'md' => 'w-1/2',
        default => 'w-full',
    };
@endphp

<div {{ $attributes->class(['flex-none', $width_class]) }}>
    {{ $slot }}
</div>
