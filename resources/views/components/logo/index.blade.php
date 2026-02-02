@props([
    'color' => null,
    'href' => null,
    'image' => null,
    'name' => 'Builders',
    'size' => 'base',
])

@php
    $tag = $href ? 'a' : 'div';

    $colorClasses = [
        'gray' => 'text-gray-500',
        'blue' => 'text-blue-500',
        'orange' => 'text-orange-500',
        'emerald' => 'text-emerald-500',
        'cyan' => 'text-cyan-500',
        'red' => 'text-red-500',
        'purple' => 'text-purple-500',
        'pink' => 'text-pink-500',
        'yellow' => 'text-yellow-500',
    ];

    $brandClass = $color ? $colorClasses[$color] ?? $colorClasses['gray'] : 'text-brand';

    $classes = Ui::classes()
        ->add(
            'flex items-center gap-[0.1em] font-brand font-bold tracking-wide uppercase leading-none no-underline select-none',
        )
        ->add('text-gray-800')
        ->add('dark:text-gray-50')
        ->add(
            match ($size) {
                'sm' => 'text-sm',
                'lg' => 'text-lg',
                'xl' => 'text-xl',
                '2xl' => 'text-2xl',
                default => 'text-base',
            },
        )
        ->merge($attributes->only('class'));

    $brandClasses = Ui::classes()->add('-skew-x-12 font-semibold')->add($brandClass);
@endphp

<{{ $tag }} class="{{ $classes }}" @if ($href) href="{{ $href }}" @endif
    {{ $attributes->except('class') }} data-logo>
    @if ($image)
        <img src="{{ $image }}" alt="{{ $name }}" class="max-h-8" />
    @else
        <span>Mach3</span>

        <span class="{{ $brandClasses }}">III</span>

        <span>{{ $name }}</span>
    @endif
    </{{ $tag }}>
