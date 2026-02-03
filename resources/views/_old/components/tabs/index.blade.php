@props([
    'default' => null,
    'name' => null,
    'size' => 'md',
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('relative inline-flex items-center gap-1')
        ->add(
            match ($variant) {
                'boxed' => 'rounded-lg border border-gray-60 bg-gray-30 p-1 dark:border-gray-770 dark:bg-gray-820',
                default => 'border-b border-gray-60 dark:border-gray-740',
            },
        )
        ->merge($attributes->only('class'));
@endphp

<div
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
    data-tabs
    data-variant="{{ $variant }}"
    data-size="{{ $size }}"
    @if ($name)
        x-data
        x-init="Alpine.store('tabs_{{ $name }}', { active: '{{ $default }}' })"
    @endif
>
    {{ $slot }}
</div>
