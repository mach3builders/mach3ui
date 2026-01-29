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
    $show_start_ellipsis = $start > 2;
    $show_end_ellipsis = $end < $total - 1;

    $item_classes = [
        'inline-flex h-9 min-w-9 cursor-pointer items-center justify-center gap-2 rounded-md border px-3 text-sm font-medium [&_svg]:size-4 [&_svg]:shrink-0',
        'bg-transparent text-gray-600',
        'dark:text-gray-400',
        'disabled:pointer-events-none disabled:opacity-25',
    ];

    $inactive_classes = [
        'border-transparent',
        'hover:bg-gray-40 hover:text-gray-900',
        'dark:hover:bg-gray-760 dark:hover:text-gray-100',
    ];

    $active_classes = [
        'border-gray-120 bg-white text-gray-900 shadow-xs',
        'dark:border-gray-690 dark:bg-gray-800 dark:text-gray-20',
    ];

    $page_url = fn($page) => $href ? str_replace('{page}', $page, $href) : null;
    $x_click = fn($page) => $href ? null : "\$dispatch('page', {$page})";
    $tag = $href ? 'a' : 'button';
    $x_data = $href ? null : '';
@endphp

<nav
    {{ $attributes->class(['flex items-center gap-1']) }}
    data-pagination
    @if ($x_data !== null) x-data @endif
>
    @if ($controls)
        @php
            $prev_disabled = $current <= 1;
        @endphp
        <{{ $tag }}
            @class([
                ...$item_classes,
                ...$inactive_classes,
                'px-0' => !$prev,
                'pointer-events-none opacity-25' => $prev_disabled,
            ])
            @if ($href)
                href="{{ $prev_disabled ? '#' : $page_url($current - 1) }}"
            @endif
            @if ($href && $prev_disabled)
                aria-disabled="true"
                tabindex="-1"
            @endif
            @if (!$href)
                x-on:click="{{ $x_click($current - 1) }}"
            @endif
            @if (!$href && $prev_disabled)
                disabled
            @endif
        >
            <ui:icon name="chevron-left" />
            @if ($prev) {{ $prev }} @endif
        </{{ $tag }}>
    @endif

    @if ($start > 1)
        <{{ $tag }}
            @class([...$item_classes, ...($current === 1 ? $active_classes : $inactive_classes)])
            @if ($href) href="{{ $page_url(1) }}" @endif
            @if (!$href) x-on:click="{{ $x_click(1) }}" @endif
        >1</{{ $tag }}>
    @endif

    @if ($show_start_ellipsis)
        <span class="inline-flex h-9 min-w-9 items-center justify-center text-sm text-gray-500 dark:text-gray-500">...</span>
    @endif

    @for ($i = $start; $i <= $end; $i++)
        <{{ $tag }}
            @class([...$item_classes, ...($current === $i ? $active_classes : $inactive_classes)])
            @if ($href) href="{{ $page_url($i) }}" @endif
            @if (!$href) x-on:click="{{ $x_click($i) }}" @endif
        >{{ $i }}</{{ $tag }}>
    @endfor

    @if ($show_end_ellipsis)
        <span class="inline-flex h-9 min-w-9 items-center justify-center text-sm text-gray-500 dark:text-gray-500">...</span>
    @endif

    @if ($end < $total)
        <{{ $tag }}
            @class([...$item_classes, ...($current === $total ? $active_classes : $inactive_classes)])
            @if ($href) href="{{ $page_url($total) }}" @endif
            @if (!$href) x-on:click="{{ $x_click($total) }}" @endif
        >{{ $total }}</{{ $tag }}>
    @endif

    @if ($controls)
        @php
            $next_disabled = $current >= $total;
        @endphp
        <{{ $tag }}
            @class([
                ...$item_classes,
                ...$inactive_classes,
                'px-0' => !$next,
                'pointer-events-none opacity-25' => $next_disabled,
            ])
            @if ($href)
                href="{{ $next_disabled ? '#' : $page_url($current + 1) }}"
            @endif
            @if ($href && $next_disabled)
                aria-disabled="true"
                tabindex="-1"
            @endif
            @if (!$href)
                x-on:click="{{ $x_click($current + 1) }}"
            @endif
            @if (!$href && $next_disabled)
                disabled
            @endif
        >
            @if ($next) {{ $next }} @endif
            <ui:icon name="chevron-right" />
        </{{ $tag }}>
    @endif
</nav>
