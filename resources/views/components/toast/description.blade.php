@props([])

<div
    {{ $attributes->class([
        'text-gray-600',
        'dark:text-gray-300',
    ]) }}
>
    {{ $slot }}
</div>
