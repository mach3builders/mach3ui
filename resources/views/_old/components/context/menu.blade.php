@props([])

@php
    $classes = Ui::classes()
        ->add('m-0 hidden min-w-48 flex-col gap-1 rounded-lg border p-1 shadow-lg')
        ->add('border-gray-100 bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-790')
        ->add('[&:popover-open]:flex')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} popover="manual" role="menu" x-ref="menu"
    :id="id" :style="`position: fixed; top: ${y}px; left: ${x}px;`" :aria-expanded="isOpen"
    data-context-menu>
    {{ $slot }}
</div>
