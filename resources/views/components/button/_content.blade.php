@props([
    'icon' => null,
    'iconColorClass' => null,
    'iconEndValue' => null,
    'isAi' => false,
    'loading' => false,
])

@if ($loading)
    <ui:icon name="loader-circle" class="animate-spin {{ $iconColorClass ?? ($isAi ? 'text-gray-500' : null) }}" />
@endif

@if ($icon && is_string($icon))
    <ui:icon :name="$icon" :class="$iconColorClass ?? ($isAi ? 'text-gray-500' : null)" />
@endif

@if ($slot->isNotEmpty())
    <span>{{ $slot }}</span>
@endif

@if ($iconEndValue && is_string($iconEndValue))
    <ui:icon :name="$iconEndValue" class="ml-auto {{ $iconColorClass ?? ($isAi ? 'text-gray-500' : null) }}" />
@endif
