@props([])

@php
    $classes = Ui::classes()
        ->add('flex shrink-0 items-center justify-end gap-4 px-6 py-4')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-modal-footer>
    {{ $slot }}
</div>
