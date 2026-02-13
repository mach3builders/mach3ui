@props([
    'cols' => null,
    'variant' => 'responsive',
])

@php
    $defaultCols = match ($variant) {
        'stacked', 'form' => 'col-span-12',
        'responsive' => 'col-span-12 @2xl:col-span-8 @4xl:col-span-7 @5xl:col-span-6 @6xl:col-span-5',
    };

    $classes = Ui::classes()
        ->add($variant === 'form'
            ? [
                'grid grid-cols-1 gap-y-6 @3xl:grid-cols-[1fr_2fr] @3xl:gap-x-6',
                // Reset margin on buttons — grid gap handles spacing
                '[&>[data-field]+[data-buttons]]:mt-0',
                '[&>[data-fields]+[data-buttons]]:mt-0',
                // Align buttons to 2nd column on wide containers
                '@3xl:[&>[data-buttons]]:col-start-2',
            ]
            : 'flex flex-col')
        ->add($cols ?? $defaultCols);
@endphp

<ui:box variant="subtle" class="{{ $classes }}" {{ $attributes }} data-section-content>
    {{ $slot }}
</ui:box>
