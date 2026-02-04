@props([])

@php
    $classes = Ui::classes()
        ->add('flex flex-col')
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-list>
    {{ $slot }}
</div>
