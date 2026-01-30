@props([
    'type' => 'multiple',
])

@php
    $classes = Ui::classes()->add('flex flex-col');
@endphp

<div {{ $attributes->class($classes) }} data-accordion data-type="{{ $type }}">
    {{ $slot }}
</div>
