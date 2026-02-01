@props([
    'accept' => null,
    'button:text' => null,
    'multiple' => false,
    'placeholder' => null,
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

    $buttonText = $__data['button:text'] ?? null;

    $resolvedPlaceholder = $placeholder ?? __('ui::ui.input_file.placeholder');
    $resolvedButtonText = $buttonText ?? __('ui::ui.browse');
    $filesSelectedTemplate = __('ui::ui.input_file.files_selected');

    $classes = Ui::classes()->add('relative flex w-full')->merge($attributes->only('class'));
@endphp

<div x-data="{
    fileName: '',
    placeholder: @js($resolvedPlaceholder),
    filesSelectedTemplate: @js($filesSelectedTemplate),
    get displayText() {
        return this.fileName || this.placeholder;
    },
    handleChange(e) {
        const files = Array.from(e.target.files);
        if (files.length === 0) {
            this.fileName = '';
        } else if (files.length === 1) {
            this.fileName = files[0].name;
        } else {
            this.fileName = this.filesSelectedTemplate.replace(':count', files.length);
        }
    }
}" class="{{ $classes }}" {{ $attributes->except('class') }} data-input-file data-control>
    <span
        class="block h-10 min-w-0 flex-1 truncate rounded-s-md border border-r-0 px-3 py-2 text-sm border-gray-140 bg-white text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400"
        x-text="displayText"></span>

    <span
        class="btn inline-flex h-10 shrink-0 cursor-pointer select-none items-center justify-center gap-2 whitespace-nowrap rounded-e-md border px-4 text-xs font-semibold uppercase border-gray-120 bg-white text-gray-700 shadow-xs hover:bg-gray-20 hover:text-gray-900 dark:border-gray-690 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-780 dark:hover:text-gray-20">
        {{ $resolvedButtonText }}
    </span>

    <input type="file" class="absolute inset-0 cursor-pointer opacity-0"
        @if ($name) name="{{ $name }}" @endif {{ $attributes->except(['class', 'name']) }}
        @if ($accept) accept="{{ $accept }}" @endif
        @if ($multiple) multiple @endif x-on:change="handleChange($event)" />
</div>
