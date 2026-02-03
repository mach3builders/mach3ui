@props([
    'disabled' => false,
    'icon' => 'chevron-down',
    'name',
])

@php
    $triggerId = "accordion-trigger-{$name}";
    $panelId = "accordion-panel-{$name}";
@endphp

@php
    $containerClasses = Ui::classes()
        ->add('group')
        ->when($disabled, 'opacity-50')
        ->merge($attributes);

    $triggerClasses = Ui::classes()
        ->add('flex w-full cursor-pointer items-center justify-between gap-3 py-4 text-left font-medium transition-colors')
        ->add('text-gray-900 hover:text-gray-980 dark:text-gray-100 dark:hover:text-white')
        ->add('focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 dark:focus-visible:ring-offset-gray-900')
        ->add('group-data-[variant=bordered]:px-4')
        ->when($disabled, 'pointer-events-none');

    $iconClasses = Ui::classes()
        ->add('size-4 shrink-0 text-gray-400 transition-transform duration-200 dark:text-gray-500');

    $contentClasses = Ui::classes()
        ->add('overflow-hidden');

    $panelClasses = Ui::classes()
        ->add('pb-4 text-gray-600 dark:text-gray-400')
        ->add('group-data-[variant=bordered]:px-4');
@endphp

<div {{ $attributes->except('class') }} class="{{ $containerClasses }}">
    <button
        type="button"
        id="{{ $triggerId }}"
        aria-controls="{{ $panelId }}"
        x-on:click="toggle('{{ $name }}')"
        :aria-expanded="isOpen('{{ $name }}')"
        @if($disabled) disabled aria-disabled="true" @endif
        class="{{ $triggerClasses }}"
    >
        <span>{{ $trigger }}</span>
        <x-dynamic-component
            :component="'lucide-' . $icon"
            x-bind:class="isOpen('{{ $name }}') && 'rotate-180'"
            class="{{ $iconClasses }}"
        />
    </button>

    <div
        id="{{ $panelId }}"
        role="region"
        aria-labelledby="{{ $triggerId }}"
        x-show="isOpen('{{ $name }}')"
        x-collapse
        x-cloak
        class="{{ $contentClasses }}"
    >
        <div class="{{ $panelClasses }}">
            {{ $slot }}
        </div>
    </div>
</div>
