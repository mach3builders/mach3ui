@props([
    'default' => null,
    'name' => null,
    'size' => 'md',
    'variant' => 'default',
])

@php
    $storeName = $name ? "tabs_{$name}" : null;

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

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-tabs="{{ $name }}"
    data-variant="{{ $variant }}" data-size="{{ $size }}" x-data="{
        activeTab: @js($default),
        init() {
            @if ($storeName) Alpine.store(@js($storeName), { active: this.activeTab });
                this.$watch('activeTab', value => Alpine.store(@js($storeName)).active = value); @endif
        }
    }" x-modelable="activeTab">
    {{ $slot }}
</div>
