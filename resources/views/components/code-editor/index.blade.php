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
    $languageLabels = [
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

    $languageLabel = $languageLabels[strtolower($language)] ?? strtoupper($language);
    $wireModifiers = ['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.change', 'wire:model.debounce'];

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

    $statusClasses = Ui::classes()->add('text-xs')->add('text-gray-500')->add('dark:text-gray-400');
@endphp

<div class="{{ $classes }}" {{ $attributes->except(['class', ...$wireModifiers]) }} data-code-editor
    data-language="{{ $language }}" @if ($placeholder) data-placeholder="{{ $placeholder }}" @endif
    @if ($readonly) data-readonly @endif>
    @if ($header)
        <div class="{{ $headerClasses }}" data-code-editor-header>
            <span class="{{ $labelClasses }}">{{ $languageLabel }}</span>
        </div>
    @endif

    <div class="relative min-h-32" data-code-editor-content></div>

    @if ($footer)
        <div class="{{ $footerClasses }}" data-code-editor-footer>
            <span class="{{ $statusClasses }}" data-code-editor-status></span>
        </div>
    @endif

    <textarea class="hidden" name="{{ $name }}" {{ $attributes->only($wireModifiers) }}>{{ $code ?? $slot }}</textarea>
</div>
