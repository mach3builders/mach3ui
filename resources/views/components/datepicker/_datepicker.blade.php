@props([
    'attributes',
    'clearable',
    'clearLabel',
    'disabled',
    'displayFormat',
    'displayValue',
    'error',
    'id',
    'locale',
    'maxDate',
    'minDate',
    'months',
    'name',
    'placeholder',
    'popoverId',
    'showFooter',
    'showSelects',
    'size',
    'todayLabel',
    'value',
    'variant',
    'weekdays',
    'wrapperClasses',
])

@php
    $anchor = "--datepicker-{$popoverId}";

    // Trigger classes (input-like)
    $triggerClasses = Ui::classes()
        ->add('flex w-full items-center gap-2 rounded-md border shadow-xs transition-colors')
        ->add('cursor-pointer text-left focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add($size, [
            'sm' => 'h-8 px-2.5 text-xs',
            'md' => 'h-10 px-3 text-sm',
            'lg' => 'h-12 px-4 text-base',
        ])
        ->add(
            match (true) {
                (bool) $error
                    => 'border-red-500 bg-white text-gray-900 focus:border-red-500 dark:border-red-500 dark:bg-gray-800 dark:text-gray-100',
                $variant === 'inverted'
                    => 'border-gray-140 bg-gray-10 text-gray-900 hover:border-gray-300 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-820 dark:text-gray-100 dark:hover:border-gray-600 dark:focus:border-gray-500',
                default
                    => 'border-gray-140 bg-white text-gray-900 hover:border-gray-300 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:hover:border-gray-600 dark:focus:border-gray-500',
            },
        );

    // Calendar popup
    $calendarClasses = Ui::classes()
        ->add('fixed m-0 hidden w-72 flex-col gap-3 rounded-lg border p-3 shadow-lg')
        ->add('border-gray-80 bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-790')
        ->add('[&:popover-open]:flex');

    // Nav buttons
    $navButtonClasses = Ui::classes()
        ->add('flex size-7 items-center justify-center rounded-md transition-colors')
        ->add('text-gray-600 hover:bg-gray-100')
        ->add('dark:text-gray-400 dark:hover:bg-gray-750')
        ->add('disabled:pointer-events-none disabled:opacity-50');

    // Month/year selects
    $selectClasses = Ui::classes()
        ->add(
            'h-7 cursor-pointer appearance-none rounded-md border-0 bg-transparent px-2 text-sm font-medium outline-none',
        )
        ->add('text-gray-900 hover:bg-gray-100 focus:bg-gray-100')
        ->add('dark:text-gray-100 dark:hover:bg-gray-750 dark:focus:bg-gray-750');

    // Weekday headers
    $weekdayClasses = Ui::classes()
        ->add('flex size-8 items-center justify-center text-xs font-medium')
        ->add('text-gray-500 dark:text-gray-400');

    // Day buttons
    $dayClasses = Ui::classes()
        ->add('flex size-8 items-center justify-center rounded-md text-sm transition-colors')
        ->add('text-gray-700 hover:bg-gray-100')
        ->add('dark:text-gray-300 dark:hover:bg-gray-750');
@endphp

<div x-data="datepicker({
    value: @js($value),
    displayValue: @js($displayValue),
    displayFormat: @js($displayFormat),
    minDate: @js($minDate),
    maxDate: @js($maxDate),
    months: @js($months),
    placeholder: @js($placeholder),
})" x-modelable="value"
    {{ $attributes->only(['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.defer', 'x-model']) }}
    class="{{ $wrapperClasses }}" style="anchor-scope: {{ $anchor }};" data-datepicker>
    {{-- Trigger --}}
    <button type="button" popovertarget="{{ $popoverId }}" @disabled($disabled)
        @if ($error) aria-invalid="true" @endif aria-haspopup="dialog"
        style="anchor-name: {{ $anchor }};" class="{{ $triggerClasses }}" data-control>
        <span x-text="displayValue || placeholder" :class="{ 'text-gray-400 dark:text-gray-500': !displayValue }"
            class="flex-1 truncate text-left"></span>

        @if ($clearable)
            <button type="button" x-show="value" x-on:click.stop="clear()"
                class="text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300">
                <ui:icon name="x" size="sm" />
            </button>
        @endif

        <ui:icon name="calendar" size="sm" class="shrink-0 text-gray-400 dark:text-gray-500" />
    </button>

    {{-- Hidden input --}}
    <input type="hidden" x-ref="input" @if ($name) name="{{ $name }}" @endif
        @if ($id) id="{{ $id }}" @endif :value="value"
        @disabled($disabled) />

    {{-- Calendar popover --}}
    <div id="{{ $popoverId }}" popover x-ref="calendar" x-on:toggle="onToggle($event)" role="dialog"
        aria-modal="true" aria-label="Choose date"
        style="position-anchor: {{ $anchor }}; top: calc(anchor(bottom) + 0.25rem); left: anchor(left); position-try-fallbacks: --datepicker-top;"
        class="{{ $calendarClasses }}">
        {{-- Header --}}
        <div class="flex items-center justify-between gap-2">
            <button type="button" x-on:click="prevMonth()" :disabled="!canGoPrev()" aria-label="Previous month"
                class="{{ $navButtonClasses }}">
                <ui:icon name="chevron-left" size="sm" />
            </button>

            @if ($showSelects)
                <div class="flex flex-1 items-center justify-center gap-1">
                    <select x-model.number="viewMonth" aria-label="Month" class="{{ $selectClasses }}">
                        <template x-for="(month, index) in months" :key="index">
                            <option :value="index" x-text="month"></option>
                        </template>
                    </select>
                    <select x-model.number="viewYear" aria-label="Year" class="{{ $selectClasses }} w-[4.5rem]">
                        <template x-for="year in yearOptions()" :key="year">
                            <option :value="year" x-text="year"></option>
                        </template>
                    </select>
                </div>
            @else
                <div class="flex-1 text-center text-sm font-medium text-gray-900 dark:text-gray-100"
                    x-text="months[viewMonth] + ' ' + viewYear" aria-live="polite"></div>
            @endif

            <button type="button" x-on:click="nextMonth()" :disabled="!canGoNext()" aria-label="Next month"
                class="{{ $navButtonClasses }}">
                <ui:icon name="chevron-right" size="sm" />
            </button>
        </div>

        {{-- Weekdays --}}
        <div class="grid grid-cols-7 gap-1" role="row">
            @foreach ($weekdays as $day)
                <span class="{{ $weekdayClasses }}" role="columnheader">{{ $day }}</span>
            @endforeach
        </div>

        {{-- Days grid --}}
        <div class="grid grid-cols-7 gap-1" role="grid">
            <template x-for="(day, index) in calendarDays()" :key="index">
                <button type="button" x-on:click="selectDay(day)" :disabled="day.disabled" x-text="day.date"
                    role="gridcell" :aria-selected="day.selected" :aria-current="day.today ? 'date' : false"
                    :class="{
                        'text-gray-300 dark:text-gray-600': day.outside,
                        'font-semibold ring-1 ring-gray-300 dark:ring-gray-600': day.today && !day.selected,
                        'font-semibold bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200': day
                            .selected,
                        'pointer-events-none opacity-50': day.disabled,
                    }"
                    class="{{ $dayClasses }}"></button>
            </template>
        </div>

        {{-- Footer --}}
        @if ($showFooter)
            <div class="flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-740">
                <ui:button variant="ghost" size="sm" x-on:click="clear()">{{ $clearLabel }}</ui:button>
                <ui:button variant="ghost" size="sm" x-on:click="today()">{{ $todayLabel }}</ui:button>
            </div>
        @endif
    </div>
</div>

@once
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('datepicker', (config) => ({
                    value: config.value || '',
                    displayValue: config.displayValue || '',
                    viewYear: null,
                    viewMonth: null,
                    displayFormat: config.displayFormat,
                    minDate: config.minDate,
                    maxDate: config.maxDate,
                    months: config.months,
                    placeholder: config.placeholder,

                    init() {
                        const date = this.value ? this.parseDate(this.value) : new Date();
                        this.viewYear = date.getFullYear();
                        this.viewMonth = date.getMonth();

                        this.$watch('value', (val) => {
                            this.displayValue = val ? this.formatDisplay(this.parseDate(val)) : '';
                            this.dispatchChange();
                        });
                    },

                    onToggle(event) {
                        if (event.newState === 'open') {
                            const date = this.value ? this.parseDate(this.value) : new Date();
                            this.viewYear = date.getFullYear();
                            this.viewMonth = date.getMonth();
                        }
                    },

                    parseDate(str) {
                        if (!str) return null;
                        const [year, month, day] = str.split('-').map(Number);
                        return new Date(year, month - 1, day);
                    },

                    formatValue(date) {
                        const y = date.getFullYear();
                        const m = String(date.getMonth() + 1).padStart(2, '0');
                        const d = String(date.getDate()).padStart(2, '0');
                        return `${y}-${m}-${d}`;
                    },

                    formatDisplay(date) {
                        return this.displayFormat
                            .replace('F', this.months[date.getMonth()])
                            .replace('j', date.getDate())
                            .replace('Y', date.getFullYear());
                    },

                    isDisabled(date) {
                        if (this.minDate) {
                            const min = this.parseDate(this.minDate);
                            min.setHours(0, 0, 0, 0);
                            if (date < min) return true;
                        }
                        if (this.maxDate) {
                            const max = this.parseDate(this.maxDate);
                            max.setHours(23, 59, 59, 999);
                            if (date > max) return true;
                        }
                        return false;
                    },

                    isToday(year, month, day) {
                        const t = new Date();
                        return t.getFullYear() === year && t.getMonth() === month && t.getDate() === day;
                    },

                    isSelected(year, month, day) {
                        if (!this.value) return false;
                        const s = this.parseDate(this.value);
                        return s.getFullYear() === year && s.getMonth() === month && s.getDate() === day;
                    },

                    selectDay(day) {
                        if (day.disabled) return;
                        const date = new Date(day.year, day.month, day.date);
                        this.value = this.formatValue(date);
                        this.$refs.calendar.hidePopover();
                    },

                    clear() {
                        this.value = '';
                        this.$refs.calendar.hidePopover();
                    },

                    today() {
                        const date = new Date();
                        if (!this.isDisabled(date)) {
                            this.value = this.formatValue(date);
                            this.$refs.calendar.hidePopover();
                        }
                    },

                    dispatchChange() {
                        this.$refs.input.dispatchEvent(new Event('input', {
                            bubbles: true
                        }));
                        this.$refs.input.dispatchEvent(new Event('change', {
                            bubbles: true
                        }));
                    },

                    prevMonth() {
                        if (this.viewMonth === 0) {
                            this.viewMonth = 11;
                            this.viewYear--;
                        } else {
                            this.viewMonth--;
                        }
                    },

                    nextMonth() {
                        if (this.viewMonth === 11) {
                            this.viewMonth = 0;
                            this.viewYear++;
                        } else {
                            this.viewMonth++;
                        }
                    },

                    canGoPrev() {
                        if (!this.minDate) return true;
                        const min = this.parseDate(this.minDate);
                        return new Date(this.viewYear, this.viewMonth, 0) >= min;
                    },

                    canGoNext() {
                        if (!this.maxDate) return true;
                        const max = this.parseDate(this.maxDate);
                        return new Date(this.viewYear, this.viewMonth + 1, 1) <= max;
                    },

                    yearOptions() {
                        const currentYear = new Date().getFullYear();
                        const minYear = this.minDate ? this.parseDate(this.minDate).getFullYear() :
                            currentYear - 100;
                        const maxYear = this.maxDate ? this.parseDate(this.maxDate).getFullYear() :
                            currentYear + 10;
                        return Array.from({
                            length: maxYear - minYear + 1
                        }, (_, i) => minYear + i);
                    },

                    calendarDays() {
                        const days = [];
                        const firstDay = new Date(this.viewYear, this.viewMonth, 1).getDay();
                        const daysInMonth = new Date(this.viewYear, this.viewMonth + 1, 0).getDate();
                        const daysInPrevMonth = new Date(this.viewYear, this.viewMonth, 0).getDate();

                        // Previous month days
                        for (let i = firstDay - 1; i >= 0; i--) {
                            const date = daysInPrevMonth - i;
                            const d = new Date(this.viewYear, this.viewMonth - 1, date);
                            days.push({
                                date,
                                month: this.viewMonth - 1,
                                year: this.viewYear,
                                outside: true,
                                disabled: this.isDisabled(d),
                            });
                        }

                        // Current month days
                        for (let date = 1; date <= daysInMonth; date++) {
                            const d = new Date(this.viewYear, this.viewMonth, date);
                            days.push({
                                date,
                                month: this.viewMonth,
                                year: this.viewYear,
                                outside: false,
                                disabled: this.isDisabled(d),
                                today: this.isToday(this.viewYear, this.viewMonth, date),
                                selected: this.isSelected(this.viewYear, this.viewMonth, date),
                            });
                        }

                        // Next month days
                        const totalCells = firstDay + daysInMonth;
                        const remaining = totalCells <= 35 ? 35 - totalCells : 42 - totalCells;
                        for (let date = 1; date <= remaining; date++) {
                            const d = new Date(this.viewYear, this.viewMonth + 1, date);
                            days.push({
                                date,
                                month: this.viewMonth + 1,
                                year: this.viewYear,
                                outside: true,
                                disabled: this.isDisabled(d),
                            });
                        }

                        return days;
                    },
                }));
            });
        </script>
    @endpush
@endonce
