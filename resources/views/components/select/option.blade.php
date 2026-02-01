@props([
    'disabled' => false,
    'selected' => false,
    'value' => null,
])

<option {{ $attributes }} @if ($value !== null) value="{{ $value }}" @endif
    @if ($selected) selected @endif @disabled($disabled)>{{ $slot }}</option>
