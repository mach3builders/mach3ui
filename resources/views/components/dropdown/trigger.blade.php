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
    $isIconOnly = $icon && $slot->isEmpty() && !$arrow;

    $classes = Ui::classes()
        ->add('text-sm normal-case')
        ->when(!$isIconOnly, 'w-full justify-start')
        ->merge($attributes);
@endphp

<ui:button :$icon :$size :$variant icon:end="{{ $arrow }}" icon:end:color="{{ $arrowColor }}"
    x-bind:popovertarget="id" style="anchor-name: --dropdown-trigger;" aria-haspopup="true" data-dropdown-trigger
    {{ $attributes->except(['arrow:color', 'icon:color', 'class']) }} class="{{ $classes }}">
    {{ $slot }}
</ui:button>
