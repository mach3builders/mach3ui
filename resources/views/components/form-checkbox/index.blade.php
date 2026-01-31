@props([
    'checked' => false,
    'description' => null,
    'disabled' => false,
    'error' => null,
    'label' => null,
    'name' => null,
    'value' => null,
])

@php
    $id = $attributes->get('id') ?? ($name ? 'checkbox-' . $name : 'checkbox-' . uniqid());

    $hasError = $error || ($name && $errors->has($name));

    $wrapperClasses = Ui::classes()
        ->add('form-field-inline')
        ->when($hasError, 'is-invalid')
        ->merge($attributes->only('class'));

    $checkboxClasses = Ui::classes()->add('form-checkbox');
    $labelTextClasses = Ui::classes()->add('form-label');
    $descriptionClasses = Ui::classes()->add('form-description');
@endphp

<div class="{{ $wrapperClasses }}" {{ $attributes->except(['class', 'id']) }} data-form-checkbox>
    <input type="checkbox" id="{{ $id }}" @if ($name) name="{{ $name }}" @endif
        @if ($value) value="{{ $value }}" @endif class="{{ $checkboxClasses }}"
        @checked($checked) @disabled($disabled) />

    @if ($label)
        <label for="{{ $id }}">
            <span class="{{ $labelTextClasses }}">{{ $label }}</span>

            @if ($description)
                <span class="{{ $descriptionClasses }}">{{ $description }}</span>
            @endif
        </label>
    @endif
</div>
