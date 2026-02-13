@props([
    'clearable' => false,
    'disabled' => false,
    'displayFormat' => null,
    'field:variant' => null,
    'hint' => null,
    'label' => null,
    'locale' => null,
    'maxDate' => null,
    'minDate' => null,
    'name' => null,
    'placeholder' => null,
    'showFooter' => false,
    'showSelects' => false,
    'size' => 'md',
    'value' => null,
    'variant' => 'default',
])

@aware(['id'])

@php
    $popoverId = Ui::uniqueId('datepicker');

    // Get wire:model or x-model value
    $allAttrs = $attributes->getAttributes();
    $wireModelValue = null;
    $xModelValue = null;

    foreach ($allAttrs as $key => $val) {
        if (str_starts_with($key, 'wire:model')) {
            $wireModelValue = $val;
            break;
        }
    }

    foreach ($allAttrs as $key => $val) {
        if (str_starts_with($key, 'x-model')) {
            $xModelValue = $val;
            break;
        }
    }

    // Name priority: prop > wire:model > x-model > field id
    $inputName = $name ?: $wireModelValue ?: $xModelValue ?: $id;

    // ID priority: explicit id attr > field id (@aware) > input name > auto-generated
    $id = $attributes->get('id') ?? ($id ?? ($inputName ?? Ui::uniqueId('datepicker-id')));

    $error = $inputName ? $errors->first($inputName) ?? null : null;
    $fieldVariant = $__data['field:variant'] ?? null;

    // Localization
    $locale = $locale ?? app()->getLocale();
    $months = __('ui::ui.months', [], $locale);
    $weekdays = __('ui::ui.weekdays', [], $locale);
    $displayFormat = $displayFormat ?? __('ui::ui.datepicker.display_format', [], $locale);
    $placeholder = $placeholder ?? __('ui::ui.datepicker.placeholder', [], $locale);
    $clearLabel = __('ui::ui.clear', [], $locale);
    $todayLabel = __('ui::ui.today', [], $locale);

    // Initial display value
    $displayValue = null;
    if ($value) {
        try {
            $displayValue = \Carbon\Carbon::parse($value)
                ->locale($locale)
                ->isoFormat(str_replace(['F', 'j', 'Y'], ['MMMM', 'D', 'YYYY'], $displayFormat));
        } catch (\Exception) {
            $displayValue = $value;
        }
    }

    $wrapperClasses = Ui::classes()->add('relative inline-block w-full select-none')->merge($attributes->only('class'));
@endphp

@if ($label)
    <ui:field :id="$id" :variant="$fieldVariant ?? 'block'">
        <ui:label>{{ $label }}</ui:label>

        <x-ui::datepicker._datepicker :id="$id" :name="$inputName" :popover-id="$popoverId" :value="$value"
            :display-value="$displayValue" :disabled="$disabled" :error="$error" :locale="$locale" :months="$months" :weekdays="$weekdays"
            :display-format="$displayFormat" :placeholder="$placeholder" :clear-label="$clearLabel" :today-label="$todayLabel" :min-date="$minDate"
            :max-date="$maxDate" :clearable="$clearable" :show-footer="$showFooter" :show-selects="$showSelects" :size="$size"
            :variant="$variant" :wrapper-classes="$wrapperClasses" :attributes="$attributes" />

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($inputName)
            <ui:error :name="$inputName" />
        @endif
    </ui:field>
@else
    <x-ui::datepicker._datepicker :id="$id" :name="$inputName" :popover-id="$popoverId" :value="$value"
        :display-value="$displayValue" :disabled="$disabled" :error="$error" :locale="$locale" :months="$months"
        :weekdays="$weekdays" :display-format="$displayFormat" :placeholder="$placeholder" :clear-label="$clearLabel" :today-label="$todayLabel"
        :min-date="$minDate" :max-date="$maxDate" :clearable="$clearable" :show-footer="$showFooter" :show-selects="$showSelects"
        :size="$size" :variant="$variant" :wrapper-classes="$wrapperClasses" :attributes="$attributes" />
@endif
