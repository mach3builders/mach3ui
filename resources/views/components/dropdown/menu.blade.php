@props([])

@php
    $positionStyles = [
        'bottom-start' =>
            'position-anchor: --dropdown-trigger; top: calc(anchor(bottom) + 0.25rem); left: anchor(left); position-try-fallbacks: --dropdown-top-start;',
        'bottom-end' =>
            'position-anchor: --dropdown-trigger; top: calc(anchor(bottom) + 0.25rem); left: anchor(right); translate: -100% 0; position-try-fallbacks: --dropdown-top-end;',
        'top-start' =>
            'position-anchor: --dropdown-trigger; bottom: calc(anchor(top) + 0.25rem); left: anchor(left); position-try-fallbacks: --dropdown-bottom-start;',
        'top-end' =>
            'position-anchor: --dropdown-trigger; bottom: calc(anchor(top) + 0.25rem); left: anchor(right); translate: -100% 0; position-try-fallbacks: --dropdown-bottom-end;',
        'left-start' =>
            'position-anchor: --dropdown-trigger; top: anchor(top); right: calc(anchor(left) + 0.25rem); position-try-fallbacks: --dropdown-right-start;',
        'left-end' =>
            'position-anchor: --dropdown-trigger; top: anchor(bottom); right: calc(anchor(left) + 0.25rem); translate: 0 -100%; position-try-fallbacks: --dropdown-right-end;',
        'right-start' =>
            'position-anchor: --dropdown-trigger; top: anchor(top); left: calc(anchor(right) + 0.25rem); position-try-fallbacks: --dropdown-left-start;',
        'right-end' =>
            'position-anchor: --dropdown-trigger; top: anchor(bottom); left: calc(anchor(right) + 0.25rem); translate: 0 -100%; position-try-fallbacks: --dropdown-left-end;',
    ];

    $classes = Ui::classes()
        ->add('m-0 hidden min-w-52 flex-col gap-1 rounded-lg border p-1 shadow-lg')
        ->add('border-gray-100 bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-790')
        ->add('[&:popover-open]:flex')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} popover x-bind:id="id"
    x-bind:style="@js($positionStyles)[position]" data-dropdown-menu>
    {{ $slot }}
</div>
