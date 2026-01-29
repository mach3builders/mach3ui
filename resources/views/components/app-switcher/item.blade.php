@props([
    'name' => 'Builders',
    'description' => null,
    'color' => null,
    'href' => '#',
    'current' => false,
])

@php
    $color_classes = [
        'blue' => 'text-blue-500 dark:text-blue-400',
        'orange' => 'text-orange-500 dark:text-orange-400',
        'emerald' => 'text-emerald-500 dark:text-emerald-400',
        'lime' => 'text-lime-500 dark:text-lime-400',
        'cyan' => 'text-cyan-500 dark:text-cyan-400',
        'red' => 'text-red-500 dark:text-red-400',
        'purple' => 'text-purple-500 dark:text-purple-400',
        'pink' => 'text-pink-500 dark:text-pink-400',
        'yellow' => 'text-yellow-500 dark:text-yellow-400',
    ];
    $logo_color = $color ? $color_classes[$color] ?? '' : '';
@endphp

<div data-app-switcher-item data-name="Mach3{{ $name }}" data-href="{{ $href }}" role="option"
    tabindex="0" @click="select($el.dataset.index); activate()" x-init="$el.dataset.index = items.indexOf($el) >= 0 ? items.indexOf($el) : items.length"
    :class="{
        'bg-gray-40 dark:bg-gray-750': selected === items.indexOf($el)
    }"
    {{ $attributes->class([
        'relative flex cursor-pointer items-center gap-3 rounded-lg px-2 py-2 transition-colors duration-75',
        'hover:bg-gray-40 dark:hover:bg-gray-750',
    ]) }}>
    <div
        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg font-brand font-bold tracking-wide uppercase text-base leading-none select-none bg-gray-80 dark:bg-gray-830 {{ $logo_color ?: 'text-gray-400 dark:text-gray-500' }}">
        <span class="-skew-x-12">III</span>
    </div>

    <div class="flex flex-1 flex-col">
        <span class="text-sm font-medium text-gray-900 dark:text-gray-100">Mach3{{ $name }}</span>

        @if ($description)
            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $description }}</span>
        @endif
    </div>

    <ui:icon name="check" size="sm" class="ml-auto text-blue-600 dark:text-blue-400"
        x-bind:class="current === items.indexOf($el.closest('[data-app-switcher-item]')) ? 'opacity-100' : 'opacity-0'" />
</div>
