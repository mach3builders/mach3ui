@props([
    'brand' => 'Builders',
    'color' => null,
    'href' => null,
    'image' => null,
    'size' => 'md',
])

@php
    $tag = $href ? 'a' : 'div';

    $classes = Ui::classes()
        ->add('inline-flex items-center gap-[0.1em] font-brand font-bold uppercase leading-none tracking-wide select-none')
        ->add('text-gray-800 dark:text-gray-50')
        ->add($size, [
            'sm' => 'text-sm',
            'md' => 'text-base',
            'lg' => 'text-lg',
            'xl' => 'text-xl',
            '2xl' => 'text-2xl',
        ])
        ->when($href, 'no-underline')
        ->merge($attributes);

    $accentClasses = Ui::classes()
        ->add('-skew-x-12 font-semibold')
        ->add($color, [
            'gray' => 'text-gray-500',
            'blue' => 'text-blue-500',
            'orange' => 'text-orange-500',
            'emerald' => 'text-emerald-500',
            'cyan' => 'text-cyan-500',
            'red' => 'text-red-500',
            'purple' => 'text-purple-500',
            'pink' => 'text-pink-500',
            'yellow' => 'text-yellow-500',
        ])
        ->when(! $color, 'text-primary');
@endphp

<{{ $tag }}
    {{ $attributes->only(['wire:navigate', 'x-on:click', 'x-bind:href'])->merge($href ? ['href' => $href] : []) }}
    class="{{ $classes }}"
    data-logo
>
    @if ($image)
        <img src="{{ $image }}" alt="{{ $brand }}" class="max-h-8" data-logo-image />
    @else
        <span data-logo-prefix>Mach3</span>
        <span class="{{ $accentClasses }}" data-logo-accent>III</span>
        <span data-logo-brand>{{ $brand }}</span>
    @endif
</{{ $tag }}>
