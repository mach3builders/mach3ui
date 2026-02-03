@props([
    'variant' => 'column',
])

@php
    $classes = Ui::classes()
        ->add($variant, [
            'column' => 'flex flex-col gap-3',
            'row' => 'flex flex-row flex-wrap gap-x-6 gap-y-3',
        ])
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" role="radiogroup" data-radio-group>
    {{ $slot }}
</div>
