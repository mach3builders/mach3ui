@props([])

@php
    $classes = Ui::classes()->add('mt-4 flex gap-2')->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-toast-action>
    {{ $slot }}
</div>
