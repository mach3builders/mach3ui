@props([
    'href' => null,
    'status' => 'pending',
    'step' => null,
    'title',
])

@php
    $is_done = $status === 'done';
    $is_current = $status === 'current';
    $is_clickable = $href && ($is_done || $is_current);
    $tag = $is_clickable ? 'a' : 'div';

    $indicator_classes = [
        'flex h-8 w-8 items-center justify-center rounded-full border-2 text-sm font-medium',
        match (true) {
            $is_done => 'border-gray-900 bg-gray-900 text-white dark:border-gray-100 dark:bg-gray-100 dark:text-gray-900',
            $is_current => 'border-gray-900 bg-white text-gray-900 dark:border-gray-100 dark:bg-gray-900 dark:text-gray-100',
            default => 'border-gray-200 bg-white text-gray-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400',
        },
        $is_done && $is_clickable ? 'group-hover:border-gray-700 group-hover:bg-gray-700 group-active:border-gray-600 group-active:bg-gray-600 dark:group-hover:border-gray-300 dark:group-hover:bg-gray-300 dark:group-active:border-gray-400 dark:group-active:bg-gray-400' : '',
        $is_current && $is_clickable ? 'group-hover:border-gray-700 group-active:border-gray-600 dark:group-hover:border-gray-300 dark:group-active:border-gray-400' : '',
    ];

    $label_classes = [
        'hidden text-sm font-medium sm:block',
        match (true) {
            $is_done || $is_current => 'text-gray-900 dark:text-gray-100',
            default => 'text-gray-500 dark:text-gray-400',
        },
        $is_clickable ? 'group-hover:text-gray-700 group-active:text-gray-600 dark:group-hover:text-gray-300 dark:group-active:text-gray-400' : '',
    ];

    $connector_classes = [
        'first:hidden h-0.5 w-12 rounded-full',
        match (true) {
            $is_done || $is_current => 'bg-gray-900 dark:bg-gray-100',
            default => 'bg-gray-200 dark:bg-gray-700',
        },
    ];
@endphp

<div class="{{ implode(' ', array_filter($connector_classes)) }}"></div>

<{{ $tag }}
    {{ $attributes->class(['group flex items-center gap-3', $is_clickable ? 'cursor-pointer' : '']) }}
    @if ($is_clickable) href="{{ $href }}" @endif
>
    <div class="{{ implode(' ', array_filter($indicator_classes)) }}">
        @if ($is_done)
            <ui:icon name="check" class="size-4" />
        @else
            {{ $step }}
        @endif
    </div>

    <span class="{{ implode(' ', array_filter($label_classes)) }}">{{ $title }}</span>
</{{ $tag }}>
