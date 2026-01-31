@props([
    'variant' => 'default',
])

@php
    $variantClasses = [
        'default' => 'rounded-md',
        'circle' => 'rounded-full',
    ];

    $classes = Ui::classes()
        ->add('animate-pulse')
        ->add('bg-gray-200')
        ->add('dark:bg-gray-700')
        ->add($variantClasses[$variant] ?? $variantClasses['default'])
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-skeleton></div>
