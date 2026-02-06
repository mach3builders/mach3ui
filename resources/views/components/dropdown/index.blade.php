@props([
    'position' => 'bottom-start',
])

@php
    $id = Ui::uniqueId('dropdown');

    $classes = Ui::classes()->add('relative inline-block select-none')->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} x-data="{ open: false, id: '{{ $id }}', position: '{{ $position }}' }"
    style="anchor-scope: --dropdown-trigger;" data-dropdown>
    {{ $slot }}
</div>
