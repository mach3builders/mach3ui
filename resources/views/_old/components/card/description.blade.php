@props([])

@php
    $classes = Ui::classes()->add('text-gray-500')->add('dark:text-gray-400')->merge($attributes->only('class'));
@endphp

<p class="{{ $classes }}" {{ $attributes->except('class') }} data-card-description>
    {{ $slot }}
</p>
