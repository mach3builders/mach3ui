@props([])

@php
    $classes = Ui::classes()
        ->add('border-t px-4 pb-4 pt-4')
        ->add('border-gray-100')
        ->add('dark:border-gray-740')
        ->add('[&_.table]:text-sm [&_.table_th]:py-2 [&_.table_th]:text-xs [&_.table_td]:py-2')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-details-content>
    {{ $slot }}
</div>
