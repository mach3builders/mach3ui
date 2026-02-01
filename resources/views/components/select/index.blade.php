@props([
    'disabled' => false,
    'help' => null,
    'invalid' => false,
    'label' => null,
    'name' => null,
    'options' => [],
    'placeholder' => null,
    'size' => null,
    'value' => null,
])

@php
    $id = $attributes->get('id') ?? ($label ? 'select-' . Str::random(8) : null);
    $name = $name ?? $attributes->whereStartsWith('wire:model')->first();
    $hasError = $name && $errors->has($name);

    $wrapperClasses = Ui::classes()->add('relative w-full')->merge($attributes->only('class'));

    $selectClasses = Ui::classes()
        ->add('block w-full cursor-pointer appearance-none rounded-md border bg-no-repeat shadow-xs')
        ->add('border-gray-140 bg-white text-gray-900')
        ->add('dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100')
        ->add('focus:border-gray-400 focus:outline-none')
        ->add('dark:focus:border-gray-500')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add(
            match ($size) {
                'sm' => 'h-8 px-2.5 py-1.5 pr-8 text-xs',
                'lg' => 'h-12 px-4 py-3 pr-10 text-base',
                default => 'h-10 px-3 py-2 pr-9 text-sm',
            },
        )
        ->when(
            $invalid || $hasError,
            'border-red-500 dark:border-red-500 focus:border-red-600 dark:focus:border-red-500',
        );

    $optionsArray = is_array($options) ? $options : [];
    $hasSlot = !$slot->isEmpty();

    $iconSize = match ($size) {
        'sm' => 'size-3.5',
        'lg' => 'size-5',
        default => 'size-4',
    };

    $iconRight = match ($size) {
        'sm' => 'right-2',
        'lg' => 'right-3.5',
        default => 'right-3',
    };
@endphp

@if ($label)
    <ui:field>
        <ui:label :for="$id">{{ $label }}</ui:label>

        <div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-select>
            <select class="{{ $selectClasses }}" {{ $attributes->except(['class', 'data-*']) }} id="{{ $id }}"
                @if ($name) name="{{ $name }}" @endif @disabled($disabled)>
                @if ($placeholder)
                    <option value="" disabled @if (!$value) selected @endif>{{ $placeholder }}
                    </option>
                @endif

                @if ($hasSlot)
                    {{ $slot }}
                @else
                    @foreach ($optionsArray as $optionValue => $optionLabel)
                        <option value="{{ $optionValue }}" @if ($value == $optionValue) selected @endif>
                            {{ $optionLabel }}</option>
                    @endforeach
                @endif
            </select>

            <div
                class="pointer-events-none absolute inset-y-0 {{ $iconRight }} flex items-center text-gray-400 dark:text-gray-500">
                <ui:icon name="chevron-down" class="{{ $iconSize }}" />
            </div>
        </div>

        @if ($help)
            <ui:help>{{ $help }}</ui:help>
        @endif

        @if ($name)
            <ui:error :name="$name" />
        @endif
    </ui:field>
@else
    <div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-select>
        <select class="{{ $selectClasses }}" {{ $attributes->except(['class', 'data-*']) }}
            @if ($name) name="{{ $name }}" @endif @disabled($disabled)>
            @if ($placeholder)
                <option value="" disabled @if (!$value) selected @endif>{{ $placeholder }}
                </option>
            @endif

            @if ($hasSlot)
                {{ $slot }}
            @else
                @foreach ($optionsArray as $optionValue => $optionLabel)
                    <option value="{{ $optionValue }}" @if ($value == $optionValue) selected @endif>
                        {{ $optionLabel }}</option>
                @endforeach
            @endif
        </select>

        <div
            class="pointer-events-none absolute inset-y-0 {{ $iconRight }} flex items-center text-gray-400 dark:text-gray-500">
            <ui:icon name="chevron-down" class="{{ $iconSize }}" />
        </div>
    </div>
@endif
