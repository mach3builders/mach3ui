@props([])

<div
    {{ $attributes->class([
        'm-0 hidden flex-col gap-1 min-w-48 rounded-lg border p-1 shadow-lg',
        'border-gray-100 bg-white',
        'dark:border-gray-740 dark:bg-gray-790',
        '[&:popover-open]:flex',
    ]) }}
    popover="manual"
    x-ref="menu"
    x-bind:id="id"
    x-bind:style="`position: fixed; top: ${y}px; left: ${x}px;`"
>
    {{ $slot }}
</div>
