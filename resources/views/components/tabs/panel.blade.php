@props([
    'name' => null,
    'value' => null,
])

@php
    $store_name = $name ? "tabs_{$name}" : null;
@endphp

<div {{ $attributes }}
    x-show="{{ $store_name ? "Alpine.store('" . $store_name . "')?.active" : 'activeTab' }} === @js($value)"
    x-cloak>
    {{ $slot }}
</div>
