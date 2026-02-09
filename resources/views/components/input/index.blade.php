@props([
    'addon' => null,
    'addon:end' => null,
    'button' => null,
    'hint' => null,
    'icon' => null,
    'icon:end' => null,
    'label' => null,
    'name' => null,
    'size' => 'md',
    'type' => 'text',
    'variant' => 'default',
])

@aware(['id'])

@php
    // Get wire:model using Livewire's helper
$wireModel = $attributes->wire('model');
$wireModelValue = $wireModel?->directive ? $wireModel->value() : null;
$isLive = $wireModel?->directive ? $wireModel->hasModifier('live') : false;

// Get x-model value
$xModelValue = null;
foreach ($attributes->getAttributes() as $key => $value) {
    if (str_starts_with($key, 'x-model')) {
        $xModelValue = $value;
        break;
    }
}

// Name handling: only show name if explicitly passed as prop
$showName = isset($name);
$inputName = $name ?: $wireModelValue ?: $xModelValue ?: $id;

// ID priority: explicit id attr > field id (@aware) > input name > auto-generated
$id =
    $attributes->get('id') ?? ($id ?? ($inputName ?? Ui::uniqueId('input')));

$error = $inputName ? $errors->first($inputName) ?? null : null;

// Auto-restore old input for traditional form fields (skip password types)
if ($showName && $inputName && $type !== 'password' && !$wireModelValue && !$xModelValue && old($inputName) !== null) {
    $attributes = $attributes->merge(['value' => old($inputName)]);
}

$iconEnd = $__data['icon:end'] ?? null;
$addonEnd = $__data['addon:end'] ?? null;

$hasIcon = $icon !== null;
$hasIconEnd = $iconEnd !== null;
$hasAddon = $addon !== null;
$hasAddonEnd = $addonEnd !== null;
$hasButton = isset($button) && $button !== null;

$inputClasses = Ui::classes()
    ->add('block w-full appearance-none border shadow-xs focus:outline-none')
    ->add('disabled:cursor-not-allowed disabled:opacity-50')
    ->add('autofill:shadow-[inset_0_0_0_1000px_white] autofill:[-webkit-text-fill-color:theme(colors.gray.900)]')
    ->add(
        'dark:autofill:shadow-[inset_0_0_0_1000px_theme(colors.gray.800)] dark:autofill:[-webkit-text-fill-color:theme(colors.gray.100)] dark:autofill:caret-gray-100',
    )
    ->add($size, [
        'sm' => 'h-8 px-2.5 py-1.5 text-xs',
        'md' => 'h-10 px-3 py-2 text-sm',
        'lg' => 'h-12 px-4 py-3 text-base',
    ])
    ->add(
        match (true) {
            (bool) $error
                => 'border-red-500 bg-white text-gray-900 placeholder-gray-400 focus:border-red-500 dark:border-red-500 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-red-500',
            $variant === 'inverted'
                => 'border-gray-140 bg-gray-10 text-gray-900 placeholder-gray-400 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-820 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-gray-600',
            default
                => 'border-gray-140 bg-white text-gray-900 placeholder-gray-400 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-gray-500',
        },
    )
    ->add(
        match (true) {
            $hasAddon && $hasAddonEnd => 'rounded-none',
            $hasAddon => 'rounded-none rounded-e-md',
            $hasAddonEnd => 'rounded-none rounded-s-md',
            default => 'rounded-md',
        },
    )
    ->when($hasIcon, 'pl-10')
    ->when($hasIconEnd, 'pr-10')
    ->when($hasButton, 'pr-20');

$wrapperClasses = Ui::classes()->add('relative w-full')->merge($attributes->only('class'));

$iconWrapperClasses = 'pointer-events-none absolute inset-y-0 flex items-center text-gray-400 dark:text-gray-500';
@endphp

@if ($label)
    <ui:field :id="$id">
        <ui:label :required="$attributes->has('required')">{{ $label }}</ui:label>

        <x-ui::input._input :type="$type" :id="$id" :name="$showName ? $inputName : null" :error="$error" :icon="$icon"
            :icon-end="$iconEnd" :addon="$addon" :addon-end="$addonEnd" :button="$button ?? null" :input-classes="$inputClasses" :wrapper-classes="$wrapperClasses"
            :icon-wrapper-classes="$iconWrapperClasses" :is-live="$isLive" :wire-target="$wireModelValue" :attributes="$attributes" />

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($inputName)
            <ui:error :name="$inputName" />
        @endif
    </ui:field>
@else
    <x-ui::input._input :type="$type" :id="$id" :name="$showName ? $inputName : null" :error="$error" :icon="$icon"
        :icon-end="$iconEnd" :addon="$addon" :addon-end="$addonEnd" :button="$button ?? null" :input-classes="$inputClasses"
        :wrapper-classes="$wrapperClasses" :icon-wrapper-classes="$iconWrapperClasses" :is-live="$isLive" :wire-target="$wireModelValue" :attributes="$attributes" />
@endif
