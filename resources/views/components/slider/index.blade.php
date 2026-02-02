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
    $id = uniqid('slider-');
    $inputId = $name ?: $id;

    // Wire:model support
    $wireModel = $attributes->wire('model');
    $hasWireModel = $wireModel && method_exists($wireModel, 'value');

    // Determine if we need Alpine for live value display
    $needsAlpine = $showValue && !$hasWireModel;

    // Classes
    $classes = Ui::classes()->add('space-y-1.5')->merge($attributes->only('class'));

    $headerClasses = Ui::classes()->add('flex items-center justify-between');

    $labelClasses = Ui::classes()->add('text-sm font-medium')->add('text-gray-700')->add('dark:text-gray-300');

    $valueClasses = Ui::classes()->add('text-sm')->add('text-gray-500')->add('dark:text-gray-400');

    $rangeClasses = Ui::classes()->add('flex justify-between text-xs')->add('text-gray-400')->add('dark:text-gray-500');

    // Helper to prefix classes with pseudo-element selector
    // Handles variant prefixes (dark:, hover:, focus:) correctly: dark:bg-red -> dark:[&::selector]:bg-red
    $prefixClasses = function (string $selector, string $classes): string {
        return collect(explode(' ', $classes))
            ->map(function ($class) use ($selector) {
                // Match variant prefixes (dark:, hover:, focus:, etc.)
                if (preg_match('/^((?:dark:|hover:|focus:)+)(.+)$/', $class, $matches)) {
                    return $matches[1] . $selector . ':' . $matches[2];
                }

                return $selector . ':' . $class;
            })
            ->implode(' ');
    };

    // Thumb classes (shared between webkit and moz)
    $thumbBase = 'h-5 w-5 appearance-none rounded-full border shadow-sm';
    $thumbColor = 'border-gray-800 bg-gray-800 dark:border-gray-40 dark:bg-gray-40';
    $thumbHover = 'hover:bg-gray-700 dark:hover:bg-gray-80';
    $thumbFocus =
        'focus:ring-1 focus:ring-offset-1 focus:ring-gray-800 dark:focus:ring-gray-40 dark:focus:ring-offset-gray-900';
    $thumbClasses = implode(' ', [$thumbBase, $thumbColor, $thumbHover, $thumbFocus]);

    // Build webkit and moz thumb classes with correct prefix ordering
    $webkitThumb = $prefixClasses('[&::-webkit-slider-thumb]', $thumbClasses);
    $mozThumb = $prefixClasses('[&::-moz-range-thumb]', $thumbClasses);

    $trackClasses = Ui::classes()
        ->add('h-1.5 w-full cursor-pointer appearance-none rounded-full')
        ->add('bg-gray-100')
        ->add('dark:bg-gray-680')
        ->add($webkitThumb)
        ->add($mozThumb)
        ->add('focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50');
@endphp

<div class="{{ $classes }}"
    @if ($needsAlpine) x-data="{
            value: @js($value),
            format(val) {
                return @js($valueFormat) ? @js($valueFormat).replace('{value}', val) : val;
            }
        }" @endif
    {{ $attributes->only('data-*') }} data-slider>
    @if ($label || $showValue)
        <div class="{{ $headerClasses }}" data-slider-header>
            @if ($label)
                <label class="{{ $labelClasses }}" for="{{ $inputId }}">
                    {{ $label }}
                </label>
            @endif

            @if ($showValue)
                @if ($hasWireModel)
                    <span class="{{ $valueClasses }}">
                        {{ $valueFormat ? str_replace('{value}', $value, $valueFormat) : $value }}
                    </span>
                @else
                    <span class="{{ $valueClasses }}" x-text="format(value)"></span>
                @endif
            @endif
        </div>
    @endif

    <input class="{{ $trackClasses }}" type="range" id="{{ $inputId }}" name="{{ $name }}"
        min="{{ $min }}" max="{{ $max }}" step="{{ $step }}" value="{{ $value }}"
        @if ($hasWireModel) {{ $wireModel }} @endif
        @if ($needsAlpine) x-model="value" @endif @disabled($disabled)
        {{ $attributes->except(['class', 'data-*', 'wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.change']) }}
        data-slider-input />

    @if ($showRange)
        <div class="{{ $rangeClasses }}" data-slider-range>
            <span>{{ $min }}</span>
            <span>{{ $max }}</span>
        </div>
    @endif
</div>
