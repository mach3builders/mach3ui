@blaze

@props([
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
    // Name auto-detection (skill pattern)
    $name =
        $name ?:
        (method_exists($attributes, 'wire')
            ? $attributes->wire('model')->value()
            : null) ?:
        collect($attributes->getAttributes())->first(fn($v, $k) => str_starts_with($k, 'x-model'));

    $id = $id ?? $name;
    $error = $name ? $errors->first($name) ?? null : null;

    // Detect binding type for showValue
    $wireModel = method_exists($attributes, 'wire') ? $attributes->wire('model')->value() : null;
    $xModel = collect($attributes->getAttributes())->first(fn($v, $k) => str_starts_with($k, 'x-model'));

    // Determine value reference for x-text
    $valueRef = match (true) {
        (bool) $wireModel => "\$wire.$wireModel",
        (bool) $xModel => $xModel,
        default => 'value',
    };

    // Need Alpine wrapper when showValue without external binding
    $needsAlpine = $showValue && !$wireModel && !$xModel;

    // Split attributes: wire/alpine bindings go to input, rest to wrapper
    $inputAttributes = $attributes->whereStartsWith(['wire:', 'x-model']);
    $wrapperAttributes = $attributes->whereDoesntStartWith(['wire:', 'x-model']);

    // Helper to prefix classes with pseudo-element selector
    $prefixClasses = function (string $selector, string $classes): string {
        return collect(explode(' ', $classes))
            ->map(function ($class) use ($selector) {
                if (preg_match('/^((?:dark:|hover:|focus:)+)(.+)$/', $class, $matches)) {
                    return $matches[1] . $selector . ':' . $matches[2];
                }
                return $selector . ':' . $class;
            })
            ->implode(' ');
    };

    // Thumb styling
    $thumbBase = 'h-5 w-5 appearance-none rounded-full border shadow-sm';
    $thumbColor = 'border-primary bg-primary';
    $thumbHover = 'hover:bg-primary-hover';
    $thumbFocus = 'focus:ring-2 focus:ring-offset-2 focus:ring-primary';
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
    <ui:field :$id>
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
