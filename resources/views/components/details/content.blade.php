@props([])

@php
    $classes = Ui::classes()
        ->add('border-t px-4 py-4')
        ->add('border-gray-100')
        ->add('dark:border-gray-740')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-details-content>
    {{ $slot }}
</div>
