@props([
    'icon' => null,
    'icon:boxed' => false,
    'icon:color' => 'gray',
    'icon:size' => 'md',
])

@php
    // Boolean attrs without value come as empty string or true
    $iconBoxed = isset($__data['icon:boxed']) && $__data['icon:boxed'] !== false;
    $iconColor = $__data['icon:color'] ?? 'gray';
    $iconSize = $__data['icon:size'] ?? 'md';

    $iconSlot = $__laravel_slots['icon'] ?? null;
    $actionSlot = $__laravel_slots['action'] ?? null;

    $hasIcon = $iconSlot || $icon;
    $hasAction = $actionSlot !== null;

    $classes = Ui::classes()->add('flex gap-3 px-4.5 pb-5 pt-5')->when($hasAction, 'relative')->merge($attributes);

    $contentClasses = Ui::classes()->add('flex flex-1 flex-col gap-1.5')->when($hasIcon, 'min-w-0');
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-card-header>
    @if ($hasIcon)
        <div class="shrink-0">
            @if ($iconSlot)
                {{ $iconSlot }}
            @else
                <ui:icon :name="$icon" :boxed="$iconBoxed" :color="$iconColor" :size="$iconSize" />
            @endif
        </div>
    @endif

    <div class="{{ $contentClasses }}">
        {{ $slot }}
    </div>

    @if ($hasAction)
        <div class="absolute right-3 top-4">
            {{ $actionSlot }}
        </div>
    @endif
</div>
