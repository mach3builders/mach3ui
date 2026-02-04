@props([
    'hint' => null,
    'label' => null,
    'max' => 100,
    'min' => 0,
    'name' => null,
    'step' => 1,
])

@aware(['id'])

@php
    // Name auto-detection (skill pattern)
    $name = $name
        ?: (method_exists($attributes, 'wire') ? $attributes->wire('model')->value() : null)
        ?: collect($attributes->getAttributes())->first(fn($v, $k) => str_starts_with($k, 'x-model'));

    $id = $id ?? $name;
    $error = $name ? ($errors->first($name) ?? null) : null;

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

    // Track styling
    $inputClasses = Ui::classes()
        ->add('h-1.5 w-full cursor-pointer appearance-none rounded-full')
        ->add('bg-gray-200 dark:bg-gray-700')
        ->add($webkitThumb)
        ->add($mozThumb)
        ->add('focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->merge($attributes);
@endphp

@if ($label)
    <ui:field :$id>
        <ui:label>{{ $label }}</ui:label>

        <input
            type="range"
            @if ($id) id="{{ $id }}" @endif
            @if ($name) name="{{ $name }}" @endif
            min="{{ $min }}"
            max="{{ $max }}"
            step="{{ $step }}"
            @if ($error) aria-invalid="true" @endif
            {{ $attributes->except('class') }}
            class="{{ $inputClasses }}"
        />

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($name)
            <ui:error :$name />
        @endif
    </ui:field>
@else
    <input
        type="range"
        @if ($id) id="{{ $id }}" @endif
        @if ($name) name="{{ $name }}" @endif
        min="{{ $min }}"
        max="{{ $max }}"
        step="{{ $step }}"
        @if ($error) aria-invalid="true" @endif
        {{ $attributes->except('class') }}
        class="{{ $inputClasses }}"
    />
@endif
