@props([])

<dl
    {{ $attributes->class([
        'flex flex-col gap-3',
    ]) }}
    data-definition-list
>
    {{ $slot }}
</dl>
