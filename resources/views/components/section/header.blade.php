@props([
    'cols' => null,
    'variant' => 'responsive',
])

@php
    $defaultCols = match ($variant) {
        'stacked', 'form' => 'col-span-12',
        'responsive' => 'col-span-12 @2xl:col-span-4 @2xl:pt-5',
    };

    $classes = Ui::classes()
        ->add('flex flex-col gap-1')
        ->add($cols ?? $defaultCols)
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-section-header>
    {{ $slot }}
</div>
