@props([
    'columns' => 3,
    'gap' => 'md',
])

@php
    $columnClasses = [
        1 => 'grid-cols-1',
        2 => 'grid-cols-1 sm:grid-cols-2',
        3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
        4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',
        5 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5',
        6 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6',
    ];

    $classes = Ui::classes()
        ->add('grid')
        ->add(
            match ($gap) {
                'none' => 'gap-0',
                'xs' => 'gap-1',
                'sm' => 'gap-2',
                'lg' => 'gap-6',
                'xl' => 'gap-8',
                default => 'gap-4',
            },
        )
        ->add($columnClasses[$columns] ?? null)
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-pricing>
    {{ $slot }}
</div>
