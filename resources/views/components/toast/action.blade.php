@props([])

@php
    $classes = Ui::classes()->add('mt-4 flex gap-2');
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>
