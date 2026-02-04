@props([
    'icon' => null,
    'name' => null,
    'size' => 'md',
    'src' => null,
])

@php
    $classes = Ui::classes()
        ->add('relative inline-flex shrink-0 items-center justify-center overflow-hidden rounded-full font-medium')
        ->add('bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300')
        ->add($size, [
            'xs' => 'size-6 text-[10px]',
            'sm' => 'size-8 text-xs',
            'md' => 'size-10 text-sm',
            'lg' => 'size-12 text-base',
            'xl' => 'size-16 text-lg',
        ])
        ->merge($attributes);

    $initials = null;
    if ($name) {
        $words = preg_split('/\s+/', trim($name));
        $initials = count($words) >= 2
            ? mb_strtoupper(mb_substr($words[0], 0, 1) . mb_substr($words[1], 0, 1))
            : mb_strtoupper(mb_substr($name, 0, 2));
    }

    $fallbackIcon = $icon ?? 'user';
@endphp

<span
    @if ($src) x-data="{ loaded: false, failed: false }" x-init="$nextTick(() => { if ($refs.img.complete && $refs.img.naturalWidth > 0) loaded = true })" @endif
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
    data-avatar
>
    @if ($src)
        <img
            x-ref="img"
            src="{{ $src }}"
            alt="{{ $name ?? '' }}"
            x-show="loaded && !failed"
            x-on:load="loaded = true"
            x-on:error="failed = true"
            class="size-full object-cover"
            data-avatar-image
        />

        <span x-show="!loaded || failed" x-cloak data-avatar-fallback>
            @if ($initials)
                {{ $initials }}
            @else
                <ui:icon :name="$fallbackIcon" :size="$size" />
            @endif
        </span>
    @elseif ($initials)
        {{ $initials }}
    @else
        <ui:icon :name="$fallbackIcon" :size="$size" />
    @endif
</span>
