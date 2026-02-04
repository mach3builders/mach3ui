@props([
    'bag' => 'default',
    'name' => null,
])

@php
    $errorMessage = match (true) {
        $slot->isNotEmpty() => $slot,
        $name !== null => $errors->getBag($bag)->first($name),
        default => null,
    };

    $classes = Ui::classes()
        ->add('flex items-center gap-1.5 text-xs')
        ->add('text-red-600')
        ->add('dark:text-red-500')
        ->merge($attributes->only('class'));
@endphp

@if ($errorMessage)
    <p class="{{ $classes }}" {{ $attributes->except('class') }} data-error>
        <ui:icon name="circle-alert" size="xs" class="shrink-0" />

        <span>{{ $errorMessage }}</span>
    </p>
@endif
