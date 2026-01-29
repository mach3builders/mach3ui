@props([
    'title' => null,
    'variant' => 'default',
])

@php
    $variant_classes = [
        'default' => 'flex flex-col gap-2',
        'toc' => 'flex flex-col ml-2 border-l border-gray-150 dark:border-gray-700',
    ];
@endphp

<nav
    {{ $attributes->class([
        'select-none',
        $variant_classes[$variant] ?? $variant_classes['default'],
    ]) }}
    data-nav
    data-nav-variant="{{ $variant }}"
>
    @if ($title)
        <ui:nav.title :title="$title" />
    @endif

    {{ $slot }}
</nav>
