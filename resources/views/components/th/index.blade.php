@props([
    'align' => 'left',
    'fit' => false,
    'sortable' => false,
    'sorted' => null,
])

@php
    $is_sorted = $sorted === 'asc' || $sorted === 'desc';
@endphp

<th
    {{ $attributes->class([
        'px-4 py-3 text-xs font-medium tracking-wide whitespace-nowrap uppercase',
        'text-gray-500 dark:text-gray-400' => !$is_sorted,
        'text-gray-900 dark:text-white' => $is_sorted,
        'text-left' => $align === 'left' && !$fit,
        'text-center' => $align === 'center' || $fit,
        'text-right' => $align === 'right',
        'w-0' => $fit,
        'cursor-pointer select-none' => $sortable,
        'hover:text-gray-700 dark:hover:text-gray-200' => $sortable && !$is_sorted,
        '[[data-variant=simple]_&]:px-3 [[data-variant=simple]_&]:py-2.5 [[data-variant=simple]_&]:tracking-normal [[data-variant=simple]_&]:normal-case',
    ]) }}
    data-th
>
    @if ($sortable)
        <span class="inline-flex items-center gap-1">
            {{ $slot }}

            <ui:icon
                name="chevron-up"
                @class([
                    'size-4 shrink-0 transition-transform',
                    'text-gray-300 dark:text-gray-600' => !$is_sorted,
                    'rotate-180' => $sorted === 'desc',
                ])
            />
        </span>
    @else
        {{ $slot }}
    @endif
</th>
