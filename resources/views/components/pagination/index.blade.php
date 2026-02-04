@props([
    'paginator' => null,
    'visible' => 5,
])

@if ($paginator?->hasPages())
    @php
        $isLengthAware = $paginator instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator;
        $current = $paginator->currentPage();
        $total = $isLengthAware ? $paginator->lastPage() : null;
        $pageName = $paginator->getPageName();

        if ($isLengthAware) {
            $start = max(1, $current - floor($visible / 2));
            $end = min($total, $start + $visible - 1);
            $start = max(1, $end - $visible + 1);
            $showStartEllipsis = $start > 2;
            $showEndEllipsis = $end < $total - 1;
        }
    @endphp

    <nav class="flex items-center justify-between gap-3 border-t border-gray-100 pt-3 dark:border-gray-700"
        data-pagination>
        @if ($isLengthAware && $paginator->total() > 0)
            <div class="text-xs text-gray-500 dark:text-gray-400">
                Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }}
            </div>
        @else
            <div></div>
        @endif

        <div class="flex items-center gap-0.5">
            <button type="button" wire:click="previousPage('{{ $pageName }}')" @disabled($paginator->onFirstPage())
                class="inline-flex h-8 w-8 items-center justify-center rounded-md text-gray-400 hover:text-gray-600 disabled:opacity-40 disabled:pointer-events-none dark:text-gray-500 dark:hover:text-gray-300">
                <ui:icon name="chevron-left" size="sm" />
            </button>

            @if ($isLengthAware)
                @if ($start > 1)
                    <button type="button" wire:click="gotoPage(1, '{{ $pageName }}')"
                        class="inline-flex h-8 min-w-8 items-center justify-center rounded-md px-2 text-sm font-medium text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300">1</button>
                @endif

                @if ($showStartEllipsis)
                    <span
                        class="inline-flex h-8 min-w-8 items-center justify-center text-sm text-gray-300 dark:text-gray-600">...</span>
                @endif

                @for ($i = $start; $i <= $end; $i++)
                    <button type="button" wire:click="gotoPage({{ $i }}, '{{ $pageName }}')"
                        @class([
                            'inline-flex h-8 min-w-8 items-center justify-center rounded-md px-2 text-sm font-medium',
                            'text-gray-900 dark:text-white' => $i === $current,
                            'text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300' =>
                                $i !== $current,
                        ])>{{ $i }}</button>
                @endfor

                @if ($showEndEllipsis)
                    <span
                        class="inline-flex h-8 min-w-8 items-center justify-center text-sm text-gray-300 dark:text-gray-600">...</span>
                @endif

                @if ($end < $total)
                    <button type="button" wire:click="gotoPage({{ $total }}, '{{ $pageName }}')"
                        class="inline-flex h-8 min-w-8 items-center justify-center rounded-md px-2 text-sm font-medium text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300">{{ $total }}</button>
                @endif
            @endif

            <button type="button" wire:click="nextPage('{{ $pageName }}')" @disabled(!$paginator->hasMorePages())
                class="inline-flex h-8 w-8 items-center justify-center rounded-md text-gray-400 hover:text-gray-600 disabled:opacity-40 disabled:pointer-events-none dark:text-gray-500 dark:hover:text-gray-300">
                <ui:icon name="chevron-right" size="sm" />
            </button>
        </div>
    </nav>
@endif
