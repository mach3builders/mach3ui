@props([
    'paginator' => null,
    'visible' => 5,
])

@if ($paginator?->hasPages())
    @php
        $isLengthAware = $paginator instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator;
        $current = (int) $paginator->currentPage();
        $total = $isLengthAware ? (int) $paginator->lastPage() : null;
        $pageName = $paginator->getPageName();

        // Detect Livewire context
        $isLivewire = isset($this) && $this instanceof \Livewire\Component;

        if ($isLengthAware) {
            $visible = (int) $visible;
            $start = (int) max(1, $current - floor($visible / 2));
            $end = (int) min($total, $start + $visible - 1);
            $start = (int) max(1, $end - $visible + 1);
            $showStartEllipsis = $start > 2;
            $showEndEllipsis = $end < $total - 1;
        }

        $navClasses = Ui::classes()
            ->add('flex items-center justify-between gap-3 border-t border-gray-100 pt-3')
            ->add('dark:border-gray-700')
            ->merge($attributes);

        // Shared classes
        $arrowClasses =
            'inline-flex h-8 w-8 items-center justify-center rounded-md text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300';
        $arrowDisabledClasses = 'pointer-events-none opacity-40';
        $pageClasses =
            'inline-flex h-8 min-w-8 cursor-pointer items-center justify-center rounded-md px-2 text-sm font-medium text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300';
    @endphp

    <nav {{ $attributes->except('class') }} class="{{ $navClasses }}" data-pagination>
        @if ($isLengthAware && $paginator->total() > 0)
            <div class="text-xs text-gray-500 dark:text-gray-400">
                Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }}
            </div>
        @else
            <div></div>
        @endif

        <div class="flex items-center gap-0.5">
            {{-- Previous --}}
            @if ($isLivewire)
                <button type="button" wire:click="previousPage('{{ $pageName }}')" @disabled($paginator->onFirstPage())
                    @class([
                        $arrowClasses,
                        'cursor-pointer',
                        'disabled:cursor-not-allowed disabled:opacity-40 disabled:pointer-events-none',
                    ])>
                    <ui:icon name="chevron-left" size="sm" />
                </button>
            @else
                @if ($paginator->onFirstPage())
                    <span @class([$arrowClasses, $arrowDisabledClasses])>
                        <ui:icon name="chevron-left" size="sm" />
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" @class([$arrowClasses, 'cursor-pointer'])>
                        <ui:icon name="chevron-left" size="sm" />
                    </a>
                @endif
            @endif

            @if ($isLengthAware)
                {{-- First page --}}
                @if ($start > 1)
                    @if ($isLivewire)
                        <button type="button" wire:click="gotoPage(1, '{{ $pageName }}')"
                            class="{{ $pageClasses }}">1</button>
                    @else
                        <a href="{{ $paginator->url(1) }}" class="{{ $pageClasses }}">1</a>
                    @endif
                @endif

                @if ($showStartEllipsis)
                    <span
                        class="inline-flex h-8 min-w-8 items-center justify-center text-sm text-gray-300 dark:text-gray-600">...</span>
                @endif

                {{-- Page numbers --}}
                @for ($i = $start; $i <= $end; $i++)
                    @if ($isLivewire)
                        <button type="button" wire:click="gotoPage({{ $i }}, '{{ $pageName }}')"
                            @class([
                                'inline-flex h-8 min-w-8 items-center justify-center rounded-md px-2 text-sm font-medium',
                                'cursor-default text-gray-900 dark:text-white' => $i === $current,
                                'cursor-pointer text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300' =>
                                    $i !== $current,
                            ])>{{ $i }}</button>
                    @else
                        @if ($i === $current)
                            <span
                                class="inline-flex h-8 min-w-8 cursor-default items-center justify-center rounded-md px-2 text-sm font-medium text-gray-900 dark:text-white">{{ $i }}</span>
                        @else
                            <a href="{{ $paginator->url($i) }}" class="{{ $pageClasses }}">{{ $i }}</a>
                        @endif
                    @endif
                @endfor

                @if ($showEndEllipsis)
                    <span
                        class="inline-flex h-8 min-w-8 items-center justify-center text-sm text-gray-300 dark:text-gray-600">...</span>
                @endif

                {{-- Last page --}}
                @if ($end < $total)
                    @if ($isLivewire)
                        <button type="button" wire:click="gotoPage({{ $total }}, '{{ $pageName }}')"
                            class="{{ $pageClasses }}">{{ $total }}</button>
                    @else
                        <a href="{{ $paginator->url($total) }}" class="{{ $pageClasses }}">{{ $total }}</a>
                    @endif
                @endif
            @endif

            {{-- Next --}}
            @if ($isLivewire)
                <button type="button" wire:click="nextPage('{{ $pageName }}')" @disabled(!$paginator->hasMorePages())
                    @class([
                        $arrowClasses,
                        'cursor-pointer',
                        'disabled:cursor-not-allowed disabled:opacity-40 disabled:pointer-events-none',
                    ])>
                    <ui:icon name="chevron-right" size="sm" />
                </button>
            @else
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" @class([$arrowClasses, 'cursor-pointer'])>
                        <ui:icon name="chevron-right" size="sm" />
                    </a>
                @else
                    <span @class([$arrowClasses, $arrowDisabledClasses])>
                        <ui:icon name="chevron-right" size="sm" />
                    </span>
                @endif
            @endif
        </div>
    </nav>
@endif
