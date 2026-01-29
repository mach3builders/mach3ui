import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";
import Placeholder from "@tiptap/extension-placeholder";
import Link from "@tiptap/extension-link";
import Image from "@tiptap/extension-image";

function initRichTextEditor(element) {
    if (element.editor) return;


    const contentEl = element.querySelector(".rich-text-editor-content");
    const hiddenInput = element.querySelector('input[type="hidden"], textarea');
    const placeholder = element.dataset.placeholder || "Write something...";
    const characterCountEl = element.querySelector(".rich-text-editor-character-count");

    const editor = new Editor({
        element: contentEl,
        extensions: [
            StarterKit.configure({
                heading: {
                    levels: [1, 2, 3],
                },
            }),
            Placeholder.configure({
                placeholder,
            }),
            Link.configure({
                openOnClick: false,
                HTMLAttributes: {
                    rel: "noopener noreferrer",
                    target: "_blank",
                },
            }),
            Image,
        ],
        content: hiddenInput?.value || "",
        onUpdate: ({ editor }) => {
            if (hiddenInput) {
                hiddenInput.value = editor.getHTML();
            }
            updateCharacterCount(editor, characterCountEl);
        },
        onCreate: ({ editor }) => {
            updateCharacterCount(editor, characterCountEl);
        },
    });

    // Store editor instance on element for external access
    element.editor = editor;

    // Setup toolbar buttons
    setupToolbar(element, editor);

    // Setup popovers for link and image
    setupPopovers(element, editor);
}

function updateCharacterCount(editor, el) {
    if (!el) return;
    const count = editor.storage.characterCount?.characters() ?? editor.getText().length;
    el.textContent = `${count} characters`;
}

function setupPopovers(element, editor) {
    // Setup link popover
    const linkPopover = element.querySelector('[data-rich-text-editor-popover="link"]');
    if (linkPopover) {
        const input = linkPopover.querySelector("input");
        const applyBtn = linkPopover.querySelector('[data-action="apply"]');
        const removeBtn = linkPopover.querySelector('[data-action="remove"]');

        linkPopover.addEventListener("toggle", (e) => {
            if (e.newState === "open") {
                const currentUrl = editor.getAttributes("link").href || "";
                input.value = currentUrl;
                removeBtn.style.display = editor.isActive("link") ? "" : "none";
                setTimeout(() => input.focus(), 0);
            }
        });

        applyBtn?.addEventListener("click", () => {
            const url = input.value.trim();
            if (url) {
                editor.chain().focus().setLink({ href: url }).run();
            }
            linkPopover.hidePopover();
            updateButtonStates(element, editor);
        });

        removeBtn?.addEventListener("click", () => {
            editor.chain().focus().unsetLink().run();
            linkPopover.hidePopover();
            updateButtonStates(element, editor);
        });

        input?.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                e.preventDefault();
                applyBtn?.click();
            }
            if (e.key === "Escape") {
                linkPopover.hidePopover();
                editor.commands.focus();
            }
        });
    }

    // Setup image popover
    const imagePopover = element.querySelector('[data-rich-text-editor-popover="image"]');
    if (imagePopover) {
        const input = imagePopover.querySelector("input");
        const applyBtn = imagePopover.querySelector('[data-action="apply"]');

        imagePopover.addEventListener("toggle", (e) => {
            if (e.newState === "open") {
                input.value = "";
                setTimeout(() => input.focus(), 0);
            }
        });

        applyBtn?.addEventListener("click", () => {
            const url = input.value.trim();
            if (url) {
                editor.chain().focus().setImage({ src: url }).run();
            }
            imagePopover.hidePopover();
        });

        input?.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                e.preventDefault();
                applyBtn?.click();
            }
            if (e.key === "Escape") {
                imagePopover.hidePopover();
                editor.commands.focus();
            }
        });
    }
}

function setupToolbar(element, editor) {
    const buttons = element.querySelectorAll("[data-rich-text-editor-action]");

    buttons.forEach((button) => {
        const action = button.dataset.richTextEditorAction;

        // Skip link and image buttons - they use popovers
        if (action === "link" || action === "image") return;

        button.addEventListener("click", (e) => {
            e.preventDefault();

            switch (action) {
                case "bold":
                    editor.chain().focus().toggleBold().run();
                    break;
                case "italic":
                    editor.chain().focus().toggleItalic().run();
                    break;
                case "strike":
                    editor.chain().focus().toggleStrike().run();
                    break;
                case "code":
                    editor.chain().focus().toggleCode().run();
                    break;
                case "heading-1":
                    editor.chain().focus().toggleHeading({ level: 1 }).run();
                    break;
                case "heading-2":
                    editor.chain().focus().toggleHeading({ level: 2 }).run();
                    break;
                case "heading-3":
                    editor.chain().focus().toggleHeading({ level: 3 }).run();
                    break;
                case "bullet-list":
                    editor.chain().focus().toggleBulletList().run();
                    break;
                case "ordered-list":
                    editor.chain().focus().toggleOrderedList().run();
                    break;
                case "blockquote":
                    editor.chain().focus().toggleBlockquote().run();
                    break;
                case "code-block":
                    editor.chain().focus().toggleCodeBlock().run();
                    break;
                case "horizontal-rule":
                    editor.chain().focus().setHorizontalRule().run();
                    break;
                case "undo":
                    editor.chain().focus().undo().run();
                    break;
                case "redo":
                    editor.chain().focus().redo().run();
                    break;
                case "clear":
                    editor.chain().focus().clearNodes().unsetAllMarks().run();
                    break;
            }

            updateButtonStates(element, editor);
        });
    });

    // Update button states on selection change
    editor.on("selectionUpdate", () => {
        updateButtonStates(element, editor);
    });

    editor.on("update", () => {
        updateButtonStates(element, editor);
    });

    // Initial state
    updateButtonStates(element, editor);
}

function updateButtonStates(element, editor) {
    const buttons = element.querySelectorAll("[data-rich-text-editor-action]");

    buttons.forEach((button) => {
        const action = button.dataset.richTextEditorAction;
        let isActive = false;

        switch (action) {
            case "bold":
                isActive = editor.isActive("bold");
                break;
            case "italic":
                isActive = editor.isActive("italic");
                break;
            case "strike":
                isActive = editor.isActive("strike");
                break;
            case "code":
                isActive = editor.isActive("code");
                break;
            case "heading-1":
                isActive = editor.isActive("heading", { level: 1 });
                break;
            case "heading-2":
                isActive = editor.isActive("heading", { level: 2 });
                break;
            case "heading-3":
                isActive = editor.isActive("heading", { level: 3 });
                break;
            case "bullet-list":
                isActive = editor.isActive("bulletList");
                break;
            case "ordered-list":
                isActive = editor.isActive("orderedList");
                break;
            case "blockquote":
                isActive = editor.isActive("blockquote");
                break;
            case "code-block":
                isActive = editor.isActive("codeBlock");
                break;
            case "link":
                isActive = editor.isActive("link");
                break;
        }

        button.classList.toggle("is-active", isActive);

        // Update undo/redo disabled states
        if (action === "undo") {
            button.disabled = !editor.can().undo();
        }
        if (action === "redo") {
            button.disabled = !editor.can().redo();
        }
    });
}

function initAllRichTextEditors(root = document) {
    root.querySelectorAll(".rich-text-editor").forEach(initRichTextEditor);
}

// Initialize on page load
if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => initAllRichTextEditors());
} else {
    initAllRichTextEditors();
}

// Livewire support
if (typeof Livewire !== "undefined") {
    Livewire.hook("morph.added", ({ el }) => {
        if (el.matches?.(".rich-text-editor")) {
            initRichTextEditor(el);
        }
        el.querySelectorAll?.(".rich-text-editor").forEach(initRichTextEditor);
    });
}

export { initRichTextEditor, initAllRichTextEditors };
