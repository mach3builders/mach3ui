@props([
    'default' => null,
    'size' => 'md',
    'variant' => 'default',
])

@php
    $classes = Ui::classes()->merge($attributes);
@endphp

<div
    x-data="{
        active: '{{ $default }}',
        select(value) {
            this.active = value
        },
        isActive(value) {
            return this.active === value
        }
    }"
    data-tabs
    data-variant="{{ $variant }}"
    data-size="{{ $size }}"
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
>
    {{ $slot }}
</div>
