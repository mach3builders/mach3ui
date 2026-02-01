@props([
    'description' => null,
    'label' => null,
])

@php
    $wireModel = $attributes->wire('model');
    $hasWireModel = $wireModel && method_exists($wireModel, 'value');
    $wireModelValue = $hasWireModel ? $wireModel->value() : null;

    // Extract x-model attribute for name fallback
    $xModel = null;
    foreach ($attributes as $key => $val) {
        if (str_starts_with($key, 'x-model')) {
            $xModel = $val;
            break;
        }
    }

    $name = $attributes->get('name') ?? ($wireModelValue ?? $xModel);
    $hasLabel = $label || $description;

    // Wrapper
    $classes = Ui::classes()->merge($attributes->only('class'));

    // Radio input
    $radioClasses = Ui::classes()
        ->add('size-[18px] shrink-0 appearance-none rounded-full border cursor-pointer bg-center bg-no-repeat')
        ->add('border-gray-300 bg-white')
        ->add('dark:border-gray-600 dark:bg-gray-800')
        ->add('checked:border-blue-600 checked:bg-blue-600 checked:bg-[length:14px]')
        ->add('dark:checked:border-blue-500 dark:checked:bg-blue-500')
        ->add(
            "checked:bg-[url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Ccircle%20cx%3D%2212%22%20cy%3D%2212%22%20r%3D%225%22%20fill%3D%22white%22%2F%3E%3C%2Fsvg%3E')]",
        )
        ->add('focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:ring-offset-0')
        ->add('dark:focus:ring-blue-500/20')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->when($description, 'mt-0.5')
        ->unless($hasLabel, 'block');

    // Label wrapper
    $labelClasses = Ui::classes()
        ->add('group inline-flex gap-2.5 cursor-pointer')
        ->add('has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50')
        ->add($description ? 'items-start' : 'items-center');

    // Text content
    $textWrapperClasses = Ui::classes()->add('flex flex-col gap-0.5');

    $labelTextClasses = Ui::classes()->add('text-sm font-medium')->add('text-gray-900')->add('dark:text-gray-100');

    $descriptionClasses = Ui::classes()->add('text-sm')->add('text-gray-500')->add('dark:text-gray-400');
@endphp

<div class="{{ $classes }}" {{ $attributes->only('data-*') }} data-radio data-control>
    @if ($hasLabel)
        <label class="{{ $labelClasses }}" data-radio-label>
            <input type="radio" class="{{ $radioClasses }}"
                @if ($name) name="{{ $name }}" @endif
                {{ $attributes->except(['class', 'data-*', 'name']) }} data-radio-input />

            <span class="{{ $textWrapperClasses }}" data-radio-text>
                @if ($label)
                    <span class="{{ $labelTextClasses }}">{{ $label }}</span>
                @endif

                @if ($description)
                    <span class="{{ $descriptionClasses }}">{{ $description }}</span>
                @endif
            </span>
        </label>
    @else
        <input type="radio" class="{{ $radioClasses }}"
            @if ($name) name="{{ $name }}" @endif
            {{ $attributes->except(['class', 'data-*', 'name']) }} data-radio-input />
    @endif

    @if ($name)
        <ui:error :name="$name" />
    @endif
</div>
