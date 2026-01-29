@props([
    'variant' => 'column',
])

@php
    $variant_classes = match($variant) {
        'row' => 'flex flex-row flex-wrap gap-x-6 gap-y-3',
        default => 'flex flex-col gap-3',
    };
@endphp

<div {{ $attributes->class([$variant_classes]) }} role="radiogroup">
    {{ $slot }}
</div>
