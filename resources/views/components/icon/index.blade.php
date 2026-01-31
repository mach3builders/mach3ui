@props([
    'name' => null,
    'size' => null,
    'color' => 'gray',
    'boxed' => false,
    'round' => false,
    'stroke' => 2,
])

@php
    $sizeClasses = [
        'xs' => 'size-3',
        'sm' => 'size-4',
        'md' => 'size-5',
        'lg' => 'size-6',
        'xl' => 'size-8',
    ];

    $boxedSizes = [
        'xs' => ['box' => 'size-5', 'icon' => 'size-3'],
        'sm' => ['box' => 'size-8', 'icon' => 'size-4'],
        'md' => ['box' => 'size-10', 'icon' => 'size-5'],
        'lg' => ['box' => 'size-12', 'icon' => 'size-6'],
        'xl' => ['box' => 'size-14', 'icon' => 'size-8'],
    ];

    $boxedColors = [
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

    $effectiveSize = $size ?? 'sm';

    $boxClasses = Ui::classes()
        ->add('flex items-center justify-center')
        ->add($round ? 'rounded-full' : 'rounded-lg')
        ->add($boxedSizes[$effectiveSize]['box'] ?? $boxedSizes['sm']['box'])
        ->add($boxedColors[$color] ?? $boxedColors['gray'])
        ->merge($attributes->only('class'));

    $iconClasses = Ui::classes()
        ->add('shrink-0')
        ->add($boxedSizes[$effectiveSize]['icon'] ?? $boxedSizes['sm']['icon']);

    $simpleClasses = Ui::classes()
        ->add('shrink-0')
        ->add($sizeClasses[$size] ?? '')
        ->merge($attributes->only('class'));
@endphp

@if ($boxed)
    <span class="{{ $boxClasses }}" {{ $attributes->except('class') }} data-icon>
        <x-dynamic-component :component="'lucide-' . $name" :stroke-width="$stroke" class="{{ $iconClasses }}" />
    </span>
@else
    <x-dynamic-component :component="'lucide-' . $name" :stroke-width="$stroke" class="{{ $simpleClasses }}"
        {{ $attributes->except('class') }} data-icon />
@endif
