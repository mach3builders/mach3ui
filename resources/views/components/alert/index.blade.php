@props([
    'icon' => null,
    'message' => null,
    'title' => null,
    'variant' => 'default',
])

@php
    $icons = [
        'default' => 'megaphone',
        'info' => 'info',
        'success' => 'circle-check',
        'warning' => 'triangle-alert',
        'danger' => 'circle-x',
    ];

    $variant_classes = [
        'default' => [
            'bg-gray-20 border-gray-100 text-gray-700',
            'dark:bg-gray-780 dark:border-gray-700 dark:text-gray-200',
            '[&>svg]:text-gray-500 dark:[&>svg]:text-gray-400',
        ],
        'info' => [
            'border-cyan-200 bg-cyan-50',
            'dark:border-cyan-800/50 dark:bg-cyan-900/20',
            '[&>svg]:text-cyan-600 dark:[&>svg]:text-cyan-500',
        ],
        'success' => [
            'border-green-200 bg-green-50',
            'dark:border-green-800/50 dark:bg-green-900/20',
            '[&>svg]:text-green-600 dark:[&>svg]:text-green-500',
        ],
        'warning' => [
            'border-amber-200 bg-amber-50',
            'dark:border-amber-800/50 dark:bg-amber-900/20',
            '[&>svg]:text-amber-600 dark:[&>svg]:text-amber-500',
        ],
        'danger' => [
            'border-red-200 bg-red-50',
            'dark:border-red-800/50 dark:bg-red-900/20',
            '[&>svg]:text-red-600 dark:[&>svg]:text-red-500',
        ],
    ];
@endphp

<div {{ $attributes->class([
    'flex gap-3 rounded-lg border p-4 [&>svg]:mt-0.5 [&>svg]:size-5 [&>svg]:shrink-0',
    ...$variant_classes[$variant] ?? $variant_classes['default'],
]) }}
    data-alert data-variant="{{ $variant }}">
    @if ($title)
        <ui:icon :name="$icon ?? $icons[$variant] ?? $icons['default']" />

        <div>
            <ui:alert.title>{{ $title }}</ui:alert.title>

            @if ($message)
                <ui:alert.message>{{ $message }}</ui:alert.message>
            @endif

            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endif
</div>
