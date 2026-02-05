@blaze

@props([
    'icon' => null,
])

@php
    $classes = Ui::classes()
        ->add('flex items-center gap-2 px-3 py-2 text-xs font-semibold uppercase tracking-wide')
        ->add('[&>svg]:size-4 [&>svg]:shrink-0')
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-nav-title>
    @if ($icon)
        <ui:icon :name="$icon" color="gray" />
    @endif

    {{ $slot }}
</div>
