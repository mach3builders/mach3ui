@props([
    'name' => null,
    'size' => 'md',
    'type' => 'text',
])

@php
    // Auto-detect name from wire:model or x-model
    $name = $name
        ?: (method_exists($attributes, 'wire') ? $attributes->wire('model')->value() : null)
        ?: collect($attributes->getAttributes())->first(fn($v, $k) => str_starts_with($k, 'x-model'));

    $error = $name ? ($errors->first($name) ?? null) : null;

    $classes = Ui::classes()
        ->add('block w-full appearance-none rounded-md border shadow-xs focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add('autofill:shadow-[inset_0_0_0_1000px_white] autofill:[-webkit-text-fill-color:theme(colors.gray.900)]')
        ->add('dark:autofill:shadow-[inset_0_0_0_1000px_theme(colors.gray.800)] dark:autofill:[-webkit-text-fill-color:theme(colors.gray.100)]')
        ->add($size, [
            'sm' => 'h-8 px-2.5 py-1.5 text-xs',
            'md' => 'h-10 px-3 py-2 text-sm',
            'lg' => 'h-12 px-4 py-3 text-base',
        ])
        ->add($error ? 'error' : 'default', [
            'default' => 'border-gray-140 bg-white text-gray-900 placeholder-gray-400 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-gray-500',
            'error' => 'border-red-500 bg-white text-gray-900 placeholder-gray-400 focus:border-red-500 dark:border-red-500 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-red-500',
        ])
        ->merge($attributes);
@endphp

<input
    type="{{ $type }}"
    @if($name) name="{{ $name }}" id="{{ $name }}" @endif
    @if($error) aria-invalid="true" @endif
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
>
