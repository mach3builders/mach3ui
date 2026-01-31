@props([
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('rounded-lg p-4')
        ->add(
            match ($variant) {
                'subtle' => 'bg-gray-30 dark:bg-gray-830',
                default => 'border border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800',
            },
        );
@endphp

<div {{ $attributes->class($classes->get()) }} data-box>
    {{ $slot }}
</div>
