@props([])

@php
    $classes = Ui::classes()
        ->add('flex flex-col gap-2 sticky bottom-0 z-10 shrink-0 border-t p-2 mt-auto')
        ->add('bg-gray-20 border-gray-80')
        ->add('dark:bg-gray-820 dark:border-gray-740');
@endphp

<footer {{ $attributes->class($classes) }} data-layout-sidebar-footer>
    {{ $slot }}
</footer>
