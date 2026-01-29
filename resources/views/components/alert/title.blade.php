@props([])

<div
    {{ $attributes->class([
        'font-semibold leading-6',
        'text-gray-900',
        'dark:text-white',
    ]) }}
>
    {{ $slot }}
</div>
