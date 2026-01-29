@props([
    'actions' => false,
    'align' => 'left',
    'fit' => false,
    'highlight' => false,
])

<td
    {{ $attributes->class([
        'px-4 align-top [&_svg]:size-5',
        'py-3' => !$actions,
        '[&:has(>[data-checkbox]:only-child)]:pt-3',
        '[&:has(>[data-icon]:only-child)]:pt-3',
        '[&:has(>[data-button]:only-child)]:pt-1.5',
        '[&:has(>[data-toggle]:only-child)]:py-1.5',
                'border-gray-60 bg-white text-gray-700',
        'dark:border-gray-720 dark:bg-gray-800 dark:text-gray-200',
        '[tr:first-child_&]:border-t',
        '[&:first-child]:border-l',
        '[&:last-child]:border-r',
        '[tbody:not([data-expanded=false])_tr:last-child_&]:border-b',
        '[tbody:last-of-type[data-expanded=false]_tr:first-child_&]:border-b',
        '[tr+tr_&]:border-t',
        '[tbody:first-of-type_tr:first-child_&:first-child]:rounded-tl-lg [tbody:first-of-type_tr:first-child_&:last-child]:rounded-tr-lg',
        '[tbody:last-of-type:not([data-expanded=false])_tr:last-child_&:first-child]:rounded-bl-lg [tbody:last-of-type:not([data-expanded=false])_tr:last-child_&:last-child]:rounded-br-lg',
        '[tbody:last-of-type[data-expanded=false]_tr:first-child_&:first-child]:rounded-bl-lg [tbody:last-of-type[data-expanded=false]_tr:first-child_&:last-child]:rounded-br-lg',
        'text-left' => $align === 'left' && !$actions && !$fit,
        'text-center' => $align === 'center' || $fit,
        'text-right' => $align === 'right' || $actions,
        'w-0' => $actions || $fit,
        '[&:first-child]:pr-0 [&:not(:first-child):not(:last-child)]:px-0' => $fit,
        'py-1.5 pr-1.5 [&:last-child]:pl-0' => $actions,
        'font-medium text-gray-900 dark:text-white' => $highlight,
        '[[data-variant=simple]_&]:px-3 [[data-variant=simple]_&]:py-2.5',
        '[[data-variant=simple]_&:first-child]:font-medium [[data-variant=simple]_&:first-child]:text-gray-900 [[data-variant=simple]_&:first-child]:dark:text-white',
    ]) }}
    data-td
>
    @if ($actions)
        <div class="invisible inline-flex gap-1 group-hover:visible">
            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endif
</td>
