@props([])

@php
    $classes = Ui::classes()->add('text-gray-600')->add('dark:text-gray-300');
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>
