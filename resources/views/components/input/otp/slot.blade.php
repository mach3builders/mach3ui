@props([
    'index',
    'size' => 'md',
])

@php
    $classes = Ui::classes()
        ->add(
            match ($size) {
                'sm' => 'h-9 w-8 text-sm',
                'lg' => 'h-14 w-12 text-xl',
                default => 'h-12 w-10 text-lg',
            },
        )
        ->add('relative -ml-px flex cursor-text items-center justify-center border font-medium transition-colors select-none')
        ->add('first:ml-0 first:rounded-l-md last:rounded-r-md')
        ->add('border-gray-140 bg-white text-gray-900')
        ->add('dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100')
        ->merge($attributes->only('class'));
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}"
    :class="{
        'z-10 ring-1 ring-gray-400 dark:ring-gray-500': activeIndex === {{ $index }},
    }"
    x-on:click="focusIndex({{ $index }})" data-input-otp-slot>
    <span x-text="displayChar(digits[{{ $index }}])"></span>
</div>
