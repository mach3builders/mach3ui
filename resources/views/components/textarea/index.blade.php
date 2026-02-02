@props([
    'help' => null,
    'label' => null,
    'resize' => false,
    'size' => null,
])

@php
    $wireModel = $attributes->wire('model');
    $hasWireModel = $wireModel && method_exists($wireModel, 'value');
    $wireModelValue = $hasWireModel ? $wireModel->value() : null;
    $xModel = $attributes->whereStartsWith('x-model')->first();

    $name = $attributes->get('name') ?? ($wireModelValue ?? $xModel);
    $id = $attributes->get('id') ?? ($name ? "textarea-{$name}" : 'textarea-' . uniqid());
    $hasError = $name && $errors->has($name);

    $classes = Ui::classes()
        ->add('block w-full max-h-96 appearance-none rounded-md border shadow-xs')
        ->add('border-gray-140 bg-white text-gray-900 placeholder-gray-400')
        ->add('dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500')
        ->add('focus:border-gray-400 focus:outline-none')
        ->add('dark:focus:border-gray-500')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add(
            match ($size) {
                'sm' => 'min-h-20 px-2.5 py-1.5 text-xs',
                'lg' => 'min-h-40 px-4 py-3 text-base',
                default => 'min-h-32 px-3 py-2.5 text-sm',
            },
        )
        ->add($resize ? 'resize-y' : 'resize-none')
        ->when($hasError, 'border-red-500 dark:border-red-500 focus:border-red-500 dark:focus:border-red-500')
        ->merge($attributes->only('class'));

    $alpineData =
        '{ resize() { $el.style.height = \'auto\'; $el.style.height = Math.min($el.scrollHeight, 384) + \'px\'; } }';
@endphp

@if ($label)
    <ui:field>
        <ui:label :for="$id">{{ $label }}</ui:label>

        <textarea {{ $attributes->except('class') }} id="{{ $id }}" class="{{ $classes }}" x-data="{{ $alpineData }}"
            x-init="resize()" x-on:input="resize()" data-textarea data-control>{{ $slot }}</textarea>

        @if ($help)
            <ui:help>{{ $help }}</ui:help>
        @endif

        @if ($name)
            <ui:error :name="$name" />
        @endif
    </ui:field>
@else
    <textarea {{ $attributes->except('class') }} id="{{ $id }}" class="{{ $classes }}" x-data="{{ $alpineData }}"
        x-init="resize()" x-on:input="resize()" data-textarea data-control>{{ $slot }}</textarea>
@endif
