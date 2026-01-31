@props([
    'controls' => true,
    'current' => 1,
    'href' => null,
    'next' => null,
    'prev' => null,
    'total' => 1,
    'visible' => 5,
])

@php
    $start = max(1, $current - floor($visible / 2));
    $end = min($total, $start + $visible - 1);
    $start = max(1, $end - $visible + 1);
    $showStartEllipsis = $start > 2;
    $showEndEllipsis = $end < $total - 1;

    $classes = Ui::classes()->add('flex items-center gap-1');

    $itemClasses = Ui::classes()
        ->add(
            'inline-flex h-9 min-w-9 cursor-pointer items-center justify-center gap-2 rounded-md border px-3 text-sm font-medium [&_svg]:size-4 [&_svg]:shrink-0',
        )
        ->add('bg-transparent text-gray-600')
        ->add('dark:text-gray-400')
        ->add('disabled:pointer-events-none disabled:opacity-25');

    $inactiveClasses = Ui::classes()
        ->add('border-transparent')
        ->add('hover:bg-gray-40 hover:text-gray-900')
        ->add('dark:hover:bg-gray-760 dark:hover:text-gray-100');

    $activeClasses = Ui::classes()
        ->add('border-gray-120 bg-white text-gray-900 shadow-xs')
        ->add('dark:border-gray-690 dark:bg-gray-800 dark:text-gray-20');

    $getPageClasses = fn($isActive, $noPadding = false, $disabled = false) => Ui::classes()
        ->add($itemClasses)
        ->add($isActive ? $activeClasses : $inactiveClasses)
        ->when($noPadding, 'px-0')
        ->when($disabled, 'pointer-events-none opacity-25');

    $pageUrl = fn($page) => $href ? str_replace('{page}', $page, $href) : null;
    $xClick = fn($page) => $href ? null : "\$dispatch('page', {$page})";
    $tag = $href ? 'a' : 'button';
    $xData = $href ? null : '';
@endphp

<nav {{ $attributes->class($classes) }} data-pagination @if ($xData !== null) x-data @endif>
    @if ($controls)
        @php
            $prevDisabled = $current <= 1;
        @endphp
        <{{ $tag }} class="{{ $getPageClasses(false, !$prev, $prevDisabled) }}"
            @if ($href) href="{{ $prevDisabled ? '#' : $pageUrl($current - 1) }}" @endif
            @if ($href && $prevDisabled) aria-disabled="true"
                tabindex="-1" @endif
            @if (!$href) x-on:click="{{ $xClick($current - 1) }}" @endif
            @if (!$href && $prevDisabled) disabled @endif>
            <ui:icon name="chevron-left" />
            @if ($prev)
                {{ $prev }}
            @endif
            </{{ $tag }}>
    @endif

    @if ($start > 1)
        <{{ $tag }} class="{{ $getPageClasses($current === 1) }}"
            @if ($href) href="{{ $pageUrl(1) }}" @endif
            @if (!$href) x-on:click="{{ $xClick(1) }}" @endif>1</{{ $tag }}>
    @endif

    @if ($showStartEllipsis)
        <span
            class="inline-flex h-9 min-w-9 items-center justify-center text-sm text-gray-500 dark:text-gray-500">...</span>
    @endif

    @for ($i = $start; $i <= $end; $i++)
        <{{ $tag }} class="{{ $getPageClasses($current === $i) }}"
            @if ($href) href="{{ $pageUrl($i) }}" @endif
            @if (!$href) x-on:click="{{ $xClick($i) }}" @endif>{{ $i }}
            </{{ $tag }}>
    @endfor

    @if ($showEndEllipsis)
        <span
            class="inline-flex h-9 min-w-9 items-center justify-center text-sm text-gray-500 dark:text-gray-500">...</span>
    @endif

    @if ($end < $total)
        <{{ $tag }} class="{{ $getPageClasses($current === $total) }}"
            @if ($href) href="{{ $pageUrl($total) }}" @endif
            @if (!$href) x-on:click="{{ $xClick($total) }}" @endif>{{ $total }}
            </{{ $tag }}>
    @endif

    @if ($controls)
        @php
            $nextDisabled = $current >= $total;
        @endphp
        <{{ $tag }} class="{{ $getPageClasses(false, !$next, $nextDisabled) }}"
            @if ($href) href="{{ $nextDisabled ? '#' : $pageUrl($current + 1) }}" @endif
            @if ($href && $nextDisabled) aria-disabled="true"
                tabindex="-1" @endif
            @if (!$href) x-on:click="{{ $xClick($current + 1) }}" @endif
            @if (!$href && $nextDisabled) disabled @endif>
            @if ($next)
                {{ $next }}
            @endif
            <ui:icon name="chevron-right" />
            </{{ $tag }}>
    @endif
</nav>
