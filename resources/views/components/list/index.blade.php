@props([])

@php
    $classes = Ui::classes()->add('m-0 flex list-none flex-col p-0');
@endphp

<div {{ $attributes->class($classes) }} data-list>
    {{ $slot }}
</div>
