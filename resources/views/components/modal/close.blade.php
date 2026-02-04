@props([
    'icon' => 'x',
    'size' => 'sm',
    'variant' => 'ghost',
])

<ui:button
    :icon="$icon"
    :size="$size"
    :variant="$variant"
    x-on:click="closeModal()"
    {{ $attributes }}
>
    {{ $slot }}
</ui:button>
