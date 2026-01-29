@props([
    'active' => false,
    'disabled' => false,
    'href' => null,
    'icon' => null,
    'icon:color' => null,
    'icon:end' => null,
    'loading' => false,
    'size' => 'md',
    'square' => false,
    'type' => 'button',
    'variant' => 'default',
])

@php
    $icon_trailing = $__laravel_slots['icon:end'] ?? (${'icon:end'} ?? null);
    $icon_color = ${'icon:color'};
    $icon_color_class = $icon_color
        ? 'text-' . (preg_match('/-\d+$/', $icon_color) ? $icon_color : "{$icon_color}-500")
        : null;

    $attr_class = $attributes->get('class', '');
    $has = fn($pattern) => preg_match($pattern, $attr_class);

    $base_classes = [
        'inline-flex cursor-pointer select-none items-center justify-center gap-2 whitespace-nowrap rounded-md border font-semibold uppercase',
        'focus:ring-1 focus:ring-offset-1 focus:outline-none',
        'disabled:cursor-not-allowed disabled:opacity-50',
        '[&:has(>svg):not(:has(>span))]:aspect-square [&:has(>svg):not(:has(>span))]:px-0',
        '[[data-field]+&]:mt-4 [[data-section]+&]:mt-4',
    ];

    $size_classes = [
        'xs' => ['min-h-6 gap-1.5 px-2 text-[10px]', '[&>svg]:size-3.5 [&>span>svg]:size-3.5'],
        'sm' => ['min-h-8 gap-1.5 px-3 text-xs', '[&>svg]:size-3.5 [&>span>svg]:size-3.5'],
        'md' => ['min-h-10 px-4 py-2 text-xs', '[&>svg]:size-4 [&>span>svg]:size-4'],
        'lg' => ['min-h-12 gap-2.5 px-6 text-sm', '[&>svg]:size-5 [&>span>svg]:size-5'],
    ];

    $variant_classes = [
        'default' => [
            'border-gray-120 bg-white text-gray-700 shadow-xs',
            'hover:bg-gray-20 hover:text-gray-900 enabled:hover:bg-gray-20 enabled:hover:text-gray-900',
            'focus:ring-gray-200 focus:ring-offset-white',
            'dark:border-gray-690 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-780 dark:hover:text-gray-20 dark:enabled:hover:bg-gray-780 dark:enabled:hover:text-gray-20',
            'dark:focus:ring-gray-600 dark:focus:ring-offset-gray-800',
        ],
        'primary' => [
            'border-transparent bg-blue-500 text-gray-20 shadow-xs',
            'hover:bg-blue-550 hover:text-white enabled:hover:bg-blue-550 enabled:hover:text-white',
            'focus:ring-blue-600 focus:ring-offset-white',
            'dark:bg-blue-600 dark:hover:bg-blue-550 dark:enabled:hover:bg-blue-550',
            'dark:focus:ring-offset-gray-800',
        ],
        'secondary' => [
            'border-transparent bg-gray-700 text-gray-20 shadow-xs',
            'hover:bg-black hover:text-white enabled:hover:bg-black enabled:hover:text-white',
            'focus:ring-gray-600 focus:ring-offset-white',
            'dark:bg-gray-60 dark:text-gray-800 dark:hover:bg-white dark:hover:text-gray-980 dark:enabled:hover:bg-white dark:enabled:hover:text-gray-980',
            'dark:focus:ring-gray-100 dark:focus:ring-offset-gray-800',
        ],
        'success' => [
            'border-transparent bg-green-600 text-gray-20 shadow-xs',
            'hover:bg-green-650 hover:text-white enabled:hover:bg-green-650 enabled:hover:text-white',
            'focus:ring-green-600 focus:ring-offset-white',
            'dark:bg-green-600 dark:hover:bg-green-550 dark:enabled:hover:bg-green-550',
            'dark:focus:ring-offset-gray-800',
        ],
        'danger' => [
            'border-transparent bg-red-600 text-gray-20 shadow-xs',
            'hover:bg-red-650 hover:text-white enabled:hover:bg-red-650 enabled:hover:text-white',
            'focus:ring-red-600 focus:ring-offset-white',
            'dark:bg-red-600 dark:hover:bg-red-550 dark:enabled:hover:bg-red-550',
            'dark:focus:ring-offset-gray-800',
        ],
        'subtle' => [
            'border-transparent bg-gray-500/10',
            'hover:bg-gray-500/15 enabled:hover:bg-gray-500/15',
            'focus:ring-gray-400 focus:ring-offset-white',
            'dark:focus:ring-gray-500 dark:focus:ring-offset-gray-800',
        ],
        'ghost' => [
            'border-transparent bg-transparent text-gray-900',
            'hover:bg-gray-500/8 enabled:hover:bg-gray-500/8',
            'focus:ring-gray-400 focus:ring-offset-white',
            'dark:text-gray-100 dark:hover:bg-gray-500/10 dark:enabled:hover:bg-gray-500/10',
            'dark:focus:ring-gray-500 dark:focus:ring-offset-gray-800',
        ],
        'outline-info' => [
            'border-cyan-200 bg-cyan-50 text-cyan-700 shadow-xs',
            'hover:border-cyan-300 hover:bg-cyan-100 hover:text-cyan-800 enabled:hover:border-cyan-300 enabled:hover:bg-cyan-100 enabled:hover:text-cyan-800',
            'focus:ring-cyan-600 focus:ring-offset-white',
            'dark:border-cyan-800/50 dark:bg-cyan-900/20 dark:text-cyan-400 dark:hover:border-cyan-700/50 dark:hover:bg-cyan-900/30 dark:hover:text-cyan-300 dark:enabled:hover:border-cyan-700/50 dark:enabled:hover:bg-cyan-900/30 dark:enabled:hover:text-cyan-300',
            'dark:focus:ring-offset-gray-800',
        ],
        'outline-success' => [
            'border-green-200 bg-green-50 text-green-700 shadow-xs',
            'hover:border-green-300 hover:bg-green-100 hover:text-green-800 enabled:hover:border-green-300 enabled:hover:bg-green-100 enabled:hover:text-green-800',
            'focus:ring-green-600 focus:ring-offset-white',
            'dark:border-green-800/50 dark:bg-green-900/20 dark:text-green-400 dark:hover:border-green-700/50 dark:hover:bg-green-900/30 dark:hover:text-green-300 dark:enabled:hover:border-green-700/50 dark:enabled:hover:bg-green-900/30 dark:enabled:hover:text-green-300',
            'dark:focus:ring-offset-gray-800',
        ],
        'outline-warning' => [
            'border-amber-200 bg-amber-50 text-amber-700 shadow-xs',
            'hover:border-amber-300 hover:bg-amber-100 hover:text-amber-800 enabled:hover:border-amber-300 enabled:hover:bg-amber-100 enabled:hover:text-amber-800',
            'focus:ring-amber-600 focus:ring-offset-white',
            'dark:border-amber-800/50 dark:bg-amber-900/20 dark:text-amber-400 dark:hover:border-amber-700/50 dark:hover:bg-amber-900/30 dark:hover:text-amber-300 dark:enabled:hover:border-amber-700/50 dark:enabled:hover:bg-amber-900/30 dark:enabled:hover:text-amber-300',
            'dark:focus:ring-offset-gray-800',
        ],
        'outline-danger' => [
            'border-red-200 bg-red-50 text-red-700 shadow-xs',
            'hover:border-red-300 hover:bg-red-100 hover:text-red-800 enabled:hover:border-red-300 enabled:hover:bg-red-100 enabled:hover:text-red-800',
            'focus:ring-red-600 focus:ring-offset-white',
            'dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-400 dark:hover:border-red-700/50 dark:hover:bg-red-900/30 dark:hover:text-red-300 dark:enabled:hover:border-red-700/50 dark:enabled:hover:bg-red-900/30 dark:enabled:hover:text-red-300',
            'dark:focus:ring-offset-gray-800',
        ],
        'ai' => ['relative border-transparent rounded-md bg-white dark:bg-gray-900', 'focus:outline-none'],
    ];

    $is_ai = $variant === 'ai';

    $ai_wrapper_classes = [
        'group/ai relative rounded-full inline-flex p-0.25',
        'transition-transform duration-500 active:scale-[0.98]',
        '[[data-field]+&]:mt-4 [[data-section]+&]:mt-4',
    ];

    $active_classes = [
        'default' => [
            'bg-gray-20 text-gray-900 dark:bg-gray-780 dark:text-gray-20',
            '[&[data-active]]:bg-gray-20 [&[data-active]]:text-gray-900 dark:[&[data-active]]:bg-gray-780 dark:[&[data-active]]:text-gray-20',
        ],
        'primary' => [
            'bg-blue-550 text-white dark:bg-blue-550',
            '[&[data-active]]:bg-blue-550 [&[data-active]]:text-white dark:[&[data-active]]:bg-blue-550',
        ],
        'secondary' => [
            'bg-black text-white dark:bg-white dark:text-gray-980',
            '[&[data-active]]:bg-black [&[data-active]]:text-white dark:[&[data-active]]:bg-white dark:[&[data-active]]:text-gray-980',
        ],
        'success' => [
            'bg-green-650 text-white dark:bg-green-550',
            '[&[data-active]]:bg-green-650 [&[data-active]]:text-white dark:[&[data-active]]:bg-green-550',
        ],
        'danger' => [
            'bg-red-650 text-white dark:bg-red-550',
            '[&[data-active]]:bg-red-650 [&[data-active]]:text-white dark:[&[data-active]]:bg-red-550',
        ],
        'subtle' => ['bg-gray-500/15', '[&[data-active]]:bg-gray-500/15'],
        'ghost' => [
            'bg-gray-500/8 dark:bg-gray-500/10',
            '[&[data-active]]:bg-gray-500/8 dark:[&[data-active]]:bg-gray-500/10',
        ],
        'outline-info' => [
            'border-cyan-300 bg-cyan-100 text-cyan-800 dark:border-cyan-700/50 dark:bg-cyan-900/30 dark:text-cyan-300',
            '[&[data-active]]:border-cyan-300 [&[data-active]]:bg-cyan-100 [&[data-active]]:text-cyan-800 dark:[&[data-active]]:border-cyan-700/50 dark:[&[data-active]]:bg-cyan-900/30 dark:[&[data-active]]:text-cyan-300',
        ],
        'outline-success' => [
            'border-green-300 bg-green-100 text-green-800 dark:border-green-700/50 dark:bg-green-900/30 dark:text-green-300',
            '[&[data-active]]:border-green-300 [&[data-active]]:bg-green-100 [&[data-active]]:text-green-800 dark:[&[data-active]]:border-green-700/50 dark:[&[data-active]]:bg-green-900/30 dark:[&[data-active]]:text-green-300',
        ],
        'outline-warning' => [
            'border-amber-300 bg-amber-100 text-amber-800 dark:border-amber-700/50 dark:bg-amber-900/30 dark:text-amber-300',
            '[&[data-active]]:border-amber-300 [&[data-active]]:bg-amber-100 [&[data-active]]:text-amber-800 dark:[&[data-active]]:border-amber-700/50 dark:[&[data-active]]:bg-amber-900/30 dark:[&[data-active]]:text-amber-300',
        ],
        'outline-danger' => [
            'border-red-300 bg-red-100 text-red-800 dark:border-red-700/50 dark:bg-red-900/30 dark:text-red-300',
            '[&[data-active]]:border-red-300 [&[data-active]]:bg-red-100 [&[data-active]]:text-red-800 dark:[&[data-active]]:border-red-700/50 dark:[&[data-active]]:bg-red-900/30 dark:[&[data-active]]:text-red-300',
        ],
        'ai' => ['', ''],
    ];

    $is_link = $href !== null;

    $base_classes_for_ai = array_filter(
        $base_classes,
        fn($class) => !str_contains($class, '[[data-field]') &&
            !str_contains($class, '[[data-section]') &&
            !str_contains($class, 'focus:ring'),
    );
@endphp

@if ($is_ai)
    <div @class($ai_wrapper_classes) data-button>
        {{-- Glow effect --}}
        <span
            class="absolute inset-0 rounded-full bg-[linear-gradient(90deg,theme(colors.orange.500),theme(colors.pink.500),theme(colors.violet.500),theme(colors.cyan.500),theme(colors.orange.500))] bg-[length:200%_100%] opacity-25 blur-sm animate-[shimmer_5s_ease-in-out_infinite]"></span>

        {{-- Gradient border --}}
        <span
            class="absolute inset-0 rounded-full bg-[linear-gradient(90deg,theme(colors.orange.500),theme(colors.pink.500),theme(colors.violet.500),theme(colors.cyan.500),theme(colors.orange.500))] bg-[length:200%_100%] animate-[shimmer_5s_ease-in-out_infinite]"></span>

        @if ($is_link)
            <a {{ $attributes->class([
                ...$base_classes_for_ai,
                ...$size_classes[$size] ?? $size_classes['md'],
                ...$variant_classes[$variant],
                'aspect-square px-0!' => $square,
                'pointer-events-none' => $disabled || $loading,
                'opacity-50' => $disabled,
            ]) }}
                href="{{ $href }}" @if ($disabled || $loading) aria-disabled="true" tabindex="-1" @endif>
                @if ($icon && is_string($icon))
                    <ui:icon :name="$icon" @class([$icon_color_class ?? 'text-gray-500']) />
                @endif

                @if ($slot->isNotEmpty())
                    <span>{{ $slot }}</span>
                @endif

                @if ($icon_trailing && is_string($icon_trailing))
                    <ui:icon :name="$icon_trailing" @class(['ml-auto', $icon_color_class ?? 'text-gray-500']) />
                @endif
            </a>
        @else
            <button
                {{ $attributes->class([
                    ...$base_classes_for_ai,
                    ...['rounded-full!'],
                    ...$size_classes[$size] ?? $size_classes['md'],
                    ...$variant_classes[$variant],
                    'aspect-square px-0!' => $square,
                    'pointer-events-none' => $loading,
                ]) }}
                type="{{ $type }}" @if ($disabled) disabled @endif>
                @if ($loading)
                    <ui:icon name="loader-circle" @class(['animate-spin', $icon_color_class ?? 'text-gray-500']) />
                @endif

                @if ($icon && is_string($icon))
                    <ui:icon :name="$icon" @class([$icon_color_class ?? 'text-gray-500']) />
                @endif

                @if ($slot->isNotEmpty())
                    <span>{{ $slot }}</span>
                @endif

                @if ($icon_trailing && is_string($icon_trailing))
                    <ui:icon :name="$icon_trailing" @class(['ml-auto', $icon_color_class ?? 'text-gray-500']) />
                @endif
            </button>
        @endif
    </div>
@elseif ($is_link)
    <a {{ $attributes->class([
        ...$base_classes,
        ...$size_classes[$size] ?? $size_classes['md'],
        ...$variant_classes[$variant] ?? $variant_classes['default'],
        ($active_classes[$variant] ?? $active_classes['default'])[1],
        ($active_classes[$variant] ?? $active_classes['default'])[0] => $active,
        'aspect-square px-0!' => $square,
        'pointer-events-none' => $disabled || $loading,
        'opacity-50' => $disabled,
    ]) }}
        href="{{ $href }}" @if ($disabled || $loading) aria-disabled="true" tabindex="-1" @endif
        @if ($active) data-active @endif data-button>
        @if ($icon && is_string($icon))
            <ui:icon :name="$icon" :class="$icon_color_class" />
        @endif

        @if ($slot->isNotEmpty())
            <span>{{ $slot }}</span>
        @endif

        @if ($icon_trailing && is_string($icon_trailing))
            <ui:icon :name="$icon_trailing" @class(['ml-auto', $icon_color_class]) />
        @endif
    </a>
@else
    <button
        {{ $attributes->class([
            ...$base_classes,
            ...$size_classes[$size] ?? $size_classes['md'],
            ...$variant_classes[$variant] ?? $variant_classes['default'],
            ($active_classes[$variant] ?? $active_classes['default'])[1],
            ($active_classes[$variant] ?? $active_classes['default'])[0] => $active,
            'aspect-square px-0!' => $square,
            'pointer-events-none' => $loading,
            '[[data-section]+&]:self-end' => $type === 'submit',
        ]) }}
        type="{{ $type }}" @if ($disabled) disabled @endif
        @if ($active) data-active @endif data-button>
        @if ($loading)
            <ui:icon name="loader-circle" @class(['animate-spin', $icon_color_class]) />
        @endif

        @if ($icon && is_string($icon))
            <ui:icon :name="$icon" :class="$icon_color_class" />
        @endif

        @if ($slot->isNotEmpty())
            <span>{{ $slot }}</span>
        @endif

        @if ($icon_trailing && is_string($icon_trailing))
            <ui:icon :name="$icon_trailing" @class(['ml-auto', $icon_color_class]) />
        @endif
    </button>
@endif
