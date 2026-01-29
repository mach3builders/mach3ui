@props([
    'value' => null,
    'selected' => false,
    'disabled' => false,
])

<option
    {{ $attributes }}
    @if ($value !== null) value="{{ $value }}" @endif
    @if ($selected) selected @endif
    @disabled($disabled)
>{{ $slot }}</option>
