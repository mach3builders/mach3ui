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
    $pickerId = $id ?? uniqid('timepicker-');
    $resolvedLocale = $locale ?? app()->getLocale();
    $use24Hour = $format === '24';

    $localeData = [
        'am' => __('ui::ui.timepicker.am', [], $resolvedLocale),
        'pm' => __('ui::ui.timepicker.pm', [], $resolvedLocale),
    ];

    $resolvedPlaceholder = $placeholder ?? __('ui::ui.timepicker.placeholder', [], $resolvedLocale);
    $resolvedClearText = $clearText ?? __('ui::ui.clear', [], $resolvedLocale);
    $resolvedNowText = $nowText ?? __('ui::ui.now', [], $resolvedLocale);

    // Extract wire:model using the wire() macro
    $wireModel = $attributes->wire('model');
    $hasWireModel = $wireModel && method_exists($wireModel, 'value');
    $wireModelValue = $hasWireModel ? $wireModel->value() : null;
    $wireModelLive = $hasWireModel && $wireModel->hasModifier('live');

    // Build initial value expression for Alpine
    $initialValue = $hasWireModel
        ? "(typeof \$wire !== 'undefined' ? \$wire.entangle('{$wireModelValue}')" .
            ($wireModelLive ? '.live' : '') .
            ' : ' .
            Js::from($value) .
            ')'
        : Js::from($value);

    $resolvedName = $attributes->get('name') ?? $wireModelValue;

    $classes = Ui::classes()
        ->add('relative inline-block select-none [anchor-scope:--timepicker-trigger]')
        ->merge($attributes->only('class'));

    $buttonClasses = Ui::classes()
        ->add(
            'flex h-10 w-full items-center gap-2 rounded-md border px-3 text-sm shadow-xs [anchor-name:--timepicker-trigger]',
        )
        ->add(
            'border-gray-140 bg-white text-gray-900 focus:border-gray-400 focus:outline-none disabled:cursor-not-allowed disabled:opacity-50',
        )
        ->add('dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:focus:border-gray-500');

    $dropdownClasses = Ui::classes()
        ->add('m-0 hidden w-36 flex-col rounded-lg border p-1 shadow-lg open:flex')
        ->add(
            '[position-anchor:--timepicker-trigger] [top:calc(anchor(bottom)+0.25rem)] [left:anchor(left)] [position-try-fallbacks:--timepicker-top]',
        )
        ->add('border-gray-100 bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-790');

    $optionBaseClasses = 'flex shrink-0 items-center justify-center rounded-md px-3 py-1.5 text-sm';
    $optionSelectedClasses =
        'bg-gray-900 text-white hover:bg-gray-800 font-medium dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200';
    $optionUnselectedClasses = 'text-gray-700 hover:bg-gray-40 dark:text-gray-300 dark:hover:bg-gray-750';

    $footerClasses = Ui::classes()
        ->add('mt-1 flex items-center justify-between gap-2 border-t pt-2')
        ->add('border-gray-100')
        ->add('dark:border-gray-740');
@endphp

<div x-data="{
    value: {!! $initialValue !!},
    is24h: @js($use24Hour),
    step: @js($step),
    locale: @js($localeData),

    pad(n) {
        return String(n).padStart(2, '0');
    },

    formatTime(h, m) {
        if (this.is24h) return this.pad(h) + ':' + this.pad(m);
        const period = h >= 12 ? this.locale.pm : this.locale.am;
        return (h % 12 || 12) + ':' + this.pad(m) + ' ' + period;
    },

    parseTime(str) {
        if (!str) return null;
        const [timePart, periodPart] = str.split(/\s+/);
        const match = timePart.match(/^(\d{1,2}):(\d{2})$/);
        if (!match) return null;
        let h = parseInt(match[1]);
        const m = parseInt(match[2]);
        const period = periodPart?.toUpperCase();
        if (period === 'PM' && h < 12) h += 12;
        if (period === 'AM' && h === 12) h = 0;
        return (h >= 0 && h <= 23 && m >= 0 && m <= 59) ? { h, m } : null;
    },

    get displayValue() {
        if (!this.value) return null;
        const t = this.parseTime(this.value);
        return t ? this.formatTime(t.h, t.m) : this.value;
    },

    get timeOptions() {
        const options = [];
        for (let h = 0; h < 24; h++) {
            for (let m = 0; m < 60; m += this.step) {
                const val = this.pad(h) + ':' + this.pad(m);
                options.push({ value: val, label: this.formatTime(h, m), selected: this.value === val });
            }
        }
        return options;
    },

    select(val) {
        this.value = val;
        this.$refs.dropdown.hidePopover();
    },

    clear() {
        this.value = null;
        this.$refs.dropdown.hidePopover();
    },

    selectNow() {
        const now = new Date();
        this.select(this.pad(now.getHours()) + ':' + this.pad(Math.floor(now.getMinutes() / this.step) * this.step));
    },

    scrollToSelected() {
        this.$nextTick(() => {
            this.$refs.options?.querySelector('[data-selected]')?.scrollIntoView({ block: 'center' });
        });
    }
}" x-modelable="value"
    x-on:toggle.document="if ($event.target === $refs.dropdown && $event.newState === 'open') scrollToSelected()"
    {{ $attributes->whereStartsWith('x-model') }} {{ $attributes->only('data-*') }} class="{{ $classes }}"
    data-timepicker data-control>
    <button type="button" popovertarget="{{ $pickerId }}" class="{{ $buttonClasses }}" @disabled($disabled)>
        <span x-show="displayValue" x-text="displayValue"></span>
        <span x-show="!displayValue" class="text-gray-400 dark:text-gray-500">{{ $resolvedPlaceholder }}</span>
        <ui:icon name="clock" class="ml-auto size-4 shrink-0 text-gray-400 dark:text-gray-500" />
    </button>

    <input type="hidden" x-model="value" name="{{ $resolvedName }}" @disabled($disabled) />

    @if (!$disabled)
        <div x-ref="dropdown" id="{{ $pickerId }}" popover class="{{ $dropdownClasses }}">
            <div x-ref="options" class="flex max-h-64 flex-col overflow-y-auto">
                <template x-for="option in timeOptions" :key="option.value">
                    <button type="button" x-on:click="select(option.value)" x-text="option.label"
                        x-bind:data-selected="option.selected ? '' : null"
                        x-bind:class="option.selected ? @js($optionSelectedClasses) : @js($optionUnselectedClasses)"
                        class="{{ $optionBaseClasses }}"></button>
                </template>
            </div>

            @if ($showFooter)
                <div class="{{ $footerClasses }}">
                    <ui:button variant="ghost" size="xs" x-on:click="clear()">{{ $resolvedClearText }}</ui:button>
                    <ui:button size="xs" x-on:click="selectNow()">{{ $resolvedNowText }}</ui:button>
                </div>
            @endif
        </div>
    @endif
</div>
