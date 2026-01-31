@props([
    'active' => false,
    'href' => null,
    'label' => null,
    'route' => null,
])

@php
    $url = $route ? route($route) : $href;
    $isActive = $active || ($route && Route::is($route));
    $isLink = $url && !$isActive;

    $separatorClasses = Ui::classes()
        ->add('before:pointer-events-none before:absolute before:left-0 before:top-1/2 before:size-1.5')
        ->add("before:-translate-y-1/2 before:rotate-45 before:border-r before:border-t before:content-['']")
        ->add('before:border-gray-400')
        ->add('dark:before:border-gray-500');

    $linkClasses = Ui::classes()
        ->add('relative hidden whitespace-nowrap pl-4 underline-offset-4 md:block md:pl-5')
        ->add($separatorClasses)
        ->add('text-gray-900 hover:text-gray-980 hover:underline')
        ->add('dark:text-gray-100 dark:hover:text-gray-20');

    $spanClasses = Ui::classes()
        ->add('relative max-w-48 truncate whitespace-nowrap pl-0 md:max-w-3xs md:pl-5')
        ->add($separatorClasses)
        ->add('before:hidden md:before:block')
        ->add('text-gray-500')
        ->add('dark:text-gray-400');
@endphp

@if ($isLink)
    <a x-init="register(@js($url))" {{ $attributes->class($linkClasses) }} href="{{ $url }}" data-breadcrumbs-item>
        {{ $label ?? $slot }}
    </a>
@else
    <span x-init="register(null)" {{ $attributes->class($spanClasses) }} data-breadcrumbs-item>
        {{ $label ?? $slot }}
    </span>
@endif
