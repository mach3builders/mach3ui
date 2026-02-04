@props([
    'arrow' => 'chevrons-up-down',
    'arrow:color' => 'gray',
    'icon' => null,
    'icon:color' => null,
    'size' => 'md',
    'variant' => 'default',
])

@php
    $arrowColor = $__data['arrow:color'] ?? ($attributes->get('arrow:color') ?? 'gray');
    $iconColor = $__data['icon:color'] ?? $attributes->get('icon:color');
@endphp

<ui:button :$icon :$size :$variant icon:end="{{ $arrow }}" icon:end:color="{{ $arrowColor }}"
    x-bind:popovertarget="id" style="anchor-name: --dropdown-trigger;" aria-haspopup="true"
    class="text-sm w-full normal-case justify-start" data-dropdown-trigger
    {{ $attributes->except(['arrow:color', 'icon:color']) }}>
    {{ $slot }}
</ui:button>
