@blaze

@props([
    'hint' => null,
    'label' => null,
    'name' => null,
    'placeholder' => null,
    'size' => 'md',
    'variant' => 'default',
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
$selectName = $name ?: $wireModelValue ?: $xModelValue ?: $id;

// ID priority: explicit id attr > field id (@aware) > select name > auto-generated
$id =
    $attributes->get('id') ??
    ($id ?? ($selectName ?? Ui::uniqueId('select')));

$error = $selectName ? $errors->first($selectName) ?? null : null;

$selectClasses = Ui::classes()
    ->add('block w-full appearance-none border shadow-xs focus:outline-none')
    ->add('disabled:cursor-not-allowed disabled:opacity-50')
    // Custom chevron via background SVG
    ->add('bg-no-repeat bg-[right_0.75rem_center] bg-[length:1rem_1rem]')
    ->add(
        "bg-[url('data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%239ca3af%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpath%20d%3D%22m6%209%206%206%206-6%22%2F%3E%3C%2Fsvg%3E')]",
    )
    ->add($size, [
        'sm' => 'h-8 rounded-md pl-2.5 pr-8 py-1.5 text-xs',
        'md' => 'h-10 rounded-md pl-3 pr-10 py-2 text-sm',
        'lg' => 'h-12 rounded-md pl-4 pr-10 py-3 text-base',
    ])
    ->add(
        match (true) {
            (bool) $error
                => 'border-red-500 bg-white text-gray-900 focus:border-red-500 dark:border-red-500 dark:bg-gray-800 dark:text-gray-100 dark:focus:border-red-500',
            $variant === 'inverted'
                => 'border-gray-140 bg-gray-10 text-gray-900 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-820 dark:text-gray-100 dark:focus:border-gray-600',
            default
                => 'border-gray-140 bg-white text-gray-900 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:focus:border-gray-500',
        },
    )
    // Placeholder styling (when empty option is selected)
    ->add('has-[option.placeholder:checked]:text-gray-400 dark:has-[option.placeholder:checked]:text-gray-500')
    // Force dark mode styles on options (Windows compatibility)
    ->add('dark:[&>option]:bg-gray-700 dark:[&>option]:text-white')
        ->merge($attributes);
@endphp

@if ($label)
    <ui:field :id="$id">
        <ui:label>{{ $label }}</ui:label>

        <x-ui::select._select :id="$id" :name="$showName ? $selectName : null" :error="$error" :placeholder="$placeholder" :select-classes="$selectClasses"
            :is-live="$isLive" :wire-target="$wireModelValue" :attributes="$attributes">{{ $slot }}</x-ui::select._select>

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($selectName)
            <ui:error :name="$selectName" />
        @endif
    </ui:field>
@else
    <x-ui::select._select :id="$id" :name="$showName ? $selectName : null" :error="$error" :placeholder="$placeholder" :select-classes="$selectClasses"
        :is-live="$isLive" :wire-target="$wireModelValue" :attributes="$attributes">{{ $slot }}</x-ui::select._select>
@endif
