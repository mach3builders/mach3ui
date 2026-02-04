@props([
    'name' => null,
    'value',
])

@php
    $tabId = "tab-{$value}";
    $panelId = "tabpanel-{$value}";

    $classes = Ui::classes()->merge($attributes);
@endphp

<div
    role="tabpanel"
    id="{{ $panelId }}"
    aria-labelledby="{{ $tabId }}"
    @if ($name)
        x-data
        x-show="Alpine.store('tabs_{{ $name }}').active === '{{ $value }}'"
        :tabindex="Alpine.store('tabs_{{ $name }}').active === '{{ $value }}' ? 0 : -1"
    @else
        x-show="isActive('{{ $value }}')"
        :tabindex="isActive('{{ $value }}') ? 0 : -1"
    @endif
    x-cloak
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
    data-tabs-panel
>
    {{ $slot }}
</div>
