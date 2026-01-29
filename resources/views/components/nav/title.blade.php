@props([
    'icon' => null,
    'title' => null,
])

<div
    {{ $attributes->class([
        'flex items-center gap-2 px-3 py-2 font-semibold leading-3 text-gray-980 dark:text-gray-100',
    ]) }}
>
    @if ($icon)
        <ui:icon :name="$icon" size="sm" />
    @endif

    {{ $title ?? $slot }}
</div>
