@php
    $scrollbar_classes = [
        'overflow-y-auto',

        // Firefox
        '[scrollbar-width:thin]',
        '[scrollbar-color:transparent_transparent]',
        'hover:[scrollbar-color:theme(colors.gray.300)_transparent]',
        'dark:hover:[scrollbar-color:theme(colors.gray.600)_transparent]',

        // WebKit (Chrome, Safari, Edge)
        '[&::-webkit-scrollbar]:w-2',
        '[&::-webkit-scrollbar-track]:bg-transparent',
        '[&::-webkit-scrollbar-thumb]:rounded-full',
        '[&::-webkit-scrollbar-thumb]:bg-transparent',
        'hover:[&::-webkit-scrollbar-thumb]:bg-gray-300',
        'dark:hover:[&::-webkit-scrollbar-thumb]:bg-gray-600',
    ];
@endphp

<div
    {{ $attributes->class(array_merge([
        'flex flex-1 flex-col gap-8 px-2 pt-4 pb-8',
    ], $scrollbar_classes)) }}
    data-layout-sidebar-nav
>
    {{ $slot }}
</div>
