@props([])

@php
    $classes = Ui::classes()->add('h-full min-h-screen')->merge($attributes->only('class'));
@endphp

<html lang="{{ str_replace('_', '-', strtolower(app()->getLocale())) }}" class="{{ $classes }}"
    {{ $attributes->except('class') }} data-document>
{{ $slot }}

</html>
