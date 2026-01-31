@props([])

@php
    $classes = Ui::classes()
        ->add('[[data-variant]:not([data-variant=simple])_&]:shadow-xs')
        ->add('[&_tr:first-child_td:first-child]:rounded-tl-lg')
        ->add('[&_tr:first-child_td:last-child]:rounded-tr-lg')
        ->add('[&_tr:last-child_td:first-child]:rounded-bl-lg')
        ->add('[&_tr:last-child_td:last-child]:rounded-br-lg')
        ->merge($attributes->only('class'));
@endphp

<tbody class="{{ $classes }}" {{ $attributes->except('class') }} data-tbody>
    {{ $slot }}
</tbody>
