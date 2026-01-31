@props([])

@php
    $classes = Ui::classes()->add('font-semibold leading-6')->add('text-gray-900')->add('dark:text-white');
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>
