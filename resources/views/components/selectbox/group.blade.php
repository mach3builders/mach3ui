@props([
    'label' => null,
])

@php
    $labelClasses = Ui::classes()
        ->add('px-2.5 py-1.5 text-xs font-medium uppercase tracking-wide')
        ->add('text-gray-500')
        ->add('dark:text-gray-400');

    $classes = Ui::classes()
        ->add('flex flex-col gap-0.5')
        ->merge($attributes);
@endphp

<div role="group" {{ $attributes->except('class') }} class="{{ $classes }}" data-selectbox-group>
    @if ($label)
        <div class="{{ $labelClasses }}" data-selectbox-group-label>
            {{ $label }}
        </div>
    @endif

    {{ $slot }}
</div>
