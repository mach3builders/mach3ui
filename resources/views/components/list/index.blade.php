@props([
    'variant' => null,
])

@php
    $tag = $variant === 'definition' ? 'dl' : 'div';

    $classes = Flux::classes()
        ->add('flex flex-col')
        ->add(match ($variant) {
            'definition' => 'gap-3',
            default => '',
        });
@endphp

<{{ $tag }} {{ $attributes->class($classes) }} data-flux-list @if ($variant) data-variant="{{ $variant }}" @endif>
    {{ $slot }}
</{{ $tag }}>
