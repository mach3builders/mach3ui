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
    $inputId = $name ?: 'slider-' . Str::random(8);

    $classes = Ui::classes()->add('space-y-1.5')->merge($attributes->only('class'));

    $trackClasses = Ui::classes()
        ->add('h-1.5 w-full cursor-pointer appearance-none rounded-full')
        ->add('bg-gray-100')
        ->add('dark:bg-gray-680')
        ->add(
            '[&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:border [&::-webkit-slider-thumb]:shadow-sm',
        )
        ->add('[&::-webkit-slider-thumb]:border-gray-800 [&::-webkit-slider-thumb]:bg-gray-800')
        ->add('dark:[&::-webkit-slider-thumb]:border-gray-40 dark:[&::-webkit-slider-thumb]:bg-gray-40')
        ->add(
            '[&::-moz-range-thumb]:h-5 [&::-moz-range-thumb]:w-5 [&::-moz-range-thumb]:appearance-none [&::-moz-range-thumb]:rounded-full [&::-moz-range-thumb]:border [&::-moz-range-thumb]:shadow-sm',
        )
        ->add('[&::-moz-range-thumb]:border-gray-800 [&::-moz-range-thumb]:bg-gray-800')
        ->add('dark:[&::-moz-range-thumb]:border-gray-40 dark:[&::-moz-range-thumb]:bg-gray-40')
        ->add('hover:[&::-webkit-slider-thumb]:bg-gray-700')
        ->add('dark:hover:[&::-webkit-slider-thumb]:bg-gray-80')
        ->add('hover:[&::-moz-range-thumb]:bg-gray-700')
        ->add('dark:hover:[&::-moz-range-thumb]:bg-gray-80')
        ->add('focus:outline-none')
        ->add(
            'focus:[&::-webkit-slider-thumb]:ring-1 focus:[&::-webkit-slider-thumb]:ring-offset-1 focus:[&::-webkit-slider-thumb]:ring-gray-800',
        )
        ->add(
            'dark:focus:[&::-webkit-slider-thumb]:ring-gray-40 dark:focus:[&::-webkit-slider-thumb]:ring-offset-gray-900',
        )
        ->add(
            'focus:[&::-moz-range-thumb]:ring-1 focus:[&::-moz-range-thumb]:ring-offset-1 focus:[&::-moz-range-thumb]:ring-gray-800',
        )
        ->add('dark:focus:[&::-moz-range-thumb]:ring-gray-40 dark:focus:[&::-moz-range-thumb]:ring-offset-gray-900')
        ->add('disabled:cursor-not-allowed disabled:opacity-50');
@endphp

<div class="{{ $classes }}"
    @if ($showValue) x-data="{ value: @js($value), format(val) { return @js($valueFormat) ? @js($valueFormat).replace('{value}', val) : val; } }" @endif
    data-slider>
    @if ($label || $showValue)
        <div class="flex items-center justify-between" data-slider-header>
            @if ($label)
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300"
                    for="{{ $inputId }}">{{ $label }}</label>
            @endif

            @if ($showValue)
                <span class="text-sm text-gray-500 dark:text-gray-400" x-text="format(value)"></span>
            @endif
        </div>
    @endif

    <input class="{{ $trackClasses }}"
        {{ $attributes->except('class')->merge([
            'type' => 'range',
            'id' => $inputId,
            'name' => $name,
            'value' => $value,
            'min' => $min,
            'max' => $max,
            'step' => $step,
            'disabled' => $disabled,
        ]) }}
        @if ($showValue) x-model="value" @endif data-slider-input />

    @if ($showRange)
        <div class="flex justify-between text-xs text-gray-400 dark:text-gray-500">
            <span>{{ $min }}</span>

            <span>{{ $max }}</span>
        </div>
    @endif
</div>
