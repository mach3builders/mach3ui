@props([])

@php
    $classes = Ui::classes()
        ->add('text-sm text-gray-500 dark:text-gray-400')
        ->merge($attributes);
@endphp

<p {{ $attributes->except('class') }} class="{{ $classes }}" data-card-description>
    {{ $slot }}
</p>
