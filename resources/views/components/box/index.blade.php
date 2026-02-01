@props([
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('rounded-lg p-4')
        ->add(
            match ($variant) {
                'subtle' => 'bg-gray-30 dark:bg-gray-830',
                default => 'border border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800',
            },
        )
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-box data-variant="{{ $variant }}">
    {{ $slot }}
</div>
