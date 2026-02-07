@props([
    'autoResize' => true,
    'hint' => null,
    'label' => null,
    'name' => null,
    'resize' => false,
    'rows' => null,
    'size' => 'md',
    'variant' => 'default',
])

@aware(['id'])

@php
    // Get wire:model using Livewire's helper
$wireModel = $attributes->wire('model');
$wireModelValue = $wireModel?->directive ? $wireModel->value() : null;
$isLive = $wireModel?->directive ? $wireModel->hasModifier('live') : false;

// Get x-model value
$xModelValue = null;
foreach ($attributes->getAttributes() as $key => $value) {
    if (str_starts_with($key, 'x-model')) {
        $xModelValue = $value;
        break;
    }
}

// Name handling: only show name if explicitly passed as prop
$showName = isset($name);
$textareaName = $name ?: $wireModelValue ?: $xModelValue ?: $id;

// ID priority: explicit id attr > field id (@aware) > textarea name > auto-generated
$id =
    $attributes->get('id') ??
    ($id ?? ($textareaName ?? Ui::uniqueId('textarea')));

$error = $textareaName ? $errors->first($textareaName) ?? null : null;

$classes = Ui::classes()
    ->add('block w-full appearance-none border shadow-xs focus:outline-none')
    ->add('disabled:cursor-not-allowed disabled:opacity-50')
    ->add($resize ? 'resize-y' : 'resize-none')
    ->add('rounded-md')
    ->add($size, [
        'sm' => 'min-h-20 px-2.5 py-1.5 text-xs',
        'md' => 'min-h-32 px-3 py-2.5 text-sm',
        'lg' => 'min-h-40 px-4 py-3 text-base',
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
    ->when($autoResize, 'max-h-96')
    ->merge($attributes->only('class'));

// Auto-resize Alpine data
$alpineData = $autoResize
    ? "{ resize() { \$el.style.height = 'auto'; \$el.style.height = Math.min(\$el.scrollHeight, 384) + 'px'; } }"
        : null;
@endphp

@if ($label)
    <ui:field :id="$id">
        <ui:label :required="$attributes->has('required')">{{ $label }}</ui:label>

        <textarea id="{{ $id }}" @if ($showName && $textareaName) name="{{ $textareaName }}" @endif
            @if ($error) aria-invalid="true" @endif
            @if ($rows) rows="{{ $rows }}" @endif
            @if ($isLive) wire:loading.class="opacity-50" @endif
            @if ($isLive && $wireModelValue) wire:target="{{ $wireModelValue }}" @endif
            @if ($autoResize) x-data="{{ $alpineData }}" x-init="resize()" x-on:input="resize()" @endif
            class="{{ $classes }}" {{ $attributes->except(['class', 'name', 'id', 'rows']) }} data-control>{{ $slot }}</textarea>

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($textareaName)
            <ui:error :name="$textareaName" />
        @endif
    </ui:field>
@else
    <textarea id="{{ $id }}" @if ($showName && $textareaName) name="{{ $textareaName }}" @endif
        @if ($error) aria-invalid="true" @endif
        @if ($rows) rows="{{ $rows }}" @endif
        @if ($isLive) wire:loading.class="opacity-50" @endif
        @if ($isLive && $wireModelValue) wire:target="{{ $wireModelValue }}" @endif
        @if ($autoResize) x-data="{{ $alpineData }}" x-init="resize()" x-on:input="resize()" @endif
        class="{{ $classes }}" {{ $attributes->except(['class', 'name', 'id', 'rows']) }} data-control>{{ $slot }}</textarea>
@endif
