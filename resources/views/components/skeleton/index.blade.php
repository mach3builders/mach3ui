@props([
    'variant' => 'default',
])

@php
    $variant_classes = [
        'default' => 'rounded-md',
        'circle' => 'rounded-full',
    ];
@endphp

<div
    {{ $attributes->class([
        'animate-pulse',
        'bg-gray-200 dark:bg-gray-700',
        $variant_classes[$variant] ?? $variant_classes['default'],
    ]) }}
    data-skeleton
></div>
