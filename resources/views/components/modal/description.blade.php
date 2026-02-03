@props([])

@php
    $classes = Ui::classes()
        ->add('mt-1 text-sm')
        ->add('text-gray-500 dark:text-gray-400')
        ->merge($attributes);
@endphp

<p data-modal-description {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $slot }}
</p>
