@props([
    'active' => false,
    'danger' => false,
    'href' => null,
    'icon' => null,
    'icon:end' => null,
    'label' => null,
    'route' => null,
    'type' => 'button',
])

@php
    $url = $route ? route($route) : $href;
    $is_active = $active || ($route && Route::is($route)) || ($href && url()->current() === $href);
    $icon_slot = $__laravel_slots['icon'] ?? null;
    $icon_trailing = $__data['icon:end'] ?? null;

    $base = 'flex items-center gap-2 rounded-md px-3 py-2 text-[13px] leading-5 [&>svg]:size-4 [&>svg]:shrink-0';
    $inactive = 'text-gray-600 hover:bg-black/5 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-100 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-500 [&:hover>svg]:text-gray-500 dark:[&:hover>svg]:text-gray-400';
    $active_classes = 'bg-black/5 text-gray-900 dark:bg-white/5 dark:text-gray-100 [&>svg]:text-gray-500 dark:[&>svg]:text-gray-400';
    $danger_classes = 'text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-400 [&>svg]:text-red-500 [&:hover>svg]:text-red-600 dark:[&>svg]:text-red-600 dark:[&:hover>svg]:text-red-500';

    if ($danger) {
        $classes = $base . ' ' . $danger_classes;
    } else {
        $classes = $base . ' ' . ($is_active ? $active_classes : $inactive);
    }
@endphp

@if ($url)
    <a {{ $attributes->class($classes) }} href="{{ $url }}" data-nav-item>
        @if ($icon_slot)
            {{ $icon_slot }}
        @elseif ($icon)
            <ui:icon :name="$icon" />
        @endif

        <span class="flex-1">{{ $label ?? $slot }}</span>

        @if ($icon_trailing)
            <ui:icon :name="$icon_trailing" />
        @endif
    </a>
@else
    <button {{ $attributes->class(['w-full text-left', $classes]) }} type="{{ $type }}" data-nav-item>
        @if ($icon_slot)
            {{ $icon_slot }}
        @elseif ($icon)
            <ui:icon :name="$icon" />
        @endif

        <span class="flex-1">{{ $label ?? $slot }}</span>

        @if ($icon_trailing)
            <ui:icon :name="$icon_trailing" />
        @endif
    </button>
@endif
