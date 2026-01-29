@props([
    'href' => null,
    'label' => 'Edit',
    'modal' => null,
    'size' => null,
    'variant' => 'default',
])

@aware(['grouped' => false])

@php
    $onclick = $modal ? "document.getElementById('{$modal}').showModal()" : null;
@endphp

@if ($grouped)
    <ui:dropdown.item :href="$href" :label="$label" icon="pencil" :onclick="$onclick"
        {{ $attributes }} />
@else
    <ui:button :variant="$variant" :size="$size" icon="pencil" :href="$href" :onclick="$onclick"
        {{ $attributes }} />
@endif
