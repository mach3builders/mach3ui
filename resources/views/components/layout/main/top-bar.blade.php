@props([
    'banner' => false,
])

@php
    $padding_x = 'px-4 sm:px-8 lg:px-16 xl:px-20';
    $top = $banner ? 'top-10' : 'top-0';
@endphp

<header @class([
    $padding_x,
    'sticky z-30 flex items-center justify-between gap-4 border-b',
    $top,
    'border-transparent bg-white',
    'dark:bg-gray-800',
    '[&.scrolled]:border-gray-60',
    '[&.scrolled]:dark:border-gray-740',
]) data-layout-main-top-bar>
    <div class="flex items-center h-14">
        <ui:button class="xl:hidden" variant="ghost" icon="menu" x-on:click="sideBarOpen = true" />

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
