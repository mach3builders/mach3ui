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
        ->add(
            'flex min-w-80 max-w-md items-start gap-3 rounded-lg border p-4 shadow-[0_10px_15px_-3px_rgb(0_0_0/0.05),0_4px_6px_-4px_rgb(0_0_0/0.05)] backdrop-blur-xl',
        )
        ->add(
            match ($variant) {
                'info'
                    => 'border-cyan-200 bg-cyan-50/90 [&>[data-toast-icon]]:text-cyan-600 dark:border-cyan-800/50 dark:bg-cyan-900/30 dark:[&>[data-toast-icon]]:text-cyan-500',
                'success'
                    => 'border-green-200 bg-green-50/90 [&>[data-toast-icon]]:text-green-600 dark:border-green-800/50 dark:bg-green-900/30 dark:[&>[data-toast-icon]]:text-green-500',
                'warning'
                    => 'border-amber-200 bg-amber-50/90 [&>[data-toast-icon]]:text-amber-600 dark:border-amber-800/50 dark:bg-amber-900/30 dark:[&>[data-toast-icon]]:text-amber-500',
                'danger'
                    => 'border-red-200 bg-red-50/90 [&>[data-toast-icon]]:text-red-600 dark:border-red-800/50 dark:bg-red-900/30 dark:[&>[data-toast-icon]]:text-red-500',
                default
                    => 'border-gray-100 bg-gray-20/90 text-gray-700 [&>[data-toast-icon]]:text-gray-500 dark:border-gray-700 dark:bg-gray-780/90 dark:text-gray-200 dark:[&>[data-toast-icon]]:text-gray-400',
            },
        );

@endphp

<div {{ $attributes->class($classes) }} x-data="{ open: false }" x-init="$nextTick(() => open = true)" x-show="open"
    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-x-full"
    x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 translate-x-full" data-toast
    data-variant="{{ $variant }}">
    @if ($title)
        @if ($icon !== false)
            <ui:icon :name="$icon ?? $icons[$variant] ?? $icons['default']" class="mt-0.5 size-5" data-toast-icon />
        @endif

        <div class="flex-1">
            <ui:toast.title>{{ $title }}</ui:toast.title>

            @if ($description)
                <ui:toast.description>{{ $description }}</ui:toast.description>
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
