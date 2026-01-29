@props([
    'size' => 'md',
])

@php
    $size_classes = [
        'sm' => 'h-4 min-w-4 rounded-sm px-1 text-[10px]',
        'md' => 'h-5 min-w-5 px-1.5 text-[12px]',
        'lg' => 'h-6 min-w-6 px-2 text-[14px]',
    ];
@endphp

<kbd
    {{ $attributes->class([
        'inline-flex items-center justify-center rounded-md border font-mono font-medium',
        'border-gray-120 bg-gray-40 text-gray-600',
        'dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300',
        $size_classes[$size] ?? $size_classes['md'],
    ]) }}
    data-kbd
>{{ $slot }}</kbd>
