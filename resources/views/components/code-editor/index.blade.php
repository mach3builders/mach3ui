@blaze

@props([
    'footer' => false,
    'header' => true,
    'hint' => null,
    'label' => null,
    'language' => 'javascript',
    'name' => null,
    'placeholder' => null,
    'readonly' => false,
    'size' => 'md',
    'variant' => 'default',
])

@aware(['id'])

@php
    // Get wire:model value directly from attributes
    $allAttrs = $attributes->getAttributes();
    $wireModelValue = null;
    $xModelValue = null;

    foreach ($allAttrs as $key => $value) {
        if (str_starts_with($key, 'wire:model')) {
            $wireModelValue = $value;
            break;
        }
    }

    foreach ($allAttrs as $key => $value) {
        if (str_starts_with($key, 'x-model')) {
            $xModelValue = $value;
            break;
        }
    }

    // Name priority: prop > wire:model > x-model > field id
    $editorName = $name ?: $wireModelValue ?: $xModelValue ?: $id;

    // ID priority: explicit id attr > field id (@aware) > editor name > auto-generated
    $id =
        $attributes->get('id') ??
        ($id ?? ($editorName ?? Ui::uniqueId('code-editor')));

    $error = $editorName ? $errors->first($editorName) ?? null : null;

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

    // Model attributes to pass through
    $modelAttrs = [
        'wire:model',
        'wire:model.live',
        'wire:model.blur',
        'wire:model.change',
        'wire:model.debounce',
        'x-model',
        'x-model.lazy',
        'x-model.debounce',
    ];

    // Container classes
    $containerClasses = Ui::classes()
        ->add('flex flex-col overflow-hidden rounded-md border shadow-xs')
        ->add(
            match (true) {
                (bool) $error => 'border-red-500 dark:border-red-500',
                $variant === 'inverted' => 'border-gray-140 bg-gray-10 dark:border-gray-700 dark:bg-gray-820',
                default => 'border-gray-140 bg-white dark:border-gray-700 dark:bg-gray-800',
            },
        )
        ->merge($attributes->only('class'));

    // Header classes
    $headerClasses = Ui::classes()
        ->add('flex items-center justify-between border-b px-3 py-2')
        ->add(
            match ($variant) {
                'inverted' => 'border-gray-140 bg-gray-20 dark:border-gray-700 dark:bg-gray-820',
                default => 'border-gray-140 bg-gray-20 dark:border-gray-700 dark:bg-gray-820',
            },
        );

    // Label classes
    $labelClasses = Ui::classes()
        ->add('text-xs font-medium uppercase tracking-wide')
        ->add('text-gray-500 dark:text-gray-400');

    // Content area classes
    $contentClasses = Ui::classes()
        ->add('relative')
        ->add($size, [
            'sm' => 'min-h-24',
            'md' => 'min-h-32',
            'lg' => 'min-h-48',
        ]);

    // Footer classes
    $footerClasses = Ui::classes()
        ->add('flex items-center justify-between border-t px-3 py-2')
        ->add(
            match ($variant) {
                'inverted' => 'border-gray-140 bg-gray-30 dark:border-gray-700 dark:bg-gray-830',
                default => 'border-gray-140 bg-gray-30 dark:border-gray-700 dark:bg-gray-800',
            },
        );

    $statusClasses = Ui::classes()->add('text-xs text-gray-500 dark:text-gray-400');
@endphp

@if ($label)
    <ui:field :id="$id">
        <ui:label>{{ $label }}</ui:label>

        <div id="{{ $id }}" class="{{ $containerClasses }}"
            {{ $attributes->except(['class', 'id', ...$modelAttrs]) }} data-code-editor
            data-language="{{ $language }}"
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

            <div class="{{ $contentClasses }}" wire:ignore.self data-code-editor-content></div>

            @if ($showFooter)
                <div class="{{ $footerClasses }}" data-code-editor-footer>
                    @if ($footerSlot)
                        {{ $footerSlot }}
                    @else
                        <span class="{{ $statusClasses }}" data-code-editor-status></span>
                    @endif
                </div>
            @endif

            <textarea class="hidden" @if ($editorName) name="{{ $editorName }}" @endif
                {{ $attributes->only($modelAttrs) }}>{{ $slot }}</textarea>
        </div>

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($editorName)
            <ui:error :name="$editorName" />
        @endif
    </ui:field>
@else
    <div id="{{ $id }}" class="{{ $containerClasses }}"
        {{ $attributes->except(['class', 'id', ...$modelAttrs]) }} data-code-editor
        data-language="{{ $language }}"
        @if ($placeholder) data-placeholder="{{ $placeholder }}" @endif
        @if ($readonly) data-readonly @endif data-control>
        @if ($showHeader)
            <div class="{{ $headerClasses }}" data-code-editor-header>
                @if ($headerSlot)
                    {{ $headerSlot }}
                @else
                    <span class="{{ $labelClasses }}">{{ $languageLabel }}</span>
                @endif
            </div>
        @endif

        <div class="{{ $contentClasses }}" wire:ignore.self data-code-editor-content></div>

        @if ($showFooter)
            <div class="{{ $footerClasses }}" data-code-editor-footer>
                @if ($footerSlot)
                    {{ $footerSlot }}
                @else
                    <span class="{{ $statusClasses }}" data-code-editor-status></span>
                @endif
            </div>
        @endif

        <textarea class="hidden" @if ($editorName) name="{{ $editorName }}" @endif
            {{ $attributes->only($modelAttrs) }}>{{ $slot }}</textarea>
    </div>
@endif
