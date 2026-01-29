@props([
    'icon' => null,
])

<p {{ $attributes->class([
    'text-xs',
    'text-gray-500 dark:text-gray-400',
    'flex items-center gap-1.5' => $icon,
]) }} data-help>
    @if ($icon)
        <ui:icon :name="$icon" class="size-3.5 shrink-0" />
    @endif

    {{ $slot }}
</p>
