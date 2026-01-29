@props([
    'icon' => null,
    'variant' => 'default',
])

@php
    $variant_classes = [
        'default' => [
            'text-gray-600 hover:bg-gray-60 hover:text-gray-900',
            'dark:text-gray-400 dark:hover:bg-gray-740 dark:hover:text-gray-100',
        ],
        'danger' => [
            'text-red-600 hover:bg-red-50 hover:text-red-700',
            'dark:text-red-400 dark:hover:bg-red-900/20 dark:hover:text-red-300',
        ],
        'success' => [
            'text-green-600 hover:bg-green-50 hover:text-green-700',
            'dark:text-green-400 dark:hover:bg-green-900/20 dark:hover:text-green-300',
        ],
    ];
@endphp

<button
    {{ $attributes->class([
        'inline-flex cursor-pointer items-center gap-1.5 rounded-md px-2.5 py-1.5 text-xs font-medium transition-colors',
        'disabled:cursor-not-allowed disabled:opacity-50',
        ...$variant_classes[$variant] ?? $variant_classes['default'],
    ]) }}
    type="button"
    data-action-bar-action
>
    @if ($icon)
        <ui:icon :name="$icon" size="sm" />
    @endif

    @if ($slot->isNotEmpty())
        <span>{{ $slot }}</span>
    @endif
</button>
