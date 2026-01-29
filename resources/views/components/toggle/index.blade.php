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
    $icon_active = $__data['icon:active'] ?? null;
    $icon_color = $__data['icon:color'] ?? null;
    $icon_color_active = $__data['icon:color:active'] ?? null;
    $label_active = $__data['label:active'] ?? null;

    $has_different_icon = $icon_active && $icon_active !== $icon;
    $has_different_label = $label_active && $label_active !== $label;
    $has_label = $label || $slot->isNotEmpty();

    $has_custom_handler = $attributes->has('wire:click') || $attributes->has('x-on:click');
    $state_var = $state ?? 'on';

    $icon_size = match ($size) {
        'xs', 'sm' => 'size-3.5',
        'lg' => 'size-5',
        default => 'size-4',
    };

    $color_classes = [
        'success' => 'text-green-500',
        'danger' => 'text-red-500',
        'warning' => 'text-amber-500',
        'info' => 'text-blue-500',
        'secondary' => 'text-gray-400',
    ];

    $icon_color_class = $icon_color ? $color_classes[$icon_color] ?? null : null;
    $icon_color_active_class = $icon_color_active ? $color_classes[$icon_color_active] ?? null : $icon_color_class;

    $span_classes = match ($size) {
        'xs', 'sm' => '[&>span]:inline-flex [&>span]:items-center [&>span]:gap-1.5',
        'lg' => '[&>span]:inline-flex [&>span]:items-center [&>span]:gap-2.5',
        default => '[&>span]:inline-flex [&>span]:items-center [&>span]:gap-2',
    };

    $x_data = $state ? null : '{ on: ' . ($active ? 'true' : 'false') . ' }';
    $click_handler = $has_custom_handler ? [] : ['x-on:click' => $state_var . ' = !' . $state_var];
@endphp

<ui:button :size="$size" :variant="$variant" :square="!$has_label" :class="$span_classes"
    :x-data="$x_data" {{ $attributes->merge($click_handler) }} data-toggle>
    @if ($icon)
        @if ($has_different_icon || $icon_color_active_class !== $icon_color_class)
            <ui:icon :name="$icon" @class([$icon_size, $icon_color_class]) x-show="!{{ $state_var }}" x-cloak />

            <ui:icon :name="$icon_active ?? $icon" @class([$icon_size, $icon_color_active_class]) x-show="{{ $state_var }}" x-cloak />
        @else
            <ui:icon :name="$icon" @class([$icon_size, $icon_color_class]) />
        @endif
    @endif

    @if ($label && $has_different_label)
        <span x-show="!{{ $state_var }}" x-cloak>{{ $label }}</span>

        <span x-show="{{ $state_var }}" x-cloak>{{ $label_active }}</span>
    @elseif ($label)
        {{ $label }}
    @endif

    {{ $slot }}
</ui:button>
