@blaze

@props([
    'divided' => false,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('relative z-0 rounded-b-lg border border-t-0 shadow-xs')
        ->add($variant, [
            'default' => 'border-gray-60 bg-white dark:border-gray-760 dark:bg-gray-800',
            'inverted' => 'border-gray-80 bg-gray-30 dark:border-gray-700 dark:bg-gray-820',
        ])
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-card-footer>
    @if ($divided)
        <ui:divider class="bg-gray-60 dark:bg-gray-740" />
    @endif

    <div class="flex items-center gap-2 px-4.5 py-4">
        {{ $slot }}
    </div>
</div>
