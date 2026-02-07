@props([
    'position' => 'top',
    'text',
])

@php
    $id = Ui::uniqueId('tooltip');
    $anchor = "--{$id}";
    $offset = '0.5rem';

    // Normalize position
    $validPositions = ['top', 'top-start', 'top-end', 'bottom', 'bottom-start', 'bottom-end', 'left', 'right'];
    $position = in_array($position, $validPositions) ? $position : 'top';

    // Position styles (CSS anchor positioning with fixed for top layer)
    $positionStyles = [
        'top' => "position-anchor: {$anchor}; inset: auto; top: calc(anchor(top) - {$offset}); left: anchor(center); translate: -50% -100%;",
        'top-start' => "position-anchor: {$anchor}; inset: auto; top: calc(anchor(top) - {$offset}); left: anchor(left); translate: 0 -100%;",
        'top-end' => "position-anchor: {$anchor}; inset: auto; top: calc(anchor(top) - {$offset}); left: anchor(right); translate: -100% -100%;",
        'bottom' => "position-anchor: {$anchor}; inset: auto; top: calc(anchor(bottom) + {$offset}); left: anchor(center); translate: -50% 0;",
        'bottom-start' => "position-anchor: {$anchor}; inset: auto; top: calc(anchor(bottom) + {$offset}); left: anchor(left); translate: 0 0;",
        'bottom-end' => "position-anchor: {$anchor}; inset: auto; top: calc(anchor(bottom) + {$offset}); left: anchor(right); translate: -100% 0;",
        'left' => "position-anchor: {$anchor}; inset: auto; top: anchor(center); left: calc(anchor(left) - {$offset}); translate: -100% -50%;",
        'right' => "position-anchor: {$anchor}; inset: auto; top: anchor(center); left: calc(anchor(right) + {$offset}); translate: 0 -50%;",
    ];

    // Classes
    $classes = Ui::classes()->add('inline-block')->merge($attributes->only('class'));

    $contentClasses = Ui::classes()
        ->add('pointer-events-none fixed m-0 max-w-xs rounded-md px-3 py-1.5 text-xs font-medium whitespace-nowrap')
        ->add('bg-gray-900 text-white')
        ->add('dark:bg-gray-100 dark:text-gray-900')
        ->add('opacity-0 transition-opacity duration-150');
@endphp

<span class="{{ $classes }}" {{ $attributes->except('class') }}
    x-data="{ show: false }"
    x-on:mouseenter="$refs.tooltip.showPopover(); show = true"
    x-on:mouseleave="show = false; $refs.tooltip.hidePopover()"
    x-on:focus.in="$refs.tooltip.showPopover(); show = true"
    x-on:blur.in="show = false; $refs.tooltip.hidePopover()"
    data-tooltip>
    <span class="inline-block" style="anchor-name: {{ $anchor }};" data-tooltip-trigger>
        {{ $slot }}
    </span>

    <div x-ref="tooltip" popover="manual" class="{{ $contentClasses }}"
        x-bind:class="show && 'opacity-100'"
        style="{{ $positionStyles[$position] }}" data-tooltip-content>
        {{ $text }}
    </div>
</span>
