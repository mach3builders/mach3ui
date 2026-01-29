@props([
    'active' => false,
    'href' => null,
    'label' => null,
    'route' => null,
])

@php
    $url = $route ? route($route) : $href;
    $is_active = $active || ($route && Route::is($route));
    $is_link = $url && !$is_active;
@endphp

@if ($is_link)
    <a
        x-init="register(@js($url))"
        {{ $attributes->class([
            "relative hidden whitespace-nowrap pl-4 underline-offset-4 md:block md:pl-5",
            "before:pointer-events-none before:absolute before:left-0 before:top-1/2 before:size-1.5 before:-translate-y-1/2 before:rotate-45 before:border-r before:border-t before:content-['']",
            "before:border-gray-400",
            "dark:before:border-gray-500",
            "text-gray-900 hover:text-gray-980 hover:underline",
            "dark:text-gray-100 dark:hover:text-gray-20",
        ]) }}
        href="{{ $url }}"
    >{{ $label ?? $slot }}</a>
@else
    <span
        x-init="register(null)"
        {{ $attributes->class([
            "relative max-w-48 truncate whitespace-nowrap pl-0 md:max-w-3xs md:pl-5",
            "before:pointer-events-none before:absolute before:left-0 before:top-1/2 before:size-1.5 before:-translate-y-1/2 before:rotate-45 before:border-r before:border-t before:hidden before:content-[''] md:before:block",
            "before:border-gray-400",
            "dark:before:border-gray-500",
            "text-gray-500",
            "dark:text-gray-400",
        ]) }}
    >{{ $label ?? $slot }}</span>
@endif
