@props([
    'checked' => false,
    'description' => null,
    'disabled' => false,
    'label' => null,
    'name' => null,
])

@php
    $id = $attributes->get('id') ?? ($name ? 'switch-' . $name : 'switch-' . uniqid());

    $trackClasses = Ui::classes()
        ->add('relative inline-flex h-5 w-9 shrink-0 cursor-pointer items-center rounded-full transition-colors')
        ->add('bg-gray-200')
        ->add('dark:bg-gray-620')
        ->add('has-[:checked]:bg-blue-500')
        ->add('dark:has-[:checked]:bg-blue-600')
        ->add('has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50');

    $trackClassesMerged = Ui::classes($trackClasses)->merge($attributes->only('class'));

    $thumbClasses = Ui::classes()
        ->add(
            'pointer-events-none inline-block h-4 w-4 translate-x-0.5 rounded-full shadow-sm transition-transform duration-200',
        )
        ->add('bg-white')
        ->add('peer-checked:translate-x-4');

    $wrapperClasses = Ui::classes()->add('flex items-start gap-3')->merge($attributes->only('class'));
    $inputClasses = Ui::classes()->add('peer sr-only');

    $labelTextClasses = Ui::classes()->add('text-sm font-medium text-gray-800')->add('dark:text-gray-100');
    $descriptionClasses = Ui::classes()->add('text-sm text-gray-500')->add('dark:text-gray-400');
@endphp

@if ($label || $description)
    <div class="{{ $wrapperClasses }}" {{ $attributes->except('class') }} data-switch>
        <label for="{{ $id }}" class="{{ $trackClasses }}">
            <input type="checkbox" role="switch" id="{{ $id }}"
                @if ($name) name="{{ $name }}" @endif class="{{ $inputClasses }}"
                @checked($checked) @disabled($disabled) />

            <span class="{{ $thumbClasses }}"></span>
        </label>

        <label for="{{ $id }}" class="flex flex-col gap-0.5">
            <span class="{{ $labelTextClasses }}">{{ $label }}</span>

            @if ($description)
                <span class="{{ $descriptionClasses }}">{{ $description }}</span>
            @endif
        </label>
    </div>
@else
    <label for="{{ $id }}" class="{{ $trackClassesMerged }}" {{ $attributes->except('class') }}
        data-switch>
        <input type="checkbox" role="switch" id="{{ $id }}"
            @if ($name) name="{{ $name }}" @endif class="{{ $inputClasses }}"
            @checked($checked) @disabled($disabled) />

        <span class="{{ $thumbClasses }}"></span>
    </label>
@endif
