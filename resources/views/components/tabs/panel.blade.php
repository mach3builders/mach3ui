@props([
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
    x-show="isActive('{{ $value }}')"
    x-cloak
    :tabindex="isActive('{{ $value }}') ? 0 : -1"
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
    data-tabs-panel
>
    {{ $slot }}
</div>
