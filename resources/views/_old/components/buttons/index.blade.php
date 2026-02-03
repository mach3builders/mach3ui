@props([])

@php
    $classes = Ui::classes()
        ->add('flex flex-col flex-wrap gap-2 lg:flex-row lg:items-center')
        ->add('*:w-full lg:*:w-auto')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-buttons>
    {{ $slot }}
</div>
