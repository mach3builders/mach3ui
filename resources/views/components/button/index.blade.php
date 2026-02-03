@props([
    'variant' => 'default',
    'size' => 'md',
    'href' => null,
])

@php
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button' && !$attributes->has('type')) type="button" @endif
    data-variant="{{ $variant }}"
    data-size="{{ $size }}"
    {{ $attributes }}
>
    {{ $slot }}
</{{ $tag }}>
