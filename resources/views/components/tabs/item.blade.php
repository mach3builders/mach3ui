@props([
    'disabled' => false,
    'href' => null,
    'icon' => null,
    'name' => null,
    'value',
])

@php
    $tabId = "tab-{$value}";
    $panelId = "tabpanel-{$value}";

    $classes = Ui::classes()
        // Base
        ->add('relative z-10 -mb-px inline-flex cursor-pointer items-center justify-center font-medium')
        ->add('[&>svg]:shrink-0 [&>svg]:size-4')
        // Pseudo elements for hover bg and indicator
        ->add("before:absolute before:inset-x-2 before:rounded-md before:content-['']")
        ->add("after:absolute after:content-['']")
        // Size sm
        ->add('[[data-size=sm]_&]:h-8 [[data-size=sm]_&]:gap-1.5 [[data-size=sm]_&]:px-3 [[data-size=sm]_&]:text-xs')
        ->add('[[data-size=sm]_&]:before:h-5')
        // Size md
        ->add('[[data-size=md]_&]:h-10 [[data-size=md]_&]:gap-2 [[data-size=md]_&]:px-4 [[data-size=md]_&]:text-sm')
        ->add('[[data-size=md]_&]:before:h-6')
        // Default text & icon colors
        ->add('text-gray-500 hover:text-gray-700 [&>svg]:text-gray-400 hover:[&>svg]:text-gray-500')
        ->add('dark:text-gray-400 dark:hover:text-gray-200 [&>svg]:dark:text-gray-500 dark:hover:[&>svg]:text-gray-400')
        // Before: hover bg (hidden on active)
        ->add('hover:not-[[data-active]]:before:bg-gray-400/10')
        // After: blue bottom border indicator
        ->add(
            'after:inset-x-0 after:bottom-0 after:h-0.5 after:scale-x-0 after:bg-blue-500 [&[data-active]]:after:scale-x-100',
        )
        ->add('dark:after:bg-blue-600')
        // Active colors
        ->add('[&[data-active]]:text-gray-900 [&[data-active]>svg]:text-gray-500')
        ->add('[&[data-active]]:dark:text-gray-100 [&[data-active]>svg]:dark:text-gray-400')
        // Boxed variant overrides
        ->add('[[data-variant=boxed]_&]:mb-0 [[data-variant=boxed]_&]:rounded-md')
        ->add('[[data-variant=boxed]_&]:before:inset-0 [[data-variant=boxed]_&]:before:h-auto')
        ->add(
            '[[data-variant=boxed]_&]:after:inset-0 [[data-variant=boxed]_&]:after:h-auto [[data-variant=boxed]_&]:after:-z-10 [[data-variant=boxed]_&]:after:rounded-md',
        )
        ->add(
            '[[data-variant=boxed]_&]:after:scale-x-100 [[data-variant=boxed]_&]:after:transition-none [[data-variant=boxed]_&]:after:opacity-0',
        )
        ->add('[[data-variant=boxed]_&]:after:bg-white [[data-variant=boxed]_&]:after:shadow-sm')
        ->add('[[data-variant=boxed]_&]:dark:after:bg-gray-760')
        ->add('[[data-variant=boxed]_&[data-active]]:after:opacity-100')
        // Boxed size overrides
        ->add('[[data-variant=boxed][data-size=md]_&]:h-10 [[data-variant=boxed][data-size=md]_&]:px-3')
        ->add('[[data-variant=boxed][data-size=sm]_&]:h-8 [[data-variant=boxed][data-size=sm]_&]:px-2.5')
        // Boxed text colors
        ->add(
            '[[data-variant=boxed]_&]:text-gray-600 [[data-variant=boxed]_&]:hover:text-gray-900 [[data-variant=boxed]_&[data-active]]:text-gray-900',
        )
        ->add(
            '[[data-variant=boxed]_&]:dark:text-gray-400 [[data-variant=boxed]_&]:dark:hover:text-gray-100 [[data-variant=boxed]_&[data-active]]:dark:text-gray-100',
        )
        // Disabled
        ->add('disabled:pointer-events-none disabled:opacity-50')
        ->merge($attributes);
@endphp

@if ($href)
    <a href="{{ $href }}" role="tab" id="{{ $tabId }}" aria-controls="{{ $panelId }}"
        @if ($name)
            x-on:click="Alpine.store('tabs_{{ $name }}') && (Alpine.store('tabs_{{ $name }}').active = '{{ $value }}')"
            :aria-selected="(Alpine.store('tabs_{{ $name }}')?.active === '{{ $value }}').toString()"
            :tabindex="Alpine.store('tabs_{{ $name }}')?.active === '{{ $value }}' ? 0 : -1"
            x-effect="$el.toggleAttribute('data-active', Alpine.store('tabs_{{ $name }}')?.active === '{{ $value }}')"
        @else
            x-on:click="select('{{ $value }}')"
            :aria-selected="isActive('{{ $value }}').toString()"
            :tabindex="isActive('{{ $value }}') ? 0 : -1"
            x-bind:data-active="isActive('{{ $value }}') || undefined"
        @endif
        @if ($disabled) aria-disabled="true" @endif {{ $attributes->except(['class', 'href']) }}
        class="{{ $classes }}" data-tabs-tab data-value="{{ $value }}">
        @if ($icon)
            <ui:icon :name="$icon" />
        @endif
        {{ $slot }}
    </a>
@else
    <button type="button" role="tab" id="{{ $tabId }}" aria-controls="{{ $panelId }}"
        @if ($name)
            x-on:click="Alpine.store('tabs_{{ $name }}') && (Alpine.store('tabs_{{ $name }}').active = '{{ $value }}')"
            :aria-selected="(Alpine.store('tabs_{{ $name }}')?.active === '{{ $value }}').toString()"
            :tabindex="Alpine.store('tabs_{{ $name }}')?.active === '{{ $value }}' ? 0 : -1"
            x-effect="$el.toggleAttribute('data-active', Alpine.store('tabs_{{ $name }}')?.active === '{{ $value }}')"
        @else
            x-on:click="select('{{ $value }}')"
            :aria-selected="isActive('{{ $value }}').toString()"
            :tabindex="isActive('{{ $value }}') ? 0 : -1"
            x-bind:data-active="isActive('{{ $value }}') || undefined"
        @endif
        @if ($disabled) disabled aria-disabled="true" @endif {{ $attributes->except('class') }}
        class="{{ $classes }}" data-tabs-tab data-value="{{ $value }}">
        @if ($icon)
            <ui:icon :name="$icon" />
        @endif
        {{ $slot }}
    </button>
@endif
