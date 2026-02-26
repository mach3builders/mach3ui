@blaze(fold: true)

@props([
    'description' => null,
    'title' => null,
    'variant' => 'responsive',
])

@php
    $classes = Flux::classes()
        ->add('grid grid-cols-1 gap-3')
        ->add($variant === 'responsive' ? 'xl:grid-cols-3 xl:gap-x-8' : '')
        ->add('[[data-flux-section]+&]:mt-8');

    $contentClasses = Flux::classes()->add($title || $description ? 'xl:col-span-2' : 'xl:col-span-3');
@endphp

<div
    {{ $attributes->class($classes) }}
    data-flux-section
    data-variant="{{ $variant }}"
>
    @if ($title || $description)
        <div class="flex flex-col gap-1 xl:col-span-1 xl:pt-6">
            @if ($title)
                <flux:heading level="3" size="lg">{{ $title }}</flux:heading>
            @endif

            @if ($description)
                <flux:text variant="subtle">{{ $description }}</flux:text>
            @endif
        </div>
    @endif

    <ui:box class="{{ $contentClasses }}">
        {{ $slot }}
    </ui:box>
</div>
