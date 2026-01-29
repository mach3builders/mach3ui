@props([
    'has_icon' => false,
])

<div
    {{ $attributes->class([
        'overflow-hidden',
        'text-gray-600',
        'dark:text-gray-400',
        'pl-6' => $has_icon,
    ]) }}
>
    <div class="pb-4">
        {{ $slot }}
    </div>
</div>
