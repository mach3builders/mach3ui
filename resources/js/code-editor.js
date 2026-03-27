import { EditorView, basicSetup } from 'codemirror';
import { EditorState, Compartment } from '@codemirror/state';
import { placeholder, EditorView as ViewModule } from '@codemirror/view';
import { oneDark } from '@codemirror/theme-one-dark';
import { HighlightStyle, syntaxHighlighting } from '@codemirror/language';
import { tags } from '@lezer/highlight';
import { html } from '@codemirror/lang-html';
import { css } from '@codemirror/lang-css';
import { javascript } from '@codemirror/lang-javascript';
import { json } from '@codemirror/lang-json';
import { markdown } from '@codemirror/lang-markdown';

const languages = {
    html: () => html(),
    css: () => css(),
    javascript: () => javascript(),
    js: () => javascript(),
    json: () => json(),
    markdown: () => markdown(),
    md: () => markdown(),
};

const isDark = () =>
    document.documentElement.classList.contains('dark') ||
    document.documentElement.getAttribute('data-theme') === 'dark';

const lightTheme = EditorView.theme(
    {
        '&': { backgroundColor: '#ffffff', color: '#1e1e1e' },
        '.cm-content': { caretColor: '#000' },
        '.cm-cursor, .cm-dropCursor': { borderLeftColor: '#000' },
        '.cm-gutters': { backgroundColor: '#f7f7f7', color: '#858585', borderRight: '1px solid #e5e5e5' },
        '.cm-activeLineGutter': { backgroundColor: '#e8e8e8', color: '#1e1e1e' },
        '.cm-activeLine': { backgroundColor: '#fffbdd' },
        '&.cm-focused .cm-selectionBackground, ::selection': { backgroundColor: '#add6ff' },
        '.cm-selectionBackground': { backgroundColor: '#add6ff80' },
        '.cm-matchingBracket': { backgroundColor: '#bad0f847', outline: '1px solid #c8c8c4' },
        '&.cm-focused': { outline: 'none' },
    },
    { dark: false },
);

const lightHighlight = HighlightStyle.define([
    { tag: tags.keyword, color: '#0000ff' },
    { tag: [tags.name, tags.deleted, tags.character, tags.macroName], color: '#1e1e1e' },
    { tag: [tags.propertyName], color: '#d16969' },
    { tag: [tags.function(tags.variableName), tags.labelName], color: '#795e26' },
    { tag: [tags.color, tags.constant(tags.name), tags.standard(tags.name)], color: '#0070c1' },
    { tag: [tags.definition(tags.name), tags.separator], color: '#1e1e1e' },
    { tag: [tags.className, tags.typeName], color: '#267f99' },
    { tag: [tags.number, tags.changed, tags.annotation, tags.modifier, tags.self, tags.namespace], color: '#098658' },
    { tag: [tags.operator, tags.operatorKeyword], color: '#1e1e1e' },
    { tag: [tags.tagName], color: '#800000' },
    { tag: [tags.angleBracket], color: '#800000' },
    { tag: [tags.attributeName], color: '#ff0000' },
    { tag: [tags.string], color: '#a31515' },
    { tag: [tags.comment], color: '#008000', fontStyle: 'italic' },
    { tag: tags.invalid, color: '#cd3131' },
]);

const darkExtra = EditorView.theme({ '&.cm-focused': { outline: 'none' } }, { dark: true });

const buildTheme = (dark) =>
    dark ? [oneDark, darkExtra] : [lightTheme, syntaxHighlighting(lightHighlight)];

window._codeEditorFactory = (config) => ({
    ready: false,
    view: null,
    minHeight: config.minHeight,
    _themeCompartment: null,
    _observer: null,

    async init() {
        const textarea = this.$refs.textarea;
        let initialValue = textarea.value || '';
        if (!initialValue && config.wireModel && this.$wire) {
            initialValue = this.$wire.get(config.wireModel) || '';
        }

        const tc = new Compartment();
        this._themeCompartment = tc;
        const dark = isDark();

        const ext = [
            basicSetup,
            EditorState.tabSize.of(config.tabSize),
            EditorState.readOnly.of(config.readonly),
            ViewModule.editable.of(!config.readonly),
        ];

        const langFactory = languages[config.language];
        if (langFactory) ext.push(langFactory());
        if (config.placeholder) ext.push(placeholder(config.placeholder));
        if (!config.lineNumbers) ext.push(EditorView.editorAttributes.of({ class: 'cm-no-line-numbers' }));

        ext.push(
            tc.of(buildTheme(dark)),
            EditorView.theme({
                '&': { minHeight: config.minHeight },
                ...(config.maxHeight
                    ? { '&': { minHeight: config.minHeight, maxHeight: config.maxHeight }, '.cm-scroller': { overflow: 'auto' } }
                    : {}),
            }),
            EditorView.updateListener.of((u) => {
                if (u.docChanged) {
                    textarea.value = u.state.doc.toString();
                    textarea.dispatchEvent(new Event('input', { bubbles: true }));
                }
            }),
        );

        this.view = new EditorView({
            state: EditorState.create({ doc: initialValue, extensions: ext }),
            parent: this.$refs.editor,
        });
        this.ready = true;

        new MutationObserver(() => {
            if (!this.view) return;
            const v = textarea.value;
            if (v !== this.view.state.doc.toString()) {
                this.view.dispatch({ changes: { from: 0, to: this.view.state.doc.length, insert: v } });
            }
        }).observe(textarea, { attributes: true, childList: true, characterData: true });

        textarea.addEventListener('change', () => {
            if (!this.view) return;
            const v = textarea.value;
            if (v !== this.view.state.doc.toString()) {
                this.view.dispatch({ changes: { from: 0, to: this.view.state.doc.length, insert: v } });
            }
        });

        this._observer = new MutationObserver(() => {
            if (!this.view || !this._themeCompartment) return;
            this.view.dispatch({ effects: this._themeCompartment.reconfigure(buildTheme(isDark())) });
        });
        this._observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class', 'data-theme'] });
    },

    destroy() {
        this.view?.destroy();
        this._observer?.disconnect();
    },
});
