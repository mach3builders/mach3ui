@props([
    'addon' => null,
    'addon:end' => null,
    'help' => null,
    'icon' => null,
    'icon:end' => null,
    'label' => null,
    'size' => null,
    'type' => 'text',
    'variant' => null,
])

@php
    $id = $attributes->get('id') ?? ($label ? 'input-' . Str::random(8) : null);
    $name = $attributes->get('name') ?? $attributes->whereStartsWith('wire:model')->first();
    $hasError = $name && $errors->has($name);

    $iconTrailing = $__data['icon:end'] ?? null;
    $addonTrailing = $__data['addon:end'] ?? null;
    $hasIcon = $icon !== null;
    $hasIconTrailing = $iconTrailing !== null;
    $hasAddon = $addon !== null;
    $hasAddonTrailing = $addonTrailing !== null;
    $hasTrailingElement = $hasIconTrailing;

    $inputClasses = Ui::classes()
        ->add('block w-full appearance-none border shadow-xs focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add(
            match ($size) {
                'sm' => 'h-8 px-2.5 py-1.5 text-xs',
                'lg' => 'h-12 px-4 py-3 text-base',
                default => 'h-10 px-3 py-2 text-sm',
            },
        )
        ->add(
            match (true) {
                $hasError
                    => 'border-red-500 bg-white text-gray-900 placeholder-gray-400 focus:border-red-500 dark:border-red-500 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-red-500',
                $variant === 'inverted'
                    => 'border-gray-140 bg-gray-10 text-gray-900 placeholder-gray-400 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-820 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-gray-600',
                default
                    => 'border-gray-140 bg-white text-gray-900 placeholder-gray-400 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-gray-500',
            },
        )
        ->add(
            match (true) {
                $hasAddon && $hasAddonTrailing => 'rounded-none',
                $hasAddon => 'rounded-none rounded-e-md border-l-0',
                $hasAddonTrailing => 'rounded-none rounded-s-md border-r-0',
                default => 'rounded-md',
            },
        )
        ->when($hasIcon, 'pl-10')
        ->when($hasTrailingElement, 'pr-10')
        ->merge($attributes->only('class'));
@endphp

@if ($label)
    <ui:field>
        <ui:label :for="$id">{{ $label }}</ui:label>

        @if ($hasAddon || $hasAddonTrailing)
            <ui:input.group>
                @if ($hasAddon)
                    <ui:input.addon>{{ $addon }}</ui:input.addon>
                @endif

                @if ($hasIcon || $hasTrailingElement)
                    <div class="relative w-full" data-input-wrapper>
                        @if ($hasIcon)
                            <div
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                                <ui:icon :name="$icon" class="size-4" />
                            </div>
                        @endif

                        <input type="{{ $type }}" id="{{ $id }}" class="{{ $inputClasses }}"
                            {{ $attributes->except('class') }} data-input />

                        @if ($hasIconTrailing)
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500">
                                <ui:icon :name="$iconTrailing" class="size-4" />
                            </div>
                        @endif
                    </div>
                @else
                    <input type="{{ $type }}" id="{{ $id }}" class="{{ $inputClasses }}"
                        {{ $attributes->except('class') }} data-input />
                @endif

                @if ($hasAddonTrailing)
                    <ui:input.addon>{{ $addonTrailing }}</ui:input.addon>
                @endif
            </ui:input.group>
        @elseif ($hasIcon || $hasTrailingElement)
            <div class="relative w-full" data-input-wrapper>
                @if ($hasIcon)
                    <div
                        class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                        <ui:icon :name="$icon" class="size-4" />
                    </div>
                @endif

                <input type="{{ $type }}" id="{{ $id }}" class="{{ $inputClasses }}"
                    {{ $attributes->except('class') }} data-input />

                @if ($hasIconTrailing)
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500">
                        <ui:icon :name="$iconTrailing" class="size-4" />
                    </div>
                @endif
            </div>
        @else
            <input type="{{ $type }}" id="{{ $id }}" class="{{ $inputClasses }}"
                {{ $attributes->except('class') }} data-input />
        @endif

        @if ($help)
            <ui:help>{{ $help }}</ui:help>
        @endif

        @if ($name)
            <ui:error :name="$name" />
        @endif
    </ui:field>
@else
    @if ($hasAddon || $hasAddonTrailing)
        <ui:input.group>
            @if ($hasAddon)
                <ui:input.addon>{{ $addon }}</ui:input.addon>
            @endif

            @if ($hasIcon || $hasTrailingElement)
                <div class="relative w-full" data-input-wrapper>
                    @if ($hasIcon)
                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                            <ui:icon :name="$icon" class="size-4" />
                        </div>
                    @endif

                    <input type="{{ $type }}" class="{{ $inputClasses }}" {{ $attributes->except('class') }}
                        data-input />

                    @if ($hasIconTrailing)
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500">
                            <ui:icon :name="$iconTrailing" class="size-4" />
                        </div>
                    @endif
                </div>
            @else
                <input type="{{ $type }}" class="{{ $inputClasses }}" {{ $attributes->except('class') }}
                    data-input />
            @endif

            @if ($hasAddonTrailing)
                <ui:input.addon>{{ $addonTrailing }}</ui:input.addon>
            @endif
        </ui:input.group>
    @elseif ($hasIcon || $hasTrailingElement)
        <div class="relative w-full" data-input-wrapper>
            @if ($hasIcon)
                <div
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                    <ui:icon :name="$icon" class="size-4" />
                </div>
            @endif

            <input type="{{ $type }}" class="{{ $inputClasses }}" {{ $attributes->except('class') }}
                data-input />

            @if ($hasIconTrailing)
                <div
                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500">
                    <ui:icon :name="$iconTrailing" class="size-4" />
                </div>
            @endif
        </div>
    @else
        <input type="{{ $type }}" class="{{ $inputClasses }}" {{ $attributes->except('class') }}
            data-input />
    @endif
@endif
