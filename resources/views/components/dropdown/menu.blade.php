@props([])

@php
    $anchor = '--dropdown-trigger';
    $offset = '0.25rem';

    $positionStyles = [
        'bottom-start' => "position-anchor: {$anchor}; top: calc(anchor(bottom) + {$offset}); bottom: auto; left: anchor(left); right: auto; position-try-fallbacks: --dropdown-top-start;",
        'bottom-end' => "position-anchor: {$anchor}; top: calc(anchor(bottom) + {$offset}); bottom: auto; left: anchor(right); right: auto; translate: -100% 0; position-try-fallbacks: --dropdown-top-end;",
        'top-start' => "position-anchor: {$anchor}; bottom: calc(anchor(top) + {$offset}); top: auto; left: anchor(left); right: auto; position-try-fallbacks: --dropdown-bottom-start;",
        'top-end' => "position-anchor: {$anchor}; bottom: calc(anchor(top) + {$offset}); top: auto; left: anchor(right); right: auto; translate: -100% 0; position-try-fallbacks: --dropdown-bottom-end;",
        'left-start' => "position-anchor: {$anchor}; top: anchor(top); bottom: auto; right: calc(anchor(left) + {$offset}); left: auto; position-try-fallbacks: --dropdown-right-start;",
        'left-end' => "position-anchor: {$anchor}; top: anchor(bottom); bottom: auto; right: calc(anchor(left) + {$offset}); left: auto; translate: 0 -100%; position-try-fallbacks: --dropdown-right-end;",
        'right-start' => "position-anchor: {$anchor}; top: anchor(top); bottom: auto; left: calc(anchor(right) + {$offset}); right: auto; position-try-fallbacks: --dropdown-left-start;",
        'right-end' => "position-anchor: {$anchor}; top: anchor(bottom); bottom: auto; left: calc(anchor(right) + {$offset}); right: auto; translate: 0 -100%; position-try-fallbacks: --dropdown-left-end;",
    ];

    $classes = Ui::classes()
        ->add('fixed m-0 hidden min-w-52 flex-col gap-1 rounded-lg border p-1 shadow-lg')
        ->add('border-gray-100 bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-790')
        ->add('[&:popover-open]:flex')
        ->merge($attributes);
@endphp

<div
    popover
    x-bind:id="id"
    x-bind:style="@js($positionStyles)[position]"
    role="menu"
    data-dropdown-menu
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
>
    {{ $slot }}
</div>
