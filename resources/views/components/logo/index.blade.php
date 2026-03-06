@props([
    'href' => null,
    'size' => 'base',
    'light' => '/img//logo-light.svg',
    'dark' => '/img/logo-dark.svg',
])

@php
    $tag = $href ? 'a' : 'div';

    $sizeClass = match ($size) {
        'sm' => 'h-2',
        'lg' => 'h-4.5',
        default => 'h-3',
    };

    $classes = Flux::classes()
        ->add('inline-flex items-center');
@endphp

<{{ $tag }}
    {{ $attributes->class($classes) }}
    @if ($href) href="{{ $href }}" @endif
    data-flux-logo
>
    <img src="{{ $dark }}" alt="{{ config('app.name', 'App') }}" class="{{ $sizeClass }} dark:hidden" />
    <img src="{{ $light }}" alt="{{ config('app.name', 'App') }}" class="{{ $sizeClass }} hidden dark:block" />
</{{ $tag }}>
