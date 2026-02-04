@props([
    'attributes' => null,
    'error' => null,
    'id' => null,
    'name' => null,
    'placeholder' => null,
    'selectClasses' => '',
])

<select
    @if ($id) id="{{ $id }}" @endif
    @if ($name) name="{{ $name }}" @endif
    @if ($error) aria-invalid="true" @endif
    class="{{ $selectClasses }}"
    {{ $attributes->except(['class', 'name', 'id']) }}
    data-control
>
    @if ($placeholder)
        <option value="" disabled selected class="placeholder">{{ $placeholder }}</option>
    @endif

    {{ $slot }}
</select>
