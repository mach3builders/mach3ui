@props([
    'checked' => false,
    'description' => null,
    'icon' => null,
    'reversed' => false,
    'title' => null,
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

    // Card wrapper
    $classes = Ui::classes()
        ->add('group relative flex cursor-pointer gap-3 rounded-lg border p-4 transition-colors')
        ->add($reversed ? 'flex-row-reverse' : 'flex-row')
        ->add('border-gray-200 bg-white')
        ->add('dark:border-gray-700 dark:bg-gray-800')
        ->add('hover:border-gray-300 hover:bg-gray-50')
        ->add('dark:hover:border-gray-600 dark:hover:bg-gray-750')
        ->add('has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50')
        ->add('dark:has-[:checked]:border-blue-500 dark:has-[:checked]:bg-blue-950/20')
        ->add('has-[:focus]:ring-2 has-[:focus]:ring-blue-600/20')
        ->add('dark:has-[:focus]:ring-blue-500/20')
        ->add('has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50')
        ->merge($attributes->only('class'));

    // Radio input
    $radioClasses = Ui::classes()
        ->add('mt-0.5 size-[18px] shrink-0 appearance-none rounded-full border cursor-pointer bg-center bg-no-repeat')
        ->add('border-gray-300 bg-white')
        ->add('dark:border-gray-600 dark:bg-gray-800')
        ->add('checked:border-blue-600 checked:bg-blue-600 checked:bg-[length:14px]')
        ->add('dark:checked:border-blue-500 dark:checked:bg-blue-500')
        ->add(
            "checked:bg-[url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Ccircle%20cx%3D%2212%22%20cy%3D%2212%22%20r%3D%225%22%20fill%3D%22white%22%2F%3E%3C%2Fsvg%3E')]",
        )
        ->add('focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50');

    // Icon
    $iconClasses = Ui::classes()->add('size-6 shrink-0')->add('text-gray-500')->add('dark:text-gray-400');

    // Content
    $contentClasses = Ui::classes()->add('flex-1');

    $titleClasses = Ui::classes()->add('text-sm font-medium')->add('text-gray-900')->add('dark:text-gray-100');

    $descriptionClasses = Ui::classes()->add('mt-0.5 text-sm')->add('text-gray-500')->add('dark:text-gray-400');
@endphp

<label class="{{ $classes }}" {{ $attributes->only('data-*') }} data-radio-card data-control>
    {{-- Radio input --}}
    <input type="radio" class="{{ $radioClasses }}" @if ($name) name="{{ $name }}" @endif
        {{ $attributes->except(['class', 'data-*', 'name']) }} @checked($checked) data-radio-input />

    {{-- Icon --}}
    @if ($icon)
        <ui:icon :name="$icon" :class="$iconClasses" data-radio-card-icon />
    @endif

    {{-- Content --}}
    <div class="{{ $contentClasses }}" data-radio-card-content>
        @if ($title)
            <div class="{{ $titleClasses }}" data-radio-card-title>{{ $title }}</div>
        @endif

        @if ($description)
            <div class="{{ $descriptionClasses }}" data-radio-card-description>{{ $description }}</div>
        @endif

        @if ($slot->isNotEmpty())
            {{ $slot }}
        @endif
    </div>
</label>
