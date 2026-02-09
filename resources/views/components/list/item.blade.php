@props([
    'href' => null,
    'icon' => null,
    'icon:end' => null,
    'label' => null,
    'route' => null,
    'value' => null,
])

@php
    $url = $route ? route($route) : $href;
    $iconEnd = $__data['icon:end'] ?? null;
    $tag = $url ? 'a' : 'div';
    $hasLabelValue = $label || $value || $icon;

    $classes = Ui::classes()
        ->add('px-4 py-3')
        ->add('text-gray-700 dark:text-gray-200')
        ->add('border-b border-gray-60 last:border-b-0 dark:border-gray-740')
        ->when($url, 'cursor-pointer hover:bg-black/[0.02] dark:hover:bg-white/[0.02]')
        ->when($hasLabelValue, 'flex items-center justify-between gap-4')
        ->merge($attributes);

    $labelClasses = Ui::classes()
        ->add('flex items-center gap-3 font-medium')
        ->add('text-gray-900 dark:text-white')
        ->add('[&>svg]:size-5 [&>svg]:shrink-0 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-500');

    $valueClasses = Ui::classes()
        ->add('flex items-center gap-2 text-right')
        ->add('text-gray-500 dark:text-gray-400')
        ->add('[&>svg]:size-4 [&>svg]:shrink-0');
@endphp

<{{ $tag }} @if ($url) href="{{ $url }}" @endif
    {{ $attributes->except('class') }} class="{{ $classes }}" data-list-item>
    @if ($hasLabelValue)
        <span class="{{ $labelClasses }}">
            @if ($icon)
                <ui:icon :name="$icon" />
            @endif

            {{ $label ?? $slot }}
        </span>

        @if ($value || $iconEnd)
            <span class="{{ $valueClasses }}">
                {{ $value }}

                @if ($iconEnd)
                    <ui:icon :name="$iconEnd" />
                @endif
            </span>
        @endif
    @else
        {{ $slot }}
    @endif
    </{{ $tag }}>
