@props([
    'variant' => 'column',
])

@php
    $classes = Ui::classes()->add(
        match ($variant) {
            'row' => 'flex flex-row flex-wrap gap-x-6 gap-y-3',
            default => 'flex flex-col gap-3',
        },
    );
@endphp

<div {{ $attributes->class($classes) }} role="radiogroup">
    {{ $slot }}
</div>
