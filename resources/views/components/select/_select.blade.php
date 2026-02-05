@props([
    'attributes' => null,
    'error' => null,
    'id' => null,
    'isLive' => false,
    'name' => null,
    'placeholder' => null,
    'selectClasses' => '',
    'wireTarget' => null,
])

<select @if ($id) id="{{ $id }}" @endif
    @if ($name) name="{{ $name }}" @endif
    @if ($error) aria-invalid="true" @endif
    @if ($isLive) wire:loading.class="opacity-50" @endif
    @if ($isLive && $wireTarget) wire:target="{{ $wireTarget }}" @endif class="{{ $selectClasses }}"
    {{ $attributes->except(['class', 'name', 'id']) }} data-control>
    @if ($placeholder)
        <option value="" disabled selected class="placeholder">{{ $placeholder }}</option>
    @endif

    {{ $slot }}
</select>
