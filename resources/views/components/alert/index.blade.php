@props([
    'icon' => null,
    'message' => null,
    'title' => null,
    'variant' => 'default',
])

@php
    $icons = [
        'default' => 'megaphone',
        'info' => 'info',
        'success' => 'circle-check',
        'warning' => 'triangle-alert',
        'danger' => 'circle-x',
    ];

    $classes = Ui::classes()
        ->add('flex gap-3 rounded-lg border p-4')
        ->add(
            match ($variant) {
                'info' => 'border-cyan-200 bg-cyan-50 dark:border-cyan-800/50 dark:bg-cyan-900/20',
                'success' => 'border-green-200 bg-green-50 dark:border-green-800/50 dark:bg-green-900/20',
                'warning' => 'border-amber-200 bg-amber-50 dark:border-amber-800/50 dark:bg-amber-900/20',
                'danger' => 'border-red-200 bg-red-50 dark:border-red-800/50 dark:bg-red-900/20',
                default
                    => 'bg-gray-20 border-gray-100 text-gray-700 dark:bg-gray-780 dark:border-gray-700 dark:text-gray-200',
            },
        );

    $iconClasses = Ui::classes()
        ->add('mt-0.5 size-5 shrink-0')
        ->add(
            match ($variant) {
                'info' => 'text-cyan-600 dark:text-cyan-500',
                'success' => 'text-green-600 dark:text-green-500',
                'warning' => 'text-amber-600 dark:text-amber-500',
                'danger' => 'text-red-600 dark:text-red-500',
                default => 'text-gray-500 dark:text-gray-400',
            },
        );

    $titleClasses = Ui::classes()->add('font-semibold leading-6 text-gray-900 dark:text-white');
    $messageClasses = Ui::classes()->add('leading-relaxed text-gray-600 dark:text-gray-300');
@endphp

<div {{ $attributes->class($classes) }} data-alert data-variant="{{ $variant }}">
    <ui:icon :name="$icon ?? $icons[$variant] ?? $icons['default']" :class="$iconClasses" />

    <div>
        @if ($title)
            <div class="{{ $titleClasses }}" data-alert-title>{{ $title }}</div>
        @endif

        @if ($message)
            <div class="{{ $messageClasses }}" data-alert-message>{{ $message }}</div>
        @endif

        {{ $slot }}
    </div>
</div>
