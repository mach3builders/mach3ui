@props([
    'active' => false,
    'danger' => false,
    'href' => null,
    'icon' => null,
    'iconTrailing' => null,
    'label' => null,
    'route' => null,
])

@php
    $iconSlot = $__laravel_slots['icon'] ?? null;
@endphp

<ui:nav.item :active="$active" :danger="$danger" :href="$href" :icon="$icon"
    :icon:end="$iconTrailing" :label="$label" :route="$route" role="menuitem"
    x-on:click="$dispatch('context-close')" {{ $attributes }} data-context-item>
    @if ($iconSlot)
        <x-slot:icon>{{ $iconSlot }}</x-slot:icon>
    @endif

    {{ $slot }}
</ui:nav.item>
