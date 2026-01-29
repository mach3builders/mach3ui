@props([
    'active' => false,
    'href' => null,
    'icon' => null,
    'icon:end' => null,
    'label' => null,
    'route' => null,
    'variant' => 'default',
])

@php
    $icon_slot = $__laravel_slots['icon'] ?? null;
@endphp

<ui:nav.item
    :active="$active"
    :href="$href"
    :icon="$icon"
    :icon:end="$__data['icon:end'] ?? null"
    :label="$label"
    :route="$route"
    :variant="$variant"
    {{ $attributes }}
>
    @if ($icon_slot)
        <x-slot:icon>{{ $icon_slot }}</x-slot:icon>
    @endif

    {{ $slot }}
</ui:nav.item>
