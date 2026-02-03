@props([
    'arrow' => 'chevrons-up-down',
    'icon' => null,
    'size' => 'md',
    'variant' => 'default',
])

<ui:button
    :icon="$icon"
    :icon:end="$arrow"
    icon:end:color="gray"
    :size="$size"
    :variant="$variant"
    x-bind:popovertarget="id"
    style="anchor-name: --dropdown-trigger;"
    aria-haspopup="true"
    data-dropdown-trigger
    {{ $attributes }}
>
    {{ $slot }}
</ui:button>
