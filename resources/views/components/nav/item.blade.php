@props([
    'active' => false,
    'disabled' => false,
    'href' => null,
    'icon' => null,
    'icon:end' => null,
    'variant' => 'default',
])

@php
    $iconEnd = $__data['icon:end'] ?? null;
    $tag = $href ? 'a' : 'button';

    $classes = Ui::classes()
        ->add('flex items-center gap-2 rounded-md px-3 py-2 text-[13px] leading-5')
        ->add('[&>svg]:size-4 [&>svg]:shrink-0')
        ->add($variant, [
            'default' => $active
                ? 'bg-black/5 text-gray-900 dark:bg-white/5 dark:text-gray-100 [&>svg]:text-gray-500 dark:[&>svg]:text-gray-400'
                : 'text-gray-600 hover:bg-black/5 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-100 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-500 [&:hover>svg]:text-gray-500 dark:[&:hover>svg]:text-gray-400',
            'danger' => 'text-danger hover:bg-danger/10 dark:text-danger dark:hover:bg-danger/10',
        ])
        ->when($tag === 'button', 'w-full text-left')
        ->when($disabled, 'pointer-events-none opacity-50')
        ->merge($attributes);
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    @if($disabled) @if($tag === 'button') disabled @else aria-disabled="true" tabindex="-1" @endif @endif
    data-nav-item
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
>
    @if($icon)
        <ui:icon :name="$icon" />
    @endif

    <span class="flex-1">{{ $slot }}</span>

    @if($iconEnd)
        <ui:icon :name="$iconEnd" />
    @endif
</{{ $tag }}>
