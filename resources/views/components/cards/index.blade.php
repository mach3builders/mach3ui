@props([
    'columns' => null,
    'gap' => 'md',
])

@php
    $gap_classes = [
        'none' => 'gap-0',
        'xs' => 'gap-1',
        'sm' => 'gap-2',
        'md' => 'gap-4',
        'lg' => 'gap-6',
        'xl' => 'gap-8',
    ];

    $column_classes = [
        1 => 'grid-cols-1',
        2 => 'grid-cols-1 sm:grid-cols-2',
        3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
        4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',
        5 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5',
        6 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6',
    ];
@endphp

<div
    {{ $attributes->class([
        'grid',
        $gap_classes[$gap] ?? $gap_classes['md'],
        $column_classes[$columns] ?? null,
    ]) }}
    data-cards
>
    {{ $slot }}
</div>
