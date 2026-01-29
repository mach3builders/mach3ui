@props([
    'default' => null,
    'name' => null,
    'size' => 'md',
    'variant' => 'default',
])

@php
    $store_name = $name ? "tabs_{$name}" : null;
@endphp

<div {{ $attributes->class([
    'relative inline-flex items-center gap-1',
    'border-b border-gray-60' => $variant === 'default',
    'rounded-lg border border-gray-60 bg-gray-30 p-1' => $variant === 'boxed',
    'dark:border-gray-740' => $variant === 'default',
    'dark:border-gray-770 dark:bg-gray-820' => $variant === 'boxed',
]) }}
    data-tabs="{{ $name }}" data-variant="{{ $variant }}" data-size="{{ $size }}"
    x-data="{
        activeTab: @js($default),
        init() {
            @if ($store_name) Alpine.store(@js($store_name), { active: this.activeTab });
                this.$watch('activeTab', value => Alpine.store(@js($store_name)).active = value); @endif
        }
    }" x-modelable="activeTab">
    {{ $slot }}
</div>
