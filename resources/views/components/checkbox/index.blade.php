@props([
    'description' => null,
    'indeterminate' => false,
    'label' => null,
])

@php
    $wireModel = $attributes->wire('model');
    $hasWireModel = $wireModel && method_exists($wireModel, 'value');
    $wireModelValue = $hasWireModel ? $wireModel->value() : null;
    $xModel = collect($attributes->getAttributes())->first(fn($val, $key) => str_starts_with($key, 'x-model'));
    $name = $attributes->get('name') ?? ($wireModelValue ?? $xModel);
    $hasLabel = $label || $description;

    // SVG icons (fully URL encoded for Tailwind arbitrary values)
    $checkmarkSvg =
        "url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22white%22%20stroke-width%3D%223%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpath%20d%3D%22M20%206%209%2017l-5-5%22%2F%3E%3C%2Fsvg%3E')";
    $indeterminateSvg =
        "url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22white%22%20stroke-width%3D%223%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpath%20d%3D%22M5%2012h14%22%2F%3E%3C%2Fsvg%3E')";

    $wrapperClasses = Ui::classes()->merge($attributes->only('class'));

    $checkboxClasses = Ui::classes()
        ->add('size-5 shrink-0 cursor-pointer appearance-none rounded-[5px] border bg-center bg-no-repeat')
        ->add('border-gray-300 bg-white')
        ->add('dark:border-gray-600 dark:bg-gray-800')
        ->add("checked:border-blue-600 checked:bg-blue-600 checked:bg-[length:16px] checked:bg-[{$checkmarkSvg}]")
        ->add('dark:checked:border-blue-500 dark:checked:bg-blue-500')
        ->add(
            "indeterminate:border-blue-600 indeterminate:bg-blue-600 indeterminate:bg-[length:16px] indeterminate:bg-[{$indeterminateSvg}]",
        )
        ->add('dark:indeterminate:border-blue-500 dark:indeterminate:bg-blue-500')
        ->add('focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:ring-offset-0')
        ->add('dark:focus:ring-blue-500/20')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->when($description, 'mt-0.5')
        ->unless($hasLabel, 'block');

    $labelClasses = Ui::classes()
        ->add('group inline-flex cursor-pointer gap-2.5')
        ->add('has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50')
        ->add($description ? 'items-start' : 'items-center');
@endphp

<div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-checkbox data-control>
    @if ($hasLabel)
        <label class="{{ $labelClasses }}">
    @endif

    <input type="checkbox" @if ($name) name="{{ $name }}" @endif
        {{ $attributes->except(['class', 'data-*', 'name']) }}
        @if ($indeterminate) x-init="$el.indeterminate = true" @endif class="{{ $checkboxClasses }}" />

    @if ($hasLabel)
        <span class="flex flex-col gap-0.5">
            @if ($label)
                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $label }}</span>
            @endif
            @if ($description)
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $description }}</span>
            @endif
        </span>
        </label>
    @endif

    @if ($name)
        <ui:error :name="$name" />
    @endif
</div>
