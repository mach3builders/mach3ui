@props([
    'term',
    'value' => null,
])

<div
    {{ $attributes->class([
        'flex items-baseline gap-2',
    ]) }}
>
    <dt class="shrink-0 text-gray-500 dark:text-gray-400">{{ $term }}</dt>

    <span class="flex-1 border-b border-dotted border-gray-300 dark:border-gray-600"></span>

    <dd class="text-right font-medium text-gray-900 dark:text-white">{{ $value ?? $slot }}</dd>
</div>
