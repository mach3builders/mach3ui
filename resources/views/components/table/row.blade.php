@props([
    'expanded' => false,
])

<tbody
    {{ $attributes }}
    x-data="{ expanded: @js($expanded) }"
    x-bind:data-expanded="expanded ? 'true' : 'false'"
    :class="expanded && '[&_td]:bg-gray-20 dark:[&_td]:bg-gray-780'"
>
    {{ $slot }}

    @if (isset($expansion) && $expansion->isNotEmpty())
        {{ $expansion }}
    @endif
</tbody>
