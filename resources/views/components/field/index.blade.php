@props([
    'id' => null,
    'variant' => 'block',
])

@php
    // Dim label when this field (not nested) has a disabled control
    $disabledLabelSelector = '[&:not(:has([data-field])):has([data-control][disabled])>[data-label]]:opacity-50';

    $classes = Ui::classes()
        // Allow nested elements to truncate properly
        ->add('min-w-0')
        ->add($disabledLabelSelector)
        ->add(
            match ($variant) {
                'inline' => [
                    'col-span-full grid grid-cols-subgrid',
                    'gap-y-2 @3xl:gap-y-1.5 @3xl:items-baseline',
                    '@3xl:[&>[data-error]]:col-start-2',
                    '@3xl:[&>[data-hint]]:col-start-2',
                ],
                default => 'flex flex-col gap-2',
            },
        )
        ->when($variant !== 'inline', '[[data-fields]+&]:mt-6')
        ->when($variant !== 'inline', '[[data-field]+&]:mt-6')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-field data-variant="{{ $variant }}">
    {{ $slot }}
</div>
