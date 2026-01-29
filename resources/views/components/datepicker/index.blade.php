@props([
    'clearLabel' => 'Clear',
    'disabled' => false,
    'displayFormat' => null,
    'locale' => 'en',
    'maxDate' => null,
    'minDate' => null,
    'name' => null,
    'placeholder' => 'Pick a date',
    'showFooter' => false,
    'showSelects' => false,
    'todayLabel' => 'Today',
    'value' => null,
    'weekdays' => null,
])

@php
    $id = 'datepicker-' . uniqid();

    $locales = [
        'en' => [
            'weekdays' => ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            'months' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'displayFormat' => 'F j, Y',
        ],
        'nl' => [
            'weekdays' => ['Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za'],
            'months' => ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'],
            'displayFormat' => 'j F Y',
        ],
    ];

    $locale_data = $locales[$locale] ?? $locales['en'];
    $weekday_labels = $weekdays ?? $locale_data['weekdays'];
    $display_format = $displayFormat ?? $locale_data['displayFormat'];

    $display_value = null;
    if ($value) {
        try {
            $display_value = \Carbon\Carbon::parse($value)->locale($locale)->isoFormat(
                str_replace(['F', 'j', 'Y'], ['MMMM', 'D', 'YYYY'], $display_format)
            );
        } catch (\Exception $e) {
            $display_value = $value;
        }
    }
@endphp

<div
    x-data="{
        value: @js($value),
        displayValue: @js($display_value),
        viewYear: null,
        viewMonth: null,
        placeholder: @js($placeholder),
        minDate: @js($minDate),
        maxDate: @js($maxDate),
        months: @js($locale_data['months']),
        displayFormat: @js($display_format),

        init() {
            const date = this.value ? this.parseDate(this.value) : new Date();
            this.viewYear = date.getFullYear();
            this.viewMonth = date.getMonth();

            if (this.minDate) {
                const min = this.parseDate(this.minDate);
                if (date < min) {
                    this.viewYear = min.getFullYear();
                    this.viewMonth = min.getMonth();
                }
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
            const month = this.months[date.getMonth()];
            const day = date.getDate();
            return this.displayFormat
                .replace('F', month)
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

        isSelected(year, month, day) {
            if (!this.value) return false;
            const selected = this.parseDate(this.value);
            return selected.getFullYear() === year && selected.getMonth() === month && selected.getDate() === day;
        },

        selectDate(year, month, day) {
            const date = new Date(year, month, day);
            if (this.isDisabled(date)) return;

            this.value = this.formatValue(date);
            this.displayValue = this.formatDisplay(date);

            this.$refs.input.value = this.value;
            this.$refs.input.dispatchEvent(new Event('input', { bubbles: true }));
            this.$refs.input.dispatchEvent(new Event('change', { bubbles: true }));

            this.$refs.calendar.hidePopover();
        },

        clear() {
            this.value = '';
            this.displayValue = '';
            this.$refs.input.value = '';
            this.$refs.input.dispatchEvent(new Event('input', { bubbles: true }));
            this.$refs.input.dispatchEvent(new Event('change', { bubbles: true }));
            this.$refs.calendar.hidePopover();
        },

        today() {
            const date = new Date();
            if (!this.isDisabled(date)) {
                this.selectDate(date.getFullYear(), date.getMonth(), date.getDate());
            }
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
            const prevMonthEnd = new Date(this.viewYear, this.viewMonth, 0);
            return prevMonthEnd >= min;
        },

        canGoNext() {
            if (!this.maxDate) return true;
            const max = this.parseDate(this.maxDate);
            const nextMonthStart = new Date(this.viewYear, this.viewMonth + 1, 1);
            return nextMonthStart <= max;
        },

        getCalendarDays() {
            const days = [];
            const firstDay = this.getFirstDayOfMonth(this.viewYear, this.viewMonth);
            const daysInMonth = this.getDaysInMonth(this.viewYear, this.viewMonth);
            const daysInPrevMonth = this.getDaysInMonth(this.viewYear, this.viewMonth - 1);

            for (let i = firstDay - 1; i >= 0; i--) {
                const day = daysInPrevMonth - i;
                const date = new Date(this.viewYear, this.viewMonth - 1, day);
                days.push({ day, month: this.viewMonth - 1, year: this.viewYear, outside: true, disabled: this.isDisabled(date) });
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const date = new Date(this.viewYear, this.viewMonth, day);
                days.push({
                    day,
                    month: this.viewMonth,
                    year: this.viewYear,
                    outside: false,
                    disabled: this.isDisabled(date),
                    today: this.isToday(this.viewYear, this.viewMonth, day),
                    selected: this.isSelected(this.viewYear, this.viewMonth, day)
                });
            }

            const totalCells = firstDay + daysInMonth;
            const remainingCells = totalCells <= 35 ? 35 - totalCells : 42 - totalCells;
            for (let day = 1; day <= remainingCells; day++) {
                const date = new Date(this.viewYear, this.viewMonth + 1, day);
                days.push({ day, month: this.viewMonth + 1, year: this.viewYear, outside: true, disabled: this.isDisabled(date) });
            }

            return days;
        },

        onOpen() {
            const date = this.value ? this.parseDate(this.value) : new Date();
            this.viewYear = date.getFullYear();
            this.viewMonth = date.getMonth();
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
        }
    }"
    {{ $attributes->class(['relative inline-block select-none'])->only('class') }}
    style="anchor-scope: --datepicker-trigger;"
    data-datepicker
>
    <button
        type="button"
        popovertarget="{{ $id }}"
        @disabled($disabled)
        class="flex h-10 w-full items-center gap-2 rounded-md border px-3 text-sm shadow-xs
               border-gray-140 bg-white text-gray-900 focus:border-gray-400 focus:outline-none
               dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:focus:border-gray-500
               disabled:cursor-not-allowed disabled:opacity-50"
        style="anchor-name: --datepicker-trigger;"
    >
        <span
            x-text="displayValue || placeholder"
            :class="{ 'text-gray-400 dark:text-gray-500': !displayValue }"
        ></span>

        <ui:icon name="calendar" class="ml-auto size-4 shrink-0 text-gray-400 dark:text-gray-500" />
    </button>

    <input
        type="hidden"
        x-ref="input"
        @if ($name) name="{{ $name }}" @endif
        :value="value"
        {{ $attributes->whereStartsWith('wire:model') }}
        @disabled($disabled)
    />

    <div
        x-ref="calendar"
        x-on:toggle="if ($event.newState === 'open') onOpen()"
        id="{{ $id }}"
        popover
        class="m-0 w-72 flex-col gap-3 rounded-lg border p-3 shadow-lg
               border-gray-100 bg-white
               dark:border-gray-740 dark:bg-gray-790
               [&:popover-open]:flex"
        style="position-anchor: --datepicker-trigger; top: calc(anchor(bottom) + 0.25rem); left: anchor(left);"
    >
        <div class="flex items-center justify-between gap-2">
            <div class="flex items-center gap-1">
                <button
                    type="button"
                    x-on:click="prevMonth()"
                    :disabled="!canGoPrev()"
                    class="flex size-7 items-center justify-center rounded-md
                           text-gray-600 hover:bg-gray-100
                           dark:text-gray-400 dark:hover:bg-gray-750
                           disabled:pointer-events-none disabled:opacity-50"
                >
                    <ui:icon name="chevron-left" class="size-4" />
                </button>
            </div>

            @if ($showSelects)
                <div class="flex flex-1 items-center justify-center gap-1">
                    <select
                        x-model.number="viewMonth"
                        class="h-7 cursor-pointer appearance-none rounded-md border-0 bg-transparent px-2 text-sm font-medium outline-none
                               text-gray-900 hover:bg-gray-100 focus:bg-gray-100
                               dark:text-gray-100 dark:hover:bg-gray-750 dark:focus:bg-gray-750"
                    >
                        <template x-for="(month, index) in months" :key="index">
                            <option :value="index" x-text="month"></option>
                        </template>
                    </select>

                    <select
                        x-model.number="viewYear"
                        class="h-7 w-[4.5rem] cursor-pointer appearance-none rounded-md border-0 bg-transparent px-2 text-sm font-medium outline-none
                               text-gray-900 hover:bg-gray-100 focus:bg-gray-100
                               dark:text-gray-100 dark:hover:bg-gray-750 dark:focus:bg-gray-750"
                    >
                        <template x-for="year in getYearOptions()" :key="year">
                            <option :value="year" x-text="year"></option>
                        </template>
                    </select>
                </div>
            @else
                <div class="flex-1 text-center text-sm font-medium text-gray-900 dark:text-gray-100" x-text="months[viewMonth] + ' ' + viewYear"></div>
            @endif

            <div class="flex items-center gap-1">
                <button
                    type="button"
                    x-on:click="nextMonth()"
                    :disabled="!canGoNext()"
                    class="flex size-7 items-center justify-center rounded-md
                           text-gray-600 hover:bg-gray-100
                           dark:text-gray-400 dark:hover:bg-gray-750
                           disabled:pointer-events-none disabled:opacity-50"
                >
                    <ui:icon name="chevron-right" class="size-4" />
                </button>
            </div>
        </div>

        <div class="grid grid-cols-7 gap-1">
            @foreach ($weekday_labels as $day)
                <span class="flex size-8 items-center justify-center text-xs font-medium text-gray-500 dark:text-gray-400">{{ $day }}</span>
            @endforeach
        </div>

        <div class="grid grid-cols-7 gap-1">
            <template x-for="(d, index) in getCalendarDays()" :key="index">
                <button
                    type="button"
                    x-on:click="selectDate(d.year, d.month, d.day)"
                    :disabled="d.disabled"
                    x-text="d.day"
                    :class="{
                        'text-gray-300 dark:text-gray-600': d.outside,
                        'font-semibold bg-gray-100 text-gray-900 dark:bg-gray-750 dark:text-gray-100': d.today && !d.selected,
                        'font-semibold bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200': d.selected,
                        'pointer-events-none opacity-50': d.disabled
                    }"
                    class="flex size-8 items-center justify-center rounded-md text-sm
                           text-gray-700 hover:bg-gray-100
                           dark:text-gray-300 dark:hover:bg-gray-750"
                ></button>
            </template>
        </div>

        @if ($showFooter)
            <div class="flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-740">
                <ui:button variant="ghost" size="sm" x-on:click="clear()">{{ $clearLabel }}</ui:button>

                <ui:button size="sm" x-on:click="today()">{{ $todayLabel }}</ui:button>
            </div>
        @endif
    </div>
</div>
