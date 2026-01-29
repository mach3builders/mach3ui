@props([
    'icon' => 'chevron-right',
    'open' => false,
    'title' => null,
])

<details
    {{ $attributes->class([
        'group/details rounded-lg border',
        'bg-gray-20 border-gray-100',
        'dark:bg-gray-820 dark:border-gray-700',
    ]) }}
    @if ($open) open @endif
    data-details
>
    @if ($title)
        <ui:details.trigger :icon="$icon">{{ $title }}</ui:details.trigger>

        <ui:details.content>{{ $slot }}</ui:details.content>
    @else
        {{ $slot }}
    @endif
</details>
