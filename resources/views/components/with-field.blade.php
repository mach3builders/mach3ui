@php
    // Extract forwarded attributes for sub-components
    $fieldAttributes = Ui::attributesAfter('field:', $attributes, []);
    $labelAttributes = Ui::attributesAfter('label:', $attributes, []);
    $helpAttributes = Ui::attributesAfter('help:', $attributes, []);
    $errorAttributes = Ui::attributesAfter('error:', $attributes, []);
@endphp

@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'label' => null,
    'help' => null,
    'badge' => null,
])

@if ($label || $help)
    <ui:field :attributes="$fieldAttributes">
        @if ($label)
            <ui:label :attributes="$labelAttributes" :badge="$badge">{{ $label }}</ui:label>
        @endif

        {{ $slot }}

        @if ($help)
            <ui:help :attributes="$helpAttributes">{{ $help }}</ui:help>
        @endif

        @if ($name)
            <ui:error :name="$name" :attributes="$errorAttributes" />
        @endif
    </ui:field>
@else
    {{ $slot }}
@endif
