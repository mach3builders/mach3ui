@props([
    'size' => 'md',
])

@php
    $classes = Ui::classes()
        ->add('inline-flex items-center justify-center rounded-md border font-mono font-medium')
        ->add('border-gray-200 bg-gray-50 text-gray-600')
        ->add('dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300')
        ->add($size, [
            'sm' => 'h-4 min-w-4 rounded-sm px-1 text-[10px]',
            'md' => 'h-5 min-w-5 px-1.5 text-[12px]',
            'lg' => 'h-6 min-w-6 px-2 text-[14px]',
        ])
        ->merge($attributes);
@endphp

<kbd {{ $attributes->except('class') }} class="{{ $classes }}" data-kbd data-size="{{ $size }}">{{ $slot }}</kbd>
