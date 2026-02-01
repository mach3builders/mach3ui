@props([
    'clearText' => null,
    'disabled' => false,
    'format' => '24',
    'id' => null,
    'locale' => null,
    'nowText' => null,
    'placeholder' => null,
    'showFooter' => false,
    'step' => 15,
    'value' => null,
])

@php
    $pickerId = $id ?? 'timepicker-' . Str::random(8);
    $locale = $locale ?? app()->getLocale();
    $use24Hour = $format === '24';

    $localeData = [
        'am' => __('ui::ui.timepicker.am', [], $locale),
        'pm' => __('ui::ui.timepicker.pm', [], $locale),
    ];

    $resolvedPlaceholder = $placeholder ?? __('ui::ui.timepicker.placeholder', [], $locale);
    $resolvedClearText = $clearText ?? __('ui::ui.clear', [], $locale);
    $resolvedNowText = $nowText ?? __('ui::ui.now', [], $locale);

    // Extract wire:model attribute
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

    // Extract x-model attribute
    $xModel = null;
    foreach ($attributes as $key => $val) {
        if (str_starts_with($key, 'x-model')) {
            $xModel = $val;
            break;
        }
    }

    $resolvedName = $attributes->get('name') ?? ($wireModelValue ?? $xModel);

    $classes = Ui::classes()
        ->add('relative inline-block select-none [anchor-scope:--timepicker-trigger]')
        ->merge($attributes->only('class'));
@endphp

<div x-data="{
    value: @if ($wireModelValue) (typeof $wire !== 'undefined' ? $wire.entangle('{{ $wireModelValue }}'){{ $wireModelLive ? '.live' : '' }} : @js($value)) @else @js($value) @endif,
    use24Hour: @js($use24Hour),
    step: @js($step),
    locale: @js($localeData),
    placeholder: @js($resolvedPlaceholder),

    get displayValue() {
        if (!this.value) return null;
        const parsed = this.parseTime(this.value);
        if (!parsed) return this.value;
        return this.formatTime(parsed.hours, parsed.minutes);
    },

    formatTime(hours, minutes) {
        if (this.use24Hour) {
            return String(hours).padStart(2, '0') + ':' + String(minutes).padStart(2, '0');
        }
        const period = (hours >= 12) ? this.locale.pm : this.locale.am;
        const displayHours = hours % 12 || 12;
        return displayHours + ':' + String(minutes).padStart(2, '0') + ' ' + period;
    },

    parseTime(str) {
        if (!str) return null;
        const parts = str.split(/\s+/);
        const timePart = parts[0];
        const periodPart = parts[1];
        const timeMatch = timePart.match(/^(\d{1,2}):(\d{2})$/);
        if (!timeMatch) return null;
        let hours = parseInt(timeMatch[1]);
        const minutes = parseInt(timeMatch[2]);
        const period = periodPart ? periodPart.toUpperCase() : null;
        if (period === 'PM' && hours < 12) hours += 12;
        if (period === 'AM' && hours === 12) hours = 0;
        if (hours < 0 || hours > 23 || minutes < 0 || minutes > 59) return null;
        return { hours, minutes };
    },

    get timeOptions() {
        const options = [];
        for (let h = 0; h < 24; h++) {
            for (let m = 0; m < 60; m += this.step) {
                const value24 = String(h).padStart(2, '0') + ':' + String(m).padStart(2, '0');
                options.push({
                    value: value24,
                    label: this.formatTime(h, m),
                    selected: this.value === value24
                });
            }
        }
        return options;
    },

    select(value24) {
        this.value = value24;
        this.$refs.dropdown.hidePopover();
    },

    clear() {
        this.value = null;
        this.$refs.dropdown.hidePopover();
    },

    selectNow() {
        const now = new Date();
        const hours = now.getHours();
        const minutes = Math.floor(now.getMinutes() / this.step) * this.step;
        const value24 = String(hours).padStart(2, '0') + ':' + String(minutes).padStart(2, '0');
        this.select(value24);
    },

    scrollToSelected() {
        this.$nextTick(() => {
            const selected = this.$refs.options && this.$refs.options.querySelector('[data-selected]');
            if (selected) {
                selected.scrollIntoView({ block: 'center' });
            }
        });
    }
}" x-modelable="value" {{ $attributes->whereStartsWith('x-model') }}
    x-on:toggle.document="if ($event.target === $refs.dropdown && $event.newState === 'open') scrollToSelected()"
    class="{{ $classes }}" {{ $attributes->only('data-*') }} data-timepicker data-control>
    <button type="button" popovertarget="{{ $pickerId }}" @if ($disabled) disabled @endif
        class="flex h-10 w-full items-center gap-2 rounded-md border px-3 text-sm shadow-xs [anchor-name:--timepicker-trigger]
               border-gray-140 bg-white text-gray-900 focus:border-gray-400 focus:outline-none disabled:cursor-not-allowed disabled:opacity-50
               dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:focus:border-gray-500">
        <span x-show="displayValue" x-text="displayValue"></span>

        <span x-show="!displayValue" class="text-gray-400 dark:text-gray-500">{{ $resolvedPlaceholder }}</span>

        <ui:icon name="clock" class="ml-auto size-4 shrink-0 text-gray-400 dark:text-gray-500" />
    </button>

    <input type="hidden" x-model="value" @if ($resolvedName) name="{{ $resolvedName }}" @endif
        @if ($disabled) disabled @endif />

    @if (!$disabled)
        <div x-ref="dropdown" id="{{ $pickerId }}" popover
            class="m-0 hidden w-36 flex-col rounded-lg border p-1 shadow-lg open:flex [position-anchor:--timepicker-trigger] [top:calc(anchor(bottom)+0.25rem)] [left:anchor(left)] [position-try-fallbacks:--timepicker-top]
                   border-gray-100 bg-white
                   dark:border-gray-740 dark:bg-gray-790">
            <div x-ref="options" class="flex max-h-64 flex-col overflow-y-auto">
                <template x-for="option in timeOptions" :key="option.value">
                    <button type="button" x-on:click="select(option.value)" x-text="option.label"
                        x-bind:data-selected="option.selected ? '' : null"
                        x-bind:class="option.selected ?
                            'bg-gray-900 text-white hover:bg-gray-800 font-medium dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200' :
                            'text-gray-700 hover:bg-gray-40 dark:text-gray-300 dark:hover:bg-gray-750'"
                        class="flex shrink-0 items-center justify-center rounded-md px-3 py-1.5 text-sm"></button>
                </template>
            </div>

            @if ($showFooter)
                <div
                    class="mt-1 flex items-center justify-between gap-2 border-t pt-2 border-gray-100 dark:border-gray-740">
                    <ui:button variant="ghost" size="xs" x-on:click="clear()">{{ $resolvedClearText }}</ui:button>

                    <ui:button size="xs" x-on:click="selectNow()">{{ $resolvedNowText }}</ui:button>
                </div>
            @endif
        </div>
    @endif
</div>
