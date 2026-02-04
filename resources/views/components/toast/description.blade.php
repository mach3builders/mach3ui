@props([
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add($variant, [
            'default' => 'text-gray-600 dark:text-gray-300',
            'info' => 'text-cyan-700 dark:text-cyan-200',
            'success' => 'text-green-700 dark:text-green-200',
            'warning' => 'text-amber-700 dark:text-amber-200',
            'danger' => 'text-red-700 dark:text-red-200',
        ])
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-toast-description>
    {{ $slot }}
</div>
