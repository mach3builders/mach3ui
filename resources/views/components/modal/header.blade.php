@props([])

@php
    $classes = Ui::classes()
        ->add('relative flex shrink-0 items-center justify-between gap-4 px-6 py-4')
        ->merge($attributes);
@endphp

<div data-modal-header {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $slot }}
</div>
