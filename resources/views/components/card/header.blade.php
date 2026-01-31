@props([
    'padTop' => false,
    'icon' => null,
    'icon:slot' => null,
    'icon:boxed' => false,
    'icon:color' => 'gray',
    'icon:size' => 'md',
    'hasDescription' => true,
])

@php
    $iconSlot = $__data['icon:slot'] ?? null;
    $iconBoxed = $__data['icon:boxed'] ?? false;
    $iconColor = $__data['icon:color'] ?? 'gray';
    $iconSize = $__data['icon:size'] ?? 'md';

    $hasAction = isset($action);
    $hasIcon = $iconSlot || $icon;

    $classes = Ui::classes()
        ->add('flex gap-3 px-4.5 pb-5')
        ->add($padTop ? 'pt-4' : 'pt-5')
        ->when($hasAction, 'relative')
        ->merge($attributes->only('class'));

    $contentClasses = Ui::classes()
        ->add('flex flex-1 flex-col gap-1.5')
        ->when($hasIcon, 'min-w-0')
        ->unless($hasDescription, 'justify-center');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-card-header>
    @if ($hasIcon)
        <div class="shrink-0">
            @if ($iconSlot)
                {{ $iconSlot }}
            @else
                <ui:icon :name="$icon" :boxed="$iconBoxed" :color="$iconColor" :size="$iconSize" />
            @endif
        </div>
    @endif

    <div class="{{ $contentClasses }}">
        {{ $slot }}
    </div>

    @if ($hasAction)
        <div class="absolute right-3 top-4">
            {{ $action }}
        </div>
    @endif
</div>
