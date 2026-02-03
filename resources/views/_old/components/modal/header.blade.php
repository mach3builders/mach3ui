@props([])

@php
    $classes = Ui::classes()
        ->add('relative flex shrink-0 items-center justify-between gap-4 px-6 py-4')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-modal-header>
    {{ $slot }}
</div>
