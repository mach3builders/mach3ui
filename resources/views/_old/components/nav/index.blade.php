@props([
    'title' => null,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('select-none')
        ->add(
            match ($variant) {
                'toc' => 'flex flex-col ml-2 border-l border-gray-150 dark:border-gray-700',
                default => 'flex flex-col gap-2',
            },
        )
        ->merge($attributes->only('class'));
@endphp

<nav class="{{ $classes }}" {{ $attributes->except('class') }} data-nav data-nav-variant="{{ $variant }}">
    @if ($title)
        <ui:nav.title :title="$title" />
    @endif

    {{ $slot }}
</nav>
