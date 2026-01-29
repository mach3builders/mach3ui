@props([
    'flush' => false,
    'variant' => null,
])

<div
    {{ $attributes->class([
        'flex-1 rounded-lg border shadow-xs relative z-10',
        'px-4.5 py-4' => !$flush,
        '[&:has(+[data-card-footer])]:rounded-b-none [&:has(+[data-card-footer])]:border-b-0 [&:has(+[data-card-footer])]:pb-0 [&:has(+[data-card-footer])]:shadow-none',
        'border-gray-60 bg-white dark:border-gray-740 dark:bg-gray-800' => $variant !== 'inverted',
        'border-gray-80 bg-gray-30 dark:border-gray-740 dark:bg-gray-820' => $variant === 'inverted',
    ]) }}>
    {{ $slot }}
</div>
