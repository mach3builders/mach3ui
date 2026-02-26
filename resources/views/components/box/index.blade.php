@blaze(fold: true)

@props([
    'description' => null,
    'title' => null,
])

@php
    $classes = Flux::classes()
        ->add('group/box rounded-xl border border-zinc-200 bg-zinc-50 flex flex-col space-y-6 dark:border-white/6 dark:bg-zinc-800')
        ->add('p-6 has-[[data-flux-card]]:p-2');
@endphp

<div {{ $attributes->class($classes) }} data-flux-box>
    @if ($title || $description)
        <div class="group-has-[[data-flux-card]]/box:px-6 group-has-[[data-flux-card]]/box:pt-4">
            @if ($title)
                <flux:heading size="lg">{{ $title }}</flux:heading>
            @endif

            @if ($description)
                <flux:text variant="subtle">{{ $description }}</flux:text>
            @endif
        </div>
    @endif

    {{ $slot }}
</div>
