@props([])

<span {{ $attributes->class([
    'inline-flex h-10 shrink-0 items-center border px-3 text-sm',
    'border-gray-140 bg-gray-20 text-gray-500',
    'dark:border-gray-700 dark:bg-gray-780 dark:text-gray-400',
    'first:rounded-s-md',
    'last:rounded-e-md',
]) }} data-input-addon>
    {{ $slot }}
</span>
