@props([
    'active' => false,
    'disabled' => false,
    'href' => null,
    'icon' => null,
    'icon:end' => null,
    'label' => null,
    'route' => null,
    'type' => 'button',
    'variant' => 'default',
])

@php
    $url = $route ? route($route) : $href;
    $iconEnd = $__data['icon:end'] ?? null;
    $tag = $url ? 'a' : 'button';

    $classes = Ui::classes()
        ->add('flex items-center gap-2 rounded-md px-3 py-2 text-[13px] leading-5')
        ->add('[&>svg]:size-4 [&>svg]:shrink-0')
        ->add($variant, [
            'default' => $active
                ? 'bg-black/5 text-gray-900 dark:bg-white/5 dark:text-gray-100 [&>svg]:text-gray-500 dark:[&>svg]:text-gray-400'
                : 'text-gray-600 hover:bg-black/5 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-100 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-500 [&:hover>svg]:text-gray-500 dark:[&:hover>svg]:text-gray-400',
            'danger' => 'text-red-600 hover:bg-red-50 hover:text-red-700 dark:text-red-500 dark:hover:bg-red-950/50 dark:hover:text-red-400 [&>svg]:text-red-500 [&:hover>svg]:text-red-600 dark:[&>svg]:text-red-600 dark:[&:hover>svg]:text-red-500',
        ])
        ->when($tag === 'button', 'w-full text-left')
        ->when($disabled, 'pointer-events-none opacity-50')
        ->merge($attributes);
@endphp

<{{ $tag }}
    @if($url) href="{{ $url }}" @endif
    @if($tag === 'button') type="{{ $type }}" @endif
    @if($tag === 'button' && $disabled) disabled @endif
    @if($tag === 'a' && $disabled) aria-disabled="true" tabindex="-1" @endif
    x-on:click="$el.closest('[popover]').hidePopover()"
    role="menuitem"
    data-dropdown-item
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
>
    @if($icon)
        <ui:icon :name="$icon" />
    @endif

    <span class="flex-1">{{ $label ?? $slot }}</span>

    @if($iconEnd)
        <ui:icon :name="$iconEnd" />
    @endif
</{{ $tag }}>
