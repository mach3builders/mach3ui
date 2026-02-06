@props([
    'clearable' => false,
    'disabled' => false,
    'format' => '24', // '12' or '24'
    'hint' => null,
    'label' => null,
    'locale' => null,
    'maxTime' => null,
    'minTime' => null,
    'minuteStep' => 1,
    'name' => null,
    'placeholder' => null,
    'showFooter' => false,
    'showSeconds' => false,
    'size' => 'md',
    'value' => null,
    'variant' => 'default',
])

@aware(['id'])

@php
    $popoverId = Ui::uniqueId('timepicker');

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
    $id = $attributes->get('id') ?? ($id ?? ($inputName ?? Ui::uniqueId('timepicker-id')));

    $error = $inputName ? $errors->first($inputName) ?? null : null;

    // Localization
    $locale = $locale ?? app()->getLocale();
    $placeholder = $placeholder ?? __('ui::ui.timepicker.placeholder', [], $locale);
    $clearLabel = __('ui::ui.clear', [], $locale);
    $nowLabel = __('ui::ui.now', [], $locale);
    $amLabel = __('ui::ui.timepicker.am', [], $locale);
    $pmLabel = __('ui::ui.timepicker.pm', [], $locale);

    // Format display value
    $displayValue = null;
    if ($value) {
        try {
            $time = \Carbon\Carbon::parse($value);
            if ($format === '12') {
                $displayValue = $showSeconds ? $time->format('g:i:s A') : $time->format('g:i A');
            } else {
                $displayValue = $showSeconds ? $time->format('H:i:s') : $time->format('H:i');
            }
        } catch (\Exception) {
            $displayValue = $value;
        }
    }

    $wrapperClasses = Ui::classes()->add('relative inline-block w-full select-none')->merge($attributes->only('class'));
@endphp

@if ($label)
    <ui:field :id="$id">
        <ui:label>{{ $label }}</ui:label>

        <x-ui::timepicker._timepicker :id="$id" :name="$inputName" :popover-id="$popoverId" :value="$value"
            :display-value="$displayValue" :disabled="$disabled" :error="$error" :format="$format" :placeholder="$placeholder" :clear-label="$clearLabel"
            :now-label="$nowLabel" :am-label="$amLabel" :pm-label="$pmLabel" :min-time="$minTime" :max-time="$maxTime"
            :minute-step="$minuteStep" :clearable="$clearable" :show-footer="$showFooter" :show-seconds="$showSeconds" :size="$size"
            :variant="$variant" :wrapper-classes="$wrapperClasses" :attributes="$attributes" />

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($inputName)
            <ui:error :name="$inputName" />
        @endif
    </ui:field>
@else
    <x-ui::timepicker._timepicker :id="$id" :name="$inputName" :popover-id="$popoverId" :value="$value"
        :display-value="$displayValue" :disabled="$disabled" :error="$error" :format="$format" :placeholder="$placeholder"
        :clear-label="$clearLabel" :now-label="$nowLabel" :am-label="$amLabel" :pm-label="$pmLabel" :min-time="$minTime"
        :max-time="$maxTime" :minute-step="$minuteStep" :clearable="$clearable" :show-footer="$showFooter" :show-seconds="$showSeconds"
        :size="$size" :variant="$variant" :wrapper-classes="$wrapperClasses" :attributes="$attributes" />
@endif
