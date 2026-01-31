@props([
    'icon' => 'chevron-right',
])

@php
    $classes = Ui::classes()
        ->add('flex w-full cursor-pointer select-none list-none items-center justify-between gap-3 px-4 py-3')
        ->add('text-gray-600 hover:text-gray-900')
        ->add('dark:text-gray-300 dark:hover:text-white')
        ->add('[&::-webkit-details-marker]:hidden')
        ->merge($attributes->only('class'));
@endphp

<summary class="{{ $classes }}" {{ $attributes->except('class') }} data-details-trigger>
    <span class="text-sm font-medium">{{ $slot }}</span>

    @if ($icon)
        <ui:icon :name="$icon"
            class="size-4 shrink-0 transition-transform duration-200 group-open/details:rotate-90" />
    @endif
</summary>
