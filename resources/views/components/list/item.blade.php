@props([
    'href' => null,
    'icon' => null,
    'label' => null,
    'value' => null,
])

@php
    $tag = $href ? 'a' : 'div';
    $has_label_value = $label || $value || $icon;
@endphp

<{{ $tag }}
    {{ $attributes->class([
        'border-b px-4.5 py-3.5',
        'border-gray-60 text-gray-700',
        'dark:border-gray-740 dark:text-gray-200',
        'last:border-b-0',
        'cursor-pointer hover:bg-gray-20 dark:hover:bg-gray-780' => $href,
        'flex items-center justify-between gap-4' => $has_label_value,
    ]) }}
    @if ($href) href="{{ $href }}" @endif
    data-list-item
>
    @if ($has_label_value)
        <span class="flex items-center gap-3 font-medium text-gray-900 dark:text-white">
            @if ($icon)
                <ui:icon :name="$icon" size="sm" class="text-gray-400 dark:text-gray-500" />
            @endif

            {{ $label ?? $slot }}
        </span>

        @if ($value)
            <span class="text-right text-gray-500 dark:text-gray-400">{{ $value }}</span>
        @endif
    @else
        {{ $slot }}
    @endif
</{{ $tag }}>
