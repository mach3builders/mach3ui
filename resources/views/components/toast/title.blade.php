@props([])

@php
    $classes = Ui::classes()
        ->add('font-semibold leading-6')
        ->add('text-gray-900')
        ->add('dark:text-white')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-toast-title>
    {{ $slot }}
</div>
