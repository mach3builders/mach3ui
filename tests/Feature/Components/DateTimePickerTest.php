<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Datepicker (index.blade.php)
// =============================================================================

it('renders a basic datepicker', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)
        ->toContain('x-data')
        ->toContain('data-datepicker')
        ->toContain('name="date"');
});

it('renders datepicker with label', function () {
    $html = Blade::render('<ui:datepicker name="date" label="Date of Birth" />');

    expect($html)
        ->toContain('Date of Birth')
        ->toContain('<label')
        ->toContain('for=');
});

it('renders datepicker with hint', function () {
    $html = Blade::render('<ui:datepicker name="date" label="Date" hint="Select your preferred date" />');

    expect($html)
        ->toContain('Select your preferred date');
});

it('renders datepicker with placeholder', function () {
    $html = Blade::render('<ui:datepicker name="date" placeholder="Choose a date" />');

    expect($html)
        ->toContain('Choose a date');
});

it('renders datepicker with initial value', function () {
    $html = Blade::render('<ui:datepicker name="date" value="2024-06-15" />');

    expect($html)
        ->toContain('value:')
        ->toContain('2024-06-15');
});

it('applies size variants', function () {
    $htmlSm = Blade::render('<ui:datepicker name="date" size="sm" />');
    $htmlMd = Blade::render('<ui:datepicker name="date" size="md" />');
    $htmlLg = Blade::render('<ui:datepicker name="date" size="lg" />');

    expect($htmlSm)->toContain('h-8');
    expect($htmlMd)->toContain('h-10');
    expect($htmlLg)->toContain('h-12');
});

it('applies default variant styling', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)->toContain('bg-white');
});

it('applies inverted variant styling', function () {
    $html = Blade::render('<ui:datepicker name="date" variant="inverted" />');

    expect($html)->toContain('bg-gray-10');
});

it('renders disabled datepicker', function () {
    $html = Blade::render('<ui:datepicker name="date" :disabled="true" />');

    expect($html)->toContain('disabled');
});

it('renders clearable datepicker', function () {
    $html = Blade::render('<ui:datepicker name="date" :clearable="true" />');

    expect($html)
        ->toContain('x-on:click.stop="clear()"')
        ->toContain('x-show="value"');
});

it('renders datepicker with minDate', function () {
    $html = Blade::render('<ui:datepicker name="date" minDate="2024-01-01" />');

    expect($html)
        ->toContain('minDate:')
        ->toContain('2024-01-01');
});

it('renders datepicker with maxDate', function () {
    $html = Blade::render('<ui:datepicker name="date" maxDate="2024-12-31" />');

    expect($html)
        ->toContain('maxDate:')
        ->toContain('2024-12-31');
});

it('renders datepicker with minDate and maxDate', function () {
    $html = Blade::render('<ui:datepicker name="date" minDate="2024-01-01" maxDate="2024-12-31" />');

    expect($html)
        ->toContain('minDate:')
        ->toContain('2024-01-01')
        ->toContain('maxDate:')
        ->toContain('2024-12-31');
});

it('renders datepicker with showFooter', function () {
    $html = Blade::render('<ui:datepicker name="date" :showFooter="true" />');

    expect($html)
        ->toContain('x-on:click="clear()"')
        ->toContain('x-on:click="today()"');
});

it('renders datepicker with showSelects', function () {
    $html = Blade::render('<ui:datepicker name="date" :showSelects="true" />');

    expect($html)
        ->toContain('x-model.number="viewMonth"')
        ->toContain('x-model.number="viewYear"')
        ->toContain('<select');
});

it('renders datepicker without showSelects by default', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)
        ->not->toContain('x-model.number="viewMonth"')
        ->not->toContain('x-model.number="viewYear"');
});

it('renders datepicker with custom displayFormat', function () {
    $html = Blade::render('<ui:datepicker name="date" displayFormat="Y-m-d" />');

    expect($html)
        ->toContain('displayFormat:')
        ->toContain('Y-m-d');
});

it('uses name as id when provided', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)->toContain('id="date"');
});

it('uses custom id when provided', function () {
    $html = Blade::render('<ui:datepicker name="date" id="custom-date-id" />');

    expect($html)->toContain('id="custom-date-id"');
});

it('has proper ARIA attributes', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)
        ->toContain('aria-haspopup="dialog"')
        ->toContain('role="dialog"')
        ->toContain('aria-modal="true"')
        ->toContain('aria-label="Choose date"');
});

it('has hidden input for form submission', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)
        ->toContain('type="hidden"')
        ->toContain('x-ref="input"')
        ->toContain(':value="value"');
});

it('has data-control attribute on trigger', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)->toContain('data-control');
});

it('has calendar icon', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)->toContain('<svg');
});

it('has popover trigger button', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)
        ->toContain('popovertarget=')
        ->toContain('popover');
});

it('has navigation buttons for months', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)
        ->toContain('x-on:click="prevMonth()"')
        ->toContain('x-on:click="nextMonth()"')
        ->toContain('aria-label="Previous month"')
        ->toContain('aria-label="Next month"');
});

it('has weekday headers', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)->toContain('role="columnheader"');
});

it('has days grid', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)
        ->toContain('role="grid"')
        ->toContain('role="gridcell"')
        ->toContain('x-on:click="selectDay(day)"');
});

it('has x-modelable for Alpine.js binding', function () {
    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)->toContain('x-modelable="value"');
});

it('shows error message from error bag', function () {
    test()->withErrors(['date' => 'The date field is required.']);

    $html = Blade::render('<ui:datepicker name="date" label="Date" />');

    expect($html)
        ->toContain('The date field is required.')
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('shows error styling without label', function () {
    test()->withErrors(['date' => 'Invalid date']);

    $html = Blade::render('<ui:datepicker name="date" />');

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('merges custom classes on wrapper', function () {
    $html = Blade::render('<ui:datepicker name="date" class="custom-class" />');

    expect($html)->toContain('custom-class');
});

it('supports wire:model attribute', function () {
    $html = Blade::render('<ui:datepicker wire:model="selectedDate" />');

    expect($html)->toContain('wire:model="selectedDate"');
});

it('supports x-model attribute', function () {
    $html = Blade::render('<ui:datepicker x-model="selectedDate" />');

    expect($html)->toContain('x-model="selectedDate"');
});

// =============================================================================
// Timepicker (index.blade.php)
// =============================================================================

it('renders a basic timepicker', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)
        ->toContain('x-data')
        ->toContain('data-timepicker')
        ->toContain('name="time"');
});

it('renders timepicker with label', function () {
    $html = Blade::render('<ui:timepicker name="time" label="Start Time" />');

    expect($html)
        ->toContain('Start Time')
        ->toContain('<label')
        ->toContain('for=');
});

it('renders timepicker with hint', function () {
    $html = Blade::render('<ui:timepicker name="time" label="Time" hint="Select a time slot" />');

    expect($html)
        ->toContain('Select a time slot');
});

it('renders timepicker with placeholder', function () {
    $html = Blade::render('<ui:timepicker name="time" placeholder="Choose a time" />');

    expect($html)
        ->toContain('Choose a time');
});

it('renders timepicker with initial value', function () {
    $html = Blade::render('<ui:timepicker name="time" value="14:30" />');

    expect($html)
        ->toContain('value:')
        ->toContain('14:30');
});

it('applies timepicker size variants', function () {
    $htmlSm = Blade::render('<ui:timepicker name="time" size="sm" />');
    $htmlMd = Blade::render('<ui:timepicker name="time" size="md" />');
    $htmlLg = Blade::render('<ui:timepicker name="time" size="lg" />');

    expect($htmlSm)->toContain('h-8');
    expect($htmlMd)->toContain('h-10');
    expect($htmlLg)->toContain('h-12');
});

it('applies default timepicker variant styling', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)->toContain('bg-white');
});

it('applies inverted timepicker variant styling', function () {
    $html = Blade::render('<ui:timepicker name="time" variant="inverted" />');

    expect($html)->toContain('bg-gray-10');
});

it('renders disabled timepicker', function () {
    $html = Blade::render('<ui:timepicker name="time" :disabled="true" />');

    expect($html)->toContain('disabled');
});

it('renders clearable timepicker', function () {
    $html = Blade::render('<ui:timepicker name="time" :clearable="true" />');

    expect($html)
        ->toContain('x-on:click.stop="clear()"')
        ->toContain('x-show="value"');
});

it('renders timepicker with 24-hour format by default', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    // 24 is the default format
    expect($html)->toContain('format:');
});

it('renders timepicker with 12-hour format', function () {
    $html = Blade::render('<ui:timepicker name="time" format="12" />');

    expect($html)
        ->toContain('format:')
        ->toContain('12')
        ->toContain('x-on:click="selectPeriod(\'AM\')"')
        ->toContain('x-on:click="selectPeriod(\'PM\')"');
});

it('renders timepicker without AM/PM when in 24-hour format', function () {
    $html = Blade::render('<ui:timepicker name="time" format="24" />');

    expect($html)
        ->not->toContain('x-on:click="selectPeriod(\'AM\')"')
        ->not->toContain('x-on:click="selectPeriod(\'PM\')"');
});

it('renders timepicker with minTime', function () {
    $html = Blade::render('<ui:timepicker name="time" minTime="09:00" />');

    expect($html)
        ->toContain('minTime:')
        ->toContain('09:00');
});

it('renders timepicker with maxTime', function () {
    $html = Blade::render('<ui:timepicker name="time" maxTime="17:00" />');

    expect($html)
        ->toContain('maxTime:')
        ->toContain('17:00');
});

it('renders timepicker with minTime and maxTime', function () {
    $html = Blade::render('<ui:timepicker name="time" minTime="09:00" maxTime="17:00" />');

    expect($html)
        ->toContain('minTime:')
        ->toContain('09:00')
        ->toContain('maxTime:')
        ->toContain('17:00');
});

it('renders timepicker with custom minuteStep', function () {
    $html = Blade::render('<ui:timepicker name="time" :minuteStep="15" />');

    expect($html)->toContain('minuteStep: 15');
});

it('renders timepicker with default minuteStep of 1', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)->toContain('minuteStep: 1');
});

it('renders timepicker with showSeconds', function () {
    $html = Blade::render('<ui:timepicker name="time" :showSeconds="true" />');

    expect($html)
        ->toContain('showSeconds: true')
        ->toContain('x-ref="secondsColumn"')
        ->toContain('x-on:click="selectSecond(second.value)"');
});

it('renders timepicker without seconds by default', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)
        ->toContain('showSeconds: false')
        ->not->toContain('x-ref="secondsColumn"');
});

it('renders timepicker with showFooter', function () {
    $html = Blade::render('<ui:timepicker name="time" :showFooter="true" />');

    expect($html)
        ->toContain('x-on:click="clear()"')
        ->toContain('x-on:click="now()"');
});

it('uses name as timepicker id when provided', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)->toContain('id="time"');
});

it('uses custom timepicker id when provided', function () {
    $html = Blade::render('<ui:timepicker name="time" id="custom-time-id" />');

    expect($html)->toContain('id="custom-time-id"');
});

it('has proper timepicker ARIA attributes', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)
        ->toContain('aria-haspopup="dialog"')
        ->toContain('role="dialog"')
        ->toContain('aria-modal="true"')
        ->toContain('aria-label="Choose time"');
});

it('has hidden timepicker input for form submission', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)
        ->toContain('type="hidden"')
        ->toContain('x-ref="input"')
        ->toContain(':value="value"');
});

it('has data-control attribute on timepicker trigger', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)->toContain('data-control');
});

it('has clock icon', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)->toContain('<svg');
});

it('has timepicker popover trigger button', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)
        ->toContain('popovertarget=')
        ->toContain('popover');
});

it('has hours column', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)
        ->toContain('x-ref="hoursColumn"')
        ->toContain('x-on:click="selectHour(hour.value)"');
});

it('has minutes column', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)
        ->toContain('x-ref="minutesColumn"')
        ->toContain('x-on:click="selectMinute(minute.value)"');
});

it('has x-modelable for timepicker Alpine.js binding', function () {
    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)->toContain('x-modelable="value"');
});

it('shows timepicker error message from error bag', function () {
    test()->withErrors(['time' => 'The time field is required.']);

    $html = Blade::render('<ui:timepicker name="time" label="Time" />');

    expect($html)
        ->toContain('The time field is required.')
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('shows timepicker error styling without label', function () {
    test()->withErrors(['time' => 'Invalid time']);

    $html = Blade::render('<ui:timepicker name="time" />');

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('merges custom classes on timepicker wrapper', function () {
    $html = Blade::render('<ui:timepicker name="time" class="custom-class" />');

    expect($html)->toContain('custom-class');
});

it('supports wire:model on timepicker', function () {
    $html = Blade::render('<ui:timepicker wire:model="selectedTime" />');

    expect($html)->toContain('wire:model="selectedTime"');
});

it('supports x-model on timepicker', function () {
    $html = Blade::render('<ui:timepicker x-model="selectedTime" />');

    expect($html)->toContain('x-model="selectedTime"');
});
