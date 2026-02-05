@blaze

@props([
    'flush' => false,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('relative z-10 flex-1 rounded-lg border shadow-xs')
        ->add(
            '[&:has(+[data-card-footer])]:rounded-b-none [&:has(+[data-card-footer])]:border-b-0 [&:has(+[data-card-footer])]:shadow-none',
        )
        ->add($variant, [
            'default' => 'border-gray-60 bg-white dark:border-gray-740 dark:bg-gray-800',
            'inverted' => 'border-gray-80 bg-gray-30 dark:border-gray-740 dark:bg-gray-820',
        ])
        ->unless($flush, 'px-4.5 py-4')
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-card-body>
    {{ $slot }}
</div>
