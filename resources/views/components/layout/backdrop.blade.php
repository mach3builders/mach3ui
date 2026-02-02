@props([])

@php
    $classes = Ui::classes()
        ->add('pointer-events-none fixed inset-0 z-40 bg-black/50 opacity-0 transition-opacity duration-300')
        ->add('xl:hidden');
@endphp

<div {{ $attributes->class($classes) }} :class="{ 'pointer-events-auto! opacity-100!': sideBarOpen }"
    x-on:click="sideBarOpen = false" data-layout-backdrop></div>
