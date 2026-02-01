@props([
    'description' => null,
    'label' => null,
])

@php
    $wireModel = $attributes->wire('model');
    $hasWireModel = $wireModel && method_exists($wireModel, 'value');
    $wireModelValue = $hasWireModel ? $wireModel->value() : null;
    $name = $attributes->get('name') ?? $wireModelValue;

    $wrapperClasses = Ui::classes()->merge($attributes->only('class'));

    $radioClasses = Ui::classes()
        ->add('size-[18px] shrink-0 appearance-none rounded-full border cursor-pointer bg-center bg-no-repeat')
        ->add('border-gray-300 bg-white')
        ->add('dark:border-gray-600 dark:bg-gray-800')
        ->add('checked:border-blue-600 checked:bg-blue-600')
        ->add('dark:checked:border-blue-500 dark:checked:bg-blue-500')
        ->add(
            "checked:bg-[url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Ccircle%20cx%3D%2212%22%20cy%3D%2212%22%20r%3D%225%22%20fill%3D%22white%22%2F%3E%3C%2Fsvg%3E')]",
        )
        ->add('checked:bg-[length:14px]')
        ->add('focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:ring-offset-0')
        ->add('dark:focus:ring-blue-500/20')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->when($description, 'mt-0.5');

    $labelClasses = Ui::classes()
        ->add('group inline-flex gap-2.5 cursor-pointer has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50')
        ->add($description ? 'items-start' : 'items-center');
@endphp

@if ($label || $description)
    <div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-radio>
        <label class="{{ $labelClasses }}">
            <input type="radio" class="{{ $radioClasses }}" {{ $attributes->except(['class', 'data-*']) }} />

            <span class="flex flex-col gap-0.5">
                @if ($label)
                    <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $label }}</span>
                @endif

                @if ($description)
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $description }}</span>
                @endif
            </span>
        </label>

        @if ($name)
            <ui:error :name="$name" />
        @endif
    </div>
@else
    <div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-radio>
        <input type="radio" class="{{ $radioClasses }} block" {{ $attributes->except(['class', 'data-*']) }} />
    </div>
@endif
