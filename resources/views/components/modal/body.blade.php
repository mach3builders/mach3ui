@props([])

@php
    $classes = Ui::classes()
        ->add('min-h-0 flex-1 overflow-y-auto px-6 py-4 text-sm')
        ->add('text-gray-980')
        ->add('dark:text-gray-100')
        ->add('[&:has([data-section])]:p-0 [&:has([data-section])]:px-2')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-modal-body>
    {{ $slot }}
</div>
