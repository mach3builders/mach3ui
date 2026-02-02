@props([])

@php
    $classes = Ui::classes()->add('flex flex-col gap-3')->merge($attributes->only('class'));
@endphp

<dl class="{{ $classes }}" {{ $attributes->except('class') }} data-definition-list>
    {{ $slot }}
</dl>
