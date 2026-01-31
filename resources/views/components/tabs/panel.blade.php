@props([
    'name' => null,
    'value' => null,
])

@php
    $storeName = $name ? "tabs_{$name}" : null;
@endphp

<div {{ $attributes }}
    x-show="{{ $storeName ? "Alpine.store('" . $storeName . "')?.active" : 'activeTab' }} === @js($value)"
    x-cloak>
    {{ $slot }}
</div>
