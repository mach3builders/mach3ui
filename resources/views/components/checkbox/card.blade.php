@props([
    'description' => null,
    'icon' => null,
    'indeterminate' => false,
    'name' => null,
    'reversed' => false,
    'title' => null,
])

@php
    // Detect x-model via native foreach (faster than collect()->first())
    $xModel = null;
    foreach ($attributes->getAttributes() as $k => $v) {
        if (str_starts_with($k, 'x-model')) {
            $xModel = $v;
            break;
        }
    }

    // Auto-detect name from wire:model or x-model
    $name = $name ?: (method_exists($attributes, 'wire') ? $attributes->wire('model')->value() : null) ?: $xModel;

    // SVG icons (fully URL encoded for Tailwind arbitrary values)
    $checkmarkSvg =
        "url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22white%22%20stroke-width%3D%223%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpath%20d%3D%22M20%206%209%2017l-5-5%22%2F%3E%3C%2Fsvg%3E')";
    $indeterminateSvg =
        "url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22white%22%20stroke-width%3D%223%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpath%20d%3D%22M5%2012h14%22%2F%3E%3C%2Fsvg%3E')";

    $cardClasses = Ui::classes()
        ->add('group relative flex cursor-pointer items-start gap-3 rounded-lg border p-4 transition-colors')
        ->add('border-gray-200 bg-white')
        ->add('dark:border-gray-700 dark:bg-gray-800')
        ->add('hover:border-gray-300 hover:bg-gray-50')
        ->add('dark:hover:border-gray-600 dark:hover:bg-gray-750')
        ->add('has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50')
        ->add('dark:has-[:checked]:border-blue-500 dark:has-[:checked]:bg-blue-950/20')
        ->add('has-[:focus]:ring-2 has-[:focus]:ring-blue-600/20')
        ->add('dark:has-[:focus]:ring-blue-500/20')
        ->add('has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50')
        ->merge($attributes);

    $checkboxClasses = Ui::classes()
        ->add('size-5 shrink-0 cursor-pointer appearance-none rounded-[5px] border bg-center bg-no-repeat')
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
        ->add('focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->when($reversed, 'order-first');
@endphp

<label class="{{ $cardClasses }}" {{ $attributes->only('data-*') }} data-checkbox-card data-control>
    @if ($icon)
        <ui:icon :name="$icon" class="size-6 shrink-0 text-gray-500 dark:text-gray-400"
            data-checkbox-card-icon />
    @endif

    <div class="flex-1" data-checkbox-card-content>
        @if ($title)
            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $title }}</div>
        @endif

        @if ($description)
            <ui:text variant="muted" class="mt-0.5">{{ $description }}</ui:text>
        @endif

        {{ $slot }}
    </div>

    <input type="checkbox" @if ($name) name="{{ $name }}" @endif
        {{ $attributes->except(['class', 'data-*', 'name']) }}
        @if ($indeterminate) x-init="$el.indeterminate = true" @endif
        style="--check-icon: {{ $checkmarkSvg }}; --indet-icon: {{ $indeterminateSvg }}; --check-size: 16px"
        class="{{ $checkboxClasses }}" data-checkbox />
</label>
