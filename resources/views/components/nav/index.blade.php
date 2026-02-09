@props([])

@php
    $classes = Ui::classes()->add('flex flex-col gap-1 select-none')->merge($attributes);
@endphp

<nav {{ $attributes->except('class') }} class="{{ $classes }}" data-nav>
    {{ $slot }}
</nav>
