@props([
    'position' => 'top',
    'text',
])

@php
    // Normalize position
    $validPositions = ['top', 'top-start', 'top-end', 'bottom', 'bottom-start', 'bottom-end', 'left', 'right'];
    $position = in_array($position, $validPositions) ? $position : 'top';
    $baseDirection = explode('-', $position)[0];

    // Position styles (CSS anchor positioning)
    $positionStyles = [
        'top' => 'top: calc(anchor(top) - 0.5rem); left: anchor(center); translate: -50% -100%;',
        'top-start' => 'top: calc(anchor(top) - 0.5rem); left: anchor(left); translate: 0 -100%;',
        'top-end' => 'top: calc(anchor(top) - 0.5rem); left: anchor(right); translate: -100% -100%;',
        'bottom' => 'top: calc(anchor(bottom) + 0.5rem); left: anchor(center); translate: -50% 0;',
        'bottom-start' => 'top: calc(anchor(bottom) + 0.5rem); left: anchor(left); translate: 0 0;',
        'bottom-end' => 'top: calc(anchor(bottom) + 0.5rem); left: anchor(right); translate: -100% 0;',
        'left' => 'top: anchor(center); left: calc(anchor(left) - 0.5rem); translate: -100% -50%;',
        'right' => 'top: anchor(center); left: calc(anchor(right) + 0.5rem); translate: 0 -50%;',
    ];

    // Arrow config (based on base direction only)
    $arrowPositions = [
        'top' => 'top: 100%; left: 50%; translate: -50% 0;',
        'top-start' => 'top: 100%; left: 1rem;',
        'top-end' => 'top: 100%; right: 1rem;',
        'bottom' => 'bottom: 100%; left: 50%; translate: -50% 0;',
        'bottom-start' => 'bottom: 100%; left: 1rem;',
        'bottom-end' => 'bottom: 100%; right: 1rem;',
        'left' => 'top: 50%; left: 100%; translate: 0 -50%;',
        'right' => 'top: 50%; right: 100%; translate: 0 -50%;',
    ];

    $arrowBorders = [
        'top' => 'border-t-gray-900 dark:border-t-gray-100',
        'bottom' => 'border-b-gray-900 dark:border-b-gray-100',
        'left' => 'border-l-gray-900 dark:border-l-gray-100',
        'right' => 'border-r-gray-900 dark:border-r-gray-100',
    ];

    // Classes
    $classes = Ui::classes()->add('group/tooltip relative inline-block')->merge($attributes->only('class'));

    $contentClasses = Ui::classes()
        ->add('pointer-events-none absolute z-50 max-w-xs rounded-md px-3 py-1.5 text-xs font-medium whitespace-nowrap')
        ->add('bg-gray-900 text-white')
        ->add('dark:bg-gray-100 dark:text-gray-900')
        ->add(
            'opacity-0 transition-opacity duration-150 group-hover/tooltip:opacity-100 group-focus-within/tooltip:opacity-100',
        );

    $arrowClasses = Ui::classes()
        ->add('absolute block border-4 border-transparent')
        ->add($arrowBorders[$baseDirection]);
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} style="anchor-scope: --tooltip-trigger;" data-tooltip>
    <span class="inline-block [anchor-name:--tooltip-trigger]" data-tooltip-trigger>
        {{ $slot }}
    </span>

    <div class="{{ $contentClasses }}" style="position-anchor: --tooltip-trigger; {{ $positionStyles[$position] }}"
        data-tooltip-content>
        {{ $text }}
        <span class="{{ $arrowClasses }}" style="{{ $arrowPositions[$position] }}" data-tooltip-arrow></span>
    </div>
</div>
