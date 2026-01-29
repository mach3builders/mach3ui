@props([])

<h2
    {{ $attributes->class([
        'text-xl font-medium',
        'text-gray-900',
        'dark:text-white',
    ]) }}
>
    {{ $slot }}
</h2>
