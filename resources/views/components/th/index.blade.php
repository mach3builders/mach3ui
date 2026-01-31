@props([
    'align' => 'left',
    'fit' => false,
    'sortable' => false,
    'sorted' => null,
])

@php
    $isSorted = $sorted === 'asc' || $sorted === 'desc';

    $classes = Ui::classes()
        ->add('px-4 py-3 text-xs font-medium tracking-wide whitespace-nowrap uppercase')
        ->add($isSorted ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-400')
        ->when($align === 'left' && !$fit, 'text-left')
        ->when($align === 'center' || $fit, 'text-center')
        ->when($align === 'right', 'text-right')
        ->when($fit, 'w-0')
        ->when($sortable, 'cursor-pointer select-none')
        ->when($sortable && !$isSorted, 'hover:text-gray-700 dark:hover:text-gray-200')
        ->add(
            '[[data-variant=simple]_&]:px-3 [[data-variant=simple]_&]:py-2.5 [[data-variant=simple]_&]:tracking-normal [[data-variant=simple]_&]:normal-case',
        );

    $iconClasses = Ui::classes()
        ->add('size-4 shrink-0 transition-transform')
        ->unless($isSorted, 'text-gray-300 dark:text-gray-600')
        ->when($sorted === 'desc', 'rotate-180');
@endphp

<th {{ $attributes->class($classes) }} data-th>
    @if ($sortable)
        <span class="inline-flex items-center gap-1">
            {{ $slot }}

            <ui:icon name="chevron-up" :class="$iconClasses" />
        </span>
    @else
        {{ $slot }}
    @endif
</th>
