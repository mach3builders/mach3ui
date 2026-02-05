@blaze

@props([])

@php
    $classes = Ui::classes()
        ->add('text-lg font-semibold leading-none tracking-tight text-gray-900 dark:text-white')
        ->merge($attributes);
@endphp

<h3 {{ $attributes->except('class') }} class="{{ $classes }}" data-card-title>
    {{ $slot }}
</h3>
