@props([])

<div
    {{ $attributes->class([
        'leading-relaxed',
        'text-gray-600',
        'dark:text-gray-300',
    ]) }}
>
    {{ $slot }}
</div>
