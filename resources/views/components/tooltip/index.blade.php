@props([
    'position' => 'top',
    'text',
])

@php
    $position_styles = [
        'top' => 'top: calc(anchor(top) - 0.5rem); left: anchor(center); translate: -50% -100%;',
        'top-start' => 'top: calc(anchor(top) - 0.5rem); left: anchor(left); translate: 0 -100%;',
        'top-end' => 'top: calc(anchor(top) - 0.5rem); left: anchor(right); translate: -100% -100%;',
        'bottom' => 'top: calc(anchor(bottom) + 0.5rem); left: anchor(center); translate: -50% 0;',
        'bottom-start' => 'top: calc(anchor(bottom) + 0.5rem); left: anchor(left); translate: 0 0;',
        'bottom-end' => 'top: calc(anchor(bottom) + 0.5rem); left: anchor(right); translate: -100% 0;',
        'left' => 'top: anchor(center); left: calc(anchor(left) - 0.5rem); translate: -100% -50%;',
        'right' => 'top: anchor(center); left: calc(anchor(right) + 0.5rem); translate: 0 -50%;',
    ];

    $arrow_position = [
        'top' => 'top: 100%; left: 50%; translate: -50% 0;',
        'top-start' => 'top: 100%; left: 1rem;',
        'top-end' => 'top: 100%; right: 1rem;',
        'bottom' => 'bottom: 100%; left: 50%; translate: -50% 0;',
        'bottom-start' => 'bottom: 100%; left: 1rem;',
        'bottom-end' => 'bottom: 100%; right: 1rem;',
        'left' => 'top: 50%; left: 100%; translate: 0 -50%;',
        'right' => 'top: 50%; right: 100%; translate: 0 -50%;',
    ];

    $arrow_classes = [
        'top' => 'border-4 border-transparent border-t-gray-900 dark:border-t-gray-100',
        'top-start' => 'border-4 border-transparent border-t-gray-900 dark:border-t-gray-100',
        'top-end' => 'border-4 border-transparent border-t-gray-900 dark:border-t-gray-100',
        'bottom' => 'border-4 border-transparent border-b-gray-900 dark:border-b-gray-100',
        'bottom-start' => 'border-4 border-transparent border-b-gray-900 dark:border-b-gray-100',
        'bottom-end' => 'border-4 border-transparent border-b-gray-900 dark:border-b-gray-100',
        'left' => 'border-4 border-transparent border-l-gray-900 dark:border-l-gray-100',
        'right' => 'border-4 border-transparent border-r-gray-900 dark:border-r-gray-100',
    ];
@endphp

<div
    {{ $attributes->class(['group/tooltip relative inline-block']) }}
    style="anchor-scope: --tooltip-trigger;"
    data-tooltip
>
    <span
        class="inline-block [anchor-name:--tooltip-trigger]"
    >
        {{ $slot }}
    </span>

    <div
        class="pointer-events-none absolute z-50 max-w-xs rounded-md bg-gray-900 px-3 py-1.5 text-xs font-medium whitespace-nowrap text-white opacity-0 transition-opacity duration-150 group-hover/tooltip:opacity-100 group-focus-within/tooltip:opacity-100 dark:bg-gray-100 dark:text-gray-900"
        style="position-anchor: --tooltip-trigger; {{ $position_styles[$position] }}"
    >
        {{ $text }}

        <span
            class="absolute block {{ $arrow_classes[$position] }}"
            style="{{ $arrow_position[$position] }}"
        ></span>
    </div>
</div>
