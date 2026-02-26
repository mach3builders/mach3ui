@props([
    'href' => null,
    'icon' => null,
    'icon:end' => null,
    'label' => null,
    'route' => null,
    'value' => null,
])

@php
    $url = $route ? route($route) : $href;
    $iconEnd = $__data['icon:end'] ?? null;
    $tag = $url ? 'a' : 'div';
    $hasStructure = $label || $value || $icon || $iconEnd;

    $classes = Flux::classes()
        ->add('text-zinc-700 dark:text-zinc-200')
        ->add('px-4 py-3')
        ->add('border-b border-zinc-200 last:border-b-0 dark:border-white/10')
        ->add($url ? 'cursor-pointer hover:bg-black/[0.02] dark:hover:bg-white/[0.02]' : '')
        ->add($hasStructure ? 'flex items-center justify-between gap-4' : '')
        // Definition variant overrides
        ->add('[[data-variant=definition]_&]:items-baseline [[data-variant=definition]_&]:gap-2')
        ->add('[[data-variant=definition]_&]:p-0 [[data-variant=definition]_&]:border-b-0');

    $labelClasses = Flux::classes()
        ->add('flex items-center gap-3 font-medium')
        ->add('text-zinc-900 dark:text-white')
        ->add('[&>svg]:size-5 [&>svg]:shrink-0 [&>svg]:text-zinc-400 dark:[&>svg]:text-zinc-500')
        // Definition variant overrides
        ->add('[[data-variant=definition]_&]:shrink-0 [[data-variant=definition]_&]:font-normal [[data-variant=definition]_&]:text-zinc-500 [[data-variant=definition]_&]:dark:text-zinc-400');

    $dividerClasses = Flux::classes()
        ->add('hidden flex-1 border-b border-dotted border-zinc-400 dark:border-zinc-600')
        ->add('[[data-variant=definition]_&]:block');

    $valueClasses = Flux::classes()
        ->add('flex items-center gap-2 text-right')
        ->add('text-zinc-500 dark:text-zinc-400')
        ->add('[&>svg]:size-4 [&>svg]:shrink-0')
        // Definition variant overrides
        ->add('[[data-variant=definition]_&]:font-medium [[data-variant=definition]_&]:text-zinc-800 [[data-variant=definition]_&]:dark:text-white');
@endphp

<{{ $tag }} @if ($url) href="{{ $url }}" @endif {{ $attributes->class($classes) }} data-flux-list-item>
    @if ($hasStructure)
        <span class="{{ $labelClasses }}">
            @if ($icon)
                <flux:icon :name="$icon" />
            @endif

            {{ $label ?? $slot }}
        </span>

        <span class="{{ $dividerClasses }}" aria-hidden="true"></span>

        @if ($value || $iconEnd || ($label && $slot->isNotEmpty()))
            <span class="{{ $valueClasses }}">
                {{ $label ? ($value ?? $slot) : $value }}

                @if ($iconEnd)
                    <flux:icon :name="$iconEnd" />
                @endif
            </span>
        @endif
    @else
        {{ $slot }}
    @endif
</{{ $tag }}>
