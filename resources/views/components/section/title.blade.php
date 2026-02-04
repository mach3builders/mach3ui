@props([])

@php
    $classes = Ui::classes()
        ->add('text-base font-semibold text-gray-900 dark:text-white')
        ->merge($attributes);
@endphp

<h3 {{ $attributes->except('class') }} class="{{ $classes }}" data-section-title>
    {{ $slot }}
</h3>
