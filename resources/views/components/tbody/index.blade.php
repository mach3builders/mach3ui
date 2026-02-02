@props([])

@php
    $classes = Ui::classes()
        ->add('[[data-table]:not([data-variant=simple])_&]:shadow-xs')
        ->merge($attributes->only('class'));
@endphp

<tbody class="{{ $classes }}" {{ $attributes->except('class') }} data-tbody>
    {{ $slot }}
</tbody>
