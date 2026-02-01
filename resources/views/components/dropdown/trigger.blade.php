@props([
    'arrow' => 'chevrons-up-down',
    'icon' => null,
    'size' => null,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()->add('w-full normal-case')->merge($attributes->only('class'));
@endphp

<ui:button :icon="$icon" :icon:end="$arrow" :size="$size" :variant="$variant"
    class="{{ $classes }}" {{ $attributes->except('class') }} x-bind:popovertarget="id"
    style="anchor-name: --dropdown-trigger;" data-dropdown-trigger>
    {{ $slot }}
</ui:button>
