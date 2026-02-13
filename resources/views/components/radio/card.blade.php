@props([
    'description' => null,
    'icon' => null,
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
    $wireModel = $attributes->wire('model');
    $name = $name ?: ($wireModel?->directive ? $wireModel->value() : null) ?: $xModel;

    $cardClasses = Ui::classes()
        ->add('group relative flex cursor-pointer items-start gap-3 rounded-lg border p-4')
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

    $radioClasses = Ui::classes()
        ->add('size-5 shrink-0 cursor-pointer appearance-none rounded-full border bg-center bg-no-repeat')
        ->add('border-gray-300 bg-white')
        ->add('dark:border-gray-600 dark:bg-gray-800')
        ->add('checked:border-blue-600 checked:bg-blue-600')
        ->add('dark:checked:border-blue-500 dark:checked:bg-blue-500')
        ->add('focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->when($reversed, 'order-first');
@endphp

<label class="{{ $cardClasses }}" {{ $attributes->only('data-*') }} data-radio-card data-control>
    @if ($icon)
        <ui:icon :name="$icon" stroke="1.75" class="size-6 shrink-0 text-gray-500 dark:text-gray-400" data-radio-card-icon />
    @endif

    <div class="flex-1" data-radio-card-content>
        @if ($title)
            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $title }}</div>
        @endif

        @if ($description)
            <ui:text variant="muted" class="mt-0.5">{{ $description }}</ui:text>
        @endif

        {{ $slot }}
    </div>

    <input type="radio" @if ($name) name="{{ $name }}" @endif
        {{ $attributes->except(['class', 'data-*', 'name']) }} class="{{ $radioClasses }}" data-radio />
</label>
