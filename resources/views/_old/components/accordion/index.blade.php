@props([
    'type' => 'multiple',
])

@php
    $classes = Ui::classes()->add('flex flex-col')->merge($attributes->only('class'));
@endphp

<div x-data="{ active: null }" x-on:accordion-toggle.stop="active = (active === $event.detail) ? null : $event.detail"
    class="{{ $classes }}" {{ $attributes->except('class') }} data-accordion data-type="{{ $type }}">
    {{ $slot }}
</div>
