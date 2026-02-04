@props([
    'title' => null,
])

@php
    $classes = Ui::classes()
        ->add('px-3 pt-2 pb-3 border-b text-xs font-semibold')
        ->add('text-gray-980 border-gray-100')
        ->add('dark:text-gray-100 dark:border-gray-700')
        ->merge($attributes);
@endphp

<div data-dropdown-header {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $title ?? $slot }}
</div>
