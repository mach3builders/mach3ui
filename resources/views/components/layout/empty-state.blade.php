@props([
    'description' => null,
    'icon' => 'magnifying-glass',
    'title' => null,
])

@php
    $classes = Flux::classes()->add('flex flex-col items-center justify-center py-16 text-center');
@endphp

<div {{ $attributes->class($classes) }} data-flux-empty-state>
    <div
        class="mb-4 flex size-18 items-center justify-center rounded-full bg-zinc-100 text-zinc-400 dark:bg-zinc-800 dark:text-zinc-500"
    >
        <flux:icon :$icon class="size-10" />
    </div>

    @if ($title)
        <flux:heading size="lg">{{ $title }}</flux:heading>
    @endif

    @if ($description)
        <flux:text variant="subtle" class="mt-1 max-w-sm">{{ $description }}</flux:text>
    @endif

    @if ($slot->isNotEmpty())
        <div class="mt-6">
            {{ $slot }}
        </div>
    @endif
</div>
