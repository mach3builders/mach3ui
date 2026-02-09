@props([
    'description' => null,
    'label' => null,
    'name' => null,
    'size' => 'md',
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
$id = $attributes->get('id') ?? ($id ?? ($inputName ?? Ui::uniqueId('radio')));

$hasLabel = $label || $description;
$error = $inputName ? $errors->first($inputName) ?? null : null;

// Auto-restore old input for traditional form fields
if ($showName && $inputName && !$wireModelValue && !$xModelValue && old($inputName) !== null) {
    $isOldChecked = old($inputName) == $attributes->get('value');
    if ($isOldChecked) {
        $attributes = $attributes->merge(['checked' => true]);
    }
}

// SVG icon for checked state (white dot)
$dotSvg =
    "url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Ccircle%20cx%3D%2212%22%20cy%3D%2212%22%20r%3D%225%22%20fill%3D%22white%22%2F%3E%3C%2Fsvg%3E')";

$wrapperClasses = Ui::classes()
    ->add('[[data-fields]+&]:mt-6')
    ->add('[[data-field]+&]:mt-6')
    ->merge($attributes->only('class'));

$radioClasses = Ui::classes()
    ->add('shrink-0 cursor-pointer appearance-none rounded-full border bg-center bg-no-repeat')
    ->add('border-gray-300 bg-white')
    ->add('dark:border-gray-600 dark:bg-gray-800')
    ->add("checked:border-blue-600 checked:bg-blue-600 checked:bg-[{$dotSvg}]")
    ->add('dark:checked:border-blue-500 dark:checked:bg-blue-500')
    ->add('focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:ring-offset-0')
    ->add('dark:focus:ring-blue-500/20')
    ->add('disabled:cursor-not-allowed disabled:opacity-50')
    ->add($size, [
        'sm' => 'size-4 checked:bg-[length:10px]',
        'md' => 'size-5 checked:bg-[length:14px]',
        'lg' => 'size-6 checked:bg-[length:16px]',
    ])
    ->when($description, 'mt-0.5')
    ->unless($hasLabel, 'block');

$labelClasses = Ui::classes()
    ->add('group inline-flex cursor-pointer gap-2.5')
    ->add('has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50')
    ->add($description ? 'items-start' : 'items-center');

$labelTextClasses = Ui::classes()
    ->add('font-medium text-gray-900 dark:text-gray-100')
    ->add($size, [
        'sm' => 'text-xs',
        'md' => 'text-sm',
        'lg' => 'text-base',
    ]);

$descriptionClasses = Ui::classes()
    ->add('text-gray-500 dark:text-gray-400')
    ->add($size, [
        'sm' => 'text-xs',
        'md' => 'text-sm',
        'lg' => 'text-sm',
        ]);
@endphp

<div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-radio data-control>
    @if ($hasLabel)
        <label class="{{ $labelClasses }}">
    @endif

    <input type="radio" id="{{ $id }}" @if ($showName && $inputName) name="{{ $inputName }}" @endif
        @if ($error) aria-invalid="true" @endif
        @if ($isLive) wire:loading.class="opacity-50" @endif
        @if ($isLive && $wireModelValue) wire:target="{{ $wireModelValue }}" @endif
        {{ $attributes->except(['class', 'data-*', 'id', 'name']) }} class="{{ $radioClasses }}" />

    @if ($hasLabel)
        <span class="flex flex-col gap-0.5">
            @if ($label)
                <span class="{{ $labelTextClasses }}">{{ $label }}@if($attributes->has('required')) <span class="text-gray-400 dark:text-gray-500">*</span>@endif</span>
            @endif
            @if ($description)
                <span class="{{ $descriptionClasses }}">{{ $description }}</span>
            @endif
        </span>
        </label>
    @endif

    @if ($error)
        <p role="alert" class="mt-1 flex items-center gap-1.5 text-xs text-red-600 dark:text-red-500">
            {{ $error }}
        </p>
    @endif
</div>
