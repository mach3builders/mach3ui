@props([])

@php
    $classes = Ui::classes()
        ->add('text-xl font-medium')
        ->add('text-gray-900')
        ->add('dark:text-white')
        ->merge($attributes->only('class'));
@endphp

<h2 class="{{ $classes }}" {{ $attributes->except('class') }} data-modal-title>
    {{ $slot }}
</h2>
