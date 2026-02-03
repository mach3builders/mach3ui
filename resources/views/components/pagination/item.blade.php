@props([
    'active' => false,
    'disabled' => false,
    'href' => null,
    'icon' => null,
    'page' => null,
])

@php
    $tag = $href ? 'a' : 'button';
    $isEllipsis = $slot->isNotEmpty() && trim($slot->toHtml()) === '...';

    $classes = Ui::classes()
        // Base
        ->add('inline-flex h-7 min-w-7 cursor-pointer items-center justify-center rounded-md px-2 text-xs font-medium')
        ->add('transition-colors duration-150')
        // Default state
        ->add('text-gray-500 dark:text-gray-400')
        // Hover (when not active/disabled)
        ->when(!$active && !$disabled, 'hover:bg-gray-50 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-gray-100')
        // Active state
        ->when($active, 'bg-gray-100 text-gray-900 dark:bg-gray-700 dark:text-white')
        // Disabled/ellipsis
        ->when($disabled || $isEllipsis, 'cursor-default pointer-events-none')
        ->when($disabled && !$isEllipsis, 'opacity-40')
        // Icon-only
        ->when($icon && $slot->isEmpty(), 'px-1')
        ->merge($attributes);
@endphp

<{{ $tag }}
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
    @if ($href)
        href="{{ $disabled ? '#' : $href }}"
        @if ($disabled)
            aria-disabled="true"
            tabindex="-1"
        @endif
    @else
        type="button"
        @if ($disabled) disabled @endif
    @endif
    @if ($active) aria-current="page" @endif
    data-pagination-item
    @if ($active) data-active @endif
>
    @if ($icon)
        <ui:icon :name="$icon" size="xs" />
    @endif
    {{ $slot }}
</{{ $tag }}>
