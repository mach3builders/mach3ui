@props([
    'description' => null,
    'dismissible' => true,
    'icon' => null,
    'title' => null,
    'variant' => 'default',
])

@php
    $icons = [
        'default' => 'info',
        'info' => 'info',
        'success' => 'circle-check',
        'warning' => 'triangle-alert',
        'danger' => 'circle-x',
    ];

    $classes = Ui::classes()
        ->add('flex min-w-80 max-w-md items-start gap-3 rounded-lg border p-4 shadow-lg backdrop-blur-xl')
        ->add($variant, [
            'default' => 'border-gray-100 bg-gray-20/90 dark:border-gray-700 dark:bg-gray-780/90',
            'info' => 'border-cyan-200 bg-cyan-50/90 dark:border-cyan-800/50 dark:bg-cyan-900/30',
            'success' => 'border-green-200 bg-green-50/90 dark:border-green-800/50 dark:bg-green-900/30',
            'warning' => 'border-amber-200 bg-amber-50/90 dark:border-amber-800/50 dark:bg-amber-900/30',
            'danger' => 'border-red-200 bg-red-50/90 dark:border-red-800/50 dark:bg-red-900/30',
        ])
        ->merge($attributes);

    $iconClasses = Ui::classes()
        ->add('mt-0.5 size-5 shrink-0')
        ->add($variant, [
            'default' => 'text-gray-500 dark:text-gray-400',
            'info' => 'text-cyan-600 dark:text-cyan-500',
            'success' => 'text-green-600 dark:text-green-500',
            'warning' => 'text-amber-600 dark:text-amber-500',
            'danger' => 'text-red-600 dark:text-red-500',
        ]);
@endphp

<div
    x-data="{ open: false }"
    x-init="$nextTick(() => open = true)"
    x-show="open"
    x-cloak
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-x-full"
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-full"
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
    data-toast
    data-variant="{{ $variant }}"
>
    @if ($title)
        @if ($icon !== false)
            <ui:icon :name="$icon ?? $icons[$variant] ?? $icons['default']" class="{{ $iconClasses }}" data-toast-icon />
        @endif

        <div class="flex-1" data-toast-content>
            <ui:toast.title>{{ $title }}</ui:toast.title>

            @if ($description)
                <ui:toast.description :variant="$variant">{!! $description !!}</ui:toast.description>
            @endif

            {{ $slot }}
        </div>

        @if ($dismissible)
            <ui:toast.close :variant="$variant" />
        @endif
    @else
        {{ $slot }}
    @endif
</div>
