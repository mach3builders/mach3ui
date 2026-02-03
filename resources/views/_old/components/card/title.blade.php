@props([])

@php
    $classes = Ui::classes()
        ->add('text-lg font-semibold leading-none tracking-tight')
        ->merge($attributes->only('class'));
@endphp

<h3 class="{{ $classes }}" {{ $attributes->except('class') }} data-card-title>
    {{ $slot }}
</h3>
