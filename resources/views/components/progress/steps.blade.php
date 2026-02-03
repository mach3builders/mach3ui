@props([
    'current' => 1,
    'href' => null,
    'showCount' => true,
    'showPercent' => false,
    'total' => 4,
])

@php
    $safeTotal = max(1, $total);
    $percentage = round(($current / $safeTotal) * 100);

    // Helper to generate step URL
    $stepUrl = fn($step) => $href ? str_replace('{step}', $step, $href) : null;

    $containerClasses = Ui::classes()
        ->add('flex w-full flex-col gap-2')
        ->merge($attributes);

    $textClasses = Ui::classes()
        ->add('flex items-center justify-between text-xs font-medium')
        ->add('text-gray-500 dark:text-gray-400');

    $barClasses = Ui::classes()->add('flex items-center gap-1');

    $stepActiveClasses = Ui::classes()
        ->add('group flex-1 cursor-pointer py-2');

    $stepInactiveClasses = Ui::classes()
        ->add('flex-1 py-2');

    $indicatorActiveClasses = Ui::classes()
        ->add('block h-1.5 w-full rounded-full transition-colors')
        ->add('bg-gray-300 group-hover:bg-gray-400 dark:bg-gray-500 dark:group-hover:bg-gray-400');

    $indicatorInactiveClasses = Ui::classes()
        ->add('block h-1.5 w-full rounded-full')
        ->add('bg-gray-100 dark:bg-gray-700');
@endphp

<div
    {{ $attributes->except('class') }}
    class="{{ $containerClasses }}"
    @unless ($href) x-data @endunless
    data-progress-steps
>
    @if ($showCount || $showPercent)
        <div class="{{ $textClasses }}" data-progress-text>
            @if ($showCount)
                <span data-progress-count>{{ $current }} / {{ $total }}</span>
            @else
                <span></span>
            @endif

            @if ($showPercent)
                <span data-progress-percent>{{ $percentage }}%</span>
            @endif
        </div>
    @endif

    <div class="{{ $barClasses }}" data-progress-bar role="progressbar" aria-valuenow="{{ $current }}" aria-valuemin="1" aria-valuemax="{{ $total }}">
        @for ($i = 1; $i <= $safeTotal; $i++)
            @php
                $isActive = $i <= $current;
                $stepClasses = $isActive ? $stepActiveClasses : $stepInactiveClasses;
                $indicatorClasses = $isActive ? $indicatorActiveClasses : $indicatorInactiveClasses;
            @endphp

            @if ($isActive)
                @if ($href)
                    <a
                        href="{{ $stepUrl($i) }}"
                        class="{{ $stepClasses }}"
                        data-progress-step
                        data-step="{{ $i }}"
                        data-active
                    >
                        <span class="{{ $indicatorClasses }}" data-progress-indicator></span>
                    </a>
                @else
                    <button
                        type="button"
                        x-on:click="$dispatch('step', {{ $i }})"
                        class="{{ $stepClasses }}"
                        data-progress-step
                        data-step="{{ $i }}"
                        data-active
                    >
                        <span class="{{ $indicatorClasses }}" data-progress-indicator></span>
                    </button>
                @endif
            @else
                <span class="{{ $stepInactiveClasses }}" data-progress-step data-step="{{ $i }}">
                    <span class="{{ $indicatorClasses }}" data-progress-indicator></span>
                </span>
            @endif
        @endfor
    </div>
</div>
