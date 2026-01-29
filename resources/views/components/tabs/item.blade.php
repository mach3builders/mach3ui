@props([
    'active' => false,
    'disabled' => false,
    'icon' => null,
    'label' => null,
    'route' => null,
    'value' => null,
])

@php
    $is_active = $route ? request()->routeIs($route) : $active;
    $href = $route ? route($route) : null;

    $base_classes = [
        'relative z-10 -mb-px inline-flex cursor-pointer items-center justify-center font-medium',
        '[&>svg]:shrink-0 [&>svg]:size-4',
        // before: hover background
        "before:absolute before:inset-x-2 before:rounded-md before:content-['']",
        // after: active indicator
        "after:absolute after:transition-all after:content-['']",
    ];

    $size_classes = [
        '[[data-size=md]_&]:h-10 [[data-size=md]_&]:gap-2 [[data-size=md]_&]:px-4 [[data-size=md]_&]:text-sm',
        '[[data-size=md]_&]:before:h-6',
        '[[data-size=sm]_&]:h-8 [[data-size=sm]_&]:gap-1.5 [[data-size=sm]_&]:px-3 [[data-size=sm]_&]:text-xs',
        '[[data-size=sm]_&]:before:h-5',
    ];

    $default_classes = [
        // Text & icon colors
        'text-gray-500 hover:text-gray-700 [&>svg]:text-gray-400',
        'hover:[&>svg]:text-gray-500',
        'dark:text-gray-400 dark:hover:text-gray-200 [&>svg]:dark:text-gray-500',
        'dark:hover:[&>svg]:text-gray-400',
        // before: hover bg (hidden on active)
        'hover:not-[[data-active]]:before:bg-gray-400/10',
        // after: blue bottom border
        'after:inset-x-0 after:bottom-0 after:h-0.5 after:scale-x-0 after:bg-blue-500 dark:after:bg-blue-600',
        '[&[data-active]]:after:scale-x-100',
    ];

    $active_classes = [
        '[&[data-active]]:text-gray-900 [&[data-active]>svg]:text-gray-500',
        '[&[data-active]]:dark:text-gray-100 [&[data-active]>svg]:dark:text-gray-400',
    ];

    $boxed_classes = [
        '[[data-variant=boxed]_&]:mb-0 [[data-variant=boxed]_&]:rounded-md',
        // before: hover bg (full size for boxed)
        '[[data-variant=boxed]_&]:before:inset-0 [[data-variant=boxed]_&]:before:h-auto',
        // after: active background (no transition for boxed)
        '[[data-variant=boxed]_&]:after:inset-0 [[data-variant=boxed]_&]:after:h-auto [[data-variant=boxed]_&]:after:-z-10 [[data-variant=boxed]_&]:after:rounded-md',
        '[[data-variant=boxed]_&]:after:scale-x-100 [[data-variant=boxed]_&]:after:transition-none [[data-variant=boxed]_&]:after:opacity-0',
        '[[data-variant=boxed]_&]:after:bg-white [[data-variant=boxed]_&]:after:shadow-sm',
        '[[data-variant=boxed]_&]:dark:after:bg-gray-760',
        '[[data-variant=boxed]_&[data-active]]:after:opacity-100',
        // Size-specific padding
        '[[data-variant=boxed][data-size=md]_&]:h-10 [[data-variant=boxed][data-size=md]_&]:px-3',
        '[[data-variant=boxed][data-size=sm]_&]:h-8 [[data-variant=boxed][data-size=sm]_&]:px-2.5',
        // Text colors
        '[[data-variant=boxed]_&]:text-gray-600 [[data-variant=boxed]_&]:hover:text-gray-900 [[data-variant=boxed]_&[data-active]]:text-gray-900',
        '[[data-variant=boxed]_&]:dark:text-gray-400 [[data-variant=boxed]_&]:dark:hover:text-gray-100 [[data-variant=boxed]_&[data-active]]:dark:text-gray-100',
    ];
@endphp

@if ($route)
    <a {{ $attributes->class([
        ...$base_classes,
        ...$size_classes,
        ...$default_classes,
        ...$active_classes,
        ...$boxed_classes,
    ]) }}
        href="{{ $href }}" data-tabs-item @if ($is_active) data-active @endif>
        @if ($icon)
            <ui:icon :name="$icon" />
        @endif

        {{ $label ?? $slot }}
    </a>
@else
    <button
        {{ $attributes->class([
            ...$base_classes,
            ...$size_classes,
            ...$default_classes,
            ...$active_classes,
            ...$boxed_classes,
            'disabled:pointer-events-none disabled:opacity-50',
        ]) }}
        type="button" data-tabs-item
        @if ($value) x-on:click="activeTab = @js($value)"
            :data-active="activeTab === @js($value)"
        @else
            x-on:click="$el.dataset.active = true; $el.closest('[data-tabs]').querySelectorAll('[data-tabs-item]').forEach(t => t !== $el && delete t.dataset.active)"
            @if ($active) data-active @endif
        @endif
        @if ($disabled) disabled @endif
        >
        @if ($icon)
            <ui:icon :name="$icon" />
        @endif

        {{ $label ?? $slot }}
    </button>
@endif
