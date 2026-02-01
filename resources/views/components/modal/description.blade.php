@props([])

@php
    $classes = Ui::classes()
        ->add('mt-1 text-sm')
        ->add('text-gray-500')
        ->add('dark:text-gray-400')
        ->merge($attributes->only('class'));
@endphp

<p class="{{ $classes }}" {{ $attributes->except('class') }} data-modal-description>
    {{ $slot }}
</p>
