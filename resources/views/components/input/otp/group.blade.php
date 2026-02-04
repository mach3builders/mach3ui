@props([])

@php
    $classes = Ui::classes()->add('flex items-center')->merge($attributes->only('class'));
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-input-otp-group>
    {{ $slot }}
</div>
