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
                    'grid gap-x-3 gap-y-1.5',
                    'has-[>[data-control]:first-child]:grid-cols-[auto_1fr]',
                    'has-[>[data-control]:last-child]:grid-cols-[1fr_auto]',
                ],
                default => 'flex flex-col gap-2',
            },
        )
        ->add('[[data-field]+&]:mt-6')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-field data-variant="{{ $variant }}">
    {{ $slot }}
</div>
