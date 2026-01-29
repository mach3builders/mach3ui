@props([
    'href' => null,
    'icon' => null,
    'icon:end' => null,
    'route' => null,
    'size' => 'md',
    'variant' => 'default',
])

@php
    $url = $route ? route($route) : ($href ?? '#');
    $icon_trailing = $__data['icon:end'] ?? null;

    $variant_classes = [
        'default' => [
            'underline underline-offset-4',
            'text-gray-900 decoration-gray-300 hover:decoration-gray-500',
            'dark:text-gray-100 dark:decoration-gray-600 dark:hover:decoration-gray-400',
        ],
        'primary' => [
            'underline underline-offset-4',
            'text-blue-600 decoration-blue-300 hover:decoration-blue-500',
            'dark:text-blue-400 dark:decoration-blue-700 dark:hover:decoration-blue-500',
        ],
        'muted' => [
            'no-underline',
            'text-gray-500 hover:text-gray-900',
            'dark:text-gray-400 dark:hover:text-gray-100',
        ],
        'subtle' => [
            'no-underline hover:underline underline-offset-4',
            'text-gray-900 decoration-gray-300 hover:decoration-gray-500',
            'dark:text-gray-100 dark:decoration-gray-600 dark:hover:decoration-gray-400',
        ],
    ];

    $size_classes = [
        'xs' => ['text-xs', '[&>svg]:size-3'],
        'sm' => ['text-sm', '[&>svg]:size-3.5'],
        'md' => ['', '[&>svg]:size-4'],
    ];
@endphp

<a
    {{ $attributes->class([
        'inline-flex items-center gap-1.5',
        '[&>svg]:shrink-0',
        ...$variant_classes[$variant] ?? $variant_classes['default'],
        ...$size_classes[$size] ?? $size_classes['md'],
    ]) }}
    href="{{ $url }}"
    data-link
>
    @if ($icon)
        <ui:icon :name="$icon" />
    @endif

    {{ $slot }}

    @if ($icon_trailing)
        <ui:icon :name="$icon_trailing" />
    @endif
</a>
