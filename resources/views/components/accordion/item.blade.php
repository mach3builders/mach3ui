@props([
    'icon' => null,
    'open' => false,
    'title' => null,
    'value' => null,
])

@php
    $item_value = $value ?? ($title ? Str::slug($title) : uniqid());
@endphp

<details
    {{ $attributes->class([
        'group border-b',
        'border-gray-100',
        'dark:border-gray-680',
    ]) }}
    data-value="{{ $item_value }}"
    x-data="{
        value: @js($item_value),
        get isOpen() {
            const parent = this.$el.closest('[data-accordion-type]');
            if (parent && parent.dataset.accordionType === 'single') {
                return Alpine.$data(parent).active === this.value;
            }
            return this.$el.open;
        }
    }"
    :open="isOpen"
    @if ($open)
        open
    @endif
>
    @if ($title)
        <ui:accordion.title :icon="$icon">{{ $title }}</ui:accordion.title>

        <ui:accordion.content :has-icon="(bool) $icon">{{ $slot }}</ui:accordion.content>
    @else
        {{ $slot }}
    @endif
</details>
