@props([
    'icon' => null,
    'iconColorClass' => null,
    'iconEndValue' => null,
    'isAi' => false,
    'loading' => false,
])

@php
    $hasIcon = $icon && is_string($icon);
    $hasText = $slot->isNotEmpty();
    $hasEndIcon = $iconEndValue && is_string($iconEndValue);
    $textOnly = !$hasIcon && $hasText;
    $defaultIconColor = $iconColorClass ?? ($isAi ? 'text-gray-500' : null);
@endphp

{{-- Leading icon: swaps to spinner when loading --}}
@if ($hasIcon)
    <ui:icon :name="$icon" class="group-[[data-loading]]:hidden {{ $defaultIconColor }}" />
    <ui:icon name="loader-circle"
        class="hidden animate-spin group-[[data-loading]]:inline-block {{ $defaultIconColor }}" />
@endif

{{-- Text content --}}
@if ($hasText)
    @if ($textOnly)
        {{-- Text-only button: spinner replaces text visually, text stays invisible for width --}}
        <span class="relative inline-flex items-center justify-center">
            <span class="group-[[data-loading]]:invisible">{{ $slot }}</span>
            <ui:icon name="loader-circle"
                class="absolute hidden animate-spin group-[[data-loading]]:inline-block {{ $defaultIconColor }}" />
        </span>
    @else
        {{-- Has icon: text stays visible during loading --}}
        <span>{{ $slot }}</span>
    @endif
@endif

{{-- End icon: hides when loading --}}
@if ($hasEndIcon)
    <ui:icon :name="$iconEndValue" class="ml-auto group-[[data-loading]]:hidden {{ $defaultIconColor }}" />
@endif
