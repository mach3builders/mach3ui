@props([
    'divided' => false,
    'variant' => null,
])

@php
    $classes = Ui::classes()
        ->add('relative z-0 rounded-b-lg border border-t-0 shadow-xs')
        ->add(
            match ($variant) {
                'inverted' => 'border-gray-80 bg-gray-30 dark:border-gray-700 dark:bg-gray-820',
                default => 'border-gray-60 bg-white dark:border-gray-760 dark:bg-gray-800',
            },
        )
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-card-footer>
    @if ($divided)
        <ui:divider variant="subtle" class="mt-4" />
    @endif

    <div class="flex items-center gap-2 px-4.5 py-4">
        {{ $slot }}
    </div>
</div>
