@props([
    'description' => null,
    'indeterminate' => false,
    'label' => null,
    'name' => null,
    'size' => 'md',
])

@aware(['id'])

@php
    // Get wire:model using Livewire's helper (check method exists for non-Livewire contexts)
$wireModel = $attributes->wire('model');
$wireModelValue = is_object($wireModel) && method_exists($wireModel, 'value') ? $wireModel->value() : null;
$isLive =
    is_object($wireModel) && method_exists($wireModel, 'hasModifier')
        ? $wireModel->hasModifier('live') ?? false
        : false;

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
$id = $attributes->get('id') ?? ($id ?? ($inputName ?? 'checkbox-' . Str::random(8)));

$hasLabel = $label || $description;
$error = $inputName ? $errors->first($inputName) ?? null : null;

// SVG icons (fully URL encoded for Tailwind arbitrary values)
$checkmarkSvg =
    "url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22white%22%20stroke-width%3D%223%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpath%20d%3D%22M20%206%209%2017l-5-5%22%2F%3E%3C%2Fsvg%3E')";
$indeterminateSvg =
    "url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22white%22%20stroke-width%3D%223%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpath%20d%3D%22M5%2012h14%22%2F%3E%3C%2Fsvg%3E')";

$wrapperClasses = Ui::classes()->merge($attributes->only('class'));

$bgSize = match ($size) {
    'sm' => '12px',
    'lg' => '18px',
    default => '16px',
};

$checkboxClasses = Ui::classes()
    ->add('shrink-0 cursor-pointer appearance-none rounded-[5px] border bg-center bg-no-repeat')
    ->add('border-gray-300 bg-white')
    ->add('dark:border-gray-600 dark:bg-gray-800')
    ->add(
        'checked:border-blue-600 checked:bg-blue-600 checked:[background-image:var(--check-icon)] checked:[background-size:var(--check-size)]',
    )
    ->add('dark:checked:border-blue-500 dark:checked:bg-blue-500')
    ->add(
        'indeterminate:border-blue-600 indeterminate:bg-blue-600 indeterminate:[background-image:var(--indet-icon)] indeterminate:[background-size:var(--check-size)]',
    )
    ->add('dark:indeterminate:border-blue-500 dark:indeterminate:bg-blue-500')
    ->add('focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:ring-offset-0')
    ->add('dark:focus:ring-blue-500/20')
    ->add('disabled:cursor-not-allowed disabled:opacity-50')
    ->add($size, [
        'sm' => 'size-4 rounded',
        'md' => 'size-5',
        'lg' => 'size-6 rounded-md',
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

<div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-checkbox data-control>
    @if ($hasLabel)
        <label class="{{ $labelClasses }}">
    @endif

    <input type="checkbox" id="{{ $id }}" @if ($showName && $inputName) name="{{ $inputName }}" @endif
        @if ($indeterminate) x-init="$el.indeterminate = true" @endif
        @if ($error) aria-invalid="true" @endif
        @if ($isLive) wire:loading.class="opacity-50" @endif
        @if ($isLive && $wireModelValue) wire:target="{{ $wireModelValue }}" @endif
        style="--check-icon: {{ $checkmarkSvg }}; --indet-icon: {{ $indeterminateSvg }}; --check-size: {{ $bgSize }}"
        {{ $attributes->except(['class', 'data-*', 'id', 'name']) }} class="{{ $checkboxClasses }}" />

    @if ($hasLabel)
        <span class="flex flex-col gap-0.5">
            @if ($label)
                <span class="{{ $labelTextClasses }}">{{ $label }}</span>
            @endif
            @if ($description)
                <span class="{{ $descriptionClasses }}">{{ $description }}</span>
            @endif
        </span>
        </label>
    @endif

    @if ($error)
        <p role="alert" class="mt-1 flex items-center gap-1.5 text-xs text-danger">
            {{ $error }}
        </p>
    @endif
</div>
