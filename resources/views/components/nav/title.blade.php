@props([
    'icon' => null,
    'title' => null,
])

@php
    $classes = Ui::classes()
        ->add('flex items-center gap-2 px-3 py-2 font-semibold leading-3')
        ->add('text-gray-980')
        ->add('dark:text-gray-100')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-nav-title>
    @if ($icon)
        <ui:icon :name="$icon" size="sm" />
    @endif

    {{ $title ?? $slot }}
</div>
