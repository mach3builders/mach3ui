@props([
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('rounded-lg p-5 has-[>[data-list]]:p-0')
        ->add($variant, [
            'default' => 'border border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800',
            'subtle' => 'border border-transparent bg-gray-30 dark:bg-gray-830',
        ])
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-box data-variant="{{ $variant }}">
    {{ $slot }}
</div>
