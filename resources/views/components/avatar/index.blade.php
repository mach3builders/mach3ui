@props([
    'icon' => null,
    'name' => null,
    'size' => 'md',
    'src' => null,
])

@php
    $classes = Ui::classes()
        ->add('relative inline-flex shrink-0 items-center justify-center overflow-hidden rounded-full font-medium')
        ->add('bg-gray-100 text-gray-600')
        ->add('dark:bg-gray-700 dark:text-gray-300')
        ->add(
            match ($size) {
                'xs' => 'size-6 text-[10px]',
                'sm' => 'size-8 text-xs',
                'lg' => 'size-12 text-base',
                'xl' => 'size-16 text-lg',
                default => 'size-10 text-sm',
            },
        );

    $iconSize = match ($size) {
        'xs' => 'xs',
        'sm' => 'sm',
        'lg' => 'lg',
        'xl' => 'xl',
        default => 'md',
    };

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
    {{ $attributes->class($classes->get()) }} data-avatar>
    @if ($src)
        <img x-ref="img" src="{{ $src }}" alt="{{ $name ?? '' }}" x-show="loaded && !failed"
            x-on:load="loaded = true" x-on:error="failed = true" class="size-full object-cover" />

        <span x-show="!loaded || failed">
            @if ($initials)
                {{ $initials }}
            @elseif ($icon)
                <ui:icon :name="$icon" :size="$iconSize" />
            @else
                <ui:icon name="user" :size="$iconSize" />
            @endif
        </span>
    @elseif ($initials)
        {{ $initials }}
    @elseif ($icon)
        <ui:icon :name="$icon" :size="$iconSize" />
    @else
        <ui:icon name="user" :size="$iconSize" />
    @endif
</span>
