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
    $isActive = $active || ($route && Route::is($route)) || ($href && url()->current() === $href);
    $iconSlot = $__laravel_slots['icon'] ?? null;
    $iconEnd = $__data['icon:end'] ?? null;

    $baseClasses = Ui::classes()
        ->add('flex items-center gap-2 rounded-md px-3 py-2 text-[13px] leading-5')
        ->add('[&>svg]:size-4 [&>svg]:shrink-0')
        ->add(
            match (true) {
                $danger
                    => 'text-red-600 hover:bg-red-50 hover:text-red-700 dark:text-red-500 dark:hover:bg-red-950/50 dark:hover:text-red-400 [&>svg]:text-red-500 [&:hover>svg]:text-red-600 dark:[&>svg]:text-red-600 dark:[&:hover>svg]:text-red-500',
                $isActive
                    => 'bg-black/5 text-gray-900 dark:bg-white/5 dark:text-gray-100 [&>svg]:text-gray-500 dark:[&>svg]:text-gray-400',
                default
                    => 'text-gray-600 hover:bg-black/5 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-100 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-500 [&:hover>svg]:text-gray-500 dark:[&:hover>svg]:text-gray-400',
            },
        );

    $linkClasses = Ui::classes($baseClasses)->merge($attributes->only('class'));
    $buttonClasses = Ui::classes($baseClasses)->add('w-full text-left')->merge($attributes->only('class'));
@endphp

@if ($url)
    <a class="{{ $linkClasses }}" {{ $attributes->except('class') }} href="{{ $url }}" data-nav-item>
        @if ($iconSlot)
            {{ $iconSlot }}
        @elseif ($icon)
            <ui:icon :name="$icon" />
        @endif

        <span class="flex-1">{{ $label ?? $slot }}</span>

        @if ($iconEnd)
            <ui:icon :name="$iconEnd" />
        @endif
    </a>
@else
    <button class="{{ $buttonClasses }}" {{ $attributes->except('class') }} type="{{ $type }}" data-nav-item>
        @if ($iconSlot)
            {{ $iconSlot }}
        @elseif ($icon)
            <ui:icon :name="$icon" />
        @endif

        <span class="flex-1">{{ $label ?? $slot }}</span>

        @if ($iconEnd)
            <ui:icon :name="$iconEnd" />
        @endif
    </button>
@endif
