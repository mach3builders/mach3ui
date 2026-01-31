@props([
    'variant' => null,
])

@php
    $classes = Ui::classes()
        ->add('w-full overflow-x-auto')
        ->unless($variant === 'simple', 'rounded-xl bg-gray-30 p-1.5 pt-0.5')
        ->unless($variant === 'simple', 'dark:bg-gray-830');

    $tableClasses = Ui::classes()
        ->add('w-full border-separate border-spacing-0 text-sm')
        ->add($variant !== 'simple' ? 'min-w-[600px]' : 'min-w-0');
@endphp

<div {{ $attributes->class($classes) }} data-table>
    <table class="{{ $tableClasses }}" data-variant="{{ $variant }}">
        {{ $slot }}
    </table>
</div>
