@props([])

@php
    $classes = Ui::classes()
        ->add('inline-flex')
        ->add('*:rounded-none *:border-l-0')
        ->add('*:first:rounded-l-md *:first:border-l')
        ->add('*:last:rounded-r-md')
        ->add('*:focus:z-10 *:focus-visible:z-10');
@endphp

<div {{ $attributes->class($classes) }} data-button-group>
    {{ $slot }}
</div>
