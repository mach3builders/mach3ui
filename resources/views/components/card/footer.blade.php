@props([
    'divided' => false,
    'variant' => null,
])

<div data-card-footer
    {{ $attributes->class([
        'rounded-b-lg border border-t-0 shadow-xs relative z-0',
        'border-gray-60 bg-white dark:border-gray-760 dark:bg-gray-800' => $variant !== 'inverted',
        'border-gray-80 bg-gray-30 dark:border-gray-700 dark:bg-gray-820' => $variant === 'inverted',
    ]) }}>
    @if ($divided)
        <ui:divider variant="subtle" class="mx-4.5" />
    @endif

    <div class="flex items-center gap-2 px-4.5 py-4">
        {{ $slot }}
    </div>
</div>
