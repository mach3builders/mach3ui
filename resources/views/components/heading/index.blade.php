@blaze

@props([
    'level' => null,
    'size' => null,
    'variant' => 'default',
    'weight' => 'semibold',
])

@php
    $tag = $level ? "h{$level}" : 'div';

    $size ??= match ((int) $level) {
        1 => '2xl',
        2 => 'xl',
        3 => 'lg',
        4 => 'base',
        5 => 'sm',
        6 => 'xs',
        default => 'base',
    };

    $classes = Ui::classes()
        // Size
        ->add($size, [
            'xs' => 'text-xs',
            'sm' => 'text-sm',
            'base' => 'text-base',
            'lg' => 'text-lg',
            'xl' => 'text-xl',
            '2xl' => 'text-2xl',
        ])
        // Weight
        ->add($weight, [
            'normal' => 'font-normal',
            'medium' => 'font-medium',
            'semibold' => 'font-semibold',
            'bold' => 'font-bold',
        ])
        // Variant
        ->add($variant, [
            'muted' => 'text-gray-500 dark:text-gray-400',
            'info' => 'text-blue-600 dark:text-blue-500',
            'success' => 'text-green-600 dark:text-green-500',
            'warning' => 'text-amber-600 dark:text-amber-500',
            'danger' => 'text-red-600 dark:text-red-500',
        ])
        ->merge($attributes);
@endphp

<{{ $tag }} {{ $attributes->except('class') }} class="{{ $classes }}" data-heading
    data-variant="{{ $variant }}">{{ $slot }}</{{ $tag }}>
