@props([])

@php
    $classes = Ui::classes()->add('text-gray-600')->add('dark:text-gray-300')->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-toast-description>
    {{ $slot }}
</div>
