@props([
    'orientation' => 'horizontal',
    'text' => null,
    'variant' => 'default',
])

@php
    $isVertical = $orientation === 'vertical';

    $colors = match ($variant) {
        'subtle' => 'bg-gray-100 dark:bg-gray-700',
        default => 'bg-gray-200 dark:bg-gray-600',
    };

    $textClasses = Ui::classes()
        ->add('flex w-full items-center gap-3')
        ->add("before:h-px before:flex-1 before:content-['']")
        ->add("after:h-px after:flex-1 after:content-['']")
        ->add(
            match ($variant) {
                'subtle' => 'before:bg-gray-100 after:bg-gray-100 dark:before:bg-gray-700 dark:after:bg-gray-700',
                default => 'before:bg-gray-200 after:bg-gray-200 dark:before:bg-gray-600 dark:after:bg-gray-600',
            },
        )
        ->merge($attributes->only('class'));

    $verticalClasses = Ui::classes()
        ->add('min-h-4 w-px shrink-0 self-stretch')
        ->add($colors)
        ->merge($attributes->only('class'));

    $horizontalClasses = Ui::classes()
        ->add('h-px w-full shrink-0 border-0')
        ->add($colors)
        ->add(
            match ($variant) {
                'subtle' => '',
                default => '[[data-dropdown-menu]_&]:bg-gray-80 dark:[[data-dropdown-menu]_&]:bg-gray-740',
            },
        )
        ->merge($attributes->only('class'));

    $labelClasses = Ui::classes()->add('shrink-0 text-xs')->add('text-gray-500')->add('dark:text-gray-400');
@endphp

@if ($text)
    <div class="{{ $textClasses }}" {{ $attributes->except('class') }} data-divider>
        <span class="{{ $labelClasses }}">{{ $text }}</span>
    </div>
@elseif ($isVertical)
    <div class="{{ $verticalClasses }}" {{ $attributes->except('class') }} role="separator" aria-orientation="vertical"
        data-divider></div>
@else
    <hr class="{{ $horizontalClasses }}" {{ $attributes->except('class') }} data-divider />
@endif
