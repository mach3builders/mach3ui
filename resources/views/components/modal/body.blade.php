@props([])

@php
    $classes = Ui::classes()
        ->add('min-h-0 flex-1 overflow-y-auto px-6 py-4 text-sm')
        ->add('text-gray-900 dark:text-gray-100')
        ->merge($attributes);
@endphp

<div data-modal-body {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $slot }}
</div>
