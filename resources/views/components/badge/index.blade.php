@props([
    'href' => null,
    'icon' => null,
    'label' => null,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add(
            'inline-flex cursor-default select-none items-center gap-1 rounded-full border px-2 py-px text-xs font-medium',
        )
        ->add(
            match ($variant) {
                'secondary' => 'border-transparent bg-gray-60 text-gray-900 dark:bg-gray-720 dark:text-gray-50',
                'outline' => 'border-gray-120 bg-transparent text-gray-900 dark:border-gray-640 dark:text-gray-50',
                'info' => 'border-transparent bg-cyan-100 text-cyan-800 dark:bg-cyan-900/30 dark:text-cyan-400',
                'success' => 'border-transparent bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400',
                'warning' => 'border-transparent bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400',
                'danger' => 'border-transparent bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400',
                default => 'border-transparent bg-gray-900 text-white dark:bg-gray-50 dark:text-gray-900',
            },
        )
        ->when($icon, 'pl-1.5')
        ->when($href, 'pr-1');

    $iconClasses = Ui::classes()->add('size-3');

    $linkClasses = Ui::classes()
        ->add('-mr-0.5 ml-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded-full')
        ->add(
            match ($variant) {
                'secondary' => 'hover:bg-gray-140 dark:hover:bg-gray-600',
                'outline' => 'hover:bg-gray-100 dark:hover:bg-gray-700',
                'info' => 'hover:bg-cyan-200 dark:hover:bg-cyan-800/50',
                'success' => 'hover:bg-green-200 dark:hover:bg-green-800/50',
                'warning' => 'hover:bg-amber-200 dark:hover:bg-amber-800/50',
                'danger' => 'hover:bg-red-200 dark:hover:bg-red-800/50',
                default => 'hover:bg-gray-700 dark:hover:bg-gray-300',
            },
        );

    $linkIconClasses = Ui::classes()->add('size-2.5');
@endphp

<span {{ $attributes->class($classes) }} data-badge>
    @if ($icon)
        <ui:icon :name="$icon" :class="$iconClasses" />
    @endif

    {{ $label ?? $slot }}

    @if ($href)
        <a href="{{ $href }}" target="_blank" rel="noopener noreferrer" class="{{ $linkClasses }}">
            <ui:icon name="external-link" :class="$linkIconClasses" />
        </a>
    @endif
</span>
