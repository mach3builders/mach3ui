@props([])

@php
    $classes = Ui::classes()
        ->add('inline-flex')
        ->add('*:rounded-none *:border-l-0')
        ->add('first:*:rounded-l-md first:*:border-l')
        ->add('last:*:rounded-r-md')
        ->add('focus:*:z-10 focus-visible:*:z-10')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-button-group>
    {{ $slot }}
</div>
