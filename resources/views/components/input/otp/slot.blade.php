@props([
    'index',
    'size' => null,
])

@php
    $size_classes = match($size) {
        'sm' => 'h-9 w-8 text-sm',
        'lg' => 'h-14 w-12 text-xl',
        default => 'h-12 w-10 text-lg',
    };
@endphp

<div
    {{ $attributes->class([
        $size_classes,
        'relative flex cursor-text items-center justify-center border-y border-r font-medium transition-colors',
        'first:rounded-l-lg first:border-l last:rounded-r-lg',
        'border-gray-200 bg-white text-gray-900',
        'dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100',
    ]) }}
    :class="{
        'z-10 ring-2 ring-offset-0 ring-gray-900 dark:ring-gray-100': activeIndex === {{ $index }},
    }"
    @click="focusIndex({{ $index }})"
    data-input-otp-slot
>
    <span x-text="displayChar(digits[{{ $index }}])"></span>
</div>
