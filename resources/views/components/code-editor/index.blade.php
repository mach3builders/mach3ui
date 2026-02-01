@props([
    'code' => null,
    'footer' => false,
    'header' => true,
    'language' => 'javascript',
    'name' => 'code',
    'placeholder' => '',
    'readonly' => false,
])

@php
    $id = uniqid('code-editor-');

    // Language display labels
    $languageLabels = [
        'blade' => 'Blade',
        'css' => 'CSS',
        'html' => 'HTML',
        'javascript' => 'JavaScript',
        'js' => 'JavaScript',
        'json' => 'JSON',
        'jsx' => 'JSX',
        'php' => 'PHP',
        'sql' => 'SQL',
        'ts' => 'TypeScript',
        'tsx' => 'TSX',
        'typescript' => 'TypeScript',
    ];
    $languageLabel = $languageLabels[strtolower($language)] ?? strtoupper($language);

    // Slots
    $headerSlot = $__laravel_slots['header'] ?? null;
    $footerSlot = $__laravel_slots['footer'] ?? null;
    $showHeader = $header || $headerSlot;
    $showFooter = $footer || $footerSlot;

    // Wire model
    $wireModifiers = ['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.change', 'wire:model.debounce'];

    // Classes
    $classes = Ui::classes()
        ->add('flex flex-col overflow-hidden rounded-md border shadow-xs')
        ->add('border-gray-140 bg-white')
        ->add('dark:border-gray-700 dark:bg-gray-800')
        ->merge($attributes->only('class'));

    $headerClasses = Ui::classes()
        ->add('flex items-center justify-between border-b px-3 py-2')
        ->add('border-gray-140 bg-gray-30')
        ->add('dark:border-gray-700 dark:bg-gray-830');

    $labelClasses = Ui::classes()
        ->add('text-xs font-medium uppercase tracking-wide')
        ->add('text-gray-500')
        ->add('dark:text-gray-400');

    $footerClasses = Ui::classes()
        ->add('flex items-center justify-between border-t px-3 py-2')
        ->add('border-gray-140 bg-gray-30')
        ->add('dark:border-gray-700 dark:bg-gray-800');

    $statusClasses = Ui::classes()->add('text-xs text-gray-500')->add('dark:text-gray-400');
@endphp

<div class="{{ $classes }}" {{ $attributes->except(['class', ...$wireModifiers]) }} id="{{ $id }}"
    data-code-editor data-language="{{ $language }}"
    @if ($placeholder) data-placeholder="{{ $placeholder }}" @endif
    @if ($readonly) data-readonly @endif>
    @if ($showHeader)
        <div class="{{ $headerClasses }}" data-code-editor-header>
            @if ($headerSlot)
                {{ $headerSlot }}
            @else
                <span class="{{ $labelClasses }}">{{ $languageLabel }}</span>
            @endif
        </div>
    @endif

    <div class="relative min-h-32" wire:ignore.self data-code-editor-content></div>

    @if ($showFooter)
        <div class="{{ $footerClasses }}" data-code-editor-footer>
            @if ($footerSlot)
                {{ $footerSlot }}
            @else
                <span class="{{ $statusClasses }}" data-code-editor-status></span>
            @endif
        </div>
    @endif

    <textarea class="hidden" name="{{ $name }}" {{ $attributes->only($wireModifiers) }}>{{ $code ?? $slot }}</textarea>
</div>
