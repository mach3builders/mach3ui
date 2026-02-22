@props([
    'attributes' => null,
    'disabled' => false,
    'error' => null,
    'id' => null,
    'multiple' => false,
    'name' => null,
    'nullable' => false,
    'nullableLabel' => null,
    'placeholder' => null,
    'position' => 'bottom-start',
    'searchable' => false,
    'searchPlaceholder' => 'Zoeken...',
    'size' => 'md',
    'value' => null,
    'variant' => 'default',
])

@php
    $uniqueId = $id ?? 'selectbox-' . Str::random(8);
    $menuId = $uniqueId . '-menu';

    $allAttrs = $attributes?->getAttributes() ?? [];

    // Check for wire:model
    $wireModelObj = $attributes->wire('model');
    $wireModel = $wireModelObj?->directive ? $wireModelObj->value() : null;
    $wireModelLive = $wireModelObj?->directive ? $wireModelObj->hasModifier('live') : false;

    // Check for x-model
    $xModel = null;
    foreach ($allAttrs as $attrKey => $attrValue) {
        if (str_starts_with($attrKey, 'x-model')) {
            $xModel = $attrValue;
            break;
        }
    }

    // Check for disabled attribute
    $isDisabled = $disabled || $attributes?->has('disabled');

    // Check if Livewire is available
    $hasLivewire = class_exists(\Livewire\Livewire::class);

    // Initial value handling
    $initialValue = $value;
    if ($multiple && !is_array($initialValue)) {
        $initialValue = $initialValue !== null ? [$initialValue] : [];
    }

    $anchor = "--selectbox-trigger-{$uniqueId}";
    $offset = '0.25rem';

    $positionStyles = [
        'bottom-start' => "position-anchor: {$anchor}; inset: auto; top: calc(anchor(bottom) + {$offset}); left: anchor(left); position-try-fallbacks: flip-block;",
        'bottom-end' => "position-anchor: {$anchor}; inset: auto; top: calc(anchor(bottom) + {$offset}); right: anchor(right); position-try-fallbacks: flip-block;",
        'top-start' => "position-anchor: {$anchor}; inset: auto; bottom: calc(anchor(top) + {$offset}); left: anchor(left); position-try-fallbacks: flip-block;",
        'top-end' => "position-anchor: {$anchor}; inset: auto; bottom: calc(anchor(top) + {$offset}); right: anchor(right); position-try-fallbacks: flip-block;",
    ];

    $wrapperClasses = Ui::classes()->add('relative inline-block w-full')->merge($attributes?->only('class'));

    $triggerClasses = Ui::classes()
        ->add('flex w-full cursor-pointer items-center justify-between border shadow-xs')
        ->add('rounded-md')
        ->add('focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add($size, [
            'sm' => 'h-8 gap-1.5 px-2.5 text-xs',
            'md' => 'h-10 gap-2 px-3 text-sm',
            'lg' => 'h-12 gap-2.5 px-4 text-base',
        ])
        ->add(
            match (true) {
                (bool) $error
                    => 'border-red-500 bg-white text-gray-900 focus:border-red-500 dark:border-red-500 dark:bg-gray-800 dark:text-gray-100 dark:focus:border-red-500',
                $variant === 'inverted'
                    => 'border-gray-140 bg-gray-10 text-gray-900 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-820 dark:text-gray-100 dark:focus:border-gray-600',
                default
                    => 'border-gray-140 bg-white text-gray-900 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:focus:border-gray-500',
            },
        );

    $menuClasses = Ui::classes()
        ->add('fixed m-0 hidden min-w-[anchor-size(width)] flex-col rounded-lg border shadow-lg')
        ->add('border-gray-100 bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-790')
        ->add('[&:popover-open]:flex');

    $iconClasses = Ui::classes()
        ->add('shrink-0 text-gray-400')
        ->add('dark:text-gray-500')
        ->add('group-data-[open]:rotate-180')
        ->add($size, [
            'sm' => 'size-3.5',
            'md' => 'size-4',
            'lg' => 'size-5',
        ]);

    $searchWrapperClasses = Ui::classes()
        ->add('relative flex items-center border-b')
        ->add('border-gray-100')
        ->add('dark:border-gray-700');

    $searchClasses = Ui::classes()
        ->add('w-full border-0 bg-transparent py-2.5 pl-9 pr-3 text-sm outline-none')
        ->add('text-gray-900 placeholder-gray-400')
        ->add('dark:text-gray-100 dark:placeholder-gray-500');

    $optionsClasses = Ui::classes()->add('flex max-h-60 flex-col gap-0.5 overflow-y-auto p-1');
@endphp

<div {{ $wireModel ? 'wire:ignore' : '' }} x-data="{
    open: false,
    multiple: {{ $multiple ? 'true' : 'false' }},
    searchable: {{ $searchable ? 'true' : 'false' }},
    search: '',
    value: {{ \Illuminate\Support\Js::from($initialValue) }},
    labels: {},
    placeholder: '{{ $placeholder ?? '' }}',
    focusedIndex: -1,
    _parentData: null,

    get displayLabel() {
        if (this.multiple) {
            const count = Array.isArray(this.value) ? this.value.length : 0;
            if (count === 0) return this.placeholder;
            if (count === 1) return this.labels[this.value[0]] ?? this.placeholder;
            return count + ' geselecteerd';
        }
        return this.labels[this.value] ?? this.placeholder;
    },

    get visibleOptions() {
        const all = this.$refs.menu.querySelectorAll('[data-selectbox-option]:not([disabled])');
        if (!this.searchable || !this.search.trim()) return all;

        const term = this.search.toLowerCase().trim();
        return Array.from(all).filter(el => {
            const text = (el.querySelector('[data-label]')?.textContent ?? el.textContent).toLowerCase();
            return text.includes(term);
        });
    },

    get allOptions() {
        return this.$refs.menu.querySelectorAll('[data-selectbox-option]:not([disabled])');
    },

    isSelected(val) {
        if (this.multiple) {
            return Array.isArray(this.value) && this.value.includes(val);
        }
        return this.value == val;
    },

    select(val, label) {
        if (this.multiple) {
            if (!Array.isArray(this.value)) this.value = [];
            const index = this.value.indexOf(val);
            if (index === -1) {
                this.value = [...this.value, val];
                this.labels[val] = label;
            } else {
                this.value = this.value.filter(v => v !== val);
            }
        } else {
            this.value = val;
            this.labels[val] = label;
            this.close();
            this.$refs.trigger.focus();
        }
        this.$dispatch('change', { value: this.value });
    },

    toggle() {
        if (this.open) {
            this.close();
        } else {
            this.open = true;
            this.search = '';
            this.$nextTick(() => {
                this.$refs.menu.showPopover();
                this.focusedIndex = this.findSelectedIndex();
                this.scrollToFocused();
            });
        }
    },

    close() {
        this.open = false;
        this.focusedIndex = -1;
        this.search = '';
        this.$refs.menu.hidePopover();
    },

    findSelectedIndex() {
        const options = Array.from(this.visibleOptions);
        const selectedVal = this.multiple ?
            (Array.isArray(this.value) && this.value.length > 0 ? this.value[0] : null) :
            this.value;
        if (selectedVal === null) return -1;
        return options.findIndex(el => el.dataset.value == selectedVal);
    },

    focusNext() {
        if (!this.open) {
            this.toggle();
            return;
        }
        const options = this.visibleOptions;
        this.focusedIndex = Math.min(this.focusedIndex + 1, options.length - 1);
        this.scrollToFocused();
    },

    focusPrev() {
        if (!this.open) {
            this.toggle();
            return;
        }
        this.focusedIndex = Math.max(this.focusedIndex - 1, 0);
        this.scrollToFocused();
    },

    selectFocused() {
        const options = Array.from(this.visibleOptions);
        if (this.focusedIndex >= 0 && this.focusedIndex < options.length) {
            options[this.focusedIndex].click();
        }
    },

    scrollToFocused() {
        const options = Array.from(this.visibleOptions);
        if (options[this.focusedIndex]) {
            options[this.focusedIndex].scrollIntoView({ block: 'nearest' });
        }
    },

    updateVisibility() {
        const term = this.search.toLowerCase().trim();
        this.allOptions.forEach(el => {
            if (!term) {
                el.style.display = '';
                return;
            }
            const text = (el.querySelector('[data-label]')?.textContent ?? el.textContent).toLowerCase();
            el.style.display = text.includes(term) ? '' : 'none';
        });
        this.focusedIndex = -1;
    },

    updateLabelsForValue(val) {
        if (this.multiple && Array.isArray(val)) {
            val.forEach(v => {
                if (!this.labels[v]) {
                    const option = this.$refs.menu?.querySelector(`[data-selectbox-option][data-value='${v}']`);
                    if (option) {
                        this.labels[v] = option.querySelector('[data-label]')?.textContent?.trim() ?? option.textContent.trim();
                    }
                }
            });
        } else if (val !== null && val !== undefined && !this.labels[val]) {
            const selected = this.$refs.menu?.querySelector(`[data-selectbox-option][data-value='${val}']`);
            if (selected) {
                this.labels[val] = selected.querySelector('[data-label]')?.textContent?.trim() ?? selected.textContent.trim();
            }
        }
    },

    init() {
        @if($hasLivewire && $wireModel)
        // Livewire: sync with wire:model
        this.value = $wire.get('{{ $wireModel }}') ?? {{ $multiple ? '[]' : 'null' }};

        // Watch for changes from Livewire (external updates)
        $wire.$watch('{{ $wireModel }}', (newVal) => {
            if (JSON.stringify(newVal) !== JSON.stringify(this.value)) {
                this.value = newVal;
            }
        });

        // Sync our changes back to Livewire
        this.$watch('value', (newVal) => {
            $wire.set('{{ $wireModel }}', newVal, {{ $wireModelLive ? 'true' : 'false' }});
        });
        @elseif($xModel)
        // Alpine x-model: sync with parent scope
        const parentEl = this.$el.closest('[x-data]:not([data-selectbox])');
        if (parentEl) {
            const parentData = Alpine.$data(parentEl);
            let syncing = false;
            let lastParentVal = undefined;

            // Get initial value from parent
            this.value = parentData['{{ $xModel }}'] ?? {{ $multiple ? '[]' : 'null' }};
            lastParentVal = JSON.stringify(this.value);

            // Sync our changes to parent
            this.$watch('value', (newVal) => {
                if (syncing) return;
                syncing = true;
                parentData['{{ $xModel }}'] = newVal;
                lastParentVal = JSON.stringify(newVal);
                this.$nextTick(() => syncing = false);
            });

            // Watch parent for external changes using effect
            Alpine.effect(() => {
                const parentVal = parentData['{{ $xModel }}'];
                const parentValStr = JSON.stringify(parentVal);
                if (!syncing && parentValStr !== lastParentVal) {
                    syncing = true;
                    lastParentVal = parentValStr;
                    this.value = parentVal ?? {{ $multiple ? '[]' : 'null' }};
                    this.$nextTick(() => syncing = false);
                }
            });
        }
        @endif

        // Watch for value changes and update labels
        this.$watch('value', (newVal) => {
            this.$nextTick(() => this.updateLabelsForValue(newVal));
        });

        // Set initial labels from selected options
        this.$nextTick(() => this.updateLabelsForValue(this.value));
    }
}" x-on:keydown.escape.window="close()"
    style="anchor-scope: {{ $anchor }};" class="{{ $wrapperClasses }}"
    {{ $attributes?->except(['class', 'wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.defer', 'x-model', 'x-model.debounce', 'x-model.lazy', 'x-model.throttle', 'disabled']) }}
    data-selectbox @if ($multiple)
    data-multiple
    @endif
    @if ($searchable)
        data-searchable
    @endif
    data-control
    >
    {{-- Trigger --}}
    <button type="button" x-ref="trigger" x-on:click="toggle()"
        x-on:keydown.enter.prevent="open ? selectFocused() : toggle()"
        x-on:keydown.space.prevent="open ? selectFocused() : toggle()" x-on:keydown.arrow-down.prevent="focusNext()"
        x-on:keydown.arrow-up.prevent="focusPrev()" x-bind:data-open="open" x-bind:aria-expanded="open"
        popovertarget="{{ $menuId }}" popovertargetaction="show"
        @if ($id) id="{{ $id }}" @endif
        @if ($error) aria-invalid="true" @endif @if ($isDisabled) disabled @endif
        style="anchor-name: {{ $anchor }};" class="{{ $triggerClasses }} group" aria-haspopup="listbox"
        data-selectbox-trigger>
        <span x-text="displayLabel" class="truncate text-left"
            :class="(multiple ? (Array.isArray(value) && value.length === 0) : value === null) ?
            'text-gray-400 dark:text-gray-500' : ''"></span>
        <ui:icon name="chevron-down" class="{{ $iconClasses }}" />
    </button>

    {{-- Menu --}}
    <div popover x-ref="menu"
        x-on:toggle="open = $event.newState === 'open'; if ($event.newState === 'open' && searchable && $refs.search) $refs.search.focus()"
        id="{{ $menuId }}" role="listbox" @if ($multiple) aria-multiselectable="true" @endif
        style="{{ $positionStyles[$position] ?? $positionStyles['bottom-start'] }}" class="{{ $menuClasses }}"
        data-selectbox-menu>
        @if ($searchable)
            <div class="{{ $searchWrapperClasses }}" data-selectbox-search-wrapper>
                <ui:icon name="search"
                    class="pointer-events-none absolute left-3 size-4 text-gray-400 dark:text-gray-500" />
                <input type="text" x-ref="search" x-model="search" x-on:input="updateVisibility()"
                    x-on:keydown.arrow-down.prevent="focusNext()" x-on:keydown.arrow-up.prevent="focusPrev()"
                    x-on:keydown.enter.prevent="selectFocused()" placeholder="{{ $searchPlaceholder }}"
                    class="{{ $searchClasses }}" data-selectbox-search>
            </div>
        @endif

        <div class="{{ $optionsClasses }}" data-selectbox-options>
            @if ($nullable && !$multiple)
                <ui:selectbox.option :value="null" class="text-gray-400 dark:text-gray-500">
                    {{ $nullableLabel ?: __('ui::ui.selectbox.no_selection') }}
                </ui:selectbox.option>
            @endif
            {{ $slot }}
        </div>
    </div>

    {{-- Hidden input(s) for form submission --}}
    @if ($name)
        @if ($multiple)
            <template x-for="(val, index) in (Array.isArray(value) ? value : [])" :key="index">
                <input type="hidden" :name="'{{ $name }}[]'" :value="val">
            </template>
        @else
            <input type="hidden" name="{{ $name }}" x-bind:value="value">
        @endif
    @endif
</div>
