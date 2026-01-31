@props([
    'type' => 'multiple',
])

@php
    $classes = Ui::classes()->add('flex flex-col');
@endphp

<div x-data="{ active: null }" x-on:accordion-toggle.stop="active = (active === $event.detail) ? null : $event.detail"
    {{ $attributes->class($classes) }} data-accordion data-type="{{ $type }}">
    {{ $slot }}
</div>
