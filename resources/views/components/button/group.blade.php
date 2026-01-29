@props([])

<div
    {{ $attributes->class([
        'inline-flex',
        '[&>[data-button]]:rounded-none [&>[data-button]]:border-l-0',
        '[&>[data-button]:first-child]:rounded-l-md [&>[data-button]:first-child]:border-l',
        '[&>[data-button]:last-child]:rounded-r-md',
        '[&>[data-button]:focus]:z-10 [&>[data-button]:focus-visible]:z-10',
    ]) }}
>
    {{ $slot }}
</div>
