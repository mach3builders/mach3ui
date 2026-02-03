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
    // Colon props
    $iconActive = $__data['icon:active'] ?? null;
    $iconColor = $__data['icon:color'] ?? null;
    $iconColorActive = $__data['icon:color:active'] ?? $iconColor;
    $labelActive = $__data['label:active'] ?? null;

    // Computed state
    $hasLabel = $label || $slot->isNotEmpty();
    $needsIconSwap = $iconActive && $iconActive !== $icon;
    $needsColorSwap = $iconColorActive !== $iconColor;
    $needsLabelSwap = $labelActive && $labelActive !== $label;
    $needsDualIcons = $needsIconSwap || $needsColorSwap;

    // Alpine config
    $alpineVar = $state ?? 'on';
    $hasExternalHandler = $attributes->has('wire:click') || $attributes->has('x-on:click');
    $xData = $state ? null : "{ $alpineVar: " . ($active ? 'true' : 'false') . ' }';
    $clickHandler = $hasExternalHandler ? [] : ['x-on:click' => "$alpineVar = !$alpineVar"];

    // Size mappings
    $iconSize = match ($size) {
        'xs', 'sm' => 'size-3.5',
        'lg' => 'size-5',
        default => 'size-4',
    };

    $spanGap = match ($size) {
        'xs', 'sm' => '[&>span]:gap-1.5',
        'lg' => '[&>span]:gap-2.5',
        default => '[&>span]:gap-2',
    };

    // Color mapping
    $colors = [
        'success' => 'text-green-500',
        'danger' => 'text-red-500',
        'warning' => 'text-amber-500',
        'info' => 'text-blue-500',
        'secondary' => 'text-gray-400',
    ];

    // Classes
    $buttonClasses = Ui::classes()->add('[&>span]:inline-flex [&>span]:items-center')->add($spanGap);

    $iconClasses = Ui::classes()
        ->add($iconSize)
        ->when($iconColor, $colors[$iconColor] ?? '');

    $iconActiveClasses = Ui::classes()
        ->add($iconSize)
        ->when($iconColorActive, $colors[$iconColorActive] ?? '');
@endphp

<ui:button :size="$size" :variant="$variant" :square="!$hasLabel" :class="$buttonClasses"
    :x-data="$xData" {{ $attributes->merge($clickHandler) }} data-toggle>
    @if ($icon)
        @if ($needsDualIcons)
            <ui:icon :name="$icon" :class="$iconClasses" x-show="!{{ $alpineVar }}" x-cloak />
            <ui:icon :name="$iconActive ?? $icon" :class="$iconActiveClasses" x-show="{{ $alpineVar }}" x-cloak />
        @else
            <ui:icon :name="$icon" :class="$iconClasses" />
        @endif
    @endif

    @if ($needsLabelSwap)
        <span x-show="!{{ $alpineVar }}" x-cloak>{{ $label }}</span>
        <span x-show="{{ $alpineVar }}" x-cloak>{{ $labelActive }}</span>
    @elseif ($label)
        {{ $label }}
    @endif

    {{ $slot }}
</ui:button>
