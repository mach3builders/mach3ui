@props([
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('-mr-1 -mt-1 flex size-6 shrink-0 cursor-pointer items-center justify-center rounded')
        ->add($variant, [
            'default' => 'text-gray-400 hover:bg-gray-100 hover:text-gray-600 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-gray-300',
            'info' => 'text-cyan-400 hover:bg-cyan-100/50 hover:text-cyan-500 dark:text-cyan-600 dark:hover:bg-cyan-800/30 dark:hover:text-cyan-400',
            'success' => 'text-green-400 hover:bg-green-100/50 hover:text-green-500 dark:text-green-600 dark:hover:bg-green-800/30 dark:hover:text-green-400',
            'warning' => 'text-amber-400 hover:bg-amber-100/50 hover:text-amber-500 dark:text-amber-600 dark:hover:bg-amber-800/30 dark:hover:text-amber-400',
            'danger' => 'text-red-400 hover:bg-red-100/50 hover:text-red-500 dark:text-red-600 dark:hover:bg-red-800/30 dark:hover:text-red-400',
        ])
        ->merge($attributes);
@endphp

<button {{ $attributes->except('class') }} class="{{ $classes }}" type="button" x-on:click="open = false" data-toast-close>
    <ui:icon name="x" size="sm" />
</button>
