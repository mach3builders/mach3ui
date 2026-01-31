@props([])

@php
    $classes = Ui::classes()->add('w-full flex-none')->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-carousel-item>
    {{ $slot }}
</div>
