@props([
    'orientation' => 'horizontal',
    'text' => null,
    'variant' => 'default',
])

@php
    $is_vertical = $orientation === 'vertical';
    $is_subtle = $variant === 'subtle';
@endphp

@if ($text)
    <div {{ $attributes->class([
        'flex w-full items-center gap-3',
        "before:h-px before:flex-1 before:content-['']",
        "after:h-px after:flex-1 after:content-['']",
        'before:bg-gray-200 after:bg-gray-200 dark:before:bg-gray-600 dark:after:bg-gray-600' => !$is_subtle,
        'before:bg-gray-120 after:bg-gray-120 dark:before:bg-gray-700 dark:after:bg-gray-700' => $is_subtle,
    ]) }}
        data-divider>
        <span class="shrink-0 text-xs text-gray-500 dark:text-gray-400">{{ $text }}</span>
    </div>
@elseif ($is_vertical)
    <div role="separator" aria-orientation="vertical"
        {{ $attributes->class([
            'min-h-4 w-px shrink-0 self-stretch',
            'bg-gray-200 dark:bg-gray-600' => !$is_subtle,
            'bg-gray-100 dark:bg-gray-700' => $is_subtle,
        ]) }}
        data-divider></div>
@else
    <hr {{ $attributes->class([
        'h-px w-full shrink-0 border-0',
        'bg-gray-200 dark:bg-gray-600 [[data-dropdown-menu]_&]:bg-gray-80 dark:[[data-dropdown-menu]_&]:bg-gray-740' => !$is_subtle,
        'bg-gray-100 dark:bg-gray-700' => $is_subtle,
    ]) }}
        data-divider />
@endif
