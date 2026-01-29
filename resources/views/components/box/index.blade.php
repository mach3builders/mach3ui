@props([
    'variant' => 'default',
])

<div
    {{ $attributes->class([
        'rounded-lg p-4',
        'border border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800' => $variant === 'default',
        'bg-gray-30 dark:bg-gray-830' => $variant === 'subtle',
    ]) }}
    data-box
>
    {{ $slot }}
</div>
