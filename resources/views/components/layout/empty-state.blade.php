@props([
    'icon' => 'search',
    'title' => null,
    'description' => null,
])

<div
    {{ $attributes->class([
        'flex flex-col items-center justify-center py-16 text-center',
    ]) }}
    data-layout-empty-state
>
    <div @class([
        'mb-4 flex h-18 w-18 items-center justify-center rounded-full',
        'bg-gray-60 text-gray-400',
        'dark:bg-gray-750 dark:text-gray-500',
        '[&>svg]:h-10 [&>svg]:w-10',
    ])>
        <x-dynamic-component :component="'lucide-' . $icon" />
    </div>

    @if ($title)
        <h3 @class([
            'text-lg font-semibold',
            'text-gray-900',
            'dark:text-white',
        ])>{{ $title }}</h3>
    @endif

    @if ($description)
        <p @class([
            'mt-1 max-w-sm text-sm',
            'text-gray-500',
            'dark:text-gray-400',
        ])>{{ $description }}</p>
    @endif

    @if ($slot->isNotEmpty())
        <div class="mt-6">
            {{ $slot }}
        </div>
    @endif
</div>
