@props([
    'disabled' => false,
    'hint' => null,
    'label' => null,
    'length' => 6,
    'mode' => 'numeric',
    'name' => null,
    'private' => false,
    'separator' => null,
    'size' => 'md',
    'value' => '',
])

@php
    // Extract wire:model value
    $allAttrs = $attributes->getAttributes();
    $wireModelValue = null;
    $xModelValue = null;

    foreach ($allAttrs as $key => $attrValue) {
        if (str_starts_with($key, 'wire:model')) {
            $wireModelValue = $attrValue;
            break;
        }
    }

    foreach ($allAttrs as $key => $attrValue) {
        if (str_starts_with($key, 'x-model')) {
            $xModelValue = $attrValue;
            break;
        }
    }

    // Name priority: prop > wire:model > x-model
    $inputName = $name ?: $wireModelValue ?: $xModelValue;
    $id = $attributes->get('id') ?? ($inputName ? 'input-otp-' . $inputName : 'input-otp-' . Str::random(8));

    $error = $inputName ? $errors->first($inputName) ?? null : null;

    $pattern = match ($mode) {
        'alphanumeric' => '[a-zA-Z0-9]',
        'alpha' => '[a-zA-Z]',
        default => '\\d',
    };

    $inputmode = match ($mode) {
        'alphanumeric', 'alpha' => 'text',
        default => 'numeric',
    };

    $slotSizeClasses = match ($size) {
        'sm' => 'h-9 w-8 text-sm',
        'lg' => 'h-14 w-12 text-xl',
        default => 'h-12 w-10 text-lg',
    };

    $wrapperClasses = Ui::classes()
        ->add('inline-flex items-center gap-2')
        ->when($disabled, 'opacity-50')
        ->merge($attributes->only('class'));

    $slotClasses = Ui::classes()
        ->add($slotSizeClasses)
        ->add('relative -ml-px flex cursor-text items-center justify-center border font-medium transition-colors select-none')
        ->add('first:ml-0 first:rounded-l-md last:rounded-r-md')
        ->add(
            match (true) {
                (bool) $error => 'border-red-500 bg-white text-gray-900 dark:border-red-500 dark:bg-gray-800 dark:text-gray-100',
                default => 'border-gray-140 bg-white text-gray-900 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100',
            },
        );

    $activeRingClasses = match (true) {
        (bool) $error => 'z-10 ring-1 ring-red-500 dark:ring-red-500',
        default => 'z-10 ring-1 ring-gray-400 dark:ring-gray-500',
    };

    $separatorClasses = 'flex items-center justify-center px-1';
    $separatorDotClasses = 'size-1.5 rounded-full bg-gray-300 dark:bg-gray-600';
@endphp

@if ($label)
    <ui:field :id="$id">
        <ui:label>{{ $label }}</ui:label>

        <x-ui::input.otp._otp :id="$id" :name="$inputName" :length="$length" :mode="$mode" :pattern="$pattern"
            :inputmode="$inputmode" :disabled="$disabled" :private="$private" :value="$value" :error="$error"
            :separator="$separator" :wrapper-classes="$wrapperClasses" :slot-classes="$slotClasses"
            :active-ring-classes="$activeRingClasses" :separator-classes="$separatorClasses"
            :separator-dot-classes="$separatorDotClasses" :attributes="$attributes" :slot="$slot" />

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($inputName)
            <ui:error :name="$inputName" />
        @endif
    </ui:field>
@else
    <x-ui::input.otp._otp :id="$id" :name="$inputName" :length="$length" :mode="$mode" :pattern="$pattern"
        :inputmode="$inputmode" :disabled="$disabled" :private="$private" :value="$value" :error="$error"
        :separator="$separator" :wrapper-classes="$wrapperClasses" :slot-classes="$slotClasses"
        :active-ring-classes="$activeRingClasses" :separator-classes="$separatorClasses"
        :separator-dot-classes="$separatorDotClasses" :attributes="$attributes" :slot="$slot" />
@endif
