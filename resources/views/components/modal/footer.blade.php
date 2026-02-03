@props([])

@php
    $classes = Ui::classes()
        ->add('flex shrink-0 items-center justify-end gap-3 px-6 py-4')
        ->merge($attributes);
@endphp

<div data-modal-footer {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $slot }}
</div>
