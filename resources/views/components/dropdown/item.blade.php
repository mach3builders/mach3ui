@props([
    'active' => false,
    'href' => null,
    'icon' => null,
    'icon:end' => null,
    'label' => null,
    'route' => null,
    'type' => 'button',
    'variant' => 'default',
])

@php
    $iconEnd = $__data['icon:end'] ?? null;
    $iconSlot = $__laravel_slots['icon'] ?? null;
@endphp

<ui:nav.item :active="$active" :href="$href" :icon="$icon" :icon:end="$iconEnd"
    :label="$label" :route="$route" :type="$type" :variant="$variant" {{ $attributes }}
    data-dropdown-item>
    @if ($iconSlot)
        <x-slot:icon>{{ $iconSlot }}</x-slot:icon>
    @endif

    {{ $slot }}
</ui:nav.item>
