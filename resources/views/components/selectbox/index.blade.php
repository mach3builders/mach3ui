@props([
    'disabled' => false,
    'emptyText' => 'No results found',
    'help' => null,
    'invalid' => false,
    'label' => null,
    'name' => null,
    'options' => [],
    'placeholder' => 'Select an option...',
    'search' => false,
    'search:placeholder' => 'Search...',
    'size' => null,
    'value' => null,
])

@php
    $searchPlaceholder = $__data['search:placeholder'] ?? 'Search...';

    $id = 'selectbox-' . uniqid();
    $name = $name ?? $attributes->whereStartsWith('wire:model')->first();
    $hasError = $name && $errors->has($name);

    $containerClasses = Ui::classes()
        ->add('relative select-none inline-block w-full [anchor-scope:--selectbox-trigger]')
        ->merge($attributes->only('class'));

    $triggerClasses = Ui::classes()
        ->add(
            'flex w-full cursor-pointer items-center justify-between rounded-md border px-3 py-2 text-sm shadow-xs [anchor-name:--selectbox-trigger]',
        )
        ->add('border-gray-140 bg-white text-gray-900')
        ->add('dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100')
        ->add('focus:border-gray-400 focus:outline-none')
        ->add('dark:focus:border-gray-500')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->when($size === 'sm', 'h-8 px-2.5 py-1.5 text-xs')
        ->when($size === null, 'h-10')
        ->when($size === 'lg', 'h-12 px-4 py-3 text-base')
        ->when(
            $invalid || $hasError,
            'border-red-500 dark:border-red-500 focus:border-red-600 dark:focus:border-red-500',
        );

    $optionsArray = is_array($options) ? $options : [];
    $hasSlot = !$slot->isEmpty();

    $wireModelAttr = null;
    foreach (
        ['wire:model.live', 'wire:model.blur', 'wire:model.change', 'wire:model.debounce', 'wire:model']
        as $attr
    ) {
        if ($attributes->has($attr)) {
            $wireModelAttr = $attr;
            break;
        }
    }
    $wireModelValue = $wireModelAttr ? $attributes->get($wireModelAttr) : null;
    $wireModelLive = $wireModelAttr && str_contains($wireModelAttr, '.live');
@endphp

@if ($label)
    <ui:field>
        <ui:label>{{ $label }}</ui:label>

        <div class="{{ $containerClasses }}" {{ $attributes->only('data-*') }} x-data="{
            value: @if ($wireModelValue) (typeof $wire !== 'undefined' ? $wire.entangle('{{ $wireModelValue }}'){{ $wireModelLive ? '.live' : '' }} : '{{ $value }}') @else '{{ $value }}' @endif,
            search: '',
            options: {{ Js::from($optionsArray) }},
            hasSlot: {{ $hasSlot ? 'true' : 'false' }},
            init() {
                if (this.hasSlot) {
                    this.options = {};
                    this.$refs.options.querySelectorAll('[data-value]').forEach(el => {
                        this.options[el.dataset.value] = el.textContent.trim();
                    });
                }
            },
            get selectedLabel() {
                return this.options[this.value] || null;
            },
            get filteredOptions() {
                if (!this.search) return Object.entries(this.options);
                return Object.entries(this.options).filter(([key, label]) =>
                    label.toLowerCase().includes(this.search.toLowerCase())
                );
            },
            select(val) {
                this.value = val;
                this.$refs.menu.hidePopover();
                this.$dispatch('input', val);
            },
            updateAriaSelected() {
                this.$refs.options.querySelectorAll('[data-value]').forEach(el => {
                    el.setAttribute('aria-selected', el.dataset.value === this.value);
                });
            }
        }"
            x-on:toggle.window="if ($event.target === $refs.menu && $event.newState === 'closed') search = ''"
            x-effect="updateAriaSelected()" data-selectbox>
            <button type="button" class="{{ $triggerClasses }}" popovertarget="{{ $id }}"
                @disabled($disabled)>
                <span x-show="selectedLabel" x-text="selectedLabel"></span>

                <span x-show="!selectedLabel" class="text-gray-400 dark:text-gray-500">{{ $placeholder }}</span>

                <ui:icon name="chevrons-up-down" class="size-4 shrink-0 text-gray-400 dark:text-gray-500" />
            </button>

            <input type="hidden" @if ($name) name="{{ $name }}" @endif x-model="value"
                @disabled($disabled) />

            <div id="{{ $id }}" x-ref="menu" popover
                x-on:toggle="if ($event.newState === 'open' && $refs.searchInput) $refs.searchInput.focus()"
                class="m-0 max-h-72 overflow-hidden rounded-lg border p-0 shadow-lg [position-anchor:--selectbox-trigger] [width:anchor-size(width)] [top:calc(anchor(bottom)+0.25rem)] [left:anchor(left)] [position-try-fallbacks:--selectbox-top] border-gray-100 bg-white dark:border-gray-740 dark:bg-gray-790 [&:popover-open]:flex [&:popover-open]:flex-col">
                @if ($search)
                    <div class="border-b p-2.5 border-gray-100 dark:border-gray-740">
                        <ui:input placeholder="{{ $searchPlaceholder }}" x-model="search" x-ref="searchInput" />
                    </div>
                @endif

                <div class="flex flex-col gap-1 overflow-y-auto p-1" x-ref="options"
                    @if ($hasSlot) x-on:click="if ($event.target.closest('[data-value]')) select($event.target.closest('[data-value]').dataset.value)" @endif>
                    @if ($hasSlot)
                        {{ $slot }}
                    @else
                        <template x-for="[optValue, optLabel] in filteredOptions" :key="optValue">
                            <button type="button"
                                class="flex w-full cursor-pointer items-center gap-2 rounded-sm px-3 py-2 text-left text-sm text-gray-700 hover:bg-gray-40 dark:text-gray-200 dark:hover:bg-gray-760 aria-selected:bg-gray-50 aria-selected:font-medium dark:aria-selected:bg-gray-760"
                                x-on:click="select(optValue)" x-text="optLabel"
                                :aria-selected="value === optValue"></button>
                        </template>
                    @endif
                </div>

                @if ($search)
                    <div class="px-3 py-6 text-center text-sm text-gray-500 dark:text-gray-400"
                        x-show="filteredOptions.length === 0" x-cloak>{{ $emptyText }}</div>
                @endif
            </div>
        </div>

        @if ($help)
            <ui:help>{{ $help }}</ui:help>
        @endif

        @if ($name)
            <ui:error :name="$name" />
        @endif
    </ui:field>
@else
    <div class="{{ $containerClasses }}" {{ $attributes->only('data-*') }} x-data="{
        value: @if ($wireModelValue) (typeof $wire !== 'undefined' ? $wire.entangle('{{ $wireModelValue }}'){{ $wireModelLive ? '.live' : '' }} : '{{ $value }}') @else '{{ $value }}' @endif,
        search: '',
        options: {{ Js::from($optionsArray) }},
        hasSlot: {{ $hasSlot ? 'true' : 'false' }},
        init() {
            if (this.hasSlot) {
                this.options = {};
                this.$refs.options.querySelectorAll('[data-value]').forEach(el => {
                    this.options[el.dataset.value] = el.textContent.trim();
                });
            }
        },
        get selectedLabel() {
            return this.options[this.value] || null;
        },
        get filteredOptions() {
            if (!this.search) return Object.entries(this.options);
            return Object.entries(this.options).filter(([key, label]) =>
                label.toLowerCase().includes(this.search.toLowerCase())
            );
        },
        select(val) {
            this.value = val;
            this.$refs.menu.hidePopover();
            this.$dispatch('input', val);
        },
        updateAriaSelected() {
            this.$refs.options.querySelectorAll('[data-value]').forEach(el => {
                el.setAttribute('aria-selected', el.dataset.value === this.value);
            });
        }
    }"
        x-on:toggle.window="if ($event.target === $refs.menu && $event.newState === 'closed') search = ''"
        x-effect="updateAriaSelected()" data-selectbox>
        <button type="button" class="{{ $triggerClasses }}" popovertarget="{{ $id }}"
            @disabled($disabled)>
            <span x-show="selectedLabel" x-text="selectedLabel"></span>

            <span x-show="!selectedLabel" class="text-gray-400 dark:text-gray-500">{{ $placeholder }}</span>

            <ui:icon name="chevrons-up-down" class="size-4 shrink-0 text-gray-400 dark:text-gray-500" />
        </button>

        <input type="hidden" @if ($name) name="{{ $name }}" @endif x-model="value"
            @disabled($disabled) />

        <div id="{{ $id }}" x-ref="menu" popover
            x-on:toggle="if ($event.newState === 'open' && $refs.searchInput) $refs.searchInput.focus()"
            class="m-0 max-h-72 overflow-hidden rounded-lg border p-0 shadow-lg [position-anchor:--selectbox-trigger] [width:anchor-size(width)] [top:calc(anchor(bottom)+0.25rem)] [left:anchor(left)] [position-try-fallbacks:--selectbox-top] border-gray-100 bg-white dark:border-gray-740 dark:bg-gray-790 [&:popover-open]:flex [&:popover-open]:flex-col">
            @if ($search)
                <div class="border-b p-2.5 border-gray-100 dark:border-gray-740">
                    <ui:input placeholder="{{ $searchPlaceholder }}" x-model="search" x-ref="searchInput" />
                </div>
            @endif

            <div class="flex flex-col gap-1 overflow-y-auto p-1" x-ref="options"
                @if ($hasSlot) x-on:click="if ($event.target.closest('[data-value]')) select($event.target.closest('[data-value]').dataset.value)" @endif>
                @if ($hasSlot)
                    {{ $slot }}
                @else
                    <template x-for="[optValue, optLabel] in filteredOptions" :key="optValue">
                        <button type="button"
                            class="flex w-full cursor-pointer items-center gap-2 rounded-sm px-3 py-2 text-left text-sm text-gray-700 hover:bg-gray-40 dark:text-gray-200 dark:hover:bg-gray-760 aria-selected:bg-gray-50 aria-selected:font-medium dark:aria-selected:bg-gray-760"
                            x-on:click="select(optValue)" x-text="optLabel"
                            :aria-selected="value === optValue"></button>
                    </template>
                @endif
            </div>

            @if ($search)
                <div class="px-3 py-6 text-center text-sm text-gray-500 dark:text-gray-400"
                    x-show="filteredOptions.length === 0" x-cloak>{{ $emptyText }}</div>
            @endif
        </div>
    </div>
@endif
