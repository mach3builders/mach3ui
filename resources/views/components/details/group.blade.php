@props([
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('divide-y')
        ->add($variant, [
            'default' => 'divide-gray-200 dark:divide-gray-700',
            'bordered' => 'divide-gray-200 rounded-lg border border-gray-200 dark:divide-gray-700 dark:border-gray-700',
            'separated' => 'divide-transparent space-y-2',
        ])
        ->merge($attributes);
@endphp

<div data-details-group data-variant="{{ $variant }}" {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $slot }}
</div>
