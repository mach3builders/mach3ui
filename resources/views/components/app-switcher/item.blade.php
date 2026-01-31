@props([
    'name' => null,
    'description' => null,
    'href' => '#',
    'icon' => null,
])

@php
    $classes = Ui::classes()
        ->add('relative flex cursor-pointer items-center gap-3 rounded-lg px-2 py-2 transition-colors duration-75')
        ->add('hover:bg-gray-40 dark:hover:bg-gray-750')
        ->merge($attributes->only('class'));

    $iconClasses = Ui::classes()
        ->add('flex size-9 shrink-0 items-center justify-center rounded-lg')
        ->add('bg-gray-80 dark:bg-gray-830');

    $nameClasses = Ui::classes()->add('text-sm font-medium text-gray-900 dark:text-gray-100');
    $descriptionClasses = Ui::classes()->add('text-xs text-gray-500 dark:text-gray-400');
    $checkClasses = Ui::classes()->add('ml-auto text-blue-600 dark:text-blue-400');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }}
    :class="{ 'bg-gray-40 dark:bg-gray-750': selected === items.indexOf($el) }" x-init="$el.dataset.index = items.indexOf($el) >= 0 ? items.indexOf($el) : items.length"
    x-on:click="select($el.dataset.index); activate()" data-app-switcher-item data-href="{{ $href }}"
    role="option" tabindex="0">
    <div class="{{ $iconClasses }}">
        @if ($icon)
            <ui:icon :name="$icon" size="sm" />
        @else
            {{ $slot }}
        @endif
    </div>

    <div class="flex flex-1 flex-col">
        <span class="{{ $nameClasses }}">{{ $name }}</span>

        @if ($description)
            <span class="{{ $descriptionClasses }}">{{ $description }}</span>
        @endif
    </div>

    <ui:icon name="check" size="sm" :class="$checkClasses"
        x-bind:class="current === items.indexOf($el.closest('[data-app-switcher-item]')) ? 'opacity-100' : 'opacity-0'" />
</div>
