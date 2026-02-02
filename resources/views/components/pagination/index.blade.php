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
    // Calculate visible page range
    $start = max(1, $current - floor($visible / 2));
    $end = min($total, $start + $visible - 1);
    $start = max(1, $end - $visible + 1);

    // Determine if ellipsis should show
    $showStartEllipsis = $start > 2;
    $showEndEllipsis = $end < $total - 1;

    // Helper to generate page URL
    $pageUrl = fn($page) => $href ? str_replace('{page}', $page, $href) : null;

    $classes = Ui::classes()->add('flex items-center gap-1')->merge($attributes->only('class'));

    $ellipsisClasses = 'inline-flex h-9 min-w-9 items-center justify-center text-sm text-gray-500 dark:text-gray-500';
@endphp

<nav class="{{ $classes }}" {{ $attributes->except('class') }}
    @unless ($href) x-data @endunless data-pagination>
    {{-- Previous button --}}
    @if ($controls)
        <ui:pagination.item :href="$pageUrl($current - 1)" :page="$current - 1" :disabled="$current <= 1"
            :noPadding="!$prev">
            <ui:icon name="chevron-left" />
            @if ($prev)
                {{ $prev }}
            @endif
        </ui:pagination.item>
    @endif

    {{-- First page (when not in visible range) --}}
    @if ($start > 1)
        <ui:pagination.item :href="$pageUrl(1)" :page="1" :active="$current === 1">1
        </ui:pagination.item>
    @endif

    {{-- Start ellipsis --}}
    @if ($showStartEllipsis)
        <span class="{{ $ellipsisClasses }}">...</span>
    @endif

    {{-- Visible page range --}}
    @for ($i = $start; $i <= $end; $i++)
        <ui:pagination.item :href="$pageUrl($i)" :page="$i" :active="$current === $i">{{ $i }}
        </ui:pagination.item>
    @endfor

    {{-- End ellipsis --}}
    @if ($showEndEllipsis)
        <span class="{{ $ellipsisClasses }}">...</span>
    @endif

    {{-- Last page (when not in visible range) --}}
    @if ($end < $total)
        <ui:pagination.item :href="$pageUrl($total)" :page="$total" :active="$current === $total">
            {{ $total }}</ui:pagination.item>
    @endif

    {{-- Next button --}}
    @if ($controls)
        <ui:pagination.item :href="$pageUrl($current + 1)" :page="$current + 1" :disabled="$current >= $total"
            :noPadding="!$next">
            @if ($next)
                {{ $next }}
            @endif
            <ui:icon name="chevron-right" />
        </ui:pagination.item>
    @endif
</nav>
