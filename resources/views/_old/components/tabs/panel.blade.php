@props([
    'name' => null,
    'value' => null,
])

<div
    {{ $attributes }}
    x-data
    x-show="Alpine.store('tabs_{{ $name }}').active === '{{ $value }}'"
>
    {{ $slot }}
</div>
