@props([
    'actions' => false,
    'align' => 'left',
    'fit' => false,
    'highlight' => false,
])

@php
    $classes = Ui::classes()
        ->add('px-4 align-top [&_svg]:size-5')
        ->unless($actions, 'py-3')
        ->add('[&:has(>[data-checkbox]:only-child)]:pt-3')
        ->add('[&:has(>[data-icon]:only-child)]:pt-3')
        ->add('[&:has(>[data-button]:only-child)]:pt-1.5')
        ->add('[&:has(>[data-toggle]:only-child)]:py-1.5')
        ->add('border-gray-60 bg-white text-gray-700')
        ->add('dark:border-gray-720 dark:bg-gray-800 dark:text-gray-200')
        ->add('[tr:first-child_&]:border-t')
        ->add('[&:first-child]:border-l')
        ->add('[&:last-child]:border-r')
        ->add('[tbody:not([data-expanded=false])_tr:last-child_&]:border-b')
        ->add('[tbody:last-of-type[data-expanded=false]_tr:first-child_&]:border-b')
        ->add('[tr+tr_&]:border-t')
        ->add(
            '[tbody:first-of-type_tr:first-child_&:first-child]:rounded-tl-lg [tbody:first-of-type_tr:first-child_&:last-child]:rounded-tr-lg',
        )
        ->add(
            '[tbody:last-of-type:not([data-expanded=false])_tr:last-child_&:first-child]:rounded-bl-lg [tbody:last-of-type:not([data-expanded=false])_tr:last-child_&:last-child]:rounded-br-lg',
        )
        ->add(
            '[tbody:last-of-type[data-expanded=false]_tr:first-child_&:first-child]:rounded-bl-lg [tbody:last-of-type[data-expanded=false]_tr:first-child_&:last-child]:rounded-br-lg',
        )
        ->when($align === 'left' && !$actions && !$fit, 'text-left')
        ->when($align === 'center' || $fit, 'text-center')
        ->when($align === 'right' || $actions, 'text-right')
        ->when($actions || $fit, 'w-0')
        ->when($fit, '[&:first-child]:pr-0 [&:not(:first-child):not(:last-child)]:px-0')
        ->when($actions, 'py-1.5 pr-1.5 [&:last-child]:pl-0')
        ->when($highlight, 'font-medium text-gray-900 dark:text-white')
        ->add('[[data-variant=simple]_&]:px-3 [[data-variant=simple]_&]:py-2.5')
        ->add(
            '[[data-variant=simple]_&:first-child]:font-medium [[data-variant=simple]_&:first-child]:text-gray-900 [[data-variant=simple]_&:first-child]:dark:text-white',
        )
        ->merge($attributes->only('class'));
@endphp

<td class="{{ $classes }}" {{ $attributes->except('class') }} data-td>
    @if ($actions)
        <div class="invisible inline-flex gap-1 group-hover:visible">
            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endif
</td>
