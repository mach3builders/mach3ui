@props([
    'current' => 1,
    'percent' => true,
    'text' => true,
    'total' => 4,
])

@php
    $percentage = round(($current / $total) * 100);

    $classes = [
        'flex w-full flex-col gap-1',
    ];

    $text_classes = [
        'flex items-center justify-between text-xs font-bold',
        'text-gray-400',
        'dark:text-gray-340',
    ];

    $bar_classes = [
        'flex items-center gap-4',
    ];

    $step_classes = [
        'base' => 'flex-1 py-2',
        'indicator' => [
            'block h-1.5 rounded-full',
            'bg-gray-100',
            'dark:bg-gray-700',
        ],
        'active_indicator' => [
            'block h-1.5 rounded-full cursor-pointer',
            'bg-gray-240 hover:bg-gray-300',
            'dark:bg-gray-540 dark:hover:bg-gray-460',
        ],
    ];
@endphp

<div {{ $attributes->class($classes) }} data-progress>
    @if ($text)
        <div class="{{ implode(' ', $text_classes) }}">
            <div>{{ $current }} / {{ $total }}</div>

            @if ($percent)
                <div>{{ $percentage }}%</div>
            @endif
        </div>
    @endif

    <div class="{{ implode(' ', $bar_classes) }}">
        @for ($i = 1; $i <= $total; $i++)
            @php
                $is_active = $i <= $current;
            @endphp

            <button class="{{ $step_classes['base'] }}">
                <span class="{{ implode(' ', $is_active ? $step_classes['active_indicator'] : $step_classes['indicator']) }}"></span>
            </button>
        @endfor
    </div>
</div>
