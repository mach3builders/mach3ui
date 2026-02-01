@props([
    'level' => null,
    'muted' => false,
    'size' => 'base',
])

@php
    $tag = $level ? 'h' . (int) $level : 'div';

    $classes = Ui::classes()
        ->add('scroll-mt-20 font-semibold')
        ->add(
            match ($size) {
                'lg' => 'text-lg',
                'xl' => 'text-xl',
                default => 'text-base',
            },
        )
        ->add($muted ? 'text-gray-500 dark:text-gray-400' : 'text-gray-980 dark:text-gray-100')
        ->merge($attributes->only('class'));
@endphp

<{{ $tag }} class="{{ $classes }}" {{ $attributes->except('class') }} data-heading>{{ $slot }}
    </{{ $tag }}>
