@props([
    'href' => null,
    'label' => null,
])

@php
    $anchor_id = $href && str_starts_with($href, '#') ? substr($href, 1) : null;

    $common = '-ml-px border-l py-1 pl-4 text-[13px] leading-relaxed transition-colors';
    $inactive = 'border-gray-150 text-gray-500 hover:text-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:text-gray-200';
    $active = 'border-gray-900 text-gray-900 dark:border-gray-200 dark:text-gray-200';
@endphp

<a
    {{ $attributes->class($common) }}
    href="{{ $href }}"
    x-on:click="scrollTo('{{ $anchor_id }}', $event)"
    x-bind:class="isActive('{{ $href }}') ? '{{ $active }}' : '{{ $inactive }}'"
    data-nav-item
>
    <span class="flex-1">{{ $label ?? $slot }}</span>
</a>
