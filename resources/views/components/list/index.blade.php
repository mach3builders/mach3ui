@props([])

@php
    $classes = Ui::classes()->add('m-0 flex list-none flex-col p-0')->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-list>
    {{ $slot }}
</div>
