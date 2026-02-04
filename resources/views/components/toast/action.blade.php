@props([])

@php
    $classes = Ui::classes()
        ->add('mt-4 flex gap-2')
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-toast-action>
    {{ $slot }}
</div>
