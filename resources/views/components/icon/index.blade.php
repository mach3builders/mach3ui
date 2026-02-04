@props([
    'boxed' => false,
    'color' => null,
    'name' => null,
    'round' => false,
    'size' => null,
    'stroke' => 2,
])

@php
    $effectiveSize = $size ?? 'sm';

    $iconSize = match ($effectiveSize) {
        'xs' => 'size-3',
        'sm' => 'size-4',
        'md' => 'size-5',
        'lg' => 'size-6',
        'xl' => 'size-8',
        default => 'size-4',
    };

    $boxSize = match ($effectiveSize) {
        'xs' => 'size-5',
        'sm' => 'size-8',
        'md' => 'size-10',
        'lg' => 'size-12',
        'xl' => 'size-14',
        default => 'size-8',
    };

    // Map semantic names to Tailwind colors
    $colorAliases = [
        'primary' => 'blue',
        'secondary' => 'gray',
        'danger' => 'red',
        'warning' => 'amber',
        'success' => 'green',
    ];
    $resolvedColor = $colorAliases[$color] ?? $color;

    $colors = [
        'inherit' => 'text-inherit',
        'gray' => 'text-gray-500 dark:text-gray-400',
        'blue' => 'text-blue-600 dark:text-blue-500',
        'green' => 'text-green-600 dark:text-green-500',
        'amber' => 'text-amber-600 dark:text-amber-500',
        'red' => 'text-red-600 dark:text-red-500',
        'yellow' => 'text-yellow-600 dark:text-yellow-500',
        'purple' => 'text-purple-600 dark:text-purple-500',
        'rose' => 'text-rose-600 dark:text-rose-500',
        'indigo' => 'text-indigo-600 dark:text-indigo-500',
        'cyan' => 'text-cyan-600 dark:text-cyan-500',
        'teal' => 'text-teal-600 dark:text-teal-500',
        'pink' => 'text-pink-600 dark:text-pink-500',
        'violet' => 'text-violet-600 dark:text-violet-500',
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

    $colorClass = $resolvedColor ? $colors[$resolvedColor] ?? "text-{$resolvedColor}" : null;

    $boxClasses = Ui::classes()
        ->add('flex items-center justify-center')
        ->add($boxSize)
        ->add($round ? 'rounded-full' : 'rounded-lg')
        ->add($boxedColors[$resolvedColor] ?? $boxedColors['gray'])
        ->merge($attributes);

    $iconClasses = Ui::classes()->add('shrink-0')->add($iconSize);

    $simpleClasses = Ui::classes()
        ->add('shrink-0')
        ->add($iconSize)
        ->when($colorClass, $colorClass ?? '')
        ->merge($attributes);
@endphp

@if ($boxed)
    <span {{ $attributes->except('class') }} class="{{ $boxClasses }}" data-icon data-color="{{ $color }}">
        <x-dynamic-component :component="'lucide-' . $name" :stroke-width="$stroke" class="{{ $iconClasses }}" />
    </span>
@else
    <x-dynamic-component :component="'lucide-' . $name" :stroke-width="$stroke" {{ $attributes->except('class') }}
        class="{{ $simpleClasses }}" data-icon />
@endif
