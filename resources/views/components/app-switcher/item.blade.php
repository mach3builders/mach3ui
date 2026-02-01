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
        ->add('hover:bg-gray-40 dark:hover:bg-gray-750')
        ->merge($attributes->only('class'));

    $logoClasses = Ui::classes()
        ->add('flex size-9 shrink-0 items-center justify-center rounded-lg font-brand font-bold tracking-wide uppercase text-base leading-none select-none')
        ->add('bg-gray-80 dark:bg-gray-830')
        ->add($color ? ($colorClasses[$color] ?? '') : 'text-gray-400 dark:text-gray-500');

    $iconClasses = Ui::classes()
        ->add('flex size-9 shrink-0 items-center justify-center rounded-lg')
        ->add('bg-gray-80 dark:bg-gray-830');

    $nameClasses = Ui::classes()->add('text-sm font-medium text-gray-900 dark:text-gray-100');
    $descriptionClasses = Ui::classes()->add('text-xs text-gray-500 dark:text-gray-400');
    $checkClasses = Ui::classes()->add('ml-auto text-blue-600 dark:text-blue-400');

    $displayName = (!$icon && $slot->isEmpty() ? 'Mach3' : '') . $name;
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }}
    :class="{ 'bg-gray-40 dark:bg-gray-750': selected === items.indexOf($el) }" x-init="$el.dataset.index = items.indexOf($el) >= 0 ? items.indexOf($el) : items.length"
    x-on:click="select($el.dataset.index); activate()" data-app-switcher-item data-href="{{ $href }}"
    role="option" tabindex="0">
    @if ($icon)
        <div class="{{ $iconClasses }}">
            <ui:icon :name="$icon" size="sm" />
        </div>
    @elseif ($slot->isEmpty())
        <div class="{{ $logoClasses }}">
            <span class="-skew-x-12">III</span>
        </div>
    @else
        <div class="{{ $iconClasses }}">
            {{ $slot }}
        </div>
    @endif

    <div class="flex flex-1 flex-col">
        <span class="{{ $nameClasses }}">{{ $displayName }}</span>

        @if ($description)
            <span class="{{ $descriptionClasses }}">{{ $description }}</span>
        @endif
    </div>

    <ui:icon name="check" size="sm" :class="$checkClasses"
        x-bind:class="current === items.indexOf($el.closest('[data-app-switcher-item]')) ? 'opacity-100' : 'opacity-0'" />
</div>
