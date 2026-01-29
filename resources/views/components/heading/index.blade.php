@props([
    'level' => null,
    'muted' => false,
    'size' => 'base',
])

@php
    $tag = $level ? 'h' . (int) $level : 'div';

    $base_classes = ['scroll-mt-20 font-semibold tracking-tight'];

    $size_classes = [
        'base' => 'text-base',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
    ];

    $color_classes = $muted ? 'text-gray-500 dark:text-gray-400' : 'text-gray-980 dark:text-gray-100';
@endphp

<{{ $tag }}
    {{ $attributes->class([...$base_classes, $size_classes[$size] ?? $size_classes['base'], $color_classes]) }}
    data-heading>{{ $slot }}</{{ $tag }}>
