@props([
    'size' => 'sm',
    'weight' => 'normal',
    'tag' => 'p',
    'variant' => 'default',
])

@php
    $size_classes = [
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'base' => 'text-base',
        'lg' => 'text-lg',
    ];

    $weight_classes = [
        'light' => 'font-light',
        'normal' => 'font-normal',
        'medium' => 'font-medium',
        'semibold' => 'font-semibold',
        'bold' => 'font-bold',
    ];

    $variant_classes = [
        'muted' => 'text-gray-500 dark:text-gray-400',
        'info' => 'text-blue-600 dark:text-blue-500',
        'success' => 'text-green-600 dark:text-green-500',
        'warning' => 'text-amber-600 dark:text-amber-500',
        'danger' => 'text-red-600 dark:text-red-500',
        'default' => 'text-gray-900 dark:text-gray-100',
    ];
@endphp

<{{ $tag }}
    {{ $attributes->class([
        $size_classes[$size] ?? $size_classes['sm'],
        $weight_classes[$weight] ?? $weight_classes['normal'],
        $variant_classes[$variant] ?? $variant_classes['default'],
    ]) }}
    data-text>{{ $slot }}</{{ $tag }}>
