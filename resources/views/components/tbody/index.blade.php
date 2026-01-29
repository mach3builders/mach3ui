<tbody
    {{ $attributes->class([
        '[[data-variant]:not([data-variant=simple])_&]:shadow-xs',
        '[&_tr:first-child_td:first-child]:rounded-tl-lg',
        '[&_tr:first-child_td:last-child]:rounded-tr-lg',
        '[&_tr:last-child_td:first-child]:rounded-bl-lg',
        '[&_tr:last-child_td:last-child]:rounded-br-lg',
    ]) }}
    data-tbody
>
    {{ $slot }}
</tbody>
