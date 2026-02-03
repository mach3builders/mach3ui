@props([
    'controls' => true,
    'paginator' => null,
    'simple' => false,
    'summary' => true,
    'visible' => 5,
])

@php
    // Detect paginator type
    $isLengthAware = $paginator instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator;
    $isCursor = $paginator && method_exists($paginator, 'getCursorName');
    $isSimple = $simple || !$isLengthAware;

    // Get paginator info
    $currentPage = $paginator?->currentPage() ?? 1;
    $lastPage = $isLengthAware ? $paginator->lastPage() : null;
    $pageName = $paginator?->getPageName() ?? 'page';
    $onFirstPage = $paginator?->onFirstPage() ?? true;
    $hasMorePages = $paginator?->hasMorePages() ?? false;

    // Calculate visible page range (only for LengthAwarePaginator)
    if ($isLengthAware && $lastPage) {
        $start = max(1, $currentPage - floor($visible / 2));
        $end = min($lastPage, $start + $visible - 1);
        $start = max(1, $end - $visible + 1);
        $showStartEllipsis = $start > 2;
        $showEndEllipsis = $end < $lastPage - 1;
    }

    $classes = Ui::classes()
        ->add('@container')
        ->add('flex items-center justify-between gap-3')
        ->add('border-t border-gray-100 pt-3')
        ->add('dark:border-gray-700')
        ->merge($attributes);
@endphp

<nav {{ $attributes->except('class') }} class="{{ $classes }}" aria-label="{{ __('Pagination') }}" data-pagination>
    {{-- Summary (LengthAwarePaginator only) --}}
    @if ($summary && $isLengthAware && $paginator->total() > 0)
        <div class="text-xs font-medium whitespace-nowrap text-gray-500 dark:text-gray-400">
            {!! __('Showing') !!}
            <span class="font-semibold text-gray-700 dark:text-gray-200">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-semibold text-gray-700 dark:text-gray-200">{{ $paginator->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-semibold text-gray-700 dark:text-gray-200">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </div>
    @else
        <div></div>
    @endif

    @if ($paginator?->hasPages())
        {{-- Simple pagination (prev/next only) --}}
        @if ($isSimple)
            <div class="flex items-center rounded-lg border border-gray-100 bg-white p-0.5 dark:border-gray-700 dark:bg-gray-800">
                @if ($isCursor)
                    {{-- Cursor pagination --}}
                    <ui:pagination.item
                        :disabled="$onFirstPage"
                        wire:click="setPage('{{ $paginator->previousCursor()?->encode() }}', '{{ $paginator->getCursorName() }}')"
                        icon="chevron-left"
                    />
                    <ui:pagination.item
                        :disabled="!$hasMorePages"
                        wire:click="setPage('{{ $paginator->nextCursor()?->encode() }}', '{{ $paginator->getCursorName() }}')"
                        icon="chevron-right"
                    />
                @else
                    {{-- Simple pagination --}}
                    <ui:pagination.item
                        :disabled="$onFirstPage"
                        wire:click="previousPage('{{ $pageName }}')"
                        icon="chevron-left"
                    />
                    <ui:pagination.item
                        :disabled="!$hasMorePages"
                        wire:click="nextPage('{{ $pageName }}')"
                        icon="chevron-right"
                    />
                @endif
            </div>
        @else
            {{-- Full pagination with page numbers --}}
            {{-- Mobile: simple prev/next --}}
            <div class="flex @[32rem]:hidden items-center rounded-lg border border-gray-100 bg-white p-0.5 dark:border-gray-700 dark:bg-gray-800">
                <ui:pagination.item
                    :disabled="$onFirstPage"
                    wire:click="previousPage('{{ $pageName }}')"
                    icon="chevron-left"
                />
                <ui:pagination.item
                    :disabled="!$hasMorePages"
                    wire:click="nextPage('{{ $pageName }}')"
                    icon="chevron-right"
                />
            </div>

            {{-- Desktop: full page numbers --}}
            <div class="hidden @[32rem]:flex items-center rounded-lg border border-gray-100 bg-white p-0.5 dark:border-gray-700 dark:bg-gray-800">
                {{-- Previous --}}
                @if ($controls)
                    <ui:pagination.item
                        :disabled="$onFirstPage"
                        wire:click="previousPage('{{ $pageName }}')"
                        icon="chevron-left"
                    />
                @endif

                {{-- First page --}}
                @if ($start > 1)
                    <ui:pagination.item
                        wire:click="gotoPage(1, '{{ $pageName }}')"
                        wire:key="paginator-{{ $pageName }}-page-1"
                    >1</ui:pagination.item>
                @endif

                {{-- Start ellipsis --}}
                @if ($showStartEllipsis)
                    <ui:pagination.item disabled>...</ui:pagination.item>
                @endif

                {{-- Visible pages --}}
                @for ($page = $start; $page <= $end; $page++)
                    <ui:pagination.item
                        :active="$page === $currentPage"
                        wire:click="gotoPage({{ $page }}, '{{ $pageName }}')"
                        wire:key="paginator-{{ $pageName }}-page-{{ $page }}"
                    >{{ $page }}</ui:pagination.item>
                @endfor

                {{-- End ellipsis --}}
                @if ($showEndEllipsis)
                    <ui:pagination.item disabled>...</ui:pagination.item>
                @endif

                {{-- Last page --}}
                @if ($end < $lastPage)
                    <ui:pagination.item
                        wire:click="gotoPage({{ $lastPage }}, '{{ $pageName }}')"
                        wire:key="paginator-{{ $pageName }}-page-{{ $lastPage }}"
                    >{{ $lastPage }}</ui:pagination.item>
                @endif

                {{-- Next --}}
                @if ($controls)
                    <ui:pagination.item
                        :disabled="!$hasMorePages"
                        wire:click="nextPage('{{ $pageName }}')"
                        icon="chevron-right"
                    />
                @endif
            </div>
        @endif
    @endif
</nav>
