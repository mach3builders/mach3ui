@props([
    'actions' => false,
    'align' => 'left',
    'fit' => false,
    'highlight' => false,
])

@php
    // Base classes
    $classes = Ui::classes()->add('px-4 align-top [&_svg]:size-5')->unless($actions, 'py-3');

    // Auto-adjust padding for single-child elements
    $classes = $classes
        ->add('has-[[data-checkbox]:only-child]:pt-3')
        ->add('has-[[data-icon]:only-child]:pt-3')
        ->add('has-[[data-button]:only-child]:pt-1.5')
        ->add('has-[[data-toggle]:only-child]:py-1.5')
        ->add('has-[[data-avatar]:only-child]:py-2.5')
        ->add('has-[[data-control]:only-child]:py-1.5');

    // Colors
    $classes = $classes
        ->add('border-gray-60 bg-white text-gray-700')
        ->add('dark:border-gray-720 dark:bg-gray-800 dark:text-gray-200');

    // Borders
    $classes = $classes
        ->add('[tr:first-child_&]:border-t')
        ->add('first:border-l last:border-r')
        ->add('[tr+tr_&]:border-t')
        // Border-bottom alleen op laatste zichtbare row van laatste tbody
        ->add('[tbody:last-of-type:not([data-expanded="false"])_tr:last-child_&]:border-b')
        ->add('[tbody:last-of-type[data-expanded="false"]_tr:first-child_&]:border-b');

    // Border radius - top corners op eerste tbody's eerste row
$classes = $classes
    ->add('[tbody:first-of-type_tr:first-child_&]:first:rounded-tl-lg')
    ->add('[tbody:first-of-type_tr:first-child_&]:last:rounded-tr-lg');

// Border radius - bottom corners op laatste tbody's laatste zichtbare row
    $classes = $classes
        ->add('[tbody:last-of-type:not([data-expanded="false"])_tr:last-child_&]:first:rounded-bl-lg')
        ->add('[tbody:last-of-type:not([data-expanded="false"])_tr:last-child_&]:last:rounded-br-lg')
        ->add('[tbody:last-of-type[data-expanded="false"]_tr:first-child_&]:first:rounded-bl-lg')
        ->add('[tbody:last-of-type[data-expanded="false"]_tr:first-child_&]:last:rounded-br-lg');

    // Detect alignment from prop or user classes
    $userClasses = (string) $attributes->get('class');
    $effectiveAlign = match (true) {
        $align !== 'left' => $align,
        str_contains($userClasses, 'text-center') => 'center',
        str_contains($userClasses, 'text-right') => 'right',
        default => 'left',
    };

    // Alignment
    $alignClasses = match (true) {
        $effectiveAlign === 'center' || $fit => 'flex items-center justify-center gap-2',
        $effectiveAlign === 'right' || $actions => 'flex items-center justify-end gap-2',
        default => null,
    };

    // Fit & actions modifiers
    $classes = $classes
        ->when($actions || $fit, 'w-0')
        ->when($fit, 'first:pr-0 not-first:not-last:px-0 last:pl-0')
        ->when($actions, 'py-1.5 pr-1.5 last:pl-0');

    // Highlight
    $classes = $classes->when($highlight, 'font-medium text-gray-900')->when($highlight, 'dark:text-white');

    // Simple variant overrides
    $classes = $classes
        ->add('[[data-variant=simple]_&]:px-3 [[data-variant=simple]_&]:py-2.5')
        ->add('[[data-variant=simple]_&]:first:font-medium [[data-variant=simple]_&]:first:text-gray-900')
        ->add('[[data-variant=simple]_&]:first:dark:text-white');

    // Merge user classes
    $classes = $classes->merge($attributes->only('class'));

    $actionsClasses = Ui::classes()->add('invisible flex justify-end gap-1 group-hover:visible');
@endphp

<td class="{{ $classes }}" {{ $attributes->except('class') }} data-td>
    @if ($actions)
        <div class="{{ $actionsClasses }}" data-td-actions>
            {{ $slot }}
        </div>
    @elseif ($alignClasses)
        <div class="{{ $alignClasses }}">
            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endif
</td>
