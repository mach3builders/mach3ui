@props([
    'src' => null,
    'delete' => null,
    'light' => false,
    'dark' => false,
])

@php
    $background_classes = match (true) {
        $dark => 'border-white/10 bg-zinc-900',
        $light => 'border-zinc-200 bg-white',
        default => 'border-zinc-200 bg-white dark:border-white/10 dark:bg-white/5',
    };

    $container_classes = Flux::classes()
        ->add('flex h-20 w-32 items-center justify-center overflow-hidden rounded-lg border p-2')
        ->add($background_classes);

    $clickable_classes = Flux::classes($container_classes)
        ->add('cursor-pointer')
        ->add(match (true) {
            $dark => 'hover:border-white/25',
            $light => 'hover:border-zinc-400',
            default => 'hover:border-zinc-400 dark:hover:border-white/25',
        });

    $icon_classes = match (true) {
        $dark => 'text-zinc-600',
        $light => 'text-zinc-300',
        default => 'text-zinc-300 dark:text-zinc-600',
    };
@endphp

<div {{ $attributes->class('flex items-center gap-4') }} data-flux-image-preview>
    @if ($src)
        <button type="button" x-on:click="previewSrc = @js($src); let y = window.scrollY; $flux.modal('image-preview').show(); requestAnimationFrame(() => window.scrollTo(0, y))" class="{{ $clickable_classes }}">
            <img src="{{ $src }}" class="max-h-full max-w-full rounded object-contain" />
        </button>
    @else
        <div class="{{ $container_classes }}">
            <flux:icon name="photo" class="size-5 {{ $icon_classes }}" />
        </div>
    @endif

    @if ($src && $delete)
        <flux:button variant="subtle" size="sm" icon="trash-2" wire:click="{{ $delete }}">
            {{ __('ui::common.destroy') }}
        </flux:button>
    @endif
</div>
