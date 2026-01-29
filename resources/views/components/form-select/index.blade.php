@props([
    'name' => null,
    'label' => null,
    'help' => null,
    'error' => null,
    'size' => null,
    'disabled' => false,
    'placeholder' => null,
])

@php
    $id = $attributes->get('id') ?? ($name ? 'select-' . $name : 'select-' . uniqid());

    $sizeClass = match($size) {
        'sm' => 'form-input-sm',
        'lg' => 'form-input-lg',
        default => '',
    };

    $hasError = $error || ($name && $errors->has($name));
    $errorMessage = $error ?? ($name ? $errors->first($name) : null);
@endphp

<div {{ $attributes->only('class')->class(['form-field', 'is-invalid' => $hasError]) }}>
    @if ($label)
        <label class="form-label" for="{{ $id }}">{{ $label }}</label>
    @endif

    <select
        id="{{ $id }}"
        @if ($name) name="{{ $name }}" @endif
        {{ $attributes->except(['class', 'id'])->class(['form-input', $sizeClass]) }}
        @disabled($disabled)
    >
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        {{ $slot }}
    </select>

    @if ($hasError && $errorMessage)
        <p class="form-input-help">{{ $errorMessage }}</p>
    @elseif ($help)
        <p class="form-input-help">{{ $help }}</p>
    @endif
</div>
