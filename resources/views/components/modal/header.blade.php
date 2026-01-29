@props([])

<div
    {{ $attributes->class([
        'relative flex shrink-0 items-center justify-between gap-4 px-6 py-4',
    ]) }}
>
    {{ $slot }}
</div>
