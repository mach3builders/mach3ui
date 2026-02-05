@props([])

@php
    $anchor = '--dropdown-trigger';
    $offset = '0.25rem';

    $positionStyles = [
        'bottom-start' => "position-anchor: {$anchor}; inset: auto; top: calc(anchor(bottom) + {$offset}); left: anchor(left); position-try-fallbacks: --dropdown-top-start;",
        'bottom-end' => "position-anchor: {$anchor}; inset: auto; top: calc(anchor(bottom) + {$offset}); left: anchor(right); translate: -100% 0; position-try-fallbacks: --dropdown-top-end;",
        'top-start' => "position-anchor: {$anchor}; inset: auto; bottom: calc(anchor(top) + {$offset}); left: anchor(left); position-try-fallbacks: --dropdown-bottom-start;",
        'top-end' => "position-anchor: {$anchor}; inset: auto; bottom: calc(anchor(top) + {$offset}); left: anchor(right); translate: -100% 0; position-try-fallbacks: --dropdown-bottom-end;",
        'left-start' => "position-anchor: {$anchor}; inset: auto; top: anchor(top); right: calc(anchor(left) + {$offset}); position-try-fallbacks: --dropdown-right-start;",
        'left-end' => "position-anchor: {$anchor}; inset: auto; top: anchor(bottom); right: calc(anchor(left) + {$offset}); translate: 0 -100%; position-try-fallbacks: --dropdown-right-end;",
        'right-start' => "position-anchor: {$anchor}; inset: auto; top: anchor(top); left: calc(anchor(right) + {$offset}); position-try-fallbacks: --dropdown-left-start;",
        'right-end' => "position-anchor: {$anchor}; inset: auto; top: anchor(bottom); left: calc(anchor(right) + {$offset}); translate: 0 -100%; position-try-fallbacks: --dropdown-left-end;",
    ];

    $classes = Ui::classes()
        ->add('fixed m-0 hidden min-w-52 flex-col gap-1 rounded-lg border p-1 shadow-lg')
        ->add('border-gray-100 bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-790')
        ->add('[&:popover-open]:flex')
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} popover x-bind:id="id"
    x-bind:style="@js($positionStyles)[position]" data-dropdown-menu role="menu">
    {{ $slot }}
</div>
