@blaze

@props([
    'dismissable' => false,
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
        ->add($variant, [
            'default' =>
                'border-gray-100 bg-gray-20 text-gray-700 dark:border-gray-700 dark:bg-gray-780 dark:text-gray-200',
            'info' => 'border-cyan-200 bg-cyan-50 dark:border-cyan-800/50 dark:bg-cyan-900/20',
            'success' => 'border-green-200 bg-green-50 dark:border-green-800/50 dark:bg-green-900/20',
            'warning' => 'border-amber-200 bg-amber-50 dark:border-amber-800/50 dark:bg-amber-900/20',
            'danger' => 'border-red-200 bg-red-50 dark:border-red-800/50 dark:bg-red-900/20',
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

    $titleClasses = Ui::classes()->add('font-semibold leading-6 text-gray-900 dark:text-white');

    $textClasses = Ui::classes()
        ->add('leading-relaxed')
        ->add($variant, [
            'default' => 'text-gray-600 dark:text-gray-300',
            'info' => 'text-cyan-700 dark:text-cyan-200',
            'success' => 'text-green-700 dark:text-green-200',
            'warning' => 'text-amber-700 dark:text-amber-200',
            'danger' => 'text-red-700 dark:text-red-200',
        ]);

    $dismissClasses = Ui::classes()
        ->add('ml-auto -mr-2 -mt-2 self-start opacity-60 hover:opacity-100')
        ->add($variant, [
            'default' => 'text-gray-500 dark:text-gray-400',
            'info' => 'text-cyan-600 dark:text-cyan-400',
            'success' => 'text-green-600 dark:text-green-400',
            'warning' => 'text-amber-600 dark:text-amber-400',
            'danger' => 'text-red-600 dark:text-red-400',
        ]);
@endphp

<div @if ($dismissable) x-data="{ show: true }" x-show="show" @endif {{ $attributes->except('class') }}
    class="{{ $classes }}" data-alert data-variant="{{ $variant }}" role="alert">
    <ui:icon :name="$icon ?? $icons[$variant] ?? $icons['default']" class="{{ $iconClasses }}" />

    <div class="flex min-w-0 flex-1 flex-col gap-1">
        @if ($title)
            <div class="{{ $titleClasses }}">{{ $title }}</div>
        @endif

        @if ($message)
            <div class="{{ $textClasses }}">{{ $message }}</div>
        @endif

        @if ($slot->isNotEmpty())
            <div class="{{ $textClasses }}">{{ $slot }}</div>
        @endif
    </div>

    @if ($dismissable)
        <ui:button icon="x" variant="ghost" size="xs" x-on:click="show = false" aria-label="Sluiten"
            class="{{ $dismissClasses }}" />
    @endif
</div>
