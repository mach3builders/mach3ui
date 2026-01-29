@props([
    'variant' => null,
])

<div
    {{ $attributes->class([
        'w-full overflow-x-auto',
        'rounded-xl bg-gray-30 p-1.5 pt-0.5 dark:bg-gray-830' => $variant !== 'simple',
    ]) }}
    data-table
>
    <table
        class="{{ $variant !== 'simple' ? 'min-w-[600px]' : 'min-w-0' }} w-full border-separate border-spacing-0 text-sm"
        data-variant="{{ $variant }}"
    >
        {{ $slot }}
    </table>
</div>
