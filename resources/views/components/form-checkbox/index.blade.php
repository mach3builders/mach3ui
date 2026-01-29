@props([
    'name' => null,
    'label' => null,
    'description' => null,
    'error' => null,
    'checked' => false,
    'disabled' => false,
    'value' => null,
])

@php
    $id = $attributes->get('id') ?? ($name ? 'checkbox-' . $name : 'checkbox-' . uniqid());

    $hasError = $error || ($name && $errors->has($name));
    $errorMessage = $error ?? ($name ? $errors->first($name) : null);
@endphp

<div {{ $attributes->only('class')->class(['form-field-inline', 'is-invalid' => $hasError]) }}>
    <input
        type="checkbox"
        id="{{ $id }}"
        @if ($name) name="{{ $name }}" @endif
        @if ($value) value="{{ $value }}" @endif
        {{ $attributes->except(['class', 'id'])->class(['form-checkbox']) }}
        @checked($checked)
        @disabled($disabled)
    />

    @if ($label)
        <label for="{{ $id }}">
            <span class="form-label">{{ $label }}</span>

            @if ($description)
                <span class="form-description">{{ $description }}</span>
            @endif
        </label>
    @endif
</div>
