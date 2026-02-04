@props([])

@php
    $classes = Ui::classes()
        ->add('flex items-center justify-center gap-3')
        ->merge($attributes);
@endphp

<nav
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
    aria-label="Progress"
    data-steps
>
    {{ $slot }}
</nav>
