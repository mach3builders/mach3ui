<header
    {{ $attributes->class([
        'flex flex-col gap-2 sticky top-0 z-10 shrink-0 border-b p-2',
        'bg-gray-20 border-transparent',
        'dark:bg-gray-820',
        '[&.scrolled]:border-gray-80',
        '[&.scrolled]:dark:border-gray-740',
    ]) }}
    data-layout-sidebar-header
>
    {{ $slot }}
</header>
