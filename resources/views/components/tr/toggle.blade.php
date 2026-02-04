@props([
    'icon' => 'chevron-right',
    'icon:active' => 'chevron-down',
])

@php
    $iconActive = $__data['icon:active'] ?? 'chevron-down';
@endphp

<ui:toggle :icon="$icon" :icon:active="$iconActive" state="expanded" variant="ghost" size="sm"
    {{ $attributes }} />
