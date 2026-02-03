@props([
    'disabled' => false,
    'href' => null,
    'icon' => null,
    'icon:end' => null,
    'size' => 'md',
    'square' => false,
    'variant' => 'default',
])

@php
    $tag = $href ? 'a' : 'button';
    $iconEnd = $__data['icon:end'] ?? null;
    $isIconOnly = ($icon || $iconEnd) && $slot->isEmpty() && !($icon && $iconEnd);

    $classes = Ui::classes()
        // Base
        ->add(
            'inline-flex cursor-pointer select-none items-center justify-center gap-2 whitespace-nowrap border font-semibold uppercase',
        )
        ->add('rounded-md transition-colors duration-150')
        ->add('focus:ring-1 focus:ring-offset-1 focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add('[&>svg]:size-4 [&>svg]:shrink-0')
        // Size
        ->add($size, [
            'xs' => 'min-h-6 gap-1.5 px-2 text-[10px] [&>svg]:size-3.5',
            'sm' => 'min-h-8 gap-1.5 px-3 text-xs [&>svg]:size-3.5',
            'md' => 'min-h-10 px-4 py-2 text-xs',
            'lg' => 'min-h-12 gap-2.5 px-6 text-sm [&>svg]:size-5',
        ])
        // Variant
        ->add($variant, [
            'default' =>
                'border-gray-120 bg-white text-gray-700 shadow-xs hover:bg-gray-20 hover:text-gray-900 focus:ring-gray-200 focus:ring-offset-white dark:border-gray-690 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-780 dark:hover:text-gray-20 dark:focus:ring-gray-600 dark:focus:ring-offset-gray-800',
            'primary' =>
                'border-transparent bg-blue-500 text-gray-20 shadow-xs hover:bg-blue-550 hover:text-white focus:ring-blue-600 focus:ring-offset-white dark:bg-blue-600 dark:hover:bg-blue-550 dark:focus:ring-offset-gray-800',
            'secondary' =>
                'border-transparent bg-gray-700 text-gray-20 shadow-xs hover:bg-black hover:text-white focus:ring-gray-600 focus:ring-offset-white dark:bg-gray-60 dark:text-gray-800 dark:hover:bg-white dark:hover:text-gray-980 dark:focus:ring-gray-100 dark:focus:ring-offset-gray-800',
            'success' =>
                'border-transparent bg-green-600 text-gray-20 shadow-xs hover:bg-green-650 hover:text-white focus:ring-green-600 focus:ring-offset-white dark:hover:bg-green-550 dark:focus:ring-offset-gray-800',
            'danger' =>
                'border-transparent bg-red-600 text-gray-20 shadow-xs hover:bg-red-650 hover:text-white focus:ring-red-600 focus:ring-offset-white dark:hover:bg-red-550 dark:focus:ring-offset-gray-800',
            'subtle' =>
                'border-transparent bg-gray-500/10 text-gray-700 hover:bg-gray-500/15 focus:ring-gray-400 focus:ring-offset-white dark:text-gray-300 dark:focus:ring-gray-500 dark:focus:ring-offset-gray-800',
            'ghost' =>
                'border-transparent bg-transparent text-gray-900 hover:bg-gray-500/8 focus:ring-gray-400 focus:ring-offset-white dark:text-gray-100 dark:hover:bg-gray-500/10 dark:focus:ring-gray-500 dark:focus:ring-offset-gray-800',
            // Outline variants
            'outline-info' =>
                'border-cyan-300/50 bg-cyan-100/20 text-cyan-600 shadow-xs hover:border-cyan-400/50 hover:bg-cyan-100/30 hover:text-cyan-700 focus:ring-cyan-600 focus:ring-offset-white dark:border-cyan-800/50 dark:bg-cyan-900/20 dark:text-cyan-400 dark:hover:border-cyan-700/50 dark:hover:bg-cyan-900/30 dark:hover:text-cyan-300 dark:focus:ring-offset-gray-800',
            'outline-success' =>
                'border-green-300/50 bg-green-100/20 text-green-600 shadow-xs hover:border-green-400/50 hover:bg-green-100/30 hover:text-green-700 focus:ring-green-600 focus:ring-offset-white dark:border-green-800/50 dark:bg-green-900/20 dark:text-green-400 dark:hover:border-green-700/50 dark:hover:bg-green-900/30 dark:hover:text-green-300 dark:focus:ring-offset-gray-800',
            'outline-warning' =>
                'border-amber-300/50 bg-amber-100/20 text-amber-600 shadow-xs hover:border-amber-400/50 hover:bg-amber-100/30 hover:text-amber-700 focus:ring-amber-600 focus:ring-offset-white dark:border-amber-800/50 dark:bg-amber-900/20 dark:text-amber-400 dark:hover:border-amber-700/50 dark:hover:bg-amber-900/30 dark:hover:text-amber-300 dark:focus:ring-offset-gray-800',
            'outline-danger' =>
                'border-red-300/50 bg-red-100/20 text-red-600 shadow-xs hover:border-red-400/50 hover:bg-red-100/30 hover:text-red-700 focus:ring-red-600 focus:ring-offset-white dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-400 dark:hover:border-red-700/50 dark:hover:bg-red-900/30 dark:hover:text-red-300 dark:focus:ring-offset-gray-800',
        ])
        // Disabled link styling
        ->when($href && $disabled, 'pointer-events-none opacity-50')
        // Square (icon-only) styling
        ->when($square || $isIconOnly, 'aspect-square px-0!')
        ->merge($attributes);
@endphp

<{{ $tag }} @if ($href) href="{{ $href }}" @endif
    @if ($tag === 'button' && !$attributes->has('type')) type="button" @endif @if ($tag === 'button' && $disabled) disabled @endif
    @if ($tag === 'a' && $disabled) aria-disabled="true" tabindex="-1" @endif {{ $attributes->except('class') }}
    class="{{ $classes }}">
    @if ($icon)
        <x-dynamic-component :component="'lucide-' . $icon" />
    @endif
    {{ $slot }}
    @if ($iconEnd)
        <x-dynamic-component :component="'lucide-' . $iconEnd" />
    @endif
    </{{ $tag }}>
