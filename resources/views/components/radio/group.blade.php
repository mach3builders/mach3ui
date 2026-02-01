@props([
    'variant' => 'column',
])

@php
    $classes = Ui::classes()
        ->add(
            match ($variant) {
                'row' => 'flex flex-row flex-wrap gap-x-6 gap-y-3',
                default => 'flex flex-col gap-3',
            },
        )
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} role="radiogroup" data-radio-group>
    {{ $slot }}
</div>
