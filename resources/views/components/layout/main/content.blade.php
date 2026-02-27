@props([])

@php
    $headerClasses = Flux::classes()->add('flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between lg:gap-6');
@endphp

<div {{ $attributes }} data-flux-main-content>
    <div @class([$headerClasses, 'border-b border-zinc-200 pb-6 dark:border-zinc-700/70' => !isset($nav)])>
        <div class="flex grow flex-col items-start gap-1">
            @if (isset($header))
                {{ $header }}
            @endif

            @if (isset($badges))
                <div class="mt-1 flex items-center gap-1">
                    {{ $badges }}
                </div>
            @endif
        </div>

        @if (isset($actions))
            <div class="flex items-center gap-4">
                {{ $actions }}
            </div>
        @endif
    </div>

    @if (isset($nav))
        <nav class="dark:bg-zinc-850 sticky top-16 z-40 -mx-6 mt-6 bg-white px-6 lg:-mx-8 lg:px-8">
            {{ $nav }}
        </nav>
    @endif

    <section class="space-y-12 pt-12 pb-24">
        {{ $slot }}
    </section>
</div>
