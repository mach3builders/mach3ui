@props([
    'default' => null,
    'name' => null,
    'size' => 'md',
    'variant' => 'default',
])

@php
    $classes = Ui::classes()->merge($attributes);
@endphp

<div
    @if ($name)
        x-data
        x-init="Alpine.store('tabs_{{ $name }}', { active: '{{ $default }}' })"
    @else
        x-data="{
            active: '{{ $default }}',
            select(value) {
                this.active = value
            },
            isActive(value) {
                return this.active === value
            }
        }"
    @endif
    data-tabs
    data-tabs-name="{{ $name }}"
    data-variant="{{ $variant }}"
    data-size="{{ $size }}"
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
>
    {{ $slot }}
</div>
