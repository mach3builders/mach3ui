@props([
    'flush' => false,
    'variant' => null,
])

@php
    $classes = Ui::classes()
        ->add('relative z-10 flex-1 rounded-lg border shadow-xs')
        ->add(
            'has-[+[data-card-footer]]:rounded-b-none has-[+[data-card-footer]]:border-b-0 has-[+[data-card-footer]]:pb-0 has-[+[data-card-footer]]:shadow-none',
        )
        ->add(
            match ($variant) {
                'inverted' => 'border-gray-80 bg-gray-30 dark:border-gray-740 dark:bg-gray-820',
                default => 'border-gray-60 bg-white dark:border-gray-740 dark:bg-gray-800',
            },
        )
        ->unless($flush, 'px-4.5 py-4')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-card-content>
    {{ $slot }}
</div>
