@props([
    'help' => null,
    'label' => null,
    'resize' => false,
    'size' => null,
])

@php
    $wireModel = $attributes->wire('model');
    $wireModelValue = $wireModel?->value();

    $id = $attributes->get('id') ?? ($label ? 'textarea-' . Str::random(8) : null);
    $name = $attributes->get('name') ?? $wireModelValue;
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

        <div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-textarea>
            <textarea x-data="{
                resize() {
                    $el.style.height = 'auto';
                    $el.style.height = Math.min($el.scrollHeight, 384) + 'px';
                }
            }" x-init="resize()" x-on:input="resize()" class="{{ $textareaClasses }}"
                {{ $attributes->except(['class', 'data-*']) }} id="{{ $id }}">{{ $slot }}</textarea>
        </div>

        @if ($help)
            <ui:help>{{ $help }}</ui:help>
        @endif

        @if ($name)
            <ui:error :name="$name" />
        @endif
    </ui:field>
@else
    <div class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-textarea>
        <textarea x-data="{
            resize() {
                $el.style.height = 'auto';
                $el.style.height = Math.min($el.scrollHeight, 384) + 'px';
            }
        }" x-init="resize()" x-on:input="resize()" class="{{ $textareaClasses }}"
            {{ $attributes->except(['class', 'data-*']) }}>{{ $slot }}</textarea>
    </div>
@endif
