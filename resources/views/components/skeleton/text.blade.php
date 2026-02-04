@props([
    'lines' => 3,
    'size' => 'md',
    'variant' => 'default',
])

@php
    $lineClasses = Ui::classes()
        ->add('animate-pulse rounded')
        ->add($variant, [
            'default' => 'bg-gray-200 dark:bg-gray-700',
            'subtle' => 'bg-gray-100 dark:bg-gray-800',
        ])
        ->add($size, [
            'sm' => 'h-3',
            'md' => 'h-4',
            'lg' => 'h-5',
        ]);

    $wrapperClasses = Ui::classes()
        ->add('flex flex-col')
        ->add($size, [
            'sm' => 'gap-2',
            'md' => 'gap-2.5',
            'lg' => 'gap-3',
        ])
        ->merge($attributes);

    // Vary line widths for realistic text appearance
    $widths = ['w-full', 'w-11/12', 'w-10/12', 'w-9/12', 'w-8/12', 'w-7/12'];
@endphp

<div {{ $attributes->except('class') }} class="{{ $wrapperClasses }}" data-skeleton-text>
    @for ($i = 0; $i < $lines; $i++)
        @php
            // Last line is shorter, others vary
            $width = $i === $lines - 1 ? $widths[array_rand(array_slice($widths, 3))] : $widths[array_rand(array_slice($widths, 0, 3))];
        @endphp
        <div class="{{ $lineClasses }} {{ $width }}"></div>
    @endfor
</div>
