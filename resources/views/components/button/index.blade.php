@props([
    'active' => false,
    'disabled' => false,
    'href' => null,
    'icon' => null,
    'icon:color' => null,
    'iconTrailing' => null,
    'loading' => false,
    'size' => 'md',
    'square' => false,
    'type' => 'button',
    'variant' => 'default',
])

@php
    $iconColor = $__data['icon:color'] ?? null;

    $iconTrailingSlot = $__laravel_slots['iconTrailing'] ?? null;
    $iconTrailingValue = $iconTrailingSlot ?? $iconTrailing;
    $iconColorClass = $iconColor
        ? 'text-' . (preg_match('/-\d+$/', $iconColor) ? $iconColor : "{$iconColor}-500")
        : null;

    $isAi = $variant === 'ai';
    $isLink = $href !== null;

    // Variant definitions: base styles + active state CSS selectors
    $variants = [
        'default' => [
            'base' =>
                'border-gray-120 bg-white text-gray-700 shadow-xs hover:bg-gray-20 hover:text-gray-900 enabled:hover:bg-gray-20 enabled:hover:text-gray-900 focus:ring-gray-200 focus:ring-offset-white dark:border-gray-690 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-780 dark:hover:text-gray-20 dark:enabled:hover:bg-gray-780 dark:enabled:hover:text-gray-20 dark:focus:ring-gray-600 dark:focus:ring-offset-gray-800',
            'active' =>
                '[&[data-active]]:bg-gray-20 [&[data-active]]:text-gray-900 dark:[&[data-active]]:bg-gray-780 dark:[&[data-active]]:text-gray-20',
        ],
        'primary' => [
            'base' =>
                'border-transparent bg-blue-500 text-gray-20 shadow-xs hover:bg-blue-550 hover:text-white enabled:hover:bg-blue-550 enabled:hover:text-white focus:ring-blue-600 focus:ring-offset-white dark:bg-blue-600 dark:hover:bg-blue-550 dark:enabled:hover:bg-blue-550 dark:focus:ring-offset-gray-800',
            'active' => '[&[data-active]]:bg-blue-550 [&[data-active]]:text-white dark:[&[data-active]]:bg-blue-550',
        ],
        'secondary' => [
            'base' =>
                'border-transparent bg-gray-700 text-gray-20 shadow-xs hover:bg-black hover:text-white enabled:hover:bg-black enabled:hover:text-white focus:ring-gray-600 focus:ring-offset-white dark:bg-gray-60 dark:text-gray-800 dark:hover:bg-white dark:hover:text-gray-980 dark:enabled:hover:bg-white dark:enabled:hover:text-gray-980 dark:focus:ring-gray-100 dark:focus:ring-offset-gray-800',
            'active' =>
                '[&[data-active]]:bg-black [&[data-active]]:text-white dark:[&[data-active]]:bg-white dark:[&[data-active]]:text-gray-980',
        ],
        'success' => [
            'base' =>
                'border-transparent bg-green-600 text-gray-20 shadow-xs hover:bg-green-650 hover:text-white enabled:hover:bg-green-650 enabled:hover:text-white focus:ring-green-600 focus:ring-offset-white dark:bg-green-600 dark:hover:bg-green-550 dark:enabled:hover:bg-green-550 dark:focus:ring-offset-gray-800',
            'active' => '[&[data-active]]:bg-green-650 [&[data-active]]:text-white dark:[&[data-active]]:bg-green-550',
        ],
        'danger' => [
            'base' =>
                'border-transparent bg-red-600 text-gray-20 shadow-xs hover:bg-red-650 hover:text-white enabled:hover:bg-red-650 enabled:hover:text-white focus:ring-red-600 focus:ring-offset-white dark:bg-red-600 dark:hover:bg-red-550 dark:enabled:hover:bg-red-550 dark:focus:ring-offset-gray-800',
            'active' => '[&[data-active]]:bg-red-650 [&[data-active]]:text-white dark:[&[data-active]]:bg-red-550',
        ],
        'subtle' => [
            'base' =>
                'border-transparent bg-gray-500/10 hover:bg-gray-500/15 enabled:hover:bg-gray-500/15 focus:ring-gray-400 focus:ring-offset-white dark:focus:ring-gray-500 dark:focus:ring-offset-gray-800',
            'active' => '[&[data-active]]:bg-gray-500/15',
        ],
        'ghost' => [
            'base' =>
                'border-transparent bg-transparent text-gray-900 hover:bg-gray-500/8 enabled:hover:bg-gray-500/8 focus:ring-gray-400 focus:ring-offset-white dark:text-gray-100 dark:hover:bg-gray-500/10 dark:enabled:hover:bg-gray-500/10 dark:focus:ring-gray-500 dark:focus:ring-offset-gray-800',
            'active' => '[&[data-active]]:bg-gray-500/8 dark:[&[data-active]]:bg-gray-500/10',
        ],
        'outline-subtle' => [
            'base' =>
                'border-gray-200/50 bg-gray-100/20 text-gray-600 shadow-xs hover:border-gray-300/50 hover:bg-gray-100/30 hover:text-gray-700 enabled:hover:border-gray-300/50 enabled:hover:bg-gray-100/30 enabled:hover:text-gray-700 focus:ring-gray-400 focus:ring-offset-white dark:border-gray-600/50 dark:bg-gray-700/20 dark:text-gray-200 dark:hover:border-gray-500/50 dark:hover:bg-gray-700/40 dark:hover:text-gray-100 dark:enabled:hover:border-gray-500/50 dark:enabled:hover:bg-gray-700/40 dark:enabled:hover:text-gray-100 dark:focus:ring-offset-gray-800',
            'active' =>
                '[&[data-active]]:border-gray-400/50 [&[data-active]]:bg-gray-100/30 [&[data-active]]:text-gray-700 dark:[&[data-active]]:border-gray-600/50 dark:[&[data-active]]:bg-gray-900/30 dark:[&[data-active]]:text-gray-300',
        ],
        'outline-info' => [
            'base' =>
                'border-cyan-300/50 bg-cyan-100/20 text-cyan-600 shadow-xs hover:border-cyan-400/50 hover:bg-cyan-100/30 hover:text-cyan-700 enabled:hover:border-cyan-400/50 enabled:hover:bg-cyan-100/30 enabled:hover:text-cyan-700 focus:ring-cyan-600 focus:ring-offset-white dark:border-cyan-800/50 dark:bg-cyan-900/20 dark:text-cyan-400 dark:hover:border-cyan-700/50 dark:hover:bg-cyan-900/30 dark:hover:text-cyan-300 dark:enabled:hover:border-cyan-700/50 dark:enabled:hover:bg-cyan-900/30 dark:enabled:hover:text-cyan-300 dark:focus:ring-offset-gray-800',
            'active' =>
                '[&[data-active]]:border-cyan-400/50 [&[data-active]]:bg-cyan-100/30 [&[data-active]]:text-cyan-700 dark:[&[data-active]]:border-cyan-700/50 dark:[&[data-active]]:bg-cyan-900/30 dark:[&[data-active]]:text-cyan-300',
        ],
        'outline-success' => [
            'base' =>
                'border-green-300/50 bg-green-100/20 text-green-600 shadow-xs hover:border-green-400/50 hover:bg-green-100/30 hover:text-green-700 enabled:hover:border-green-400/50 enabled:hover:bg-green-100/30 enabled:hover:text-green-700 focus:ring-green-600 focus:ring-offset-white dark:border-green-800/50 dark:bg-green-900/20 dark:text-green-400 dark:hover:border-green-700/50 dark:hover:bg-green-900/30 dark:hover:text-green-300 dark:enabled:hover:border-green-700/50 dark:enabled:hover:bg-green-900/30 dark:enabled:hover:text-green-300 dark:focus:ring-offset-gray-800',
            'active' =>
                '[&[data-active]]:border-green-400/50 [&[data-active]]:bg-green-100/30 [&[data-active]]:text-green-700 dark:[&[data-active]]:border-green-700/50 dark:[&[data-active]]:bg-green-900/30 dark:[&[data-active]]:text-green-300',
        ],
        'outline-warning' => [
            'base' =>
                'border-amber-300/50 bg-amber-100/20 text-amber-600 shadow-xs hover:border-amber-400/50 hover:bg-amber-100/30 hover:text-amber-700 enabled:hover:border-amber-400/50 enabled:hover:bg-amber-100/30 enabled:hover:text-amber-700 focus:ring-amber-600 focus:ring-offset-white dark:border-amber-800/50 dark:bg-amber-900/20 dark:text-amber-400 dark:hover:border-amber-700/50 dark:hover:bg-amber-900/30 dark:hover:text-amber-300 dark:enabled:hover:border-amber-700/50 dark:enabled:hover:bg-amber-900/30 dark:enabled:hover:text-amber-300 dark:focus:ring-offset-gray-800',
            'active' =>
                '[&[data-active]]:border-amber-400/50 [&[data-active]]:bg-amber-100/30 [&[data-active]]:text-amber-700 dark:[&[data-active]]:border-amber-700/50 dark:[&[data-active]]:bg-amber-900/30 dark:[&[data-active]]:text-amber-300',
        ],
        'outline-danger' => [
            'base' =>
                'border-red-300/50 bg-red-100/20 text-red-600 shadow-xs hover:border-red-400/50 hover:bg-red-100/30 hover:text-red-700 enabled:hover:border-red-400/50 enabled:hover:bg-red-100/30 enabled:hover:text-red-700 focus:ring-red-600 focus:ring-offset-white dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-400 dark:hover:border-red-700/50 dark:hover:bg-red-900/30 dark:hover:text-red-300 dark:enabled:hover:border-red-700/50 dark:enabled:hover:bg-red-900/30 dark:enabled:hover:text-red-300 dark:focus:ring-offset-gray-800',
            'active' =>
                '[&[data-active]]:border-red-400/50 [&[data-active]]:bg-red-100/30 [&[data-active]]:text-red-700 dark:[&[data-active]]:border-red-700/50 dark:[&[data-active]]:bg-red-900/30 dark:[&[data-active]]:text-red-300',
        ],
    ];

    // Size classes (shared between regular and AI buttons)
    $sizeClasses = match ($size) {
        'xs' => 'min-h-6 gap-1.5 px-2 text-[10px] [&>svg]:size-3.5 [&>span>svg]:size-3.5',
        'sm' => 'min-h-8 gap-1.5 px-3 text-xs [&>svg]:size-3.5 [&>span>svg]:size-3.5',
        'lg' => 'min-h-12 gap-2.5 px-6 text-sm [&>svg]:size-5 [&>span>svg]:size-5',
        default => 'min-h-10 px-4 py-2 text-xs [&>svg]:size-4 [&>span>svg]:size-4',
    };

    // Base classes shared between regular and AI buttons
    $baseClasses = Ui::classes()
        ->add(
            'inline-flex cursor-pointer select-none items-center justify-center gap-2 whitespace-nowrap border font-semibold uppercase',
        )
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add('[&:has(>svg):not(:has(>span))]:aspect-square [&:has(>svg):not(:has(>span))]:px-0')
        ->add($sizeClasses)
        ->when($square, 'aspect-square px-0!')
        ->when($loading, 'pointer-events-none');

    // Regular button classes
    $variantData = $variants[$variant] ?? $variants['default'];
    $classes = Ui::classes($baseClasses)
        ->add('rounded-md')
        ->add('focus:ring-1 focus:ring-offset-1 focus:outline-none')
        ->add('[[data-field]+&]:mt-4 [[data-section]+&]:mt-4')
        ->add($variantData['base'])
        ->add($variantData['active'])
        ->when($type === 'submit', '[[data-section]+&]:self-end')
        ->merge($attributes->only('class'));

    $linkClasses = Ui::classes($baseClasses)
        ->add('rounded-md')
        ->add('focus:ring-1 focus:ring-offset-1 focus:outline-none')
        ->add('[[data-field]+&]:mt-4 [[data-section]+&]:mt-4')
        ->add($variantData['base'])
        ->add($variantData['active'])
        ->when($disabled || $loading, 'pointer-events-none')
        ->when($disabled, 'opacity-50')
        ->merge($attributes->only('class'));

    // AI button classes
    $aiWrapperClasses = Ui::classes()
        ->add('group/ai relative inline-flex rounded-full p-0.25')
        ->add('transition-transform duration-500 active:scale-[0.98]')
        ->add('[[data-field]+&]:mt-4 [[data-section]+&]:mt-4')
        ->merge($attributes->only('class'));

    $aiClasses = Ui::classes($baseClasses)
        ->add('relative rounded-full border-transparent bg-white focus:outline-none')
        ->add('dark:bg-gray-900');

    $aiLinkClasses = Ui::classes($aiClasses)
        ->when($disabled || $loading, 'pointer-events-none')
        ->when($disabled, 'opacity-50');
@endphp

@if ($isAi)
    <div class="{{ $aiWrapperClasses }}" {{ $attributes->only('data-*') }} data-button>
        {{-- Glow effect --}}
        <span
            class="absolute inset-0 animate-[shimmer_5s_ease-in-out_infinite] rounded-full bg-[linear-gradient(90deg,theme(colors.orange.500),theme(colors.pink.500),theme(colors.violet.500),theme(colors.cyan.500),theme(colors.orange.500))] bg-[length:200%_100%] opacity-25 blur-sm"></span>

        {{-- Gradient border --}}
        <span
            class="absolute inset-0 animate-[shimmer_5s_ease-in-out_infinite] rounded-full bg-[linear-gradient(90deg,theme(colors.orange.500),theme(colors.pink.500),theme(colors.violet.500),theme(colors.cyan.500),theme(colors.orange.500))] bg-[length:200%_100%]"></span>

        @if ($isLink)
            <a class="{{ $aiLinkClasses }}" {{ $attributes->except(['class', 'data-*']) }} href="{{ $href }}"
                @if ($disabled || $loading) aria-disabled="true" tabindex="-1" @endif>
                @include('ui::button._content', [
                    'icon' => $icon,
                    'iconColorClass' => $iconColorClass,
                    'iconTrailingValue' => $iconTrailingValue,
                    'loading' => false,
                    'isAi' => true,
                ])
            </a>
        @else
            <button class="{{ $aiClasses }}" {{ $attributes->except(['class', 'data-*']) }} type="{{ $type }}"
                @if ($disabled) disabled @endif>
                @include('ui::button._content', [
                    'icon' => $icon,
                    'iconColorClass' => $iconColorClass,
                    'iconTrailingValue' => $iconTrailingValue,
                    'loading' => $loading,
                    'isAi' => true,
                ])
            </button>
        @endif
    </div>
@elseif ($isLink)
    <a class="{{ $linkClasses }}" {{ $attributes->except('class') }} href="{{ $href }}"
        @if ($disabled || $loading) aria-disabled="true" tabindex="-1" @endif
        @if ($active) data-active @endif data-button>
        @include('ui::button._content', [
            'icon' => $icon,
            'iconColorClass' => $iconColorClass,
            'iconTrailingValue' => $iconTrailingValue,
            'loading' => false,
            'isAi' => false,
        ])
    </a>
@else
    <button class="{{ $classes }}" {{ $attributes->except('class') }} type="{{ $type }}"
        @if ($disabled) disabled @endif @if ($active) data-active @endif
        data-button>
        @include('ui::button._content', [
            'icon' => $icon,
            'iconColorClass' => $iconColorClass,
            'iconTrailingValue' => $iconTrailingValue,
            'loading' => $loading,
            'isAi' => false,
        ])
    </button>
@endif
