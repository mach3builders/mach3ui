@props([])

@php
    $classes = Ui::classes()
        ->add('font-semibold leading-6 text-gray-900 dark:text-white')
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-toast-title>
    {{ $slot }}
</div>
