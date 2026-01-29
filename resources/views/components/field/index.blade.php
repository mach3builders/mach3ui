@props([
    'variant' => 'block',
])

@php
    $variant_classes = match($variant) {
        'inline' => 'flex items-start gap-3',
        default => 'flex flex-col gap-2',
    };
@endphp

<div {{ $attributes->class([$variant_classes, '[[data-field]+&]:mt-4']) }} data-field data-variant="{{ $variant }}">
    {{ $slot }}
</div>
