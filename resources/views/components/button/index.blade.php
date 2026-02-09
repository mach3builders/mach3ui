@props([
    'active' => false,
    'disabled' => false,
    'href' => null,
    'icon' => null,
    'icon:color' => null,
    'icon:end' => null,
    'icon:end:color' => null,
    'loading' => false,
    'size' => 'md',
    'square' => false,
    'variant' => 'default',
])

@php
    $tag = $href ? 'a' : 'button';
    $isAi = $variant === 'ai';

    // Get colon props from $__data or fall back to $attributes
    $iconEnd = $__data['icon:end'] ?? $attributes->get('icon:end');
    $iconColor = $__data['icon:color'] ?? $attributes->get('icon:color');
    $iconEndColor = $__data['icon:end:color'] ?? $attributes->get('icon:end:color');
    $isIconOnly = ($icon || $iconEnd) && $slot->isEmpty() && !($icon && $iconEnd);
    $hasText = $slot->isNotEmpty();
    $textOnly = !$icon && $hasText && !$iconEnd;

    // Base classes shared between regular and AI buttons
    $baseClasses = Ui::classes()
        ->add('group')
        ->add(
            'inline-flex cursor-pointer select-none items-center justify-center gap-2 whitespace-nowrap border font-semibold uppercase',
        )
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add('[&>svg]:size-4 [&>svg]:shrink-0')
        ->when($loading, 'pointer-events-none')
        ->add($size, [
            'xs' => 'min-h-6 gap-1.5 px-2 text-[10px] [&>svg]:size-3.5 [&>span>svg]:size-3.5',
            'sm' => 'min-h-8 gap-1.5 px-3 text-xs [&>svg]:size-3.5 [&>span>svg]:size-3.5',
            'md' => 'min-h-10 px-4 py-2 text-xs [&>span>svg]:size-4',
            'lg' => 'min-h-12 gap-2.5 px-6 text-sm [&>svg]:size-5 [&>span>svg]:size-5',
        ])
        ->when($square || $isIconOnly, 'aspect-square px-0!');

    // Regular button classes
    $classes = Ui::classes($baseClasses)
        ->add('[[data-field]+&]:mt-6')
        ->add('[[data-fields]+&]:mt-6')
        ->add('rounded-md')
        ->add('focus:ring-1 focus:ring-offset-1 focus:outline-none')
        ->add($variant, [
            'default' =>
                'border-gray-100 bg-white text-gray-900 shadow-xs hover:border-gray-140 hover:bg-gray-20 focus:ring-gray-200 focus:ring-offset-white dark:border-gray-700 dark:bg-gray-780 dark:text-gray-100 dark:hover:border-gray-660 dark:hover:bg-gray-750 dark:focus:ring-gray-600 dark:focus:ring-offset-gray-800 data-active:border-gray-150 data-active:bg-gray-30 dark:data-active:border-gray-660 dark:data-active:bg-gray-750',
            'primary' =>
                'border-transparent bg-blue-500 text-gray-20 shadow-xs hover:bg-blue-550 hover:text-white focus:ring-blue-600 focus:ring-offset-white dark:bg-blue-600 dark:hover:bg-blue-550 dark:focus:ring-offset-gray-800 data-active:bg-blue-550 data-active:text-white',
            'secondary' =>
                'border-transparent bg-gray-700 text-gray-20 shadow-xs hover:bg-black hover:text-white focus:ring-gray-600 focus:ring-offset-white dark:bg-gray-60 dark:text-gray-800 dark:hover:bg-white dark:hover:text-gray-980 dark:focus:ring-gray-100 dark:focus:ring-offset-gray-800 data-active:bg-black data-active:text-white dark:data-active:bg-white dark:data-active:text-gray-980',
            'success' =>
                'border-transparent bg-green-600 text-gray-20 shadow-xs hover:bg-green-650 hover:text-white focus:ring-green-600 focus:ring-offset-white dark:hover:bg-green-550 dark:focus:ring-offset-gray-800 data-active:bg-green-650 data-active:text-white dark:data-active:bg-green-550',
            'danger' =>
                'border-transparent bg-red-600 text-gray-20 shadow-xs hover:bg-red-650 hover:text-white focus:ring-red-600 focus:ring-offset-white dark:hover:bg-red-550 dark:focus:ring-offset-gray-800 data-active:bg-red-650 data-active:text-white dark:data-active:bg-red-550',
            'subtle' =>
                'border-transparent bg-gray-500/10 text-gray-700 hover:bg-gray-500/15 focus:ring-gray-400 focus:ring-offset-white dark:text-gray-300 dark:focus:ring-gray-500 dark:focus:ring-offset-gray-800 data-active:bg-gray-500/15',
            'ghost' =>
                'border-transparent bg-transparent text-gray-900 hover:bg-gray-500/8 focus:ring-gray-400 focus:ring-offset-white dark:text-gray-100 dark:hover:bg-gray-500/10 dark:focus:ring-gray-500 dark:focus:ring-offset-gray-800 data-active:bg-gray-500/8 dark:data-active:bg-gray-500/10',
            'outline' =>
                'border-gray-100 bg-white text-gray-900 shadow-xs hover:border-gray-150 hover:bg-gray-30 focus:ring-gray-200 focus:ring-offset-white dark:border-gray-700 dark:bg-gray-780 dark:text-gray-100 dark:hover:border-gray-660 dark:hover:bg-gray-750 dark:focus:ring-gray-600 dark:focus:ring-offset-gray-800 data-active:border-gray-150 data-active:bg-gray-30 dark:data-active:border-gray-660 dark:data-active:bg-gray-750',
            'outline-info' =>
                'border-cyan-300/50 bg-cyan-100/20 text-cyan-600 shadow-xs hover:border-cyan-400/50 hover:bg-cyan-100/30 hover:text-cyan-700 focus:ring-cyan-600 focus:ring-offset-white dark:border-cyan-800/50 dark:bg-cyan-900/20 dark:text-cyan-400 dark:hover:border-cyan-700/50 dark:hover:bg-cyan-900/30 dark:hover:text-cyan-300 dark:focus:ring-offset-gray-800 data-active:border-cyan-400/50 data-active:bg-cyan-100/30 data-active:text-cyan-700 dark:data-active:border-cyan-700/50 dark:data-active:bg-cyan-900/30 dark:data-active:text-cyan-300',
            'outline-success' =>
                'border-green-300/50 bg-green-100/20 text-green-600 shadow-xs hover:border-green-400/50 hover:bg-green-100/30 hover:text-green-700 focus:ring-green-600 focus:ring-offset-white dark:border-green-800/50 dark:bg-green-900/20 dark:text-green-400 dark:hover:border-green-700/50 dark:hover:bg-green-900/30 dark:hover:text-green-300 dark:focus:ring-offset-gray-800 data-active:border-green-400/50 data-active:bg-green-100/30 data-active:text-green-700 dark:data-active:border-green-700/50 dark:data-active:bg-green-900/30 dark:data-active:text-green-300',
            'outline-warning' =>
                'border-amber-300/50 bg-amber-100/20 text-amber-600 shadow-xs hover:border-amber-400/50 hover:bg-amber-100/30 hover:text-amber-700 focus:ring-amber-600 focus:ring-offset-white dark:border-amber-800/50 dark:bg-amber-900/20 dark:text-amber-400 dark:hover:border-amber-700/50 dark:hover:bg-amber-900/30 dark:hover:text-amber-300 dark:focus:ring-offset-gray-800 data-active:border-amber-400/50 data-active:bg-amber-100/30 data-active:text-amber-700 dark:data-active:border-amber-700/50 dark:data-active:bg-amber-900/30 dark:data-active:text-amber-300',
            'outline-danger' =>
                'border-red-300/50 bg-red-100/20 text-red-600 shadow-xs hover:border-red-400/50 hover:bg-red-100/30 hover:text-red-700 focus:ring-red-600 focus:ring-offset-white dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-400 dark:hover:border-red-700/50 dark:hover:bg-red-900/30 dark:hover:text-red-300 dark:focus:ring-offset-gray-800 data-active:border-red-400/50 data-active:bg-red-100/30 data-active:text-red-700 dark:data-active:border-red-700/50 dark:data-active:bg-red-900/30 dark:data-active:text-red-300',
            'ai' => '', // AI uses separate wrapper styling
        ])
        ->when($href && $disabled, 'pointer-events-none opacity-50')
        ->merge($attributes);

    // AI button wrapper classes
    $aiWrapperClasses = Ui::classes()
        ->add('group/ai relative inline-flex rounded-full p-0.25')
        ->add('transition-transform duration-500 active:scale-[0.98]')
        ->when($disabled, 'opacity-50 cursor-not-allowed')
        ->merge($attributes);

    // AI button inner classes
    $aiClasses = Ui::classes($baseClasses)
        ->add('relative z-10 w-full rounded-full border-transparent bg-white text-gray-900 focus:outline-none')
        ->add('dark:bg-gray-900 dark:text-gray-100')
        ->when($href && ($disabled || $loading), 'pointer-events-none');

    // Gradient for AI button
    $aiGradient =
        'bg-[linear-gradient(90deg,theme(colors.orange.500),theme(colors.pink.500),theme(colors.violet.500),theme(colors.cyan.500),theme(colors.orange.500))]';
@endphp

@if ($isAi)
    {{-- AI Button with gradient border --}}
    <div class="{{ $aiWrapperClasses }}" data-button data-variant="ai">
        {{-- Glow effect --}}
        <span
            class="absolute inset-0 animate-[shimmer_5s_ease-in-out_infinite] rounded-full {{ $aiGradient }} bg-[length:200%_100%] opacity-25 blur-sm"></span>

        {{-- Gradient border --}}
        <span
            class="absolute inset-0 animate-[shimmer_5s_ease-in-out_infinite] rounded-full {{ $aiGradient }} bg-[length:200%_100%]"></span>

        <{{ $tag }} @if ($href) href="{{ $href }}" @endif
            @if ($tag === 'button' && !$attributes->has('type')) type="button" @endif @if ($tag === 'button' && $disabled) disabled @endif
            @if ($tag === 'a' && $disabled) aria-disabled="true" tabindex="-1" @endif
            @if ($loading) aria-busy="true" data-loading @endif {{ $attributes->except('class') }}
            class="{{ $aiClasses }}">
            @include('ui::components.button._content')
            </{{ $tag }}>
    </div>
@else
    {{-- Regular Button --}}
    <{{ $tag }} @if ($href) href="{{ $href }}" @endif
        @if ($tag === 'button' && !$attributes->has('type')) type="button" @endif @if ($tag === 'button' && $disabled) disabled @endif
        @if ($tag === 'a' && $disabled) aria-disabled="true" tabindex="-1" @endif
        @if ($loading) aria-busy="true" data-loading @endif
        @if ($active) data-active @endif data-button data-variant="{{ $variant }}"
        {{ $attributes->except('class') }} class="{{ $classes }}">
        @include('ui::components.button._content')
        </{{ $tag }}>
@endif
