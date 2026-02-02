@props([
    'current' => 1,
    'href' => null,
    'percent' => true,
    'text' => true,
    'total' => 4,
])

@php
    $safeTotal = max(1, $total);
    $percentage = round(($current / $safeTotal) * 100);

    // Helper to generate step URL
    $stepUrl = fn($step) => $href ? str_replace('{step}', $step, $href) : null;
    $tag = $href ? 'a' : 'button';

    // Container
    $classes = Ui::classes()->add('flex w-full flex-col')->merge($attributes->only('class'));

    // Text section
    $textClasses = Ui::classes()
        ->add('flex items-center justify-between text-xs font-bold')
        ->add('text-gray-400')
        ->add('dark:text-gray-340');

    // Bar section
    $barClasses = Ui::classes()->add('flex items-center gap-4');

    // Step (active = clickable, inactive = static)
    $stepBaseClasses = 'group flex-1 py-3';

    $stepActiveClasses = Ui::classes()->add($stepBaseClasses)->add('cursor-pointer');

    $stepInactiveClasses = Ui::classes()->add($stepBaseClasses);

    // Indicator (shared base)
    $indicatorBaseClasses = 'block h-1.5 rounded-full transition-colors';

    $indicatorActiveClasses = Ui::classes()
        ->add($indicatorBaseClasses)
        ->add('bg-gray-240 group-hover:bg-gray-300')
        ->add('dark:bg-gray-540 dark:group-hover:bg-gray-460');

    $indicatorInactiveClasses = Ui::classes()->add($indicatorBaseClasses)->add('bg-gray-100')->add('dark:bg-gray-700');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }}
    @unless ($href) x-data @endunless data-progress>
    {{-- Progress text --}}
    @if ($text)
        <div class="{{ $textClasses }}" data-progress-text>
            <div data-progress-count>{{ $current }} / {{ $total }}</div>

            @if ($percent)
                <div data-progress-percent>{{ $percentage }}%</div>
            @endif
        </div>
    @endif

    {{-- Progress bar --}}
    <div class="{{ $barClasses }}" data-progress-bar>
        @for ($i = 1; $i <= $safeTotal; $i++)
            @php
                $isActive = $i <= $current;
                $stepClasses = $isActive ? $stepActiveClasses : $stepInactiveClasses;
                $indicatorClasses = $isActive ? $indicatorActiveClasses : $indicatorInactiveClasses;
            @endphp

            @if ($isActive)
                <{{ $tag }} @if ($href) href="{{ $stepUrl($i) }}" @endif
                    @if (!$href) type="button" x-on:click="$dispatch('step', {{ $i }})" @endif
                    class="{{ $stepClasses }}" data-progress-step data-step="{{ $i }}" data-active>
                    <span class="{{ $indicatorClasses }}" data-progress-indicator></span>
                    </{{ $tag }}>
                @else
                    <span class="{{ $stepClasses }}" data-progress-step data-step="{{ $i }}">
                        <span class="{{ $indicatorClasses }}" data-progress-indicator></span>
                    </span>
            @endif
        @endfor
    </div>
</div>
