@props([])

<div
    {{ $attributes->class([
        'flex flex-col flex-wrap gap-2 lg:flex-row lg:items-center',
        '[&>*]:w-full lg:[&>*]:w-auto',
    ]) }}
    data-buttons
>
    {{ $slot }}
</div>
