@props([
    'active' => false,
    'badge' => null,
    'badge:variant' => 'default',
    'disabled' => false,
    'icon' => null,
    'icon:end' => null,
    'indicator' => false,
    'indicator:variant' => 'default',
    'variant' => 'default',
])

@php
    $badgeVariant = $__data['badge:variant'] ?? 'default';
    $iconEnd = $__data['icon:end'] ?? null;
    $indicatorVariant = $__data['indicator:variant'] ?? 'default';
    $tag = $attributes->has('href') ? 'a' : 'button';

    $classes = Ui::classes()
        ->add('flex cursor-pointer items-center text-left gap-2 rounded-md px-3 py-2 text-[13px] leading-5')
        ->add('[&>svg]:size-4 [&>svg]:shrink-0')
        ->add($variant, [
            'default' => $active
                ? 'bg-black/5 text-gray-900 dark:bg-white/5 dark:text-gray-100 [&>svg]:text-gray-500 dark:[&>svg]:text-gray-400'
                : 'text-gray-600 hover:bg-black/5 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-100 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-500 [&:hover>svg]:text-gray-500 dark:[&:hover>svg]:text-gray-400',
            'danger' => 'text-red-600 hover:bg-red-50 hover:text-red-700 dark:text-red-500 dark:hover:bg-red-950/50 dark:hover:text-red-400 [&>svg]:text-red-500 [&:hover>svg]:text-red-600 dark:[&>svg]:text-red-600 dark:[&:hover>svg]:text-red-500',
        ])
        ->when($disabled, 'pointer-events-none opacity-50')
        ->merge($attributes);

    $badgeLabel = is_numeric($badge) && $badge > 99 ? '99+' : $badge;

    $indicatorClasses = Ui::classes()
        ->add('size-2 rounded-full')
        ->add($indicatorVariant, [
            'default' => 'bg-gray-700 dark:bg-gray-60',
            'primary' => 'bg-blue-500 dark:bg-blue-600',
            'danger' => 'bg-red-500 dark:bg-red-600',
            'warning' => 'bg-amber-500 dark:bg-amber-600',
            'success' => 'bg-green-500 dark:bg-green-600',
        ]);
@endphp

<{{ $tag }} @if ($tag === 'button') type="button" @endif
    @if ($disabled) @if ($tag === 'button') disabled @else aria-disabled="true" tabindex="-1" @endif
    @endif
    data-nav-item
    {{ $attributes->except('class') }}
    class="{{ $classes }}">
    @if ($icon)
        <ui:icon :name="$icon" />
    @endif

    <span class="flex-1">{{ $slot }}</span>

    @if ($badge)
        <ui:badge variant="{{ $badgeVariant }}">{{ $badgeLabel }}</ui:badge>
    @endif

    @if ($indicator)
        <span class="{{ $indicatorClasses }}" data-nav-indicator></span>
    @endif

    @if ($iconEnd)
        <ui:icon :name="$iconEnd" />
    @endif
    </{{ $tag }}>
