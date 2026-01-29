@props([
    'limit' => null,
    'size' => 'md',
])

@php
    $spacing_classes = [
        'xs' => '-space-x-2',
        'sm' => '-space-x-2.5',
        'md' => '-space-x-3',
        'lg' => '-space-x-4',
        'xl' => '-space-x-5',
    ];
@endphp

<div
    {{ $attributes->class([
        'flex items-center [&>*]:ring-2 [&>*]:ring-white dark:[&>*]:ring-gray-900',
        $spacing_classes[$size] ?? $spacing_classes['md'],
    ]) }}
>
    {{ $slot }}

    @if ($limit)
        <span
            @class([
                'relative inline-flex shrink-0 items-center justify-center rounded-full font-medium ring-2 ring-white',
                'bg-gray-100 text-gray-600',
                'dark:bg-gray-700 dark:text-gray-300 dark:ring-gray-900',
                match ($size) {
                    'xs' => 'size-6 text-[10px]',
                    'sm' => 'size-8 text-xs',
                    'lg' => 'size-12 text-base',
                    'xl' => 'size-16 text-lg',
                    default => 'size-10 text-sm',
                },
            ])
        >
            +{{ $limit }}
        </span>
    @endif
</div>
