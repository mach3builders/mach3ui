@props([
    'href' => null,
])

@php
    $isLink = (bool) $href;

    $separatorClasses = Ui::classes()
        ->add('before:pointer-events-none before:absolute before:left-0 before:top-1/2 before:size-1.5')
        ->add("before:-translate-y-1/2 before:rotate-45 before:border-r before:border-t before:content-['']")
        ->add('before:border-gray-400 dark:before:border-gray-500');

    $linkClasses = Ui::classes()
        ->add('relative hidden whitespace-nowrap pl-4 underline-offset-4 md:block md:pl-5')
        ->add($separatorClasses)
        ->add('text-gray-900 hover:text-gray-950 hover:underline dark:text-gray-100 dark:hover:text-gray-50')
        ->merge($attributes);

    $spanClasses = Ui::classes()
        ->add('relative max-w-48 truncate whitespace-nowrap pl-0 md:max-w-xs md:pl-5')
        ->add($separatorClasses)
        ->add('before:hidden md:before:block')
        ->add('text-gray-500 dark:text-gray-400')
        ->merge($attributes);
@endphp

@if ($isLink)
    <a
        x-init="register(@js($href))"
        {{ $attributes->except('class') }}
        href="{{ $href }}"
        class="{{ $linkClasses }}"
        data-breadcrumbs-item
    >
        {{ $slot }}
    </a>
@else
    <span
        x-init="register(null)"
        {{ $attributes->except('class') }}
        class="{{ $spanClasses }}"
        aria-current="page"
        data-breadcrumbs-item
        data-active
    >
        {{ $slot }}
    </span>
@endif
