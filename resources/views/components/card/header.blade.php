@props([
    'padTop' => false,
    'icon' => null,
    'icon:slot' => null,
    'icon:boxed' => false,
    'icon:color' => 'gray',
    'icon:size' => 'md',
    'hasDescription' => true,
])

@php
    $icon_slot = $__data['icon:slot'] ?? null;
    $icon_boxed = $__data['icon:boxed'] ?? false;
    $icon_color = $__data['icon:color'] ?? 'gray';
    $icon_size = $__data['icon:size'] ?? 'md';

    $has_action = isset($action);
    $has_icon = $icon_slot || $icon;
@endphp

<div
    {{ $attributes->class([
        'flex gap-3 px-4.5 pb-5',
        'pt-4' => $padTop,
        'pt-5' => !$padTop,
        'relative' => $has_action,
    ]) }}>
    @if ($has_icon)
        <div class="shrink-0">
            @if ($icon_slot)
                {{ $icon_slot }}
            @else
                <ui:icon :name="$icon" :boxed="$icon_boxed" :color="$icon_color" :size="$icon_size" />
            @endif
        </div>
    @endif

    <div @class([
        'flex flex-1 flex-col gap-1.5',
        'min-w-0' => $has_icon,
        'justify-center' => !$hasDescription,
    ])>
        {{ $slot }}
    </div>

    @if ($has_action)
        <div class="absolute right-3 top-4">
            {{ $action }}
        </div>
    @endif
</div>
