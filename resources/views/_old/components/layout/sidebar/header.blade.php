@props([])

@php
    $classes = Ui::classes()
        ->add('flex flex-col gap-2 sticky top-0 z-10 shrink-0 border-b p-2')
        ->add('bg-gray-20 border-transparent')
        ->add('dark:bg-gray-820')
        ->add('[&.scrolled]:border-gray-80')
        ->add('[&.scrolled]:dark:border-gray-740');
@endphp

<header {{ $attributes->class($classes) }} data-layout-sidebar-header>
    {{ $slot }}
</header>
