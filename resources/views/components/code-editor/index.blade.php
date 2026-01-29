@props([
    'code' => null,
    'copyable' => true,
    'footer' => false,
    'header' => true,
    'language' => 'javascript',
    'name' => 'code',
    'placeholder' => '',
    'readonly' => false,
])

@php
    $language_labels = [
        'javascript' => 'JavaScript',
        'js' => 'JavaScript',
        'typescript' => 'TypeScript',
        'ts' => 'TypeScript',
        'jsx' => 'JSX',
        'tsx' => 'TSX',
        'html' => 'HTML',
        'blade' => 'Blade',
        'css' => 'CSS',
        'json' => 'JSON',
        'php' => 'PHP',
        'sql' => 'SQL',
    ];

    $language_label = $language_labels[strtolower($language)] ?? strtoupper($language);
    $wire_modifiers = ['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.change', 'wire:model.debounce'];
@endphp

<div
    {{ $attributes->class([
        'code-editor flex flex-col overflow-hidden rounded-md border shadow-xs',
        'border-gray-140 bg-white',
        'dark:border-gray-700 dark:bg-gray-800',
        'code-editor-readonly' => $readonly,
    ])->except($wire_modifiers) }}
    data-code-editor
    data-language="{{ $language }}"
    @if ($placeholder) data-placeholder="{{ $placeholder }}" @endif
    @if ($readonly) data-readonly @endif
>
    @if ($header)
        <div
            class="flex items-center justify-between border-b px-3 py-2
                   border-gray-140 bg-gray-30
                   dark:border-gray-700 dark:bg-gray-830"
        >
            <span
                class="text-xs font-medium uppercase tracking-wide
                       text-gray-500
                       dark:text-gray-400"
            >{{ $language_label }}</span>

            @if ($copyable)
                <div class="flex items-center gap-1">
                    <button
                        type="button"
                        class="inline-flex h-7 w-7 items-center justify-center rounded
                               text-gray-500 hover:bg-gray-100 hover:text-gray-700
                               dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200"
                        data-action="copy"
                        title="Copy code"
                    >
                        <ui:icon name="copy" class="size-3.5" />
                    </button>
                </div>
            @endif
        </div>
    @endif

    <div class="code-editor-content relative min-h-32"></div>

    @if ($footer)
        <div
            class="flex items-center justify-between border-t px-3 py-2
                   border-gray-140 bg-gray-30
                   dark:border-gray-700 dark:bg-gray-800"
        >
            <span
                class="code-editor-status text-xs
                       text-gray-500
                       dark:text-gray-400"
            ></span>
        </div>
    @endif

    <textarea class="hidden" name="{{ $name }}" {{ $attributes->only($wire_modifiers) }}>{{ $code ?? $slot }}</textarea>
</div>
