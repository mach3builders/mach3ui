@props([
    'icon' => null,
])

@php
    $classes = Ui::classes()
        ->add('text-xs')
        ->add('text-gray-500')
        ->add('dark:text-gray-400')
        ->when($icon, 'flex items-center gap-1.5')
        ->merge($attributes->only('class'));
@endphp

<p class="{{ $classes }}" {{ $attributes->except('class') }} data-help>
    @if ($icon)
        <ui:icon :name="$icon" class="size-3.5 shrink-0" />
    @endif

    {{ $slot }}
</p>
