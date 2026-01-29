@props([])

<div
    {{ $attributes->class([
        'flex shrink-0 items-center justify-end gap-4 px-6 py-4',
    ]) }}
>
    {{ $slot }}
</div>
