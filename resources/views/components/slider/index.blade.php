@props([
    'disabled' => false,
    'label' => null,
    'max' => 100,
    'min' => 0,
    'name' => null,
    'showRange' => false,
    'showValue' => false,
    'step' => 1,
    'value' => 50,
    'valueFormat' => null,
])

@php
    $input_id = $name ?: 'slider-' . Str::random(8);

    $track_classes = [
        'h-1.5 w-full cursor-pointer appearance-none rounded-full',
        'bg-gray-100',
        'dark:bg-gray-680',
        '[&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:border [&::-webkit-slider-thumb]:shadow-sm',
        '[&::-webkit-slider-thumb]:border-gray-800 [&::-webkit-slider-thumb]:bg-gray-800',
        'dark:[&::-webkit-slider-thumb]:border-gray-40 dark:[&::-webkit-slider-thumb]:bg-gray-40',
        '[&::-moz-range-thumb]:h-5 [&::-moz-range-thumb]:w-5 [&::-moz-range-thumb]:appearance-none [&::-moz-range-thumb]:rounded-full [&::-moz-range-thumb]:border [&::-moz-range-thumb]:shadow-sm',
        '[&::-moz-range-thumb]:border-gray-800 [&::-moz-range-thumb]:bg-gray-800',
        'dark:[&::-moz-range-thumb]:border-gray-40 dark:[&::-moz-range-thumb]:bg-gray-40',
        'hover:[&::-webkit-slider-thumb]:bg-gray-700',
        'dark:hover:[&::-webkit-slider-thumb]:bg-gray-80',
        'hover:[&::-moz-range-thumb]:bg-gray-700',
        'dark:hover:[&::-moz-range-thumb]:bg-gray-80',
        'focus:outline-none',
        'focus:[&::-webkit-slider-thumb]:ring-1 focus:[&::-webkit-slider-thumb]:ring-offset-1 focus:[&::-webkit-slider-thumb]:ring-gray-800',
        'dark:focus:[&::-webkit-slider-thumb]:ring-gray-40 dark:focus:[&::-webkit-slider-thumb]:ring-offset-gray-900',
        'focus:[&::-moz-range-thumb]:ring-1 focus:[&::-moz-range-thumb]:ring-offset-1 focus:[&::-moz-range-thumb]:ring-gray-800',
        'dark:focus:[&::-moz-range-thumb]:ring-gray-40 dark:focus:[&::-moz-range-thumb]:ring-offset-gray-900',
        'disabled:cursor-not-allowed disabled:opacity-50',
    ];
@endphp

<div
    {{ $attributes->only('class')->class(['space-y-1.5']) }}
    @if ($showValue)
        x-data="{ value: @js($value), format(val) { return @js($valueFormat) ? @js($valueFormat).replace('{value}', val) : val; } }"
    @endif
    data-slider
>
    @if ($label || $showValue)
        <div class="flex items-center justify-between">
            @if ($label)
                <label
                    class="text-sm font-medium text-gray-700 dark:text-gray-300"
                    for="{{ $input_id }}"
                >{{ $label }}</label>
            @endif

            @if ($showValue)
                <span
                    class="text-sm text-gray-500 dark:text-gray-400"
                    x-text="format(value)"
                ></span>
            @endif
        </div>
    @endif

    <input
        {{ $attributes->except('class')->merge([
            'type' => 'range',
            'id' => $input_id,
            'name' => $name,
            'value' => $value,
            'min' => $min,
            'max' => $max,
            'step' => $step,
            'disabled' => $disabled,
        ]) }}
        @class($track_classes)
        @if ($showValue) x-model="value" @endif
    />

    @if ($showRange)
        <div class="flex justify-between text-xs text-gray-400 dark:text-gray-500">
            <span>{{ $min }}</span>

            <span>{{ $max }}</span>
        </div>
    @endif
</div>
