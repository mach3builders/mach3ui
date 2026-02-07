@aware(['id'])

@props([
    'badge' => null,
    'for' => null,
    'required' => false,
])

@php
    // Use explicit for, or inherit from parent field
    $for = $for ?? ($id ?? null);

    $classes = Ui::classes()
        ->add('inline-flex items-center gap-1.5 text-sm font-medium')
        ->add('text-gray-800')
        ->add('dark:text-gray-100')
        ->merge($attributes->only('class'));
@endphp

<label @if ($for) for="{{ $for }}" @endif class="{{ $classes }}"
    {{ $attributes->except('class') }} data-label>
    {{ $slot }}

    @if ($required)
        <span class="text-gray-400 dark:text-gray-500">*</span>
    @endif

    @if ($badge)
        <ui:badge variant="secondary" class="ml-auto font-normal">{{ $badge }}</ui:badge>
    @endif
</label>
