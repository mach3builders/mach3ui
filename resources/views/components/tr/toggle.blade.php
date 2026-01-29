@props([
    'icon' => 'chevron-right',
    'icon:active' => 'chevron-down',
])

@php
    $icon_active = $__data['icon:active'] ?? 'chevron-down';
@endphp

<ui:toggle :icon="$icon" :icon:active="$icon_active" state="expanded" variant="ghost" size="sm"
    {{ $attributes }} />
