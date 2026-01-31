@props([
    'size' => 'sm',
    'weight' => 'normal',
    'tag' => 'p',
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add(
            match ($size) {
                'xs' => 'text-xs',
                'base' => 'text-base',
                'lg' => 'text-lg',
                default => 'text-sm',
            },
        )
        ->add(
            match ($weight) {
                'light' => 'font-light',
                'medium' => 'font-medium',
                'semibold' => 'font-semibold',
                'bold' => 'font-bold',
                default => 'font-normal',
            },
        )
        ->add(
            match ($variant) {
                'muted' => 'text-gray-500 dark:text-gray-400',
                'info' => 'text-blue-600 dark:text-blue-500',
                'success' => 'text-green-600 dark:text-green-500',
                'warning' => 'text-amber-600 dark:text-amber-500',
                'danger' => 'text-red-600 dark:text-red-500',
                default => 'text-gray-900 dark:text-gray-100',
            },
        )
        ->merge($attributes->only('class'));
@endphp

<{{ $tag }} class="{{ $classes }}" {{ $attributes->except('class') }} data-text>{{ $slot }}
    </{{ $tag }}>
