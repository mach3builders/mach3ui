@props([
    'animation' => 'pulse',
    'size' => null,
    'variant' => 'default',
    'width' => null,
])

@php
    $sizes = [
        'xs' => 'h-2',
        'sm' => 'h-3',
        'md' => 'h-4',
        'lg' => 'h-6',
        'xl' => 'h-8',
    ];

    $widths = [
        'full' => 'w-full',
        '3/4' => 'w-3/4',
        '1/2' => 'w-1/2',
        '1/4' => 'w-1/4',
    ];

    $variants = [
        'default' => 'rounded-md',
        'circle' => 'rounded-full aspect-square',
        'text' => 'rounded',
        'avatar' => 'rounded-lg aspect-square',
        'image' => 'rounded-lg aspect-video',
        'button' => 'rounded-md h-10 w-24',
    ];

    $classes = Ui::classes()
        ->add('bg-gray-200')
        ->add('dark:bg-gray-700')
        ->add($variants[$variant] ?? $variants['default'])
        ->add($size && isset($sizes[$size]) ? $sizes[$size] : '')
        ->add($width && isset($widths[$width]) ? $widths[$width] : '')
        ->add($animation === 'pulse' ? 'animate-pulse' : '')
        ->add($animation === 'shimmer' ? 'relative isolate overflow-hidden' : '')
        ->merge($attributes->only('class'));

    $shimmerClasses = Ui::classes()
        ->add('absolute inset-0 -translate-x-full')
        ->add('bg-gradient-to-r from-transparent via-white/25 to-transparent')
        ->add('dark:via-white/10');
@endphp

@if ($animation === 'shimmer')
    <div class="{{ $classes }}" {{ $attributes->except('class') }} data-skeleton data-animation="shimmer">
        <div class="{{ $shimmerClasses }}" style="animation: ui-skeleton-shimmer 1.5s infinite"></div>
    </div>
    @once
        <style>
            @keyframes ui-skeleton-shimmer {
                100% {
                    transform: translateX(200%);
                }
            }
        </style>
    @endonce
@else
    <div class="{{ $classes }}" {{ $attributes->except('class') }} data-skeleton></div>
@endif
