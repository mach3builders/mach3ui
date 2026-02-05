@blaze

@props([])

@php
    $classes = Ui::classes()->add('flex flex-col gap-3')->merge($attributes);
@endphp

<dl {{ $attributes->except('class') }} class="{{ $classes }}" data-definition-list>
    {{ $slot }}
</dl>
