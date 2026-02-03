@props([
    'description' => null,
    'label' => null,
])

@php
    $id = uniqid('switch-');

    // Wire:model support
    $wireModel = $attributes->wire('model');
    $hasWireModel = $wireModel && method_exists($wireModel, 'value');
    $name = $attributes->get('name') ?? ($hasWireModel ? $wireModel->value() : null);

    // Determine if we have label content
    $hasLabel = $label || $description;

    // Classes
    $wrapperClasses = Ui::classes()->add('flex items-start gap-3')->merge($attributes->only('class'));

    $trackClasses = Ui::classes()
        ->add('relative inline-flex h-5 w-9 shrink-0 cursor-pointer items-center rounded-full transition-colors')
        ->add('bg-gray-200')
        ->add('dark:bg-gray-620')
        ->add('has-[:checked]:bg-blue-500')
        ->add('dark:has-[:checked]:bg-blue-600')
        ->add('has-[:focus-visible]:ring-2 has-[:focus-visible]:ring-blue-600/20 has-[:focus-visible]:ring-offset-2')
        ->add('dark:has-[:focus-visible]:ring-blue-500/20 dark:has-[:focus-visible]:ring-offset-gray-900')
        ->add('has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50');

    // Merge user classes onto track when no wrapper (track is root element)
    if (!$hasLabel) {
        $trackClasses = $trackClasses->merge($attributes->only('class'));
    }

    $thumbClasses = Ui::classes()
        ->add(
            'pointer-events-none inline-block h-4 w-4 translate-x-0.5 rounded-full shadow-sm transition-transform duration-200',
        )
        ->add('bg-white')
        ->add('peer-checked:translate-x-4');

    $inputClasses = Ui::classes()->add('peer sr-only');

    $labelWrapperClasses = Ui::classes()->add('flex flex-col gap-0.5');

    $labelTextClasses = Ui::classes()->add('text-sm font-medium')->add('text-gray-800')->add('dark:text-gray-100');

    $descriptionClasses = Ui::classes()->add('text-sm')->add('text-gray-500')->add('dark:text-gray-400');

    // Attributes to pass to input
    $inputAttributes = $attributes->except([
        'class',
        'data-*',
        'name',
        'wire:model',
        'wire:model.live',
        'wire:model.blur',
        'wire:model.change',
    ]);
@endphp

@if ($hasLabel)
    <div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-switch data-control>
        <label for="{{ $id }}" class="{{ $trackClasses }}" data-switch-track>
            <input type="checkbox" role="switch" id="{{ $id }}" class="{{ $inputClasses }}"
                @if ($name) name="{{ $name }}" @endif
                @if ($hasWireModel) {{ $wireModel }} @endif {{ $inputAttributes }} data-switch-input />
            <span class="{{ $thumbClasses }}" data-switch-thumb></span>
        </label>

        <label for="{{ $id }}" class="{{ $labelWrapperClasses }}" data-switch-label>
            <span class="{{ $labelTextClasses }}">{{ $label }}</span>

            @if ($description)
                <span class="{{ $descriptionClasses }}" data-switch-description>{{ $description }}</span>
            @endif
        </label>
    </div>
@else
    <label for="{{ $id }}" class="{{ $trackClasses }}" {{ $attributes->only('data-*') }} data-switch
        data-control data-switch-track>
        <input type="checkbox" role="switch" id="{{ $id }}" class="{{ $inputClasses }}"
            @if ($name) name="{{ $name }}" @endif
            @if ($hasWireModel) {{ $wireModel }} @endif {{ $inputAttributes }} data-switch-input />
        <span class="{{ $thumbClasses }}" data-switch-thumb></span>
    </label>
@endif
