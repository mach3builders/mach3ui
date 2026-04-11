import { EditorView, basicSetup } from 'codemirror';
import { EditorState, Compartment } from '@codemirror/state';
import { placeholder, EditorView as ViewModule, keymap } from '@codemirror/view';
import { indentWithTab } from '@codemirror/commands';
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
        '&': { backgroundColor: 'transparent', color: '#1e1e1e' },
        '.cm-content': { caretColor: '#000' },
        '.cm-cursor, .cm-dropCursor': { borderLeftColor: '#000' },
        '.cm-gutters': { backgroundColor: 'rgba(0,0,0,0.02)', color: '#858585', borderRight: '1px solid #e5e5e5' },
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

const darkExtra = EditorView.theme({
    '&': { backgroundColor: 'transparent' },
    '.cm-gutters': { backgroundColor: 'rgba(255,255,255,0.03)', borderRight: '1px solid rgba(255,255,255,0.08)' },
    '&.cm-focused': { outline: 'none' },
}, { dark: true });

const buildTheme = (dark) =>
    dark ? [oneDark, darkExtra] : [lightTheme, syntaxHighlighting(lightHighlight)];

/**
 * Mount a CodeMirror editor. Returns a cleanup function.
 */
window._mountCodeEditor = function (editorEl, textareaEl, config, wire) {
    let initialValue = textareaEl.value || '';
    if (!initialValue && config.wireModel && wire) {
        initialValue = wire.get(config.wireModel) || '';
    }

    const tc = new Compartment();
    const dark = isDark();

    const ext = [
        basicSetup,
        keymap.of([indentWithTab]),
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
                textareaEl.value = u.state.doc.toString();
                textareaEl.dispatchEvent(new Event('input', { bubbles: true }));
            }
        }),
    );

    const view = new EditorView({
        state: EditorState.create({ doc: initialValue, extensions: ext }),
        parent: editorEl,
    });

    // Sync external value changes back to editor
    const valueObserver = new MutationObserver(() => {
        const v = textareaEl.value;
        if (v !== view.state.doc.toString()) {
            view.dispatch({ changes: { from: 0, to: view.state.doc.length, insert: v } });
        }
    });
    valueObserver.observe(textareaEl, { attributes: true, childList: true, characterData: true });

    const changeHandler = () => {
        const v = textareaEl.value;
        if (v !== view.state.doc.toString()) {
            view.dispatch({ changes: { from: 0, to: view.state.doc.length, insert: v } });
        }
    };
    textareaEl.addEventListener('change', changeHandler);

    // Dark mode observer
    const themeObserver = new MutationObserver(() => {
        view.dispatch({ effects: tc.reconfigure(buildTheme(isDark())) });
    });
    themeObserver.observe(document.documentElement, { attributes: true, attributeFilter: ['class', 'style'] });

    return () => {
        view.destroy();
        valueObserver.disconnect();
        themeObserver.disconnect();
        textareaEl.removeEventListener('change', changeHandler);
    };
};
