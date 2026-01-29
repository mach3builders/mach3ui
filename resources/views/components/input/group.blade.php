@props([])

<div {{ $attributes->class([
    'relative flex w-full',
    '[&>*]:rounded-none [&>*:first-child]:rounded-s-md [&>*:last-child]:rounded-e-md',
    '[&_input]:rounded-none [&>:first-child_input]:rounded-s-md [&>:last-child_input]:rounded-e-md',
    '[&>[data-input-addon]+*]:border-l-0 [&>[data-input-addon]+*_input]:border-l-0',
    '[&>*:has(+[data-input-addon])]:border-r-0 [&>*:has(+[data-input-addon])_input]:border-r-0',
    '[&>[data-button]+*]:border-l-0 [&>[data-button]+*_input]:border-l-0',
    '[&>*:has(+[data-button])]:border-r-0 [&>*:has(+[data-button])_input]:border-r-0',
    '[&:has(input:focus)>[data-input-addon]]:border-gray-400',
    'dark:[&:has(input:focus)>[data-input-addon]]:border-gray-500',
]) }}
    data-input-group>
    {{ $slot }}
</div>
