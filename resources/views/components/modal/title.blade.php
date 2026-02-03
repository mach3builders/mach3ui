@props([])

@php
    $classes = Ui::classes()
        ->add('text-lg font-semibold')
        ->add('text-gray-900 dark:text-white')
        ->merge($attributes);
@endphp

<h2 data-modal-title {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $slot }}
</h2>
