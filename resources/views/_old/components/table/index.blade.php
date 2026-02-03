@props([
    'hoverable' => true,
    'striped' => false,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('w-full overflow-x-auto')
        ->when($variant === 'default', 'rounded-xl bg-gray-30 p-1.5 pt-0.5')
        ->when($variant === 'default', 'dark:bg-gray-830')
        ->merge($attributes->only('class'));

    $tableClasses = Ui::classes()
        ->add('w-full border-separate border-spacing-0 text-sm')
        ->when($variant !== 'simple', 'min-w-[600px]');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-table data-variant="{{ $variant }}"
    data-hoverable="{{ $hoverable ? 'true' : 'false' }}" data-striped="{{ $striped ? 'true' : 'false' }}">
    <table class="{{ $tableClasses }}">
        {{ $slot }}
    </table>
</div>
