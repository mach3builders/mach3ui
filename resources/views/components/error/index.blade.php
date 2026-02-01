@props([
    'name' => null,
    'bag' => 'default',
])

@php
    $errorMessage = $slot->isNotEmpty() ? $slot : ($name ? $errors->getBag($bag)->first($name) : null);

    $classes = Ui::classes()
        ->add('flex items-center gap-1.5 text-xs')
        ->add('text-red-600')
        ->add('dark:text-red-500')
        ->merge($attributes->only('class'));
@endphp

@if ($errorMessage)
    <p class="{{ $classes }}" {{ $attributes->except('class') }} data-error>
        <ui:icon name="circle-alert" class="size-3.5 shrink-0" />

        <span>{{ $errorMessage }}</span>
    </p>
@endif
