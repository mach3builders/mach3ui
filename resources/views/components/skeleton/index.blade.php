@props([
    'circle' => false,
    'count' => 1,
    'height' => null,
    'variant' => 'default',
    'width' => null,
])

@php
    $classes = Ui::classes()
        ->add('animate-pulse rounded')
        ->add($variant, [
            'default' => 'bg-gray-120 dark:bg-gray-700',
            'subtle' => 'bg-gray-40 dark:bg-gray-760',
        ])
        ->when($circle, 'rounded-full')
        ->merge($attributes);

    $style = collect([$width ? "width: {$width}" : null, $height ? "height: {$height}" : null])
        ->filter()
        ->implode('; ');
@endphp

@for ($i = 0; $i < $count; $i++)
    <div {{ $attributes->except('class') }} class="{{ $classes }}"
        @if ($style) style="{{ $style }}" @endif data-skeleton></div>
@endfor
