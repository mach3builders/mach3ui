@props([
    'disabled' => false,
    'label' => null,
])

<optgroup
    @if ($label) label="{{ $label }}" @endif
    @if ($disabled) disabled @endif
    {{ $attributes }}
>
    {{ $slot }}
</optgroup>
