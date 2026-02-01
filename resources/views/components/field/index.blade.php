@props([
    'variant' => 'block',
])

@php
    $classes = Ui::classes()
        ->add('min-w-0') // Allow nested elements to truncate properly
        ->add('[&:not(:has([data-field])):has([data-control][disabled])>[data-label]]:opacity-50') // Dim labels when control is disabled
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
        ->add('[[data-field]+&]:mt-4')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-field data-variant="{{ $variant }}">
    {{ $slot }}
</div>
