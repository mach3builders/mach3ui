@props([
    'language' => 'html',
    'placeholder' => '',
    'readonly' => false,
    'disabled' => false,
    'lineNumbers' => true,
    'minHeight' => '8rem',
    'maxHeight' => null,
    'tabSize' => 4,
    'invalid' => null,
    'name' => null,
])

@php
$showName = isset($name);

if (! isset($name)) {
    $name = $attributes->whereStartsWith('wire:model')->first();
}

$invalid ??= ($name && $errors->has($name));

$classes = Flux::classes()
    ->add('block w-full overflow-hidden rounded-lg border')
    ->add('shadow-xs [&[disabled]]:shadow-none')
    ->add('bg-white dark:bg-white/10 dark:[&[disabled]]:bg-white/[7%]')
    ->add($invalid
        ? 'border-red-500'
        : 'border-zinc-200 border-b-zinc-300/80 dark:border-white/10'
    );
@endphp

<div
    {{ $attributes->except(['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.lazy', 'wire:model.debounce'])->class($classes) }}
    data-flux-code-editor
    @if($disabled) disabled @endif
    x-data="codeEditor({
        language: @js($language),
        readonly: @js((bool) ($readonly || $disabled)),
        lineNumbers: @js((bool) $lineNumbers),
        placeholder: @js($placeholder),
        minHeight: @js($minHeight),
        maxHeight: @js($maxHeight),
        tabSize: @js((int) $tabSize),
    })"
>
    {{-- Loading skeleton --}}
    <div x-show="!ready" class="animate-pulse rounded bg-zinc-100 dark:bg-white/5" :style="`min-height: ${minHeight}`"></div>

    {{-- CodeMirror mount point --}}
    <div x-ref="editor" x-show="ready" x-cloak wire:ignore></div>

    {{-- Hidden textarea for wire:model binding --}}
    <textarea
        x-ref="textarea"
        @if($showName) name="{{ $name }}" @endif
        class="sr-only"
        tabindex="-1"
        aria-hidden="true"
        {{ $attributes->only(['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.lazy', 'wire:model.debounce']) }}
    ></textarea>
</div>

@assets
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('codeEditor', (config) => ({
        ready: false,
        view: null,
        minHeight: config.minHeight,
        _themeCompartment: null,
        _observer: null,

        async init() {
            const textarea = this.$refs.textarea;
            const initialValue = textarea.value || '';

            const CM_BASE = 'https://esm.sh';

            const [
                { EditorView, basicSetup },
                { EditorState, Compartment },
                { placeholder },
                langMod,
                darkThemeMod,
            ] = await Promise.all([
                import(`${CM_BASE}/codemirror@6`),
                import(`${CM_BASE}/@codemirror/state@6`),
                import(`${CM_BASE}/@codemirror/view@6`),
                this._loadLanguage(config.language),
                import(`${CM_BASE}/@codemirror/theme-one-dark@6`),
            ]);

            const themeCompartment = new Compartment();
            this._themeCompartment = themeCompartment;

            const isDark = this._isDark();

            const langExtension = this._resolveLanguageExtension(langMod);

            const extensions = [
                basicSetup,
                EditorState.tabSize.of(config.tabSize),
                EditorState.readOnly.of(config.readonly),
                EditorView.editable.of(!config.readonly),
            ];

            if (langExtension) {
                extensions.push(langExtension);
            }

            if (config.placeholder) {
                extensions.push(placeholder(config.placeholder));
            }

            if (!config.lineNumbers) {
                extensions.push(EditorView.editorAttributes.of({ class: 'cm-no-line-numbers' }));
            }

            extensions.push(
                themeCompartment.of(this._buildTheme(EditorView, isDark, darkThemeMod.oneDarkTheme)),
                EditorView.theme({
                    '&': { minHeight: config.minHeight },
                    ...(config.maxHeight ? { '&': { minHeight: config.minHeight, maxHeight: config.maxHeight }, '.cm-scroller': { overflow: 'auto' } } : {}),
                }),
                EditorView.updateListener.of((update) => {
                    if (update.docChanged) {
                        const value = update.state.doc.toString();
                        textarea.value = value;
                        textarea.dispatchEvent(new Event('input', { bubbles: true }));
                    }
                }),
            );

            this.view = new EditorView({
                state: EditorState.create({ doc: initialValue, extensions }),
                parent: this.$refs.editor,
            });

            this.ready = true;

            // Watch for external value changes (Livewire server-push)
            const observer = new MutationObserver(() => {
                if (!this.view) return;
                const newVal = textarea.value;
                if (newVal !== this.view.state.doc.toString()) {
                    this.view.dispatch({
                        changes: { from: 0, to: this.view.state.doc.length, insert: newVal },
                    });
                }
            });

            observer.observe(textarea, { attributes: true, childList: true, characterData: true });

            // Also listen for Livewire setting the value programmatically
            textarea.addEventListener('change', () => {
                if (!this.view) return;
                const newVal = textarea.value;
                if (newVal !== this.view.state.doc.toString()) {
                    this.view.dispatch({
                        changes: { from: 0, to: this.view.state.doc.length, insert: newVal },
                    });
                }
            });

            // Dark mode toggle observer
            this._observer = new MutationObserver(() => {
                if (!this.view || !this._themeCompartment) return;
                const dark = this._isDark();
                this.view.dispatch({
                    effects: this._themeCompartment.reconfigure(
                        this._buildTheme(EditorView, dark, darkThemeMod.oneDarkTheme)
                    ),
                });
            });

            this._observer.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['class', 'data-theme'],
            });
        },

        _isDark() {
            return document.documentElement.classList.contains('dark')
                || document.documentElement.getAttribute('data-theme') === 'dark';
        },

        _buildTheme(EditorView, isDark, oneDarkTheme) {
            const zincTheme = EditorView.theme({
                '&': {
                    backgroundColor: 'transparent',
                    color: isDark ? '#d4d4d8' : '#3f3f46',
                },
                '.cm-gutters': {
                    backgroundColor: 'transparent',
                    color: isDark ? 'rgb(255 255 255 / 0.3)' : '#a1a1aa',
                    borderRight: 'none',
                },
                '.cm-activeLineGutter': {
                    backgroundColor: isDark ? 'rgb(255 255 255 / 0.05)' : '#f4f4f5',
                },
                '.cm-activeLine': {
                    backgroundColor: isDark ? 'rgb(255 255 255 / 0.03)' : 'rgb(244 244 245 / 0.5)',
                },
                '&.cm-focused .cm-cursor': {
                    borderLeftColor: isDark ? '#e4e4e7' : '#3f3f46',
                },
                '&.cm-focused .cm-selectionBackground, ::selection': {
                    backgroundColor: isDark ? 'rgb(255 255 255 / 0.15)' : '#e4e4e7',
                },
                '.cm-selectionBackground': {
                    backgroundColor: isDark ? 'rgb(255 255 255 / 0.1)' : 'rgb(228 228 231 / 0.5)',
                },
                '.cm-line': {
                    padding: '0 0.5rem',
                },
                '&.cm-focused': {
                    outline: 'none',
                },
            }, { dark: isDark });

            if (isDark) {
                return [zincTheme, oneDarkTheme];
            }

            return zincTheme;
        },

        async _loadLanguage(lang) {
            const BASE = 'https://esm.sh';
            const map = {
                html:       () => import(`${BASE}/@codemirror/lang-html@6`),
                css:        () => import(`${BASE}/@codemirror/lang-css@6`),
                javascript: () => import(`${BASE}/@codemirror/lang-javascript@6`),
                js:         () => import(`${BASE}/@codemirror/lang-javascript@6`),
                json:       () => import(`${BASE}/@codemirror/lang-json@6`),
                markdown:   () => import(`${BASE}/@codemirror/lang-markdown@6`),
                md:         () => import(`${BASE}/@codemirror/lang-markdown@6`),
            };

            const loader = map[lang];
            if (!loader) return null;

            return loader();
        },

        _resolveLanguageExtension(mod) {
            if (!mod) return null;
            // CodeMirror language packages export a function named after the language
            const names = ['html', 'css', 'javascript', 'json', 'markdown'];
            for (const name of names) {
                if (typeof mod[name] === 'function') {
                    return mod[name]();
                }
            }
            return null;
        },

        destroy() {
            this.view?.destroy();
            this._observer?.disconnect();
        },
    }));
});
</script>
<style>
[data-flux-code-editor] .cm-editor { height: auto; }
[data-flux-code-editor] .cm-editor.cm-focused { outline: none; }
[data-flux-code-editor] .cm-scroller { font-family: ui-monospace, SFMono-Regular, "SF Mono", Menlo, Consolas, "Liberation Mono", monospace; font-size: 0.875rem; line-height: 1.5; padding: 0.5rem 0; }
[data-flux-code-editor] .cm-no-line-numbers .cm-gutters { display: none; }
</style>
@endassets
