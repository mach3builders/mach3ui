@blaze

@props([
    'disabled' => false,
    'href' => null,
    'icon' => null,
    'icon:end' => null,
    'route' => null,
    'size' => 'md',
    'variant' => 'default',
])

@php
    $url = $route ? route($route) : $href;
    $iconEnd = $__data['icon:end'] ?? null;

    $classes = Ui::classes()
        ->add('inline-flex items-center gap-1.5')
        ->add('[&>svg]:shrink-0')
        ->add($variant, [
            'default' =>
                'underline underline-offset-4 text-gray-900 decoration-gray-300 hover:decoration-gray-500 dark:text-gray-100 dark:decoration-gray-600 dark:hover:decoration-gray-400',
            'primary' =>
                'underline underline-offset-4 text-primary decoration-primary/40 hover:decoration-primary dark:text-primary dark:decoration-primary/40 dark:hover:decoration-primary',
            'muted' => 'no-underline text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100',
            'subtle' =>
                'no-underline hover:underline underline-offset-4 text-gray-900 decoration-gray-300 hover:decoration-gray-500 dark:text-gray-100 dark:decoration-gray-600 dark:hover:decoration-gray-400',
        ])
        ->add($size, [
            'xs' => 'text-xs [&>svg]:size-3',
            'sm' => 'text-sm [&>svg]:size-3.5',
            'md' => 'text-sm [&>svg]:size-4',
            'lg' => 'text-base [&>svg]:size-4',
        ])
        ->when($disabled, 'pointer-events-none opacity-50')
        ->merge($attributes);
@endphp

<a @if ($url) href="{{ $url }}" @endif
    @if ($disabled) aria-disabled="true" tabindex="-1" @endif {{ $attributes->except('class') }}
    class="{{ $classes }}">
    @if ($icon)
        <ui:icon :name="$icon" />
    @endif

    {{ $slot }}

    @if ($iconEnd)
        <ui:icon :name="$iconEnd" />
    @endif
</a>
