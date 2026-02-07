@props([
    'cols' => 2,
])

@php
    $classes = Ui::classes()
        ->add('grid gap-x-4 gap-y-6')
        ->add($cols, [
            2 => 'sm:grid-cols-2',
            3 => 'sm:grid-cols-2 lg:grid-cols-3',
            4 => 'sm:grid-cols-2 lg:grid-cols-4',
        ])
        // Reset mt-6 on child fields — grid gap handles spacing
        ->add('[&>[data-field]+[data-field]]:mt-0')
        // Participate in field-spacing system as sibling of other fields
        ->add('[[data-field]+&]:mt-6')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-fields>
    {{ $slot }}
</div>
