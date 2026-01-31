@props([
    'icon' => null,
    'iconColorClass' => null,
    'iconTrailingValue' => null,
    'loading' => false,
    'isAi' => false,
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

@if ($iconTrailingValue && is_string($iconTrailingValue))
    <ui:icon :name="$iconTrailingValue" class="ml-auto {{ $iconColorClass ?? ($isAi ? 'text-gray-500' : null) }}" />
@endif
