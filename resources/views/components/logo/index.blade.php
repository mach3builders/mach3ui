@blaze

@props([
    'href' => null,
    'size' => 'md',
])

@php
    $tag = $href ? 'a' : 'div';
    $brand = str_ireplace('mach3', '', config('app.name') ?: 'Builders');

    $sizeClasses = match ($size) {
        'sm' => 'text-sm',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
        '2xl' => 'text-2xl',
        default => 'text-base',
    };

    $classes = Flux::classes()
        ->add('inline-flex h-10 items-center gap-[0.1em] font-brand font-bold uppercase leading-none tracking-wide select-none')
        ->add('text-zinc-800 dark:text-zinc-50')
        ->add($href ? 'no-underline' : '')
        ->add($sizeClasses);
@endphp

<{{ $tag }}
    {{ $attributes->class($classes) }}
    @if ($href) href="{{ $href }}" @endif
    data-flux-logo
>
    <span>Mach3</span>

    <span class="text-brand -skew-x-12 font-semibold">III</span>

    <span>{{ $brand }}</span>
</{{ $tag }}>
