@props([
    'href' => null,
    'icon' => null,
    'icon:end' => null,
    'route' => null,
    'size' => 'md',
    'variant' => 'default',
])

@php
    $url = $route ? route($route) : $href ?? '#';
    $iconEnd = $__data['icon:end'] ?? null;

    $classes = Ui::classes()
        ->add('inline-flex items-center gap-1.5')
        ->add('[&>svg]:shrink-0')
        ->add(
            match ($variant) {
                'primary'
                    => 'underline underline-offset-4 text-blue-600 decoration-blue-300 hover:decoration-blue-500 dark:text-blue-400 dark:decoration-blue-700 dark:hover:decoration-blue-500',
                'muted' => 'no-underline text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100',
                'subtle'
                    => 'no-underline hover:underline underline-offset-4 text-gray-900 decoration-gray-300 hover:decoration-gray-500 dark:text-gray-100 dark:decoration-gray-600 dark:hover:decoration-gray-400',
                default
                    => 'underline underline-offset-4 text-gray-900 decoration-gray-300 hover:decoration-gray-500 dark:text-gray-100 dark:decoration-gray-600 dark:hover:decoration-gray-400',
            },
        )
        ->add(
            match ($size) {
                'xs' => 'text-xs [&>svg]:size-3',
                'sm' => 'text-sm [&>svg]:size-3.5',
                default => '[&>svg]:size-4',
            },
        )
        ->merge($attributes->only('class'));
@endphp

<a class="{{ $classes }}" {{ $attributes->except('class') }} href="{{ $url }}" data-link>
    @if ($icon)
        <ui:icon :name="$icon" />
    @endif

    {{ $slot }}

    @if ($iconEnd)
        <ui:icon :name="$iconEnd" />
    @endif
</a>
