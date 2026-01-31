@props([])

@php
    $classes = Ui::classes()->merge($attributes->only('class'));
@endphp

<thead class="{{ $classes }}" {{ $attributes->except('class') }} data-thead>
    {{ $slot }}
</thead>
