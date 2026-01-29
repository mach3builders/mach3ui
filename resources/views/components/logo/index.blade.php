@props([
    'href' => null,
    'name' => 'Builders',
    'image' => null,
    'color' => null,
    'size' => 'base',
])

@php
    $tag = $href ? 'a' : 'div';

    $color_classes = [
        'blue' => 'text-blue-500',
        'orange' => 'text-orange-500',
        'emerald' => 'text-emerald-500',
        'cyan' => 'text-cyan-500',
        'red' => 'text-red-500',
        'purple' => 'text-purple-500',
        'pink' => 'text-pink-500',
        'yellow' => 'text-yellow-500',
    ];

    $size_classes = [
        'sm' => 'text-sm',
        'base' => 'text-base',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
        '2xl' => 'text-2xl',
    ];

    $brand_class = $color ? ($color_classes[$color] ?? $color_classes['blue']) : 'text-brand';
    $size_class = $size_classes[$size] ?? $size_classes['base'];
@endphp

<{{ $tag }} {{ $attributes->class(['flex items-center gap-[0.1em] font-brand font-bold tracking-wide uppercase uppercase leading-none no-underline select-none', 'text-gray-800 dark:text-gray-50', $size_class])->merge(['href' => $href]) }} data-logo>
    @if ($image)
        <img src="{{ $image }}" alt="{{ $name }}" class="max-h-8" />
    @else
        <span>Mach3</span>

        <span class="-skew-x-12 font-semibold {{ $brand_class }}">III</span>

        <span>{{ $name }}</span>
    @endif
</{{ $tag }}>
