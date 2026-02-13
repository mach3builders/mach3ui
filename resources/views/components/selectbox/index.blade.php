@props([
    'disabled' => false,
    'field:variant' => null,
    'hint' => null,
    'label' => null,
    'multiple' => false,
    'name' => null,
    'nullable' => false,
    'nullableLabel' => null,
    'placeholder' => null,
    'position' => 'bottom-start',
    'searchable' => false,
    'searchPlaceholder' => 'Zoeken...',
    'size' => 'md',
    'value' => null,
    'variant' => 'default',
])

@aware(['id'])

@php
    // Store the value prop before loop variables might overwrite it
    $initialValue = $value;

    // Get wire:model or x-model value directly from attributes
    $allAttrs = $attributes->getAttributes();
    $wireModelValue = null;
    $xModelValue = null;

    foreach ($allAttrs as $attrKey => $attrValue) {
        if (str_starts_with($attrKey, 'wire:model')) {
            $wireModelValue = $attrValue;
            break;
        }
    }

    foreach ($allAttrs as $attrKey => $attrValue) {
        if (str_starts_with($attrKey, 'x-model')) {
            $xModelValue = $attrValue;
            break;
        }
    }

    // Name priority: prop > wire:model > x-model > field id
    $selectName = $name ?: $wireModelValue ?: $xModelValue ?: $id;

    // ID priority: explicit id attr > field id (@aware) > select name > auto-generated
    $id = $attributes->get('id') ?? ($id ?? ($selectName ?? Ui::uniqueId('selectbox')));

    $error = $selectName ? $errors->first($selectName) ?? null : null;
    $fieldVariant = $__data['field:variant'] ?? null;

    // Auto-restore old input for traditional form fields
    if ($initialValue === null && $name && !$wireModelValue && !$xModelValue) {
        $initialValue = old($selectName);
    }
@endphp

@if ($label)
    <ui:field :id="$id" :variant="$fieldVariant ?? 'block'">
        <ui:label :required="$attributes->has('required')">{{ $label }}</ui:label>

        <x-ui::selectbox._selectbox :id="$id" :name="$selectName" :disabled="$disabled" :error="$error"
            :multiple="$multiple" :nullable="$nullable" :nullable-label="$nullableLabel" :placeholder="$placeholder" :position="$position" :searchable="$searchable"
            :search-placeholder="$searchPlaceholder" :size="$size" :value="$initialValue" :variant="$variant"
            :attributes="$attributes">{{ $slot }}</x-ui::selectbox._selectbox>

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($selectName)
            <ui:error :name="$selectName" />
        @endif
    </ui:field>
@else
    <x-ui::selectbox._selectbox :id="$id" :name="$selectName" :disabled="$disabled" :error="$error"
        :multiple="$multiple" :nullable="$nullable" :nullable-label="$nullableLabel" :placeholder="$placeholder" :position="$position"
        :searchable="$searchable" :search-placeholder="$searchPlaceholder" :size="$size" :value="$initialValue" :variant="$variant"
        :attributes="$attributes">{{ $slot }}</x-ui::selectbox._selectbox>
@endif
