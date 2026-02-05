@blaze

@props([
    'description' => null,
    'label' => null,
    'name' => null,
    'size' => 'md',
])

@aware(['id'])

@php
    // Get wire:model or x-model value directly from attributes
    $allAttrs = $attributes->getAttributes();
    $wireModelValue = null;
    $xModelValue = null;

    foreach ($allAttrs as $key => $value) {
        if (str_starts_with($key, 'wire:model')) {
            $wireModelValue = $value;
            break;
        }
    }

    foreach ($allAttrs as $key => $value) {
        if (str_starts_with($key, 'x-model')) {
            $xModelValue = $value;
            break;
        }
    }

    // Name priority: prop > wire:model > x-model > field id
    $inputName = $name ?: $wireModelValue ?: $xModelValue ?: $id;

    // ID priority: explicit id attr > field id (@aware) > input name > auto-generated
    $id =
        $attributes->get('id') ?? ($id ?? ($inputName ?? Ui::uniqueId('switch')));

    $hasLabel = $label || $description;
    $error = $inputName ? $errors->first($inputName) ?? null : null;

    $wrapperClasses = Ui::classes()->merge($attributes->only('class'));

    // Hidden checkbox - sr-only but still focusable for accessibility
    $checkboxClasses = 'sr-only';

    // Switch wrapper - group for has-[:checked] selector
    $switchClasses = Ui::classes()->add('group/switch relative inline-flex items-center');

    // Track classes - the background pill
    $trackClasses = Ui::classes()
        ->add('shrink-0 cursor-pointer rounded-full')
        ->add('bg-gray-100 dark:bg-gray-700')
        ->add('transition-colors duration-200 ease-in-out')
        ->add('group-has-[:checked]/switch:bg-blue-600 dark:group-has-[:checked]/switch:bg-blue-500')
        ->add(
            'group-has-[:focus-visible]/switch:ring-2 group-has-[:focus-visible]/switch:ring-blue-600/20 group-has-[:focus-visible]/switch:ring-offset-0',
        )
        ->add('group-has-[:disabled]/switch:cursor-not-allowed group-has-[:disabled]/switch:opacity-50')
        ->add($size, [
            'sm' => 'h-4 w-7',
            'md' => 'h-5 w-9',
            'lg' => 'h-6 w-11',
        ]);

    // Knob classes - the sliding circle
    // Translate values: track-width - knob-size - padding
    // sm: 28px - 12px - 4px = 12px, md: 36px - 16px - 4px = 16px, lg: 44px - 20px - 4px = 20px
    $knobClasses = Ui::classes()
        ->add('pointer-events-none absolute rounded-full shadow')
        ->add('bg-gray-800 group-has-[:checked]/switch:bg-white dark:bg-white')
        ->add('top-1/2 -translate-y-1/2')
        ->add('transition duration-200 ease-in-out')
        ->add($size, [
            'sm' =>
                'left-0.5 size-3 group-has-[:checked]/switch:translate-x-3 rtl:group-has-[:checked]/switch:-translate-x-3',
            'md' =>
                'left-0.5 size-4 group-has-[:checked]/switch:translate-x-4 rtl:group-has-[:checked]/switch:-translate-x-4',
            'lg' =>
                'left-0.5 size-5 group-has-[:checked]/switch:translate-x-5 rtl:group-has-[:checked]/switch:-translate-x-5',
        ]);

    $labelWrapperClasses = Ui::classes()
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

<div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-switch data-control>
    <label class="{{ $labelWrapperClasses }}">
        <span class="{{ $switchClasses }}">
            <input type="checkbox" id="{{ $id }}"
                @if ($inputName) name="{{ $inputName }}" @endif role="switch"
                @if ($error) aria-invalid="true" @endif
                {{ $attributes->except(['class', 'data-*', 'id', 'name']) }} class="{{ $checkboxClasses }}" />

            <span class="{{ $trackClasses }}"></span>
            <span class="{{ $knobClasses }}"></span>
        </span>

        @if ($hasLabel)
            <span class="flex flex-col gap-0.5">
                @if ($label)
                    <span class="{{ $labelTextClasses }}">{{ $label }}</span>
                @endif
                @if ($description)
                    <span class="{{ $descriptionClasses }}">{{ $description }}</span>
                @endif
            </span>
        @endif
    </label>

    @if ($error)
        <p role="alert" class="mt-1 flex items-center gap-1.5 text-xs text-danger">
            {{ $error }}
        </p>
    @endif
</div>
