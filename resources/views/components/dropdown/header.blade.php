@props([
    'title' => null,
])

@php
    $classes = Ui::classes()
        ->add('px-3 py-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500')
        ->merge($attributes);
@endphp

<div data-dropdown-header {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $title ?? $slot }}
</div>
