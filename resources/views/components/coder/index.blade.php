@props([
    'language' => 'javascript',
    'name' => null,
    'placeholder' => null,
    'readonly' => false,
])

@php
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

    $editorName = $name ?: $wireModelValue ?: $xModelValue;
    $id = $attributes->get('id') ?? Ui::uniqueId('coder');

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

    $classes = Ui::classes()
        ->add('ui-coder overflow-hidden rounded-md border shadow-xs')
        ->add('border-gray-140 dark:border-gray-700')
        ->add('focus-within:border-gray-400 dark:focus-within:border-gray-500')
        ->merge($attributes->only('class'));
@endphp

<div
    id="{{ $id }}"
    class="{{ $classes }}"
    wire:ignore
    x-data="uiCoder({
        language: @js($language),
        placeholder: @js($placeholder ?? ''),
        readonly: @js($readonly),
    })"
    {{ $attributes->except(['class', 'id', ...$modelAttrs]) }}
>
    <div x-ref="editor"></div>
    <textarea
        x-ref="input"
        class="sr-only"
        @if ($editorName) name="{{ $editorName }}" @endif
        {{ $attributes->only($modelAttrs) }}
    >{{ $slot }}</textarea>

    @once
        <script type="module">
            const modules = {};

            async function loadModules() {
                if (modules.loaded) return modules;

                const [state, view, commands, language, highlight, autocomplete, langJs, langHtml, langCss] = await Promise.all([
                    import('https://esm.sh/@codemirror/state@6'),
                    import('https://esm.sh/@codemirror/view@6'),
                    import('https://esm.sh/@codemirror/commands@6'),
                    import('https://esm.sh/@codemirror/language@6'),
                    import('https://esm.sh/@lezer/highlight@1'),
                    import('https://esm.sh/@codemirror/autocomplete@6'),
                    import('https://esm.sh/@codemirror/lang-javascript@6'),
                    import('https://esm.sh/@codemirror/lang-html@6'),
                    import('https://esm.sh/@codemirror/lang-css@6'),
                ]);

                Object.assign(modules, { state, view, commands, language, highlight, autocomplete, langJs, langHtml, langCss, loaded: true });
                return modules;
            }

            function isDarkMode() {
                return document.documentElement.classList.contains('dark');
            }

            function getHighlightStyle(m) {
                const { HighlightStyle } = m.language;
                const { tags } = m.highlight;

                return isDarkMode()
                    ? HighlightStyle.define([
                        { tag: tags.keyword, color: '#569cd6' },
                        { tag: tags.controlKeyword, color: '#c586c0' },
                        { tag: tags.operatorKeyword, color: '#569cd6' },
                        { tag: tags.operator, color: '#d4d4d4' },
                        { tag: tags.number, color: '#b5cea8' },
                        { tag: tags.string, color: '#ce9178' },
                        { tag: tags.comment, color: '#6a9955', fontStyle: 'italic' },
                        { tag: tags.variableName, color: '#9cdcfe' },
                        { tag: tags.definition(tags.variableName), color: '#dcdcaa' },
                        { tag: tags.function(tags.variableName), color: '#dcdcaa' },
                        { tag: tags.propertyName, color: '#9cdcfe' },
                        { tag: tags.typeName, color: '#4ec9b0' },
                        { tag: tags.bool, color: '#569cd6' },
                        { tag: tags.null, color: '#569cd6' },
                        { tag: tags.punctuation, color: '#d4d4d4' },
                        { tag: tags.tagName, color: '#569cd6' },
                        { tag: tags.attributeName, color: '#9cdcfe' },
                        { tag: tags.attributeValue, color: '#ce9178' },
                        { tag: tags.angleBracket, color: '#808080' },
                    ])
                    : HighlightStyle.define([
                        { tag: tags.keyword, color: '#0000ff' },
                        { tag: tags.controlKeyword, color: '#af00db' },
                        { tag: tags.operatorKeyword, color: '#0000ff' },
                        { tag: tags.operator, color: '#000000' },
                        { tag: tags.number, color: '#098658' },
                        { tag: tags.string, color: '#a31515' },
                        { tag: tags.comment, color: '#008000', fontStyle: 'italic' },
                        { tag: tags.variableName, color: '#001080' },
                        { tag: tags.definition(tags.variableName), color: '#795e26' },
                        { tag: tags.function(tags.variableName), color: '#dcdcaa' },
                        { tag: tags.propertyName, color: '#001080' },
                        { tag: tags.typeName, color: '#267f99' },
                        { tag: tags.bool, color: '#0000ff' },
                        { tag: tags.null, color: '#0000ff' },
                        { tag: tags.punctuation, color: '#000000' },
                        { tag: tags.tagName, color: '#800000' },
                        { tag: tags.attributeName, color: '#ff0000' },
                        { tag: tags.attributeValue, color: '#0000ff' },
                        { tag: tags.angleBracket, color: '#800000' },
                    ]);
            }

            function getBaseTheme(m) {
                const { EditorView } = m.view;
                const dark = isDarkMode();
                const styles = getComputedStyle(document.documentElement);
                const bgColor = dark
                    ? (styles.getPropertyValue('--color-gray-800').trim() || 'oklch(0.2 0.0084 248)')
                    : '#ffffff';
                const gutterBg = dark
                    ? (styles.getPropertyValue('--color-gray-820').trim() || 'oklch(0.18 0.008 248)')
                    : (styles.getPropertyValue('--color-gray-20').trim() || 'oklch(0.98 0.0024 248)');
                const gutterColor = dark
                    ? (styles.getPropertyValue('--color-gray-500').trim() || 'oklch(0.5 0.018 248)')
                    : '#6e7681';

                return EditorView.theme({
                    '&': { backgroundColor: bgColor, fontSize: '13px' },
                    '.cm-scroller': { fontFamily: 'ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace', lineHeight: '1.5' },
                    '.cm-gutters': { backgroundColor: gutterBg, color: gutterColor, border: 'none', paddingRight: '8px', paddingTop: '8px', paddingBottom: '8px' },
                    '.cm-content': { padding: '8px 0', caretColor: dark ? '#aeafad' : '#000000' },
                    '.cm-lineNumbers .cm-gutterElement': { padding: '0 8px 0 16px', minWidth: '32px' },
                    '.cm-activeLine': { backgroundColor: dark ? 'rgba(255,255,255,0.04)' : 'rgba(0,0,0,0.04)' },
                    '.cm-activeLineGutter': { backgroundColor: 'transparent' },
                    '.cm-cursor': { borderLeftColor: dark ? '#aeafad' : '#000000' },
                    '&.cm-focused .cm-selectionBackground, .cm-selectionBackground': { backgroundColor: dark ? 'rgba(38,79,120,0.7)' : 'rgba(173,214,255,0.7)' },
                    '.cm-placeholder': { color: dark ? '#6e6e6e' : '#a0a0a0' },
                });
            }

            function getLanguageExtension(m, lang) {
                const { javascript } = m.langJs;
                const { html } = m.langHtml;
                const { css } = m.langCss;
                const languages = { javascript, js: javascript, html, css };
                return languages[lang?.toLowerCase()]?.() || null;
            }

            // Register Alpine component
            function registerComponent() {
                if (Alpine.data.uiCoder) return;

                Alpine.data('uiCoder', (config) => ({
                    content: '',
                    language: config.language || 'javascript',
                    placeholder: config.placeholder || '',
                    readonly: config.readonly || false,
                    view: null,
                    themeCompartment: null,
                    baseThemeCompartment: null,
                    darkModeObserver: null,

                    async init() {
                        // Get content from textarea to preserve special characters
                        this.content = this.$refs.input?.value || '';
                        const m = await loadModules();
                        this.$nextTick(() => this.createEditor(m));
                    },

                    destroy() {
                        this.darkModeObserver?.disconnect();
                        this.view?.destroy();
                    },

                    createEditor(m) {
                        const editorEl = this.$refs.editor;
                        const inputEl = this.$refs.input;
                        if (!editorEl) return;

                        const { EditorState, Compartment } = m.state;
                        const { EditorView, keymap, lineNumbers, highlightActiveLine, placeholder: placeholderExt } = m.view;
                        const { defaultKeymap, history, historyKeymap, indentWithTab } = m.commands;
                        const { syntaxHighlighting, bracketMatching, indentOnInput } = m.language;
                        const { closeBrackets, closeBracketsKeymap } = m.autocomplete;

                        this.themeCompartment = new Compartment();
                        this.baseThemeCompartment = new Compartment();

                        const extensions = [
                            this.baseThemeCompartment.of(getBaseTheme(m)),
                            lineNumbers(),
                            highlightActiveLine(),
                            history(),
                            bracketMatching(),
                            closeBrackets(),
                            indentOnInput(),
                            this.themeCompartment.of(syntaxHighlighting(getHighlightStyle(m))),
                            keymap.of([...defaultKeymap, ...historyKeymap, ...closeBracketsKeymap, indentWithTab]),
                            EditorView.lineWrapping,
                        ];

                        const langExt = getLanguageExtension(m, this.language);
                        if (langExt) extensions.push(langExt);

                        if (this.placeholder) extensions.push(placeholderExt(this.placeholder));

                        if (this.readonly) {
                            extensions.push(EditorState.readOnly.of(true));
                            extensions.push(EditorView.editable.of(false));
                        }

                        if (inputEl && !this.readonly) {
                            extensions.push(EditorView.updateListener.of((update) => {
                                if (update.docChanged) {
                                    inputEl.value = update.state.doc.toString();
                                    inputEl.dispatchEvent(new Event('input', { bubbles: true }));
                                }
                            }));
                        }

                        this.view = new EditorView({
                            state: EditorState.create({ doc: this.content, extensions }),
                            parent: editorEl,
                        });

                        // Watch dark mode changes
                        this.darkModeObserver = new MutationObserver(() => {
                            if (!this.view) return;
                            const { syntaxHighlighting } = m.language;
                            this.view.dispatch({
                                effects: [
                                    this.themeCompartment.reconfigure(syntaxHighlighting(getHighlightStyle(m))),
                                    this.baseThemeCompartment.reconfigure(getBaseTheme(m)),
                                ],
                            });
                        });

                        this.darkModeObserver.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
                    },
                }));
            }

            // Register immediately if Alpine exists, otherwise wait for init
            if (window.Alpine) {
                registerComponent();
            } else {
                document.addEventListener('alpine:init', registerComponent);
            }
        </script>
    @endonce
</div>
