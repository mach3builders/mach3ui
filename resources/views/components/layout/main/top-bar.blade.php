@props([
    'banner' => false,
])

@php
    $classes = Ui::classes()
        ->add('px-4 sm:px-8 lg:px-16 xl:px-20')
        ->add('sticky z-30 flex items-center justify-between gap-4 border-b')
        ->add($banner ? 'top-10' : 'top-0')
        ->add('border-transparent bg-white')
        ->add('dark:bg-gray-800')
        ->add('[&.scrolled]:border-gray-60')
        ->add('[&.scrolled]:dark:border-gray-740');
@endphp

<header class="{{ $classes }}" data-layout-main-top-bar>
    <div class="flex items-center gap-2 h-14">
        <ui:button class="xl:hidden shrink-0" variant="ghost" icon="menu" x-on:click="sideBarOpen = true" />

        @if (isset($breadcrumbs))
            <ui:breadcrumbs>
                {{ $breadcrumbs }}
            </ui:breadcrumbs>
        @endif
    </div>

    <div class="flex items-center gap-4">
        @if (isset($actions))
            <div class="flex items-center gap-2">
                {{ $actions }}
            </div>
        @endif

        {{ $slot }}
    </div>
</header>
