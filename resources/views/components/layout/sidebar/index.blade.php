@props([
    'banner' => false,
])

@php
    $classes = Ui::classes()
        ->add(
            'fixed left-0 z-40 flex w-56 shrink-0 -translate-x-full flex-col border-r transition-transform duration-300',
        )
        ->add($banner ? 'top-10' : 'top-0')
        ->add($banner ? 'h-[calc(100vh-2.5rem)]' : 'h-screen')
        ->add('bg-gray-20 border-gray-100')
        ->add('dark:bg-gray-820 dark:border-gray-740')
        ->add('xl:sticky xl:translate-x-0 xl:self-start');

    $overlayClasses = Ui::classes()
        ->add('absolute top-0 right-full bottom-0 w-screen')
        ->add('bg-gray-20')
        ->add('dark:bg-gray-820');
@endphp

<aside {{ $attributes->class($classes) }} :class="{ 'translate-x-0!': sideBarOpen }" data-layout-sidebar>
    <div class="{{ $overlayClasses }}"></div>

    {{ $slot }}
</aside>
