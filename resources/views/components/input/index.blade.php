@props([
    'addon' => null,
    'addon:end' => null,
    'copyable' => false,
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
    $has_error = $name && $errors->has($name);

    $size_classes = match ($size) {
        'sm' => 'h-8 px-2.5 py-1.5 text-xs',
        'lg' => 'h-12 px-4 py-3 text-base',
        default => 'h-10 px-3 py-2 text-sm',
    };

    $icon_trailing = $__data['icon:end'] ?? null;
    $addon_trailing = $__data['addon:end'] ?? null;
    $has_icon = $icon !== null;
    $has_icon_trailing = $icon_trailing !== null;
    $has_addon = $addon !== null;
    $has_addon_trailing = $addon_trailing !== null;
    $has_trailing_element = $has_icon_trailing || $copyable;

    $input_classes = [
        'block w-full appearance-none border shadow-xs focus:outline-none',
        'border-gray-140 bg-white text-gray-900 placeholder-gray-400 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-gray-500' =>
            $variant !== 'inverted' && !$has_error,
        'border-gray-140 bg-gray-10 text-gray-900 placeholder-gray-400 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-820 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-gray-600' =>
            $variant === 'inverted' && !$has_error,
        'border-red-500 bg-white text-gray-900 placeholder-gray-400 focus:border-red-500 dark:border-red-500 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-red-500' => $has_error,
        'disabled:cursor-not-allowed disabled:opacity-50',
        $size_classes,
        'rounded-md' => !$has_addon && !$has_addon_trailing,
        'rounded-none' => $has_addon && $has_addon_trailing,
        'rounded-none rounded-e-md' => $has_addon && !$has_addon_trailing,
        'rounded-none rounded-s-md' => !$has_addon && $has_addon_trailing,
        'border-l-0' => $has_addon,
        'border-r-0' => $has_addon_trailing,
        'pl-10' => $has_icon,
        'pr-10' => $has_trailing_element,
    ];
@endphp

@if ($label)
    <ui:field>
        <ui:label :for="$id">{{ $label }}</ui:label>

        @if ($has_addon || $has_addon_trailing)
            <ui:input.group>
                @if ($has_addon)
                    <ui:input.addon>{{ $addon }}</ui:input.addon>
                @endif

                @if ($has_icon || $has_trailing_element)
                    <div class="relative w-full" data-input-wrapper
                        @if ($copyable) x-data="{ copied: false }" @endif>
                        @if ($has_icon)
                            <div
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                                <ui:icon :name="$icon" class="size-4" />
                            </div>
                        @endif

                        <input type="{{ $type }}" id="{{ $id }}"
                            {{ $attributes->class($input_classes) }}
                            @if ($copyable) x-ref="input" @endif data-input />

                        @if ($copyable)
                            <ui:button variant="ghost" size="sm"
                                x-on:click="navigator.clipboard.writeText($refs.input.value); copied = true; setTimeout(() => copied = false, 2000)"
                                class="absolute inset-y-0 right-0.5 my-auto">
                                <ui:icon name="copy" x-show="!copied" />

                                <ui:icon name="check" class="text-green-500" x-show="copied" x-cloak />
                            </ui:button>
                        @elseif ($has_icon_trailing)
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500">
                                <ui:icon :name="$icon_trailing" class="size-4" />
                            </div>
                        @endif
                    </div>
                @else
                    <input type="{{ $type }}" id="{{ $id }}" {{ $attributes->class($input_classes) }}
                        data-input />
                @endif

                @if ($has_addon_trailing)
                    <ui:input.addon>{{ $addon_trailing }}</ui:input.addon>
                @endif
            </ui:input.group>
        @elseif ($has_icon || $has_trailing_element)
            <div class="relative w-full" data-input-wrapper
                @if ($copyable) x-data="{ copied: false }" @endif>
                @if ($has_icon)
                    <div
                        class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                        <ui:icon :name="$icon" class="size-4" />
                    </div>
                @endif

                <input type="{{ $type }}" id="{{ $id }}" {{ $attributes->class($input_classes) }}
                    @if ($copyable) x-ref="input" @endif data-input />

                @if ($copyable)
                    <ui:button variant="ghost" size="sm"
                        x-on:click="navigator.clipboard.writeText($refs.input.value); copied = true; setTimeout(() => copied = false, 2000)"
                        class="absolute inset-y-0 right-0.5 my-auto">
                        <ui:icon name="copy" x-show="!copied" />

                        <ui:icon name="check" class="text-green-500" x-show="copied" x-cloak />
                    </ui:button>
                @elseif ($has_icon_trailing)
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500">
                        <ui:icon :name="$icon_trailing" class="size-4" />
                    </div>
                @endif
            </div>
        @else
            <input type="{{ $type }}" id="{{ $id }}" {{ $attributes->class($input_classes) }}
                data-input />
        @endif

        @if ($help)
            <ui:help>{{ $help }}</ui:help>
        @endif

        @if ($name)
            <ui:error :name="$name" />
        @endif
    </ui:field>
@else
    @if ($has_addon || $has_addon_trailing)
        <ui:input.group>
            @if ($has_addon)
                <ui:input.addon>{{ $addon }}</ui:input.addon>
            @endif

            @if ($has_icon || $has_trailing_element)
                <div class="relative w-full" data-input-wrapper
                    @if ($copyable) x-data="{ copied: false }" @endif>
                    @if ($has_icon)
                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                            <ui:icon :name="$icon" class="size-4" />
                        </div>
                    @endif

                    <input type="{{ $type }}" {{ $attributes->class($input_classes) }}
                        @if ($copyable) x-ref="input" @endif data-input />

                    @if ($copyable)
                        <ui:button variant="ghost" size="sm"
                            x-on:click="navigator.clipboard.writeText($refs.input.value); copied = true; setTimeout(() => copied = false, 2000)"
                            class="absolute inset-y-0 right-0.5 my-auto">
                            <ui:icon name="copy" x-show="!copied" />

                            <ui:icon name="check" class="text-green-500" x-show="copied" x-cloak />
                        </ui:button>
                    @elseif ($has_icon_trailing)
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500">
                            <ui:icon :name="$icon_trailing" class="size-4" />
                        </div>
                    @endif
                </div>
            @else
                <input type="{{ $type }}" {{ $attributes->class($input_classes) }} data-input />
            @endif

            @if ($has_addon_trailing)
                <ui:input.addon>{{ $addon_trailing }}</ui:input.addon>
            @endif
        </ui:input.group>
    @elseif ($has_icon || $has_trailing_element)
        <div class="relative w-full" data-input-wrapper
            @if ($copyable) x-data="{ copied: false }" @endif>
            @if ($has_icon)
                <div
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                    <ui:icon :name="$icon" class="size-4" />
                </div>
            @endif

            <input type="{{ $type }}" {{ $attributes->class($input_classes) }}
                @if ($copyable) x-ref="input" @endif data-input />

            @if ($copyable)
                <ui:button variant="ghost" size="sm"
                    x-on:click="navigator.clipboard.writeText($refs.input.value); copied = true; setTimeout(() => copied = false, 2000)"
                    class="absolute inset-y-0 right-0.5 my-auto">
                    <ui:icon name="copy" x-show="!copied" />

                    <ui:icon name="check" class="text-green-500" x-show="copied" x-cloak />
                </ui:button>
            @elseif ($has_icon_trailing)
                <div
                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500">
                    <ui:icon :name="$icon_trailing" class="size-4" />
                </div>
            @endif
        </div>
    @else
        <input type="{{ $type }}" {{ $attributes->class($input_classes) }} data-input />
    @endif
@endif
