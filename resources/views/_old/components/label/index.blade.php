@props([
    'badge' => null,
    'for' => null,
])

@php
    $classes = Ui::classes()
        ->add('inline-flex items-center gap-1.5 text-sm font-medium')
        ->add('text-gray-800')
        ->add('dark:text-gray-100')
        ->merge($attributes->only('class'));
@endphp

<label @if ($for) for="{{ $for }}" @endif class="{{ $classes }}"
    {{ $attributes->except('class') }} data-label>
    {{ $slot }}

    @if ($badge)
        <ui:badge variant="secondary" class="ml-auto font-normal">{{ $badge }}</ui:badge>
    @endif
</label>
