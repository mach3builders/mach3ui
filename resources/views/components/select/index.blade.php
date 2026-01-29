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
    $has_error = $name && $errors->has($name);

    $size_classes = match ($size) {
        'sm' => 'h-8 px-2.5 py-1.5 pr-8 text-xs',
        'lg' => 'h-12 px-4 py-3 pr-10 text-base',
        default => 'h-10 px-3 py-2 pr-9 text-sm',
    };

    $select_classes = [
        'block w-full cursor-pointer appearance-none rounded-md border bg-no-repeat shadow-xs',
        'border-gray-140 bg-white text-gray-900',
        'dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100',
        'focus:border-gray-400 focus:outline-none',
        'dark:focus:border-gray-500',
        'disabled:cursor-not-allowed disabled:opacity-50',
        $size_classes,
        'border-red-500 dark:border-red-500 focus:border-red-600 dark:focus:border-red-500' => $invalid || $has_error,
    ];

    $options_array = is_array($options) ? $options : [];
    $has_slot = !$slot->isEmpty();

    $icon_size = match ($size) {
        'sm' => 'size-3.5',
        'lg' => 'size-5',
        default => 'size-4',
    };

    $icon_right = match ($size) {
        'sm' => 'right-2',
        'lg' => 'right-3.5',
        default => 'right-3',
    };
@endphp

@if ($label)
    <ui:field>
        <ui:label :for="$id">{{ $label }}</ui:label>

        <div class="relative w-full" data-select>
            <select {{ $attributes->class($select_classes) }} id="{{ $id }}"
                @if ($name) name="{{ $name }}" @endif @disabled($disabled)>
                @if ($placeholder)
                    <option value="" disabled @if (!$value) selected @endif>{{ $placeholder }}
                    </option>
                @endif

                @if ($has_slot)
                    {{ $slot }}
                @else
                    @foreach ($options_array as $option_value => $option_label)
                        <option value="{{ $option_value }}" @if ($value == $option_value) selected @endif>
                            {{ $option_label }}</option>
                    @endforeach
                @endif
            </select>

            <div
                class="pointer-events-none absolute inset-y-0 {{ $icon_right }} flex items-center text-gray-400 dark:text-gray-500">
                <x-lucide-chevron-down class="{{ $icon_size }}" />
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
    <div class="relative w-full" data-select>
        <select {{ $attributes->class($select_classes) }}
            @if ($name) name="{{ $name }}" @endif @disabled($disabled)>
            @if ($placeholder)
                <option value="" disabled @if (!$value) selected @endif>{{ $placeholder }}
                </option>
            @endif

            @if ($has_slot)
                {{ $slot }}
            @else
                @foreach ($options_array as $option_value => $option_label)
                    <option value="{{ $option_value }}" @if ($value == $option_value) selected @endif>
                        {{ $option_label }}</option>
                @endforeach
            @endif
        </select>

        <div
            class="pointer-events-none absolute inset-y-0 {{ $icon_right }} flex items-center text-gray-400 dark:text-gray-500">
            <x-lucide-chevron-down class="{{ $icon_size }}" />
        </div>
    </div>
@endif
