@props([
    'cols' => null,
    'variant' => 'responsive',
])

@php
    $defaultCols = match ($variant) {
        'stacked' => 'col-span-12',
        'responsive' => 'col-span-12 @2xl:col-span-8 @4xl:col-span-7 @5xl:col-span-6 @6xl:col-span-5',
    };

    $classes = Ui::classes()
        ->add('flex flex-col')
        ->add($cols ?? $defaultCols);
@endphp

<ui:box variant="subtle" class="{{ $classes }}" {{ $attributes }} data-section-content>
    {{ $slot }}
</ui:box>
