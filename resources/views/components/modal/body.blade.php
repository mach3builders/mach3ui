@props([])

<div
    {{ $attributes->class([
        'min-h-0 flex-1 overflow-y-auto px-6 py-4 text-sm',
        'text-gray-980',
        'dark:text-gray-100',
        '[&:has([data-section])]:p-0 [&:has([data-section])]:px-2',
    ]) }}
>
    {{ $slot }}
</div>
