@props([
    'disabled' => false,
    'selected' => false,
    'value' => '',
])

<option
    value="{{ $value }}"
    @if ($disabled) disabled @endif
    @if ($selected) selected @endif
    {{ $attributes }}
>{{ $slot }}</option>
