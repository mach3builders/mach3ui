@props([])

@php
    $position_styles = [
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
@endphp

<div {{ $attributes->class([
    'm-0 hidden flex-col gap-1 min-w-48 rounded-lg border p-1 shadow-lg min-w-52',
    'border-gray-100 bg-white',
    'dark:border-gray-740 dark:bg-gray-790',
    '[&:popover-open]:flex',
]) }}
    popover x-bind:id="id" x-bind:style="@js($position_styles)[position]">
    {{ $slot }}
</div>
