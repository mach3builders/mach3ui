@props([
    'current' => 1,
])

@php
    $classes = Ui::classes()->merge($attributes->only('class'));

    $navClasses = Ui::classes()->add('flex items-center justify-center gap-3');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-steps data-current="{{ $current }}">
    <nav class="{{ $navClasses }}" aria-label="Progress" data-steps-nav>
        {{ $slot }}
    </nav>
</div>
