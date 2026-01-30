@props([
    'toc' => null,
    'width' => 'full',
    'banner' => false,
])

@php
    $padding_x = 'px-4 sm:px-8 lg:px-16 xl:px-20';
    $nav_top = $banner ? 'top-24' : 'top-14';
    $toc_top = $banner ? 'top-34' : 'top-24';
@endphp

<div {{ $attributes }} data-layout-main-content>
    <header @class([
    $padding_x,
    'flex flex-col gap-4 py-6 lg:flex-row lg:items-end lg:justify-between lg:gap-6',
    '[&:not(:has(+[data-layout-main-nav]))]:border-b',
    '[&:not(:has(+[data-layout-main-nav]))]:border-gray-60',
    '[&:not(:has(+[data-layout-main-nav]))]:dark:border-gray-740',
    'flex-wrap' => isset($progress),
]) data-layout-main-header>
    @if (isset($progress))
        {{ $progress }}
    @endif

    <div class="flex grow flex-col gap-1">
        @if (isset($header))
            {{ $header }}
        @else
            <ui:heading level="1" size="xl">{{ $title ?? 'Page title' }}</ui:heading>

            @if (isset($description))
                <ui:text variant="muted">{{ $description }}</ui:text>
            @endif
        @endif

        @if (isset($badges))
            <div class="flex items-center gap-1 mt-1">
                {{ $badges }}
            </div>
        @endif
    </div>

    @if (isset($actions))
        <div class="flex items-center gap-4">
            {{ $actions }}
        </div>
    @endif
</header>

@if (isset($nav))
    <nav @class([
        $padding_x,
        'sticky z-20',
        $nav_top,
        'bg-white',
        'dark:bg-gray-800',
        'before:absolute before:inset-x-0 before:bottom-0 before:-z-10 before:h-px before:content-[\'\']',
        'before:bg-gray-60',
        'dark:before:bg-gray-740',
    ]) data-layout-main-nav>
        <div class="w-full">
            {{ $nav }}
        </div>
    </nav>
@endif

<section @class([
    $padding_x,
    'relative z-10 pb-20',
    'has-[[data-layout-main-toc]]:flex has-[[data-layout-main-toc]]:gap-8',
]) data-layout-main-body>
    <div class="flex flex-1 flex-col gap-12 pt-10 pb-20 max-w-{{ $width }}">
        {{ $slot }}
    </div>

    @if ($toc)
        <aside @class([
            'sticky mt-10 hidden h-fit w-56 shrink-0 lg:flex lg:flex-col lg:items-end',
            $toc_top,
        ]) data-layout-main-toc>
            {{ $toc }}
        </aside>
    @endif
    </section>
</div>
