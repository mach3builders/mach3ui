import { EditorState, Compartment } from "@codemirror/state";
import { EditorView, keymap, lineNumbers, highlightActiveLineGutter, highlightActiveLine, placeholder as placeholderExt } from "@codemirror/view";
import { defaultKeymap, history, historyKeymap, indentWithTab } from "@codemirror/commands";
import { syntaxHighlighting, HighlightStyle, bracketMatching, foldGutter, indentOnInput } from "@codemirror/language";
import { tags } from "@lezer/highlight";
import { autocompletion, completionKeymap, closeBrackets, closeBracketsKeymap } from "@codemirror/autocomplete";
import { javascript } from "@codemirror/lang-javascript";
import { html } from "@codemirror/lang-html";
import { css } from "@codemirror/lang-css";
import { json } from "@codemirror/lang-json";
import { php } from "@codemirror/lang-php";
import { sql } from "@codemirror/lang-sql";

const vscodeLightStyle = HighlightStyle.define([
    { tag: tags.keyword, color: "#0000ff" },
    { tag: tags.controlKeyword, color: "#af00db" },
    { tag: tags.operatorKeyword, color: "#0000ff" },
    { tag: tags.operator, color: "#000000" },
    { tag: tags.number, color: "#098658" },
    { tag: tags.string, color: "#a31515" },
    { tag: tags.special(tags.string), color: "#a31515" },
    { tag: tags.comment, color: "#008000", fontStyle: "italic" },
    { tag: tags.lineComment, color: "#008000", fontStyle: "italic" },
    { tag: tags.blockComment, color: "#008000", fontStyle: "italic" },
    { tag: tags.docComment, color: "#008000", fontStyle: "italic" },
    { tag: tags.variableName, color: "#001080" },
    { tag: tags.local(tags.variableName), color: "#001080" },
    { tag: tags.definition(tags.variableName), color: "#795e26" },
    { tag: tags.function(tags.variableName), color: "#795e26" },
    { tag: tags.propertyName, color: "#001080" },
    { tag: tags.definition(tags.propertyName), color: "#001080" },
    { tag: tags.typeName, color: "#267f99" },
    { tag: tags.namespace, color: "#267f99" },
    { tag: tags.className, color: "#267f99" },
    { tag: tags.macroName, color: "#795e26" },
    { tag: tags.labelName, color: "#001080" },
    { tag: tags.bool, color: "#0000ff" },
    { tag: tags.null, color: "#0000ff" },
    { tag: tags.self, color: "#0000ff" },
    { tag: tags.atom, color: "#0000ff" },
    { tag: tags.punctuation, color: "#000000" },
    { tag: tags.separator, color: "#000000" },
    { tag: tags.meta, color: "#800000" },
    { tag: tags.tagName, color: "#800000" },
    { tag: tags.attributeName, color: "#ff0000" },
    { tag: tags.attributeValue, color: "#0000ff" },
    { tag: tags.angleBracket, color: "#800000" },
    { tag: tags.regexp, color: "#811f3f" },
    { tag: tags.escape, color: "#ee0000" },
]);

const vscodeDarkStyle = HighlightStyle.define([
    { tag: tags.keyword, color: "#569cd6" },
    { tag: tags.controlKeyword, color: "#c586c0" },
    { tag: tags.operatorKeyword, color: "#569cd6" },
    { tag: tags.operator, color: "#d4d4d4" },
    { tag: tags.number, color: "#b5cea8" },
    { tag: tags.string, color: "#ce9178" },
    { tag: tags.special(tags.string), color: "#ce9178" },
    { tag: tags.comment, color: "#6a9955", fontStyle: "italic" },
    { tag: tags.lineComment, color: "#6a9955", fontStyle: "italic" },
    { tag: tags.blockComment, color: "#6a9955", fontStyle: "italic" },
    { tag: tags.docComment, color: "#6a9955", fontStyle: "italic" },
    { tag: tags.variableName, color: "#9cdcfe" },
    { tag: tags.local(tags.variableName), color: "#9cdcfe" },
    { tag: tags.definition(tags.variableName), color: "#dcdcaa" },
    { tag: tags.function(tags.variableName), color: "#dcdcaa" },
    { tag: tags.propertyName, color: "#9cdcfe" },
    { tag: tags.definition(tags.propertyName), color: "#9cdcfe" },
    { tag: tags.typeName, color: "#4ec9b0" },
    { tag: tags.namespace, color: "#4ec9b0" },
    { tag: tags.className, color: "#4ec9b0" },
    { tag: tags.macroName, color: "#dcdcaa" },
    { tag: tags.labelName, color: "#9cdcfe" },
    { tag: tags.bool, color: "#569cd6" },
    { tag: tags.null, color: "#569cd6" },
    { tag: tags.self, color: "#569cd6" },
    { tag: tags.atom, color: "#569cd6" },
    { tag: tags.punctuation, color: "#d4d4d4" },
    { tag: tags.separator, color: "#d4d4d4" },
    { tag: tags.meta, color: "#808080" },
    { tag: tags.tagName, color: "#569cd6" },
    { tag: tags.attributeName, color: "#9cdcfe" },
    { tag: tags.attributeValue, color: "#ce9178" },
    { tag: tags.angleBracket, color: "#808080" },
    { tag: tags.regexp, color: "#d16969" },
    { tag: tags.escape, color: "#d7ba7d" },
]);

function isDarkMode() {
    return document.documentElement.classList.contains("dark");
}

const themeCompartment = new Compartment();
const baseThemeCompartment = new Compartment();
const editorViews = [];

function getHighlightExtension() {
    return isDarkMode() ? vscodeDarkStyle : vscodeLightStyle;
}

function getBaseTheme() {
    const isDark = isDarkMode();
    return EditorView.theme({
        "&": {
            backgroundColor: "transparent",
            fontSize: "12px",
        },
        ".cm-scroller": {
            fontFamily: "ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace",
            lineHeight: "1.625",
        },
        ".cm-gutters": {
            backgroundColor: "transparent",
            border: "none",
        },
        ".cm-activeLineGutter": {
            backgroundColor: "transparent",
        },
        ".cm-activeLine": {
            backgroundColor: isDark ? "oklch(1 0 0 / 0.035)" : "oklch(0.5 0 0 / 0.06)",
        },
        ".cm-cursor, .cm-dropCursor": {
            borderLeftColor: isDark ? "#ffffff" : "#000000",
        },
    });
}

const languages = {
    javascript: () => javascript(),
    js: () => javascript(),
    typescript: () => javascript({ typescript: true }),
    ts: () => javascript({ typescript: true }),
    jsx: () => javascript({ jsx: true }),
    tsx: () => javascript({ jsx: true, typescript: true }),
    html: () => html(),
    blade: () => html(),
    css: () => css(),
    json: () => json(),
    php: () => php(),
    sql: () => sql(),
};

function getLanguageExtension(lang) {
    const normalizedLang = lang?.toLowerCase().trim();
    if (normalizedLang && languages[normalizedLang]) {
        return languages[normalizedLang]();
    }
    return null;
}

function initCodeEditor(element) {
    // Skip if already initialized and view is still valid
    if (element.codeEditor?.dom?.parentNode) return;

    const contentEl = element.querySelector("[data-code-editor-content]");
    if (!contentEl) return;

    // Clear any leftover content from previous initialization
    contentEl.innerHTML = "";
    const hiddenInput = element.querySelector('input[type="hidden"], textarea');
    const languageEl = element.querySelector("[data-code-editor-header] span");
    const statusEl = element.querySelector("[data-code-editor-status]");
    const copyBtn = element.querySelector('[data-action="copy"]');

    const language = element.dataset.language || "javascript";
    const placeholder = element.dataset.placeholder || "";
    const readOnly = element.hasAttribute("data-readonly");
    const initialContent = hiddenInput?.value || element.dataset.content || "";

    // Update language display
    if (languageEl && !languageEl.textContent.trim()) {
        languageEl.textContent = language;
    }

    const extensions = [
        baseThemeCompartment.of(getBaseTheme()),
        lineNumbers(),
        highlightActiveLineGutter(),
        highlightActiveLine(),
        history(),
        bracketMatching(),
        closeBrackets(),
        indentOnInput(),
        themeCompartment.of(syntaxHighlighting(getHighlightExtension())),
        keymap.of([
            ...defaultKeymap,
            ...historyKeymap,
            ...closeBracketsKeymap,
            ...completionKeymap,
            indentWithTab,
        ]),
        EditorView.lineWrapping,
    ];

    // Add language support
    const langExt = getLanguageExtension(language);
    if (langExt) {
        extensions.push(langExt);
    }

    // Add autocomplete for non-readonly editors
    if (!readOnly) {
        extensions.push(autocompletion());
    }

    // Add fold gutter
    extensions.push(foldGutter({
        closedText: "▶",
        openText: "▼",
    }));

    // Add placeholder
    if (placeholder) {
        extensions.push(placeholderExt(placeholder));
    }

    // Add readonly state
    if (readOnly) {
        extensions.push(EditorState.readOnly.of(true));
        extensions.push(EditorView.editable.of(false));
    }

    // Sync with hidden input
    if (hiddenInput && !readOnly) {
        extensions.push(EditorView.updateListener.of((update) => {
            if (update.docChanged) {
                hiddenInput.value = update.state.doc.toString();
                updateStatus(update.state, statusEl);
            }
        }));
    }

    const state = EditorState.create({
        doc: initialContent,
        extensions,
    });

    const view = new EditorView({
        state,
        parent: contentEl,
    });

    // Store view on element for external access and theme updates
    element.codeEditor = view;
    editorViews.push(view);

    // Update initial status
    updateStatus(state, statusEl);

    // Setup copy button
    if (copyBtn) {
        copyBtn.addEventListener("click", () => {
            const content = view.state.doc.toString();
            navigator.clipboard.writeText(content).then(() => {
                const icon = copyBtn.querySelector("svg");
                const originalClass = icon?.getAttribute("class");

                if (icon) {
                    icon.outerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' + originalClass + '"><path d="M20 6 9 17l-5-5"/></svg>';
                }

                setTimeout(() => {
                    const checkIcon = copyBtn.querySelector("svg");
                    if (checkIcon) {
                        checkIcon.outerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' + originalClass + '"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>';
                    }
                }, 2000);
            });
        });
    }
}

function updateStatus(state, statusEl) {
    if (!statusEl) return;

    const lines = state.doc.lines;
    const chars = state.doc.length;
    statusEl.textContent = `${lines} line${lines !== 1 ? "s" : ""}, ${chars} character${chars !== 1 ? "s" : ""}`;
}

function initAllCodeEditors(root = document) {
    root.querySelectorAll("[data-code-editor]").forEach(initCodeEditor);
}

// Initialize on page load
initAllCodeEditors();

// Reinitialize after Livewire navigation (wire:navigate)
document.addEventListener("livewire:navigated", () => {
    initAllCodeEditors();
});

// Livewire support for morphing
if (typeof Livewire !== "undefined") {
    Livewire.hook("morph.added", ({ el }) => {
        if (el.matches?.("[data-code-editor]")) {
            initCodeEditor(el);
        }
        el.querySelectorAll?.("[data-code-editor]").forEach(initCodeEditor);
    });
}

// Watch for dark mode changes and update all editors
const observer = new MutationObserver(() => {
    const newStyle = syntaxHighlighting(getHighlightExtension());
    const newBaseTheme = getBaseTheme();

    // Filter out destroyed views and update valid ones
    for (let i = editorViews.length - 1; i >= 0; i--) {
        const view = editorViews[i];
        if (!view.dom?.parentNode) {
            editorViews.splice(i, 1);
            continue;
        }
        view.dispatch({
            effects: [
                themeCompartment.reconfigure(newStyle),
                baseThemeCompartment.reconfigure(newBaseTheme),
            ],
        });
    }
});

observer.observe(document.documentElement, {
    attributes: true,
    attributeFilter: ["class"],
});

export { initCodeEditor, initAllCodeEditors, getLanguageExtension };
