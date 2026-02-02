@props([
    'size' => 'md',
])

@php
    $classes = Ui::classes()
        ->add('inline-flex items-center justify-center rounded-md border font-mono font-medium')
        ->add('border-gray-120 bg-gray-40 text-gray-600')
        ->add('dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300')
        ->add(
            match ($size) {
                'sm' => 'h-4 min-w-4 rounded-sm px-1 text-[10px]',
                'lg' => 'h-6 min-w-6 px-2 text-[14px]',
                default => 'h-5 min-w-5 px-1.5 text-[12px]',
            },
        )
        ->merge($attributes->only('class'));
@endphp

<kbd class="{{ $classes }}" {{ $attributes->except('class') }} data-kbd>{{ $slot }}</kbd>
