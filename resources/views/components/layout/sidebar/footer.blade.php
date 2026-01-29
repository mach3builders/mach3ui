<footer
    {{ $attributes->class([
        'flex flex-col gap-2 sticky bottom-0 z-10 shrink-0 border-t p-2 mt-auto',
        'bg-gray-20 border-gray-80',
        'dark:bg-gray-820 dark:border-gray-740',
    ]) }}
    data-layout-sidebar-footer
>
    {{ $slot }}
</footer>
