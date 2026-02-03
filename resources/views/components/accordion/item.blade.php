@props([
    'disabled' => false,
    'icon' => 'chevron-down',
    'title',
])

@php
    $key = Str::slug($title);
    $triggerId = "accordion-trigger-{$key}";
    $panelId = "accordion-panel-{$key}";
@endphp

@php
    $containerClasses = Ui::classes()->add('group')->when($disabled, 'opacity-50')->merge($attributes);

    $triggerClasses = Ui::classes()
        ->add(
            'flex w-full cursor-pointer items-center justify-between gap-3 py-4 text-left font-medium transition-colors',
        )
        ->add('text-gray-900 hover:text-gray-980 dark:text-gray-100 dark:hover:text-white')
        ->add(
            'focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 dark:focus-visible:ring-offset-gray-900',
        )
        ->add('group-data-[variant=bordered]:px-4')
        ->when($disabled, 'pointer-events-none');

    $iconClasses = Ui::classes()->add(
        'size-4 shrink-0 text-gray-400 transition-transform duration-200 dark:text-gray-500',
    );

    $contentClasses = Ui::classes()->add('overflow-hidden');

    $panelClasses = Ui::classes()
        ->add('pb-4 text-gray-600 dark:text-gray-400')
        ->add('group-data-[variant=bordered]:px-4');
@endphp

<div {{ $attributes->except('class') }} class="{{ $containerClasses }}">
    <button type="button" id="{{ $triggerId }}" aria-controls="{{ $panelId }}"
        x-on:click="toggle('{{ $key }}')" :aria-expanded="isOpen('{{ $key }}')"
        @if ($disabled) disabled aria-disabled="true" @endif class="{{ $triggerClasses }}">
        <span>{{ $title }}</span>
        <ui:icon :name="$icon" x-bind:class="isOpen('{{ $key }}') && 'rotate-180'"
            class="{{ $iconClasses }}" />
    </button>

    <div id="{{ $panelId }}" role="region" aria-labelledby="{{ $triggerId }}"
        x-show="isOpen('{{ $key }}')" x-collapse x-cloak class="{{ $contentClasses }}">
        <div class="{{ $panelClasses }}">
            {{ $slot }}
        </div>
    </div>
</div>
