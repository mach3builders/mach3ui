@props([
    'icon' => 'chevron-right',
])

<summary
    {{ $attributes->class([
        'flex w-full cursor-pointer items-center justify-between gap-3 px-4 py-3 select-none list-none',
        'text-gray-600 hover:text-gray-900',
        'dark:text-gray-300 dark:hover:text-white',
        '[&::-webkit-details-marker]:hidden',
    ]) }}
>
    <span class="text-sm font-medium">{{ $slot }}</span>

    @if ($icon)
        <ui:icon
            :name="$icon"
            class="size-4 shrink-0 transition-transform duration-200 group-open/details:rotate-90"
        />
    @endif
</summary>
