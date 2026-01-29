@props([
    'name' => null,
    'size' => null,
    'color' => 'gray',
    'boxed' => false,
    'round' => false,
])

@php
    $size_classes = [
        'xs' => 'size-3',
        'sm' => 'size-4',
        'md' => 'size-5',
        'lg' => 'size-6',
        'xl' => 'size-8',
    ];

    $boxed_sizes = [
        'xs' => ['box' => 'size-5', 'icon' => 'size-3'],
        'sm' => ['box' => 'size-8', 'icon' => 'size-4'],
        'md' => ['box' => 'size-10', 'icon' => 'size-5'],
        'lg' => ['box' => 'size-12', 'icon' => 'size-6'],
        'xl' => ['box' => 'size-14', 'icon' => 'size-8'],
    ];

    $boxed_colors = [
        'gray' => 'bg-gray-60 text-gray-600 dark:bg-gray-740 dark:text-gray-400',
        'blue' => 'bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400',
        'green' => 'bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400',
        'amber' => 'bg-amber-100 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400',
        'yellow' => 'bg-yellow-100 text-yellow-600 dark:bg-yellow-900/30 dark:text-yellow-400',
        'purple' => 'bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400',
        'rose' => 'bg-rose-100 text-rose-600 dark:bg-rose-900/30 dark:text-rose-400',
        'red' => 'bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400',
        'indigo' => 'bg-indigo-100 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400',
        'cyan' => 'bg-cyan-100 text-cyan-600 dark:bg-cyan-900/30 dark:text-cyan-400',
        'teal' => 'bg-teal-100 text-teal-600 dark:bg-teal-900/30 dark:text-teal-400',
        'pink' => 'bg-pink-100 text-pink-600 dark:bg-pink-900/30 dark:text-pink-400',
        'violet' => 'bg-violet-100 text-violet-600 dark:bg-violet-900/30 dark:text-violet-400',
    ];

    $effective_size = $size ?? 'sm';
@endphp

@if ($boxed)
    <span
        {{ $attributes->class([
            'flex items-center justify-center',
            $round ? 'rounded-full' : 'rounded-lg',
            $boxed_sizes[$effective_size]['box'] ?? $boxed_sizes['sm']['box'],
            $boxed_colors[$color] ?? $boxed_colors['gray'],
        ]) }}
        data-icon>
        <x-dynamic-component :component="'lucide-' . $name" @class([
            'shrink-0',
            $boxed_sizes[$effective_size]['icon'] ?? $boxed_sizes['sm']['icon'],
        ]) />
    </span>
@else
    <x-dynamic-component :component="'lucide-' . $name" {{ $attributes->class(['shrink-0', $size_classes[$size] ?? null]) }}
        data-icon />
@endif
