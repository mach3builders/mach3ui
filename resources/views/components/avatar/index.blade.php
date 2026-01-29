@props([
    'icon' => null,
    'name' => null,
    'size' => 'md',
    'src' => null,
])

@php
    $size_classes = [
        'xs' => 'size-6 text-[10px]',
        'sm' => 'size-8 text-xs',
        'md' => 'size-10 text-sm',
        'lg' => 'size-12 text-base',
        'xl' => 'size-16 text-lg',
    ];

    $icon_sizes = [
        'xs' => 'size-3',
        'sm' => 'size-4',
        'md' => 'size-5',
        'lg' => 'size-6',
        'xl' => 'size-8',
    ];

    $initials = null;
    if ($name) {
        $words = preg_split('/\s+/', trim($name));
        if (count($words) >= 2) {
            $initials = mb_strtoupper(mb_substr($words[0], 0, 1) . mb_substr($words[1], 0, 1));
        } else {
            $initials = mb_strtoupper(mb_substr($name, 0, 2));
        }
    }
@endphp

<span
    @if ($src) x-data="{ loaded: false, failed: false }"
        x-init="$nextTick(() => { if ($refs.img.complete && $refs.img.naturalWidth > 0) loaded = true })" @endif
    {{ $attributes->class([
        'relative inline-flex shrink-0 items-center justify-center overflow-hidden rounded-full font-medium',
        'bg-gray-100 text-gray-600',
        'dark:bg-gray-700 dark:text-gray-300',
        $size_classes[$size] ?? $size_classes['md'],
    ]) }}
    data-avatar>
    @if ($src)
        <img x-ref="img" src="{{ $src }}" alt="{{ $name ?? '' }}" x-show="loaded && !failed"
            x-on:load="loaded = true" x-on:error="failed = true" class="size-full object-cover" />

        <span x-show="!loaded || failed">
            @if ($initials)
                {{ $initials }}
            @elseif ($icon)
                <x-dynamic-component :component="'lucide-' . $icon" @class([$icon_sizes[$size] ?? $icon_sizes['md']]) />
            @else
                <x-lucide-user @class([$icon_sizes[$size] ?? $icon_sizes['md']]) />
            @endif
        </span>
    @elseif ($initials)
        {{ $initials }}
    @elseif ($icon)
        <x-dynamic-component :component="'lucide-' . $icon" @class([$icon_sizes[$size] ?? $icon_sizes['md']]) />
    @else
        <x-lucide-user @class([$icon_sizes[$size] ?? $icon_sizes['md']]) />
    @endif
</span>
