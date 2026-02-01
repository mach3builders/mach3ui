@props([
    'clearLabel' => null,
    'disabled' => false,
    'displayFormat' => null,
    'endModel' => null,
    'endName' => 'end_date',
    'endValue' => null,
    'locale' => null,
    'maxDate' => null,
    'minDate' => null,
    'placeholder' => null,
    'separator' => '–',
    'showFooter' => false,
    'showSelects' => false,
    'startModel' => null,
    'startName' => 'start_date',
    'startValue' => null,
    'todayLabel' => null,
    'weekdays' => null,
])

@php
    $id = uniqid('daterange-');
    $locale = $locale ?? app()->getLocale();

    // Extract x-model attribute
    $xModel = null;
    foreach ($attributes as $key => $val) {
        if (str_starts_with($key, 'x-model')) {
            $xModel = $val;
            break;
        }
    }

    // Derive names from x-model if not explicitly set
    $resolvedStartName = $startName !== 'start_date' ? $startName : ($xModel ? "{$xModel}[start]" : $startName);
    $resolvedEndName = $endName !== 'end_date' ? $endName : ($xModel ? "{$xModel}[end]" : $endName);

    $localeData = [
        'weekdays' => __('ui::ui.weekdays', [], $locale),
        'months' => __('ui::ui.months', [], $locale),
        'displayFormat' => __('ui::ui.daterange.display_format', [], $locale),
    ];

    $weekdayLabels = $weekdays ?? $localeData['weekdays'];
    $resolvedDisplayFormat = $displayFormat ?? $localeData['displayFormat'];
    $resolvedPlaceholder = $placeholder ?? __('ui::ui.daterange.placeholder', [], $locale);
    $resolvedClearLabel = $clearLabel ?? __('ui::ui.clear', [], $locale);
    $resolvedTodayLabel = $todayLabel ?? __('ui::ui.today', [], $locale);

    $formatDisplayValue = function ($value, $locale, $format) {
        if (!$value) {
            return null;
        }
        try {
            return \Carbon\Carbon::parse($value)
                ->locale($locale)
                ->isoFormat(str_replace(['M', 'j', 'Y'], ['MMM', 'D', 'YYYY'], $format));
        } catch (\Exception $e) {
            return $value;
        }
    };

    $startDisplayValue = $formatDisplayValue($startValue, $locale, $resolvedDisplayFormat);
    $endDisplayValue = $formatDisplayValue($endValue, $locale, $resolvedDisplayFormat);

    $classes = Ui::classes()->add('relative inline-block select-none')->merge($attributes->only('class'));

    $triggerClasses = Ui::classes()
        ->add('flex h-10 w-full items-center gap-2 rounded-md border px-3 text-sm shadow-xs')
        ->add('border-gray-140 bg-white text-gray-900 focus:border-gray-400 focus:outline-none')
        ->add('dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:focus:border-gray-500')
        ->add('disabled:cursor-not-allowed disabled:opacity-50');

    $calendarClasses = Ui::classes()
        ->add('m-0 flex-col gap-3 rounded-lg border p-3 shadow-lg')
        ->add('border-gray-100 bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-790')
        ->add('[&:popover-open]:flex');

    $navButtonClasses = Ui::classes()
        ->add('flex size-7 items-center justify-center rounded-md')
        ->add('text-gray-600 hover:bg-gray-100')
        ->add('dark:text-gray-400 dark:hover:bg-gray-750')
        ->add('disabled:pointer-events-none disabled:opacity-50');

    $selectClasses = Ui::classes()
        ->add(
            'h-7 cursor-pointer appearance-none rounded-md border-0 bg-transparent px-1 text-sm font-medium outline-none',
        )
        ->add('text-gray-900 hover:bg-gray-100 focus:bg-gray-100')
        ->add('dark:text-gray-100 dark:hover:bg-gray-750 dark:focus:bg-gray-750');

    $disabledSelectClasses = Ui::classes()
        ->add(
            'h-7 cursor-not-allowed appearance-none rounded-md border-0 bg-transparent px-1 text-sm font-medium opacity-70 outline-none',
        )
        ->add('text-gray-900')
        ->add('dark:text-gray-100');

    $weekdayClasses = Ui::classes()
        ->add('flex size-8 items-center justify-center text-xs font-medium')
        ->add('text-gray-500')
        ->add('dark:text-gray-400');

    $dayClasses = Ui::classes()
        ->add('flex size-8 items-center justify-center rounded-md text-sm')
        ->add('text-gray-700 hover:bg-gray-100')
        ->add('dark:text-gray-300 dark:hover:bg-gray-750');
@endphp

<div class="{{ $classes }}" {{ $attributes->only('data-*') }} style="anchor-scope: --daterange-trigger;"
    x-modelable="range" {{ $attributes->whereStartsWith('x-model') }} x-data="{
        startDate: @js($startValue),
        endDate: @js($endValue),
        startDisplay: @js($startDisplayValue),
        endDisplay: @js($endDisplayValue),
        selecting: 'start',
        leftYear: null,
        leftMonth: null,
        rightYear: null,
        rightMonth: null,
        placeholder: @js($resolvedPlaceholder),
        separator: @js($separator),
        minDate: @js($minDate),
        maxDate: @js($maxDate),
        months: @js($localeData['months']),
        monthsShort: @js(array_map(fn($m) => substr($m, 0, 3), $localeData['months'])),
        displayFormat: @js($resolvedDisplayFormat),
    
        get range() {
            return { start: this.startDate, end: this.endDate };
        },
        set range(val) {
            this.startDate = val?.start || null;
            this.endDate = val?.end || null;
            this.startDisplay = this.startDate ? this.formatDisplay(this.parseDate(this.startDate)) : null;
            this.endDisplay = this.endDate ? this.formatDisplay(this.parseDate(this.endDate)) : null;
        },
    
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
    }" data-daterange>
    <button type="button" class="{{ $triggerClasses }}" popovertarget="{{ $id }}" @disabled($disabled)
        style="anchor-name: --daterange-trigger;" data-daterange-trigger>
        <span x-text="displayText" :class="{ 'text-gray-400 dark:text-gray-500': !startDisplay }"></span>

        <ui:icon name="calendar" class="ml-auto size-4 shrink-0 text-gray-400 dark:text-gray-500" />
    </button>

    <input type="hidden" x-ref="startInput" name="{{ $resolvedStartName }}" :value="startDate"
        @if ($startModel) wire:model="{{ $startModel }}" @endif @disabled($disabled) />

    <input type="hidden" x-ref="endInput" name="{{ $resolvedEndName }}" :value="endDate"
        @if ($endModel) wire:model="{{ $endModel }}" @endif @disabled($disabled) />

    <div class="{{ $calendarClasses }}" x-ref="calendar" x-on:toggle="if ($event.newState === 'open') onOpen()"
        id="{{ $id }}" popover
        style="position-anchor: --daterange-trigger; top: calc(anchor(bottom) + 0.25rem); left: anchor(left); position-try-fallbacks: --daterange-top;"
        data-daterange-calendar>
        <div class="flex gap-4">
            <div class="w-64" data-daterange-left>
                <div class="mb-3 flex items-center justify-between gap-2">
                    <button type="button" class="{{ $navButtonClasses }}" x-on:click="prevMonth()"
                        :disabled="!canGoPrev()">
                        <ui:icon name="chevron-left" class="size-4" />
                    </button>

                    @if ($showSelects)
                        <div class="flex flex-1 items-center justify-center gap-1">
                            <select class="{{ $selectClasses }}" x-model.number="leftMonth"
                                x-on:change="syncRightCalendar()">
                                <template x-for="(month, index) in months" :key="index">
                                    <option :value="index" x-text="month"></option>
                                </template>
                            </select>
                            <select class="{{ $selectClasses }} w-16" x-model.number="leftYear"
                                x-on:change="syncRightCalendar()">
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
                    @foreach ($weekdayLabels as $day)
                        <span class="{{ $weekdayClasses }}">{{ $day }}</span>
                    @endforeach
                </div>

                <div class="grid grid-cols-7 gap-1">
                    <template x-for="(d, index) in getCalendarDays(leftYear, leftMonth)" :key="'left-' + index">
                        <button type="button" class="{{ $dayClasses }}"
                            x-on:click="selectDate(d.year, d.month, d.day)" :disabled="d.disabled" x-text="d.day"
                            :class="{
                                'text-gray-300 dark:text-gray-600': d.outside,
                                'font-semibold bg-gray-100 text-gray-900 dark:bg-gray-750 dark:text-gray-100': d
                                    .today && !d.isStart && !d.isEnd,
                                'font-semibold bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200': d
                                    .isStart || d.isEnd,
                                'bg-gray-100 dark:bg-gray-750': d.inRange,
                                'pointer-events-none opacity-50': d.disabled
                            }"></button>
                    </template>
                </div>
            </div>

            <div class="w-px bg-gray-100 dark:bg-gray-740"></div>

            <div class="w-64" data-daterange-right>
                <div class="mb-3 flex items-center justify-between gap-2">
                    <div class="size-7"></div>

                    @if ($showSelects)
                        <div class="flex flex-1 items-center justify-center gap-1">
                            <select class="{{ $disabledSelectClasses }}" x-model.number="rightMonth" disabled>
                                <template x-for="(month, index) in months" :key="index">
                                    <option :value="index" x-text="month"></option>
                                </template>
                            </select>
                            <select class="{{ $disabledSelectClasses }} w-16" x-model.number="rightYear" disabled>
                                <template x-for="year in getYearOptions()" :key="year">
                                    <option :value="year" x-text="year"></option>
                                </template>
                            </select>
                        </div>
                    @else
                        <div class="flex-1 text-center text-sm font-medium text-gray-900 dark:text-gray-100"
                            x-text="months[rightMonth] + ' ' + rightYear"></div>
                    @endif

                    <button type="button" class="{{ $navButtonClasses }}" x-on:click="nextMonth()"
                        :disabled="!canGoNext()">
                        <ui:icon name="chevron-right" class="size-4" />
                    </button>
                </div>

                <div class="grid grid-cols-7 gap-1">
                    @foreach ($weekdayLabels as $day)
                        <span class="{{ $weekdayClasses }}">{{ $day }}</span>
                    @endforeach
                </div>

                <div class="grid grid-cols-7 gap-1">
                    <template x-for="(d, index) in getCalendarDays(rightYear, rightMonth)" :key="'right-' + index">
                        <button type="button" class="{{ $dayClasses }}"
                            x-on:click="selectDate(d.year, d.month, d.day)" :disabled="d.disabled" x-text="d.day"
                            :class="{
                                'text-gray-300 dark:text-gray-600': d.outside,
                                'font-semibold bg-gray-100 text-gray-900 dark:bg-gray-750 dark:text-gray-100': d
                                    .today && !d.isStart && !d.isEnd,
                                'font-semibold bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200': d
                                    .isStart || d.isEnd,
                                'bg-gray-100 dark:bg-gray-750': d.inRange,
                                'pointer-events-none opacity-50': d.disabled
                            }"></button>
                    </template>
                </div>
            </div>
        </div>

        @if ($showFooter)
            <div class="flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-740"
                data-daterange-footer>
                <ui:button variant="ghost" size="sm" x-on:click="clear()">{{ $clearLabel }}</ui:button>
                <ui:button size="sm" x-on:click="today()">{{ $todayLabel }}</ui:button>
            </div>
        @endif
    </div>
</div>
