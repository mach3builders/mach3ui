@props([
    'banner' => false,
])

@php
    $top_class = $banner ? 'top-10' : 'top-0';
    $height_class = $banner ? 'h-[calc(100vh-2.5rem)]' : 'h-screen';
@endphp

<aside
    {{ $attributes->class([
        'fixed left-0 z-40 flex w-56 shrink-0 -translate-x-full flex-col border-r transition-transform duration-300',
        $top_class,
        $height_class,
        'bg-gray-20 border-gray-100',
        'dark:bg-gray-820 dark:border-gray-740',
        'xl:sticky xl:translate-x-0 xl:self-start',
    ]) }}
    :class="{ 'translate-x-0!': sideBarOpen }"
    data-layout-sidebar
>
    <div @class([
        'absolute top-0 right-full bottom-0 w-screen',
        'bg-gray-20',
        'dark:bg-gray-820',
    ])></div>

    {{ $slot }}
</aside>
