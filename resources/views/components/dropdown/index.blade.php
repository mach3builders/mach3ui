@props([
    'position' => 'bottom-start',
])

@php
    $id = uniqid('dropdown-');

    $classes = Ui::classes()
        ->add('relative inline-block select-none')
        ->merge($attributes);
@endphp

<div
    x-data="{ open: false, id: '{{ $id }}', position: '{{ $position }}' }"
    style="anchor-scope: --dropdown-trigger;"
    data-dropdown
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
>
    {{ $slot }}
</div>
