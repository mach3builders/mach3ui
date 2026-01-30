@props([
    'clearLabel' => 'Clear',
    'disabled' => false,
    'displayFormat' => null,
    'endModel' => null,
    'endName' => 'end_date',
    'endValue' => null,
    'locale' => 'en',
    'maxDate' => null,
    'minDate' => null,
    'placeholder' => 'Select date range',
    'separator' => '–',
    'showFooter' => false,
    'showSelects' => false,
    'startModel' => null,
    'startName' => 'start_date',
    'startValue' => null,
    'todayLabel' => 'Today',
    'weekdays' => null,
])

@php
    $id = 'daterange-' . uniqid();

    $locales = [
        'en' => [
            'weekdays' => ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            'months' => [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December',
            ],
            'displayFormat' => 'M j, Y',
        ],
        'nl' => [
            'weekdays' => ['Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za'],
            'months' => [
                'Januari',
                'Februari',
                'Maart',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Augustus',
                'September',
                'Oktober',
                'November',
                'December',
            ],
            'displayFormat' => 'j M Y',
        ],
    ];

    $locale_data = $locales[$locale] ?? $locales['en'];
    $weekday_labels = $weekdays ?? $locale_data['weekdays'];
    $display_format = $displayFormat ?? $locale_data['displayFormat'];

    $format_display = function ($value, $locale, $display_format, $locale_data) {
        if (!$value) {
            return null;
        }
        try {
            return \Carbon\Carbon::parse($value)
                ->locale($locale)
                ->isoFormat(str_replace(['M', 'j', 'Y'], ['MMM', 'D', 'YYYY'], $display_format));
        } catch (\Exception $e) {
            return $value;
        }
    };

    $start_display = $format_display($startValue, $locale, $display_format, $locale_data);
    $end_display = $format_display($endValue, $locale, $display_format, $locale_data);
@endphp

<div x-data="{
    startDate: @js($startValue),
    endDate: @js($endValue),
    startDisplay: @js($start_display),
    endDisplay: @js($end_display),
    selecting: 'start',
    leftYear: null,
    leftMonth: null,
    rightYear: null,
    rightMonth: null,
    placeholder: @js($placeholder),
    separator: @js($separator),
    minDate: @js($minDate),
    maxDate: @js($maxDate),
    months: @js($locale_data['months']),
    monthsShort: @js(array_map(fn($m) => substr($m, 0, 3), $locale_data['months'])),
    displayFormat: @js($display_format),

    init() {
        const today = new Date();
        const startRef = this.startDate ? this.parseDate(this.startDate) : today;

        this.leftYear = startRef.getFullYear();
        this.leftMonth = startRef.getMonth();
        this.syncRightCalendar();
    },

    syncRightCalendar() {
        if (this.leftMonth === 11) {
            this.rightYear = this.leftYear + 1;
            this.rightMonth = 0;
        } else {
            this.rightYear = this.leftYear;
            this.rightMonth = this.leftMonth + 1;
        }
    },

    parseDate(str) {
        if (!str) return null;
        const [year, month, day] = str.split('-').map(Number);
        return new Date(year, month - 1, day);
    },

    formatValue(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    },

    formatDisplay(date) {
        const year = date.getFullYear();
        const month = this.monthsShort[date.getMonth()];
        const day = date.getDate();
        return this.displayFormat
            .replace('M', month)
            .replace('j', day)
            .replace('Y', year);
    },

    getDaysInMonth(year, month) {
        return new Date(year, month + 1, 0).getDate();
    },

    getFirstDayOfMonth(year, month) {
        return new Date(year, month, 1).getDay();
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
        const today = new Date();
        return today.getFullYear() === year && today.getMonth() === month && today.getDate() === day;
    },

    isStartDate(year, month, day) {
        if (!this.startDate) return false;
        const start = this.parseDate(this.startDate);
        return start.getFullYear() === year && start.getMonth() === month && start.getDate() === day;
    },

    isEndDate(year, month, day) {
        if (!this.endDate) return false;
        const end = this.parseDate(this.endDate);
        return end.getFullYear() === year && end.getMonth() === month && end.getDate() === day;
    },

    isInRange(year, month, day) {
        if (!this.startDate || !this.endDate) return false;
        const date = new Date(year, month, day);
        const start = this.parseDate(this.startDate);
        const end = this.parseDate(this.endDate);
        return date > start && date < end;
    },

    selectDate(year, month, day) {
        const date = new Date(year, month, day);
        if (this.isDisabled(date)) return;

        const value = this.formatValue(date);
        const display = this.formatDisplay(date);

        if (this.selecting === 'start') {
            this.startDate = value;
            this.startDisplay = display;
            this.endDate = null;
            this.endDisplay = null;
            this.selecting = 'end';
            this.dispatchInputEvents();
        } else {
            if (this.parseDate(value) < this.parseDate(this.startDate)) {
                this.startDate = value;
                this.startDisplay = display;
                this.endDate = null;
                this.endDisplay = null;
                this.selecting = 'end';
            } else {
                this.endDate = value;
                this.endDisplay = display;
                this.selecting = 'start';
                this.$refs.calendar.hidePopover();
            }
            this.dispatchInputEvents();
        }
    },

    dispatchInputEvents() {
        this.$refs.startInput.value = this.startDate || '';
        this.$refs.endInput.value = this.endDate || '';
        this.$refs.startInput.dispatchEvent(new Event('input', { bubbles: true }));
        this.$refs.startInput.dispatchEvent(new Event('change', { bubbles: true }));
        this.$refs.endInput.dispatchEvent(new Event('input', { bubbles: true }));
        this.$refs.endInput.dispatchEvent(new Event('change', { bubbles: true }));
    },

    clear() {
        this.startDate = null;
        this.endDate = null;
        this.startDisplay = null;
        this.endDisplay = null;
        this.selecting = 'start';
        this.dispatchInputEvents();
    },

    today() {
        const date = new Date();
        if (!this.isDisabled(date)) {
            this.selectDate(date.getFullYear(), date.getMonth(), date.getDate());
        }
    },

    prevMonth() {
        if (this.leftMonth === 0) {
            this.leftMonth = 11;
            this.leftYear--;
        } else {
            this.leftMonth--;
        }
        this.syncRightCalendar();
    },

    nextMonth() {
        if (this.leftMonth === 11) {
            this.leftMonth = 0;
            this.leftYear++;
        } else {
            this.leftMonth++;
        }
        this.syncRightCalendar();
    },

    canGoPrev() {
        if (!this.minDate) return true;
        const min = this.parseDate(this.minDate);
        const prevMonthEnd = new Date(this.leftYear, this.leftMonth, 0);
        return prevMonthEnd >= min;
    },

    canGoNext() {
        if (!this.maxDate) return true;
        const max = this.parseDate(this.maxDate);
        const nextMonthStart = new Date(this.rightYear, this.rightMonth + 1, 1);
        return nextMonthStart <= max;
    },

    getCalendarDays(year, month) {
        const days = [];
        const firstDay = this.getFirstDayOfMonth(year, month);
        const daysInMonth = this.getDaysInMonth(year, month);
        const daysInPrevMonth = this.getDaysInMonth(year, month - 1);

        for (let i = firstDay - 1; i >= 0; i--) {
            const day = daysInPrevMonth - i;
            const date = new Date(year, month - 1, day);
            days.push({ day, month: month - 1, year, outside: true, disabled: this.isDisabled(date) });
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(year, month, day);
            days.push({
                day,
                month,
                year,
                outside: false,
                disabled: this.isDisabled(date),
                today: this.isToday(year, month, day),
                isStart: this.isStartDate(year, month, day),
                isEnd: this.isEndDate(year, month, day),
                inRange: this.isInRange(year, month, day)
            });
        }

        const totalCells = firstDay + daysInMonth;
        const remainingCells = totalCells <= 35 ? 35 - totalCells : 42 - totalCells;
        for (let day = 1; day <= remainingCells; day++) {
            const date = new Date(year, month + 1, day);
            days.push({ day, month: month + 1, year, outside: true, disabled: this.isDisabled(date) });
        }

        return days;
    },

    onOpen() {
        const startRef = this.startDate ? this.parseDate(this.startDate) : new Date();
        this.leftYear = startRef.getFullYear();
        this.leftMonth = startRef.getMonth();
        this.syncRightCalendar();
    },

    getYearOptions() {
        const years = [];
        const currentYear = new Date().getFullYear();
        const minYear = this.minDate ? this.parseDate(this.minDate).getFullYear() : currentYear - 100;
        const maxYear = this.maxDate ? this.parseDate(this.maxDate).getFullYear() : currentYear + 10;
        for (let y = minYear; y <= maxYear; y++) {
            years.push(y);
        }
        return years;
    },

    get displayText() {
        if (this.startDisplay && this.endDisplay) {
            return this.startDisplay + ' ' + this.separator + ' ' + this.endDisplay;
        }
        if (this.startDisplay) {
            return this.startDisplay + ' ' + this.separator + ' ...';
        }
        return this.placeholder;
    }
}" {{ $attributes->class(['relative inline-block select-none'])->only('class') }}
    style="anchor-scope: --daterange-trigger;" data-daterange>
    <button type="button" popovertarget="{{ $id }}" @disabled($disabled)
        class="flex h-10 w-full items-center gap-2 rounded-md border px-3 text-sm shadow-xs
               border-gray-140 bg-white text-gray-900 focus:border-gray-400 focus:outline-none
               dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:focus:border-gray-500
               disabled:cursor-not-allowed disabled:opacity-50"
        style="anchor-name: --daterange-trigger;">
        <span x-text="displayText" :class="{ 'text-gray-400 dark:text-gray-500': !startDisplay }"></span>

        <ui:icon name="calendar" class="ml-auto size-4 shrink-0 text-gray-400 dark:text-gray-500" />
    </button>

    <input type="hidden" x-ref="startInput" name="{{ $startName }}" :value="startDate"
        @if ($startModel) wire:model="{{ $startModel }}" @endif
        @disabled($disabled) />

    <input type="hidden" x-ref="endInput" name="{{ $endName }}" :value="endDate"
        @if ($endModel) wire:model="{{ $endModel }}" @endif
        @disabled($disabled) />

    <div x-ref="calendar" x-on:toggle="if ($event.newState === 'open') onOpen()" id="{{ $id }}" popover
        class="m-0 flex-col gap-3 rounded-lg border p-3 shadow-lg
               border-gray-100 bg-white
               dark:border-gray-740 dark:bg-gray-790
               [&:popover-open]:flex"
        style="position-anchor: --daterange-trigger; top: calc(anchor(bottom) + 0.25rem); left: anchor(left); position-try-fallbacks: --daterange-top;">
        <div class="flex gap-4">
            <div class="w-64">
                <div class="mb-3 flex items-center justify-between gap-2">
                    <button type="button" x-on:click="prevMonth()" :disabled="!canGoPrev()"
                        class="flex size-7 items-center justify-center rounded-md
                               text-gray-600 hover:bg-gray-100
                               dark:text-gray-400 dark:hover:bg-gray-750
                               disabled:pointer-events-none disabled:opacity-50">
                        <ui:icon name="chevron-left" class="size-4" />
                    </button>

                    @if ($showSelects)
                        <div class="flex flex-1 items-center justify-center gap-1">
                            <select x-model.number="leftMonth" x-on:change="syncRightCalendar()"
                                class="h-7 cursor-pointer appearance-none rounded-md border-0 bg-transparent px-1 text-sm font-medium outline-none
                                       text-gray-900 hover:bg-gray-100 focus:bg-gray-100
                                       dark:text-gray-100 dark:hover:bg-gray-750 dark:focus:bg-gray-750">
                                <template x-for="(month, index) in months" :key="index">
                                    <option :value="index" x-text="month"></option>
                                </template>
                            </select>

                            <select x-model.number="leftYear" x-on:change="syncRightCalendar()"
                                class="h-7 w-16 cursor-pointer appearance-none rounded-md border-0 bg-transparent px-1 text-sm font-medium outline-none
                                       text-gray-900 hover:bg-gray-100 focus:bg-gray-100
                                       dark:text-gray-100 dark:hover:bg-gray-750 dark:focus:bg-gray-750">
                                <template x-for="year in getYearOptions()" :key="year">
                                    <option :value="year" x-text="year"></option>
                                </template>
                            </select>
                        </div>
                    @else
                        <div class="flex-1 text-center text-sm font-medium text-gray-900 dark:text-gray-100"
                            x-text="months[leftMonth] + ' ' + leftYear"></div>
                    @endif

                    <div class="size-7"></div>
                </div>

                <div class="grid grid-cols-7 gap-1">
                    @foreach ($weekday_labels as $day)
                        <span
                            class="flex size-8 items-center justify-center text-xs font-medium text-gray-500 dark:text-gray-400">{{ $day }}</span>
                    @endforeach
                </div>

                <div class="grid grid-cols-7 gap-1">
                    <template x-for="(d, index) in getCalendarDays(leftYear, leftMonth)" :key="'left-' + index">
                        <button type="button" x-on:click="selectDate(d.year, d.month, d.day)" :disabled="d.disabled"
                            x-text="d.day"
                            :class="{
                                'text-gray-300 dark:text-gray-600': d.outside,
                                'font-semibold bg-gray-100 text-gray-900 dark:bg-gray-750 dark:text-gray-100': d
                                    .today && !d.isStart && !d.isEnd,
                                'font-semibold bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200': d
                                    .isStart || d.isEnd,
                                'bg-gray-100 dark:bg-gray-750': d.inRange,
                                'pointer-events-none opacity-50': d.disabled
                            }"
                            class="flex size-8 items-center justify-center rounded-md text-sm
                                   text-gray-700 hover:bg-gray-100
                                   dark:text-gray-300 dark:hover:bg-gray-750"></button>
                    </template>
                </div>
            </div>

            <div class="w-px bg-gray-100 dark:bg-gray-740"></div>

            <div class="w-64">
                <div class="mb-3 flex items-center justify-between gap-2">
                    <div class="size-7"></div>

                    @if ($showSelects)
                        <div class="flex flex-1 items-center justify-center gap-1">
                            <select x-model.number="rightMonth" disabled
                                class="h-7 cursor-not-allowed appearance-none rounded-md border-0 bg-transparent px-1 text-sm font-medium opacity-70 outline-none
                                       text-gray-900
                                       dark:text-gray-100">
                                <template x-for="(month, index) in months" :key="index">
                                    <option :value="index" x-text="month"></option>
                                </template>
                            </select>

                            <select x-model.number="rightYear" disabled
                                class="h-7 w-16 cursor-not-allowed appearance-none rounded-md border-0 bg-transparent px-1 text-sm font-medium opacity-70 outline-none
                                       text-gray-900
                                       dark:text-gray-100">
                                <template x-for="year in getYearOptions()" :key="year">
                                    <option :value="year" x-text="year"></option>
                                </template>
                            </select>
                        </div>
                    @else
                        <div class="flex-1 text-center text-sm font-medium text-gray-900 dark:text-gray-100"
                            x-text="months[rightMonth] + ' ' + rightYear"></div>
                    @endif

                    <button type="button" x-on:click="nextMonth()" :disabled="!canGoNext()"
                        class="flex size-7 items-center justify-center rounded-md
                               text-gray-600 hover:bg-gray-100
                               dark:text-gray-400 dark:hover:bg-gray-750
                               disabled:pointer-events-none disabled:opacity-50">
                        <ui:icon name="chevron-right" class="size-4" />
                    </button>
                </div>

                <div class="grid grid-cols-7 gap-1">
                    @foreach ($weekday_labels as $day)
                        <span
                            class="flex size-8 items-center justify-center text-xs font-medium text-gray-500 dark:text-gray-400">{{ $day }}</span>
                    @endforeach
                </div>

                <div class="grid grid-cols-7 gap-1">
                    <template x-for="(d, index) in getCalendarDays(rightYear, rightMonth)" :key="'right-' + index">
                        <button type="button" x-on:click="selectDate(d.year, d.month, d.day)" :disabled="d.disabled"
                            x-text="d.day"
                            :class="{
                                'text-gray-300 dark:text-gray-600': d.outside,
                                'font-semibold bg-gray-100 text-gray-900 dark:bg-gray-750 dark:text-gray-100': d
                                    .today && !d.isStart && !d.isEnd,
                                'font-semibold bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200': d
                                    .isStart || d.isEnd,
                                'bg-gray-100 dark:bg-gray-750': d.inRange,
                                'pointer-events-none opacity-50': d.disabled
                            }"
                            class="flex size-8 items-center justify-center rounded-md text-sm
                                   text-gray-700 hover:bg-gray-100
                                   dark:text-gray-300 dark:hover:bg-gray-750"></button>
                    </template>
                </div>
            </div>
        </div>

        @if ($showFooter)
            <div class="flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-740">
                <ui:button variant="ghost" size="sm" x-on:click="clear()">{{ $clearLabel }}</ui:button>

                <ui:button size="sm" x-on:click="today()">{{ $todayLabel }}</ui:button>
            </div>
        @endif
    </div>
</div>
