@props([
    'label' => 'Copy',
    'ref' => null,
    'size' => null,
    'value' => null,
    'variant' => 'default',
])

@aware(['grouped' => false])

@php
    $copy_source = $ref ? "\$refs['{$ref}'].value" : "this.\$el.dataset.value";

    $alpine = "
        copied: false,
        copy() {
            navigator.clipboard.writeText({$copy_source});
            this.copied = true;
            setTimeout(() => this.copied = false, 2000);
        }
    ";
@endphp

@if ($grouped)
    <ui:dropdown.item x-data="{ {{ $alpine }} }" x-on:click="copy()" :label="$label" data-value="{{ $value }}"
        {{ $attributes }}>
        <x-slot:icon>
            <ui:icon name="copy" x-show="!copied" />

            <ui:icon name="check" x-show="copied" x-cloak class="text-green-500" />
        </x-slot:icon>
    </ui:dropdown.item>
@else
    <ui:button x-data="{ {{ $alpine }} }" x-on:click="copy()" :variant="$variant" :size="$size" square
        data-value="{{ $value }}" {{ $attributes }}>
        <ui:icon name="copy" x-show="!copied" />

        <ui:icon name="check" x-show="copied" x-cloak class="text-green-500" />
    </ui:button>
@endif
