@props([
    'amLabel',
    'attributes',
    'clearable',
    'clearLabel',
    'disabled',
    'displayValue',
    'error',
    'format',
    'id',
    'maxTime',
    'minTime',
    'minuteStep',
    'name',
    'nowLabel',
    'placeholder',
    'pmLabel',
    'popoverId',
    'showFooter',
    'showSeconds',
    'size',
    'value',
    'variant',
    'wrapperClasses',
])

@php
    $anchor = "--timepicker-{$popoverId}";

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

    // Popover classes
    $popoverClasses = Ui::classes()
        ->add('fixed m-0 hidden flex-col gap-3 rounded-lg border p-3 shadow-lg')
        ->add('border-gray-80 bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-790')
        ->add('[&:popover-open]:flex');

    // Time column classes
    $columnClasses = Ui::classes()
        ->add('flex h-48 flex-col gap-1 overflow-y-auto px-1')
        ->add('scrollbar-thin scrollbar-thumb-gray-300 dark:scrollbar-thumb-gray-600');

    // Time option classes
    $optionClasses = Ui::classes()
        ->add('flex h-8 w-12 items-center justify-center rounded-md text-sm transition-colors')
        ->add('text-gray-700 hover:bg-gray-100')
        ->add('dark:text-gray-300 dark:hover:bg-gray-750');
@endphp

<div x-data="timepicker({
    value: @js($value),
    displayValue: @js($displayValue),
    format: @js($format),
    minTime: @js($minTime),
    maxTime: @js($maxTime),
    minuteStep: @js($minuteStep),
    showSeconds: @js($showSeconds),
    placeholder: @js($placeholder),
    amLabel: @js($amLabel),
    pmLabel: @js($pmLabel),
})" x-modelable="value"
    {{ $attributes->only(['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.defer', 'x-model']) }}
    class="{{ $wrapperClasses }}" style="anchor-scope: {{ $anchor }};" data-timepicker>
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

        <ui:icon name="clock" size="sm" class="shrink-0 text-gray-400 dark:text-gray-500" />
    </button>

    {{-- Hidden input --}}
    <input type="hidden" x-ref="input" @if ($name) name="{{ $name }}" @endif
        @if ($id) id="{{ $id }}" @endif :value="value"
        @disabled($disabled) />

    {{-- Time popover --}}
    <div id="{{ $popoverId }}" popover x-ref="popover" x-on:toggle="onToggle($event)" role="dialog"
        aria-modal="true" aria-label="Choose time"
        style="position-anchor: {{ $anchor }}; inset: auto; top: calc(anchor(bottom) + 0.25rem); left: anchor(left); position-try-fallbacks: flip-block;"
        class="{{ $popoverClasses }}">

        <div class="flex gap-2">
            {{-- Hours --}}
            <div class="{{ $columnClasses }}" x-ref="hoursColumn">
                <template x-for="hour in hours()" :key="hour.value">
                    <button type="button" x-on:click="selectHour(hour.value)" :disabled="hour.disabled"
                        x-text="hour.label"
                        :class="{
                            'font-semibold bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200': hour
                                .value === selectedHour,
                            'pointer-events-none opacity-50': hour.disabled,
                        }"
                        class="{{ $optionClasses }}"></button>
                </template>
            </div>

            <div class="w-px bg-gray-100 dark:bg-gray-740"></div>

            {{-- Minutes --}}
            <div class="{{ $columnClasses }}" x-ref="minutesColumn">
                <template x-for="minute in minutes()" :key="minute.value">
                    <button type="button" x-on:click="selectMinute(minute.value)" :disabled="minute.disabled"
                        x-text="minute.label"
                        :class="{
                            'font-semibold bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200': minute
                                .value === selectedMinute,
                            'pointer-events-none opacity-50': minute.disabled,
                        }"
                        class="{{ $optionClasses }}"></button>
                </template>
            </div>

            @if ($showSeconds)
                <div class="w-px bg-gray-100 dark:bg-gray-740"></div>

                {{-- Seconds --}}
                <div class="{{ $columnClasses }}" x-ref="secondsColumn">
                    <template x-for="second in seconds()" :key="second.value">
                        <button type="button" x-on:click="selectSecond(second.value)" :disabled="second.disabled"
                            x-text="second.label"
                            :class="{
                                'font-semibold bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200': second
                                    .value === selectedSecond,
                                'pointer-events-none opacity-50': second.disabled,
                            }"
                            class="{{ $optionClasses }}"></button>
                    </template>
                </div>
            @endif

            @if ($format === '12')
                <div class="w-px bg-gray-100 dark:bg-gray-740"></div>

                {{-- AM/PM --}}
                <div class="flex flex-col gap-1 px-1">
                    <button type="button" x-on:click="selectPeriod('AM')"
                        :class="{
                            'font-semibold bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200': period === 'AM',
                        }"
                        class="{{ $optionClasses }}">{{ $amLabel }}</button>
                    <button type="button" x-on:click="selectPeriod('PM')"
                        :class="{
                            'font-semibold bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-200': period === 'PM',
                        }"
                        class="{{ $optionClasses }}">{{ $pmLabel }}</button>
                </div>
            @endif
        </div>

        {{-- Footer --}}
        @if ($showFooter)
            <div class="flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-740">
                <ui:button variant="ghost" size="sm" x-on:click="clear()">{{ $clearLabel }}</ui:button>
                <ui:button variant="ghost" size="sm" x-on:click="now()">{{ $nowLabel }}</ui:button>
            </div>
        @endif
    </div>
</div>

@once
    <script>
        function registerTimepicker() {
            Alpine.data('timepicker', (config) => ({
                    value: config.value || '',
                    displayValue: config.displayValue || '',
                    format: config.format,
                    minTime: config.minTime,
                    maxTime: config.maxTime,
                    minuteStep: config.minuteStep || 1,
                    showSeconds: config.showSeconds,
                    placeholder: config.placeholder,
                    amLabel: config.amLabel,
                    pmLabel: config.pmLabel,

                    selectedHour: null,
                    selectedMinute: null,
                    selectedSecond: 0,
                    period: 'AM',

                    init() {
                        if (this.value) {
                            this.parseValue(this.value);
                        } else {
                            const now = new Date();
                            this.selectedHour = this.format === '12' ? (now.getHours() % 12 || 12) : now
                                .getHours();
                            this.selectedMinute = Math.floor(now.getMinutes() / this.minuteStep) * this
                                .minuteStep;
                            this.selectedSecond = 0;
                            this.period = now.getHours() >= 12 ? 'PM' : 'AM';
                        }

                        this.$watch('value', (val) => {
                            if (val) {
                                this.parseValue(val);
                            }
                            this.updateDisplay();
                            this.dispatchChange();
                        });
                    },

                    onToggle(event) {
                        if (event.newState === 'open') {
                            this.$nextTick(() => this.scrollToSelected());
                        }
                    },

                    parseValue(val) {
                        const [hours, minutes, seconds = 0] = val.split(':').map(Number);
                        if (this.format === '12') {
                            this.period = hours >= 12 ? 'PM' : 'AM';
                            this.selectedHour = hours % 12 || 12;
                        } else {
                            this.selectedHour = hours;
                        }
                        this.selectedMinute = minutes;
                        this.selectedSecond = seconds;
                    },

                    formatValue() {
                        let hours = this.selectedHour;
                        if (this.format === '12') {
                            hours = this.period === 'PM' ? (hours % 12) + 12 : hours % 12;
                        }
                        const h = String(hours).padStart(2, '0');
                        const m = String(this.selectedMinute).padStart(2, '0');
                        const s = String(this.selectedSecond).padStart(2, '0');
                        return this.showSeconds ? `${h}:${m}:${s}` : `${h}:${m}`;
                    },

                    updateDisplay() {
                        if (!this.value) {
                            this.displayValue = '';
                            return;
                        }
                        const h = this.format === '12' ?
                            this.selectedHour :
                            String(this.selectedHour).padStart(2, '0');
                        const m = String(this.selectedMinute).padStart(2, '0');
                        const s = String(this.selectedSecond).padStart(2, '0');

                        if (this.format === '12') {
                            this.displayValue = this.showSeconds ?
                                `${h}:${m}:${s} ${this.period}` :
                                `${h}:${m} ${this.period}`;
                        } else {
                            this.displayValue = this.showSeconds ?
                                `${h}:${m}:${s}` :
                                `${h}:${m}`;
                        }
                    },

                    hours() {
                        const result = [];
                        const max = this.format === '12' ? 12 : 23;
                        const start = this.format === '12' ? 1 : 0;

                        for (let i = start; i <= max; i++) {
                            result.push({
                                value: i,
                                label: this.format === '12' ? String(i) : String(i).padStart(2,
                                    '0'),
                                disabled: this.isHourDisabled(i),
                            });
                        }
                        return result;
                    },

                    minutes() {
                        const result = [];
                        for (let i = 0; i < 60; i += this.minuteStep) {
                            result.push({
                                value: i,
                                label: String(i).padStart(2, '0'),
                                disabled: this.isMinuteDisabled(i),
                            });
                        }
                        return result;
                    },

                    seconds() {
                        const result = [];
                        for (let i = 0; i < 60; i++) {
                            result.push({
                                value: i,
                                label: String(i).padStart(2, '0'),
                                disabled: false,
                            });
                        }
                        return result;
                    },

                    isHourDisabled(hour) {
                        // Convert to 24h for comparison
                        let h = hour;
                        if (this.format === '12') {
                            h = this.period === 'PM' ? (hour % 12) + 12 : hour % 12;
                        }
                        if (this.minTime) {
                            const [minH] = this.minTime.split(':').map(Number);
                            if (h < minH) return true;
                        }
                        if (this.maxTime) {
                            const [maxH] = this.maxTime.split(':').map(Number);
                            if (h > maxH) return true;
                        }
                        return false;
                    },

                    isMinuteDisabled(minute) {
                        let h = this.selectedHour;
                        if (this.format === '12') {
                            h = this.period === 'PM' ? (h % 12) + 12 : h % 12;
                        }
                        if (this.minTime) {
                            const [minH, minM] = this.minTime.split(':').map(Number);
                            if (h === minH && minute < minM) return true;
                        }
                        if (this.maxTime) {
                            const [maxH, maxM] = this.maxTime.split(':').map(Number);
                            if (h === maxH && minute > maxM) return true;
                        }
                        return false;
                    },

                    selectHour(hour) {
                        this.selectedHour = hour;
                        this.value = this.formatValue();
                    },

                    selectMinute(minute) {
                        this.selectedMinute = minute;
                        this.value = this.formatValue();
                    },

                    selectSecond(second) {
                        this.selectedSecond = second;
                        this.value = this.formatValue();
                    },

                    selectPeriod(p) {
                        this.period = p;
                        this.value = this.formatValue();
                    },

                    clear() {
                        this.value = '';
                        this.$refs.popover.hidePopover();
                    },

                    now() {
                        const date = new Date();
                        const h = String(date.getHours()).padStart(2, '0');
                        const m = String(Math.floor(date.getMinutes() / this.minuteStep) * this.minuteStep)
                            .padStart(2, '0');
                        const s = String(date.getSeconds()).padStart(2, '0');
                        this.value = this.showSeconds ? `${h}:${m}:${s}` : `${h}:${m}`;
                        this.$refs.popover.hidePopover();
                    },

                    dispatchChange() {
                        this.$refs.input.dispatchEvent(new Event('input', {
                            bubbles: true
                        }));
                        this.$refs.input.dispatchEvent(new Event('change', {
                            bubbles: true
                        }));
                    },

                    scrollToSelected() {
                        // Scroll hours
                        if (this.$refs.hoursColumn) {
                            const hourBtn = this.$refs.hoursColumn.querySelector(
                                `button:nth-child(${this.format === '12' ? this.selectedHour : this.selectedHour + 1})`
                            );
                            if (hourBtn) hourBtn.scrollIntoView({
                                block: 'center'
                            });
                        }
                        // Scroll minutes
                        if (this.$refs.minutesColumn) {
                            const minuteIndex = Math.floor(this.selectedMinute / this.minuteStep) + 1;
                            const minuteBtn = this.$refs.minutesColumn.querySelector(
                                `button:nth-child(${minuteIndex})`);
                            if (minuteBtn) minuteBtn.scrollIntoView({
                                block: 'center'
                            });
                        }
                        // Scroll seconds
                        if (this.$refs.secondsColumn) {
                            const secondBtn = this.$refs.secondsColumn.querySelector(
                                `button:nth-child(${this.selectedSecond + 1})`);
                            if (secondBtn) secondBtn.scrollIntoView({
                                block: 'center'
                            });
                        }
                    },
                }));
        }

        if (window.Alpine) {
            registerTimepicker();
        } else {
            document.addEventListener('alpine:init', registerTimepicker);
        }
    </script>
@endonce
