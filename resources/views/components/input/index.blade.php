@props([
    'addon' => null,
    'addon:end' => null,
    'hint' => null,
    'icon' => null,
    'icon:end' => null,
    'label' => null,
    'name' => null,
    'size' => 'md',
    'type' => 'text',
    'variant' => 'default',
])

@php
    // Auto-detect name from wire:model or x-model
    $name =
        $name ?:
        (method_exists($attributes, 'wire')
            ? $attributes->wire('model')->value()
            : null) ?:
        collect($attributes->getAttributes())->first(fn($v, $k) => str_starts_with($k, 'x-model'));

    $id = $attributes->get('id') ?? ($name ? 'input-' . $name : null);
    $error = $name ? $errors->first($name) ?? null : null;

    $iconEnd = $__data['icon:end'] ?? null;
    $addonEnd = $__data['addon:end'] ?? null;

    $hasIcon = $icon !== null;
    $hasIconEnd = $iconEnd !== null;
    $hasAddon = $addon !== null;
    $hasAddonEnd = $addonEnd !== null;

    $inputClasses = Ui::classes()
        ->add('block w-full appearance-none border shadow-xs focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add('autofill:shadow-[inset_0_0_0_1000px_white] autofill:[-webkit-text-fill-color:theme(colors.gray.900)]')
        ->add(
            'dark:autofill:shadow-[inset_0_0_0_1000px_theme(colors.gray.800)] dark:autofill:[-webkit-text-fill-color:theme(colors.gray.100)]',
        )
        ->add($size, [
            'sm' => 'h-8 px-2.5 py-1.5 text-xs',
            'md' => 'h-10 px-3 py-2 text-sm',
            'lg' => 'h-12 px-4 py-3 text-base',
        ])
        ->add(
            match (true) {
                (bool) $error
                    => 'border-red-500 bg-white text-gray-900 placeholder-gray-400 focus:border-red-500 dark:border-red-500 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-red-500',
                $variant === 'inverted'
                    => 'border-gray-140 bg-gray-10 text-gray-900 placeholder-gray-400 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-820 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-gray-600',
                default
                    => 'border-gray-140 bg-white text-gray-900 placeholder-gray-400 focus:border-gray-400 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-gray-500',
            },
        )
        ->add(
            match (true) {
                $hasAddon && $hasAddonEnd => 'rounded-none',
                $hasAddon => 'rounded-none rounded-e-md',
                $hasAddonEnd => 'rounded-none rounded-s-md',
                default => 'rounded-md',
            },
        )
        ->when($hasIcon, 'pl-10')
        ->when($hasIconEnd, 'pr-10');

    $wrapperClasses = Ui::classes()->add('relative w-full')->merge($attributes->only('class'));

    $iconWrapperClasses = 'pointer-events-none absolute inset-y-0 flex items-center text-gray-400 dark:text-gray-500';
@endphp

@if ($label)
    <ui:field>
        <ui:label :for="$id">{{ $label }}</ui:label>

        <x-ui::input._input :type="$type" :id="$id" :name="$name" :error="$error" :icon="$icon"
            :icon-end="$iconEnd" :addon="$addon" :addon-end="$addonEnd" :input-classes="$inputClasses" :wrapper-classes="$wrapperClasses" :icon-wrapper-classes="$iconWrapperClasses"
            :attributes="$attributes" />

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($name)
            <ui:error :name="$name" />
        @endif
    </ui:field>
@else
    <x-ui::input._input :type="$type" :id="$id" :name="$name" :error="$error" :icon="$icon"
        :icon-end="$iconEnd" :addon="$addon" :addon-end="$addonEnd" :input-classes="$inputClasses" :wrapper-classes="$wrapperClasses"
        :icon-wrapper-classes="$iconWrapperClasses" :attributes="$attributes" />
@endif
