@props([
    'active' => false,
    'icon' => null,
    'icon:active' => null,
    'icon:color' => null,
    'icon:color:active' => null,
    'label' => null,
    'label:active' => null,
    'size' => 'md',
    'state' => null,
    'variant' => 'default',
])

@php
    $iconActive = $__data['icon:active'] ?? null;
    $iconColor = $__data['icon:color'] ?? null;
    $iconColorActive = $__data['icon:color:active'] ?? null;
    $labelActive = $__data['label:active'] ?? null;

    $hasDifferentIcon = $iconActive && $iconActive !== $icon;
    $hasDifferentLabel = $labelActive && $labelActive !== $label;
    $hasLabel = $label || $slot->isNotEmpty();

    $hasCustomHandler = $attributes->has('wire:click') || $attributes->has('x-on:click');
    $stateVar = $state ?? 'on';

    $iconSizeClass = match ($size) {
        'xs', 'sm' => 'size-3.5',
        'lg' => 'size-5',
        default => 'size-4',
    };

    $colorClasses = [
        'success' => 'text-green-500',
        'danger' => 'text-red-500',
        'warning' => 'text-amber-500',
        'info' => 'text-blue-500',
        'secondary' => 'text-gray-400',
    ];

    $iconColorClass = $iconColor ? $colorClasses[$iconColor] ?? null : null;
    $iconColorActiveClass = $iconColorActive ? $colorClasses[$iconColorActive] ?? null : $iconColorClass;

    $spanClasses = match ($size) {
        'xs', 'sm' => '[&>span]:inline-flex [&>span]:items-center [&>span]:gap-1.5',
        'lg' => '[&>span]:inline-flex [&>span]:items-center [&>span]:gap-2.5',
        default => '[&>span]:inline-flex [&>span]:items-center [&>span]:gap-2',
    };

    $iconClasses = Ui::classes()->add($iconSizeClass)->add($iconColorClass);
    $iconActiveClasses = Ui::classes()->add($iconSizeClass)->add($iconColorActiveClass);

    $xData = $state ? null : '{ on: ' . ($active ? 'true' : 'false') . ' }';
    $clickHandler = $hasCustomHandler ? [] : ['x-on:click' => $stateVar . ' = !' . $stateVar];
@endphp

<ui:button :size="$size" :variant="$variant" :square="!$hasLabel" :class="$spanClasses"
    :x-data="$xData" {{ $attributes->merge($clickHandler) }} data-toggle>
    @if ($icon)
        @if ($hasDifferentIcon || $iconColorActiveClass !== $iconColorClass)
            <ui:icon :name="$icon" :class="$iconClasses" x-show="!{{ $stateVar }}" x-cloak />

            <ui:icon :name="$iconActive ?? $icon" :class="$iconActiveClasses" x-show="{{ $stateVar }}" x-cloak />
        @else
            <ui:icon :name="$icon" :class="$iconClasses" />
        @endif
    @endif

    @if ($label && $hasDifferentLabel)
        <span x-show="!{{ $stateVar }}" x-cloak>{{ $label }}</span>

        <span x-show="{{ $stateVar }}" x-cloak>{{ $labelActive }}</span>
    @elseif ($label)
        {{ $label }}
    @endif

    {{ $slot }}
</ui:button>
