@props([
    'field:variant' => null,
    'hint' => null,
    'label' => null,
    'max' => 100,
    'min' => 0,
    'name' => null,
    'showRange' => false,
    'showValue' => false,
    'step' => 1,
    'value' => 50,
])

@aware(['id'])

@php
    // Detect x-model via native foreach (faster than collect()->first())
    $xModel = null;
    foreach ($attributes->getAttributes() as $k => $v) {
        if (str_starts_with($k, 'x-model')) {
            $xModel = $v;
            break;
        }
    }

    // Name auto-detection
    $wireModel = $attributes->wire('model');
    $wireModelValue = $wireModel?->directive ? $wireModel->value() : null;
    $name = $name ?: $wireModelValue ?: $xModel;

    $fieldVariant = $__data['field:variant'] ?? null;
    $id = $id ?? $name;
    $error = $name ? $errors->first($name) ?? null : null;

    // Determine value reference for x-text
    $valueRef = match (true) {
        (bool) $wireModelValue => "\$wire.$wireModelValue",
        (bool) $xModel => $xModel,
        default => 'value',
    };

    // Need Alpine wrapper when showValue without external binding
    $needsAlpine = $showValue && !$wireModelValue && !$xModel;

    // Split attributes: wire/alpine bindings go to input, rest to wrapper
    $inputAttributes = $attributes->whereStartsWith(['wire:', 'x-model']);
    $wrapperAttributes = $attributes->whereDoesntStartWith(['wire:', 'x-model']);

    // Helper to prefix classes with pseudo-element selector
    $prefixClasses = function (string $selector, string $classes): string {
        return implode(
            ' ',
            array_map(function ($class) use ($selector) {
                if (preg_match('/^((?:dark:|hover:|focus:)+)(.+)$/', $class, $matches)) {
                    return $matches[1] . $selector . ':' . $matches[2];
                }
                return $selector . ':' . $class;
            }, explode(' ', $classes)),
        );
    };

    // Thumb styling
    $thumbBase = 'h-5 w-5 appearance-none rounded-full border shadow-sm';
    $thumbColor = 'border-blue-500 bg-blue-500 dark:border-blue-600 dark:bg-blue-600';
    $thumbHover = 'hover:bg-blue-550 dark:hover:bg-blue-550';
    $thumbFocus = 'focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 dark:focus:ring-offset-gray-800';
    $thumbClasses = implode(' ', [$thumbBase, $thumbColor, $thumbHover, $thumbFocus]);

    $webkitThumb = $prefixClasses('[&::-webkit-slider-thumb]', $thumbClasses);
    $mozThumb = $prefixClasses('[&::-moz-range-thumb]', $thumbClasses);

    // Wrapper gets user classes (like max-w-md)
    $wrapperClasses = Ui::classes()->merge($wrapperAttributes);

    // Track styling (no user classes - those go on wrapper)
    $inputClasses = Ui::classes()
        ->add('h-1.5 w-full cursor-pointer appearance-none rounded-full')
        ->add('bg-gray-100 dark:bg-gray-700')
        ->add($webkitThumb)
        ->add($mozThumb)
        ->add('focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50');
@endphp

@if ($needsAlpine)
    <div x-data="{ value: {{ $value }} }">
@endif

@if ($label)
    <ui:field :$id :variant="$fieldVariant ?? 'block'">
        <div data-control class="{{ $wrapperClasses }}">
            <div class="flex items-center justify-between">
                <ui:label>{{ $label }}</ui:label>

                @if ($showValue)
                    <ui:text tag="span" variant="muted" class="tabular-nums" x-text="{{ $valueRef }}"></ui:text>
                @endif
            </div>

            <input type="range" @if ($id) id="{{ $id }}" @endif
                @if ($name) name="{{ $name }}" @endif min="{{ $min }}"
                max="{{ $max }}" step="{{ $step }}" value="{{ $value }}"
                @if ($needsAlpine) x-model="value" @endif
                @if ($error) aria-invalid="true" @endif class="{{ $inputClasses }}"
                {{ $inputAttributes }} />

            @if ($showRange)
                <div class="flex justify-between">
                    <ui:text tag="span" size="xs" variant="muted">{{ $min }}</ui:text>
                    <ui:text tag="span" size="xs" variant="muted">{{ $max }}</ui:text>
                </div>
            @endif
        </div>

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($name)
            <ui:error :$name />
        @endif
    </ui:field>
@else
    <div class="{{ $wrapperClasses }}">
        @if ($showValue)
            <ui:text tag="span" variant="muted" class="mb-1 block tabular-nums" x-text="{{ $valueRef }}">
            </ui:text>
        @endif

        <input type="range" @if ($id) id="{{ $id }}" @endif
            @if ($name) name="{{ $name }}" @endif min="{{ $min }}"
            max="{{ $max }}" step="{{ $step }}" value="{{ $value }}"
            @if ($needsAlpine) x-model="value" @endif
            @if ($error) aria-invalid="true" @endif class="{{ $inputClasses }}"
            {{ $inputAttributes }} />

        @if ($showRange)
            <div class="flex justify-between">
                <ui:text tag="span" size="xs" variant="muted">{{ $min }}</ui:text>
                <ui:text tag="span" size="xs" variant="muted">{{ $max }}</ui:text>
            </div>
        @endif
    </div>
@endif

@if ($needsAlpine)
    </div>
@endif
