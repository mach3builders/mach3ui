@props([
    'arrow' => 'chevrons-up-down',
    'icon' => null,
    'size' => null,
    'variant' => '',
])

<ui:button
    :icon="$icon"
    :icon:end="$arrow"
    :size="$size"
    :variant="$variant"
    {{ $attributes->class(['normal-case w-full']) }}
    x-bind:popovertarget="id"
    style="anchor-name: --dropdown-trigger;"
>
    {{ $slot }}
</ui:button>
