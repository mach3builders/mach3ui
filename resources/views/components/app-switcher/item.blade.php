@props([
    'color' => null,
    'description' => null,
    'href' => '#',
    'icon' => null,
    'name' => null,
])

@php
    $colorClasses = [
        'blue' => 'text-blue-500 dark:text-blue-400',
        'cyan' => 'text-cyan-500 dark:text-cyan-400',
        'emerald' => 'text-emerald-500 dark:text-emerald-400',
        'lime' => 'text-lime-500 dark:text-lime-400',
        'orange' => 'text-orange-500 dark:text-orange-400',
        'pink' => 'text-pink-500 dark:text-pink-400',
        'purple' => 'text-purple-500 dark:text-purple-400',
        'red' => 'text-red-500 dark:text-red-400',
        'yellow' => 'text-yellow-500 dark:text-yellow-400',
    ];

    $classes = Ui::classes()
        ->add('relative flex cursor-pointer items-center gap-3 rounded-lg px-2 py-2 transition-colors duration-75')
        ->add('hover:bg-gray-50 dark:hover:bg-gray-700')
        ->merge($attributes);

    $logoClasses = Ui::classes()
        ->add('flex size-9 shrink-0 items-center justify-center rounded-lg font-bold tracking-wide uppercase text-base leading-none select-none')
        ->add('bg-gray-100 dark:bg-gray-700')
        ->add($color ? $colorClasses[$color] ?? '' : 'text-gray-400 dark:text-gray-500');

    $iconWrapperClasses = Ui::classes()
        ->add('flex size-9 shrink-0 items-center justify-center rounded-lg text-gray-500 dark:text-gray-400')
        ->add('bg-gray-100 dark:bg-gray-700');
@endphp

<div
    x-data="{ index: null }"
    x-init="index = items.indexOf($el) >= 0 ? items.indexOf($el) : items.length"
    x-on:click="select(index); activate()"
    :class="{ 'bg-gray-50 dark:bg-gray-700': selected === index }"
    class="{{ $classes }}"
    {{ $attributes->except('class') }}
    data-app-switcher-item
    data-href="{{ $href }}"
    role="option"
    tabindex="0"
>
    @if ($icon)
        <div class="{{ $iconWrapperClasses }}">
            <ui:icon :name="$icon" size="sm" />
        </div>
    @elseif ($slot->isEmpty())
        <div class="{{ $logoClasses }}">
            <span class="-skew-x-12">III</span>
        </div>
    @else
        <div class="{{ $iconWrapperClasses }}">
            {{ $slot }}
        </div>
    @endif

    <div class="flex flex-1 flex-col" data-app-switcher-item-content>
        <span class="text-sm font-medium text-gray-900 dark:text-gray-100">
            {{ $slot->isEmpty() && !$icon ? 'Mach3' : '' }}{{ $name }}
        </span>

        @if ($description)
            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $description }}</span>
        @endif
    </div>

    <ui:icon
        name="check"
        size="sm"
        class="ml-auto text-blue-600 transition-opacity dark:text-blue-400"
        x-bind:class="current === index ? 'opacity-100' : 'opacity-0'"
    />
</div>
