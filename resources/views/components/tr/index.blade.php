@props([
    'clickable' => false,
    'nested' => false,
    'selected' => false,
])

@php
    $is_clickable = $clickable || $attributes->has('data-href') || $attributes->whereStartsWith('wire:click')->isNotEmpty();
@endphp

<tr
    {{ $attributes->class([
        'group',
        'cursor-pointer transition-colors hover:[&_td]:bg-gray-20 dark:hover:[&_td]:bg-gray-790' => $is_clickable,
        '[&_td]:bg-gray-10 dark:[&_td]:bg-gray-790' => $selected,
    ]) }}
    @if ($nested)
        x-show="expanded"
        x-cloak
    @endif
    data-tr
>
    {{ $slot }}
</tr>
