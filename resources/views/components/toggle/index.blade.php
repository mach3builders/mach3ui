@blaze

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
    $hasLabel = $label || $labelActive || $slot->isNotEmpty();
    $needsIconSwap = $iconActive && $iconActive !== $icon;
    $needsColorSwap = $iconColorActive !== $iconColor;
    $needsLabelSwap = $labelActive && $labelActive !== $label;
    $needsDualIcons = $needsIconSwap || $needsColorSwap;

    // Alpine config
    // If 'state' is provided, use external Alpine variable (e.g., from parent x-data)
    // Otherwise, create local state with variable 'on'
    $alpineVar = $state ?? 'on';
    $hasExternalHandler =
        $attributes->has('wire:click') || $attributes->has('x-on:click') || $attributes->has('@click');
    $xData = $state ? null : "{ $alpineVar: " . ($active ? 'true' : 'false') . ' }';
    $clickHandler = $hasExternalHandler ? [] : ['x-on:click' => "$alpineVar = !$alpineVar"];
@endphp

<ui:button :size="$size" :variant="$variant" :square="!$hasLabel" :x-data="$xData"
    :aria-pressed="$state ? null : ($active ? 'true' : 'false')" x-bind:aria-pressed="{{ $alpineVar }}.toString()"
    x-bind:data-active="{{ $alpineVar }}" {{ $attributes->merge($clickHandler) }} data-toggle>
    <span class="inline-flex items-center gap-2">
        @if ($icon)
            @if ($needsDualIcons)
                <ui:icon :name="$icon" :color="$iconColor" x-show="!{{ $alpineVar }}" x-cloak />
                <ui:icon :name="$iconActive ?? $icon" :color="$iconColorActive" x-show="{{ $alpineVar }}" x-cloak />
            @else
                <ui:icon :name="$icon" :color="$iconColor" />
            @endif
        @endif

        @if ($needsLabelSwap)
            <span x-show="!{{ $alpineVar }}" x-cloak>{{ $label }}</span>
            <span x-show="{{ $alpineVar }}" x-cloak>{{ $labelActive }}</span>
        @elseif ($label)
            <span>{{ $label }}</span>
        @endif

        {{ $slot }}
    </span>
</ui:button>
