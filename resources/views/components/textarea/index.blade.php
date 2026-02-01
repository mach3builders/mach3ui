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

    // Extract x-model attribute
    $xModel = null;
    foreach ($attributes as $key => $val) {
        if (str_starts_with($key, 'x-model')) {
            $xModel = $val;
            break;
        }
    }

    $name = $attributes->get('name') ?? ($wireModelValue ?? $xModel);
    $id = $attributes->get('id') ?? ($name ? 'textarea-' . $name : ($label ? 'textarea-' . Str::random(8) : null));
    $hasError = $name && $errors->has($name);

    $sizeClasses = match ($size) {
        'sm' => 'min-h-20 px-2.5 py-1.5 text-xs',
        'lg' => 'min-h-40 px-4 py-3 text-base',
        default => 'min-h-32 px-3 py-2.5 text-sm',
    };

    $wrapperClasses = Ui::classes()->merge($attributes->only('class'));

    $textareaClasses = Ui::classes()
        ->add('block w-full max-h-96 appearance-none rounded-md border shadow-xs')
        ->add('border-gray-140 bg-white text-gray-900 placeholder-gray-400')
        ->add('dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500')
        ->add('focus:border-gray-400 focus:outline-none')
        ->add('dark:focus:border-gray-500')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add($sizeClasses)
        ->add($resize ? 'resize-y' : 'resize-none')
        ->when($hasError, 'border-red-500 dark:border-red-500 focus:border-red-500 dark:focus:border-red-500');
@endphp

@if ($label)
    <ui:field>
        <ui:label :for="$id">{{ $label }}</ui:label>

        <div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-textarea data-control>
            <textarea x-data="{
                resize() {
                    $el.style.height = 'auto';
                    $el.style.height = Math.min($el.scrollHeight, 384) + 'px';
                }
            }" x-init="resize()" x-on:input="resize()" class="{{ $textareaClasses }}"
                @if ($name) name="{{ $name }}" @endif id="{{ $id }}"
                {{ $attributes->except(['class', 'data-*', 'name']) }}>{{ $slot }}</textarea>
        </div>

        @if ($help)
            <ui:help>{{ $help }}</ui:help>
        @endif

        @if ($name)
            <ui:error :name="$name" />
        @endif
    </ui:field>
@else
    <div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-textarea data-control>
        <textarea x-data="{
            resize() {
                $el.style.height = 'auto';
                $el.style.height = Math.min($el.scrollHeight, 384) + 'px';
            }
        }" x-init="resize()" x-on:input="resize()" class="{{ $textareaClasses }}"
            @if ($name) name="{{ $name }}" @endif
            {{ $attributes->except(['class', 'data-*', 'name']) }}>{{ $slot }}</textarea>
    </div>
@endif
