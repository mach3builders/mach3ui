@props([])

@php
    $classes = Ui::classes()
        ->add('flex flex-1 flex-col gap-8 overflow-y-auto px-2 pb-8 pt-4')
        // Firefox
        ->add('[scrollbar-width:thin]')
        ->add('[scrollbar-color:transparent_transparent]')
        ->add('hover:[scrollbar-color:theme(colors.gray.300)_transparent]')
        ->add('dark:hover:[scrollbar-color:theme(colors.gray.600)_transparent]')
        // WebKit (Chrome, Safari, Edge)
        ->add('[&::-webkit-scrollbar]:w-2')
        ->add('[&::-webkit-scrollbar-track]:bg-transparent')
        ->add('[&::-webkit-scrollbar-thumb]:rounded-full')
        ->add('[&::-webkit-scrollbar-thumb]:bg-transparent')
        ->add('hover:[&::-webkit-scrollbar-thumb]:bg-gray-300')
        ->add('dark:hover:[&::-webkit-scrollbar-thumb]:bg-gray-600')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-layout-sidebar-nav>
    {{ $slot }}
</div>
