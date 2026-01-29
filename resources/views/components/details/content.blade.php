@props([])

<div
    {{ $attributes->class([
        'border-t px-4 pb-4 pt-4',
        'border-gray-100',
        'dark:border-gray-740',
        '[&_.table]:text-sm [&_.table_th]:py-2 [&_.table_th]:text-xs [&_.table_td]:py-2',
    ]) }}
>
    {{ $slot }}
</div>
