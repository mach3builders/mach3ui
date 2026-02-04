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
        x-data="Alpine.store('tabs_{{ $name }}', { active: '{{ $default }}' }) && {
            init() {
                if (!$store['tabs_{{ $name }}'].active) {
                    $store['tabs_{{ $name }}'].active = $el.querySelector('[data-tabs-tab]')?.dataset.value;
                }
            }
        }"
    @else
        x-data="{
            active: '{{ $default }}',
            init() {
                if (!this.active) {
                    this.active = this.$el.querySelector('[data-tabs-tab]')?.dataset.value;
                }
            },
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
