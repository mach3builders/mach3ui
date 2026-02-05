@props([
    'id',
    'name',
    'placeholder',
    'toolbarGroups',
    'format' => 'html',
    'wrapperClasses',
    'toolbarClasses',
    'btnClasses',
    'btnActiveClasses',
    'contentClasses',
    'wireModelValue',
    'wireModelBlur' => false,
    'xModelKey' => null,
    'xModelValue' => null,
])

<div class="{{ $wrapperClasses }}" wire:ignore x-data="uiEditor({
    content: @js((string) $slot),
    placeholder: @js($placeholder),
    wireModel: @js($wireModelValue),
    wireModelBlur: @js($wireModelBlur),
    format: @js($format),
})"
    @if ($xModelKey && $xModelValue) x-modelable="content"
        {{ $xModelKey }}="{{ $xModelValue }}" @endif>
    @once
        <style>
            /* Editor content styles */
            .ui-editor-content>*+* {
                margin-top: 0.75rem;
            }

            .ui-editor-content:focus-within {
                outline: none;
            }

            /* Placeholder */
            .ui-editor-content:empty::before {
                content: attr(data-placeholder);
                pointer-events: none;
                float: left;
                height: 0;
                color: #9ca3af;
            }

            .dark .ui-editor-content:empty::before {
                color: #6b7280;
            }

            /* Headings */
            .ui-editor-content h1 {
                font-size: 1.5rem;
                font-weight: 700;
                color: #111827;
            }

            .ui-editor-content h2 {
                font-size: 1.25rem;
                font-weight: 600;
                color: #111827;
            }

            .ui-editor-content h3 {
                font-size: 1.125rem;
                font-weight: 600;
                line-height: 1.375;
                color: #111827;
            }

            .dark .ui-editor-content h1,
            .dark .ui-editor-content h2,
            .dark .ui-editor-content h3 {
                color: #f3f4f6;
            }

            /* Paragraphs */
            .ui-editor-content p {
                line-height: 1.625;
            }

            /* Inline formatting */
            .ui-editor-content strong {
                font-weight: 600;
                color: #111827;
            }

            .dark .ui-editor-content strong {
                color: #f3f4f6;
            }

            .ui-editor-content em {
                font-style: italic;
            }

            .ui-editor-content s {
                text-decoration: line-through;
            }

            /* Links */
            .ui-editor-content a {
                font-weight: 500;
                text-decoration: none;
                color: #2563eb;
            }

            .ui-editor-content a:hover {
                text-decoration: underline;
            }

            .dark .ui-editor-content a {
                color: #60a5fa;
            }

            /* Lists */
            .ui-editor-content ul {
                list-style-type: disc;
                padding-left: 1.25rem;
            }

            .ui-editor-content ol {
                list-style-type: decimal;
                padding-left: 1.25rem;
            }

            .ui-editor-content li {
                margin-top: 0.25rem;
                margin-bottom: 0.25rem;
            }

            /* Blockquote */
            .ui-editor-content blockquote {
                border-left: 4px solid #d1d5db;
                padding-left: 1rem;
                font-style: italic;
                color: #4b5563;
            }

            .dark .ui-editor-content blockquote {
                border-color: #4b5563;
                color: #9ca3af;
            }

            /* Inline code */
            .ui-editor-content code {
                border-radius: 0.25rem;
                padding: 0.125rem 0.375rem;
                font-family: ui-monospace, monospace;
                font-size: 0.75rem;
                background-color: #f3f4f6;
                color: #1f2937;
            }

            .dark .ui-editor-content code {
                background-color: #374151;
                color: #e5e7eb;
            }

            /* Code block */
            .ui-editor-content pre {
                overflow-x: auto;
                border-radius: 0.375rem;
                padding: 1rem;
                font-family: ui-monospace, monospace;
                font-size: 0.75rem;
                background-color: #111827;
                color: #f3f4f6;
            }

            .dark .ui-editor-content pre {
                background-color: #030712;
            }

            .ui-editor-content pre code {
                background-color: transparent;
                padding: 0;
                color: inherit;
            }

            /* Horizontal rule */
            .ui-editor-content hr {
                margin: 1.5rem 0;
                border-top: 1px solid #e5e7eb;
            }

            .dark .ui-editor-content hr {
                border-color: #374151;
            }

            /* Images */
            .ui-editor-content img {
                max-width: 100%;
                border-radius: 0.375rem;
                cursor: pointer;
            }

            .ui-editor-content img.is-selected {
                outline: 2px solid #3b82f6;
                outline-offset: 2px;
            }

            /* Image resize overlay */
            .ui-editor-img-resize {
                position: absolute;
                pointer-events: none;
            }

            .ui-editor-img-resize-handle {
                position: absolute;
                width: 0.625rem;
                height: 0.625rem;
                border-radius: 0.125rem;
                pointer-events: auto;
                background-color: #3b82f6;
                border: 2px solid white;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
                cursor: nwse-resize;
            }

            .ui-editor-img-resize-handle.se {
                bottom: -5px;
                right: -5px;
            }

            .ui-editor-img-resize-handle.sw {
                bottom: -5px;
                left: -5px;
                cursor: nesw-resize;
            }

            .ui-editor-img-resize-handle.ne {
                top: -5px;
                right: -5px;
                cursor: nesw-resize;
            }

            .ui-editor-img-resize-handle.nw {
                top: -5px;
                left: -5px;
            }
        </style>
    @endonce

    {{-- Toolbar --}}
    <div class="{{ $toolbarClasses }}">
        @foreach ($toolbarGroups as $index => $group)
            @if ($index > 0)
                <div class="mx-1 h-6 w-px bg-gray-200 dark:bg-gray-700"></div>
            @endif

            @switch(trim($group))
                @case('formatting')
                    <div class="flex items-center gap-1">
                        <button type="button" class="{{ $btnClasses }}" data-action="bold" title="Bold (Ctrl+B)"
                            :class="activeFormats.bold && '{{ $btnActiveClasses }}'">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 12h9a4 4 0 0 1 0 8H6V4h8a4 4 0 0 1 0 8" />
                            </svg>
                        </button>
                        <button type="button" class="{{ $btnClasses }}" data-action="italic" title="Italic (Ctrl+I)"
                            :class="activeFormats.italic && '{{ $btnActiveClasses }}'">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="19" x2="10" y1="4" y2="4" />
                                <line x1="14" x2="5" y1="20" y2="20" />
                                <line x1="15" x2="9" y1="4" y2="20" />
                            </svg>
                        </button>
                        <button type="button" class="{{ $btnClasses }}" data-action="strikethrough" title="Strikethrough"
                            :class="activeFormats.strikethrough && '{{ $btnActiveClasses }}'">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 4H9a3 3 0 0 0-2.83 4" />
                                <path d="M14 12a4 4 0 0 1 0 8H6" />
                                <line x1="4" x2="20" y1="12" y2="12" />
                            </svg>
                        </button>
                        <button type="button" class="{{ $btnClasses }}" data-action="code" title="Inline code">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="16 18 22 12 16 6" />
                                <polyline points="8 6 2 12 8 18" />
                            </svg>
                        </button>
                    </div>
                @break

                @case('headings')
                    <div class="flex items-center gap-0.5">
                        <button type="button" class="{{ $btnClasses }}" data-action="h1" title="Heading 1"
                            :class="activeFormats.h1 && '{{ $btnActiveClasses }}'">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 12h8" />
                                <path d="M4 18V6" />
                                <path d="M12 18V6" />
                                <path d="m17 12 3-2v8" />
                            </svg>
                        </button>
                        <button type="button" class="{{ $btnClasses }}" data-action="h2" title="Heading 2"
                            :class="activeFormats.h2 && '{{ $btnActiveClasses }}'">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 12h8" />
                                <path d="M4 18V6" />
                                <path d="M12 18V6" />
                                <path d="M21 18h-4c0-4 4-3 4-6 0-1.5-2-2.5-4-1" />
                            </svg>
                        </button>
                        <button type="button" class="{{ $btnClasses }}" data-action="h3" title="Heading 3"
                            :class="activeFormats.h3 && '{{ $btnActiveClasses }}'">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 12h8" />
                                <path d="M4 18V6" />
                                <path d="M12 18V6" />
                                <path d="M17.5 10.5c1.7-1 3.5 0 3.5 1.5a2 2 0 0 1-2 2" />
                                <path d="M17 17.5c2 1.5 4 .3 4-1.5a2 2 0 0 0-2-2" />
                            </svg>
                        </button>
                    </div>
                @break

                @case('lists')
                    <div class="flex items-center gap-0.5">
                        <button type="button" class="{{ $btnClasses }}" data-action="insertUnorderedList"
                            title="Bullet list" :class="activeFormats.ul && '{{ $btnActiveClasses }}'">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="8" x2="21" y1="6" y2="6" />
                                <line x1="8" x2="21" y1="12" y2="12" />
                                <line x1="8" x2="21" y1="18" y2="18" />
                                <line x1="3" x2="3.01" y1="6" y2="6" />
                                <line x1="3" x2="3.01" y1="12" y2="12" />
                                <line x1="3" x2="3.01" y1="18" y2="18" />
                            </svg>
                        </button>
                        <button type="button" class="{{ $btnClasses }}" data-action="insertOrderedList"
                            title="Numbered list" :class="activeFormats.ol && '{{ $btnActiveClasses }}'">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="10" x2="21" y1="6" y2="6" />
                                <line x1="10" x2="21" y1="12" y2="12" />
                                <line x1="10" x2="21" y1="18" y2="18" />
                                <path d="M4 6h1v4" />
                                <path d="M4 10h2" />
                                <path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1" />
                            </svg>
                        </button>
                    </div>
                @break

                @case('extras')
                    <div class="flex items-center gap-0.5">
                        <button type="button" class="{{ $btnClasses }}" data-action="blockquote" title="Blockquote"
                            :class="activeFormats.blockquote && '{{ $btnActiveClasses }}'">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V21" />
                                <path
                                    d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3" />
                            </svg>
                        </button>
                        <button type="button" class="{{ $btnClasses }}" data-action="codeBlock" title="Code block">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                <path d="m5 12-3 3 3 3" />
                                <path d="m9 18 3-3-3-3" />
                            </svg>
                        </button>
                        <button type="button" class="{{ $btnClasses }}" data-action="insertHorizontalRule"
                            title="Horizontal rule">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14" />
                            </svg>
                        </button>
                    </div>
                @break

                @case('link')
                    <div class="flex items-center gap-0.5">
                        <button type="button" class="{{ $btnClasses }}" data-action="link" title="Insert link"
                            :class="activeFormats.link && '{{ $btnActiveClasses }}'">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                            </svg>
                        </button>
                    </div>
                @break

                @case('image')
                    <div class="flex items-center gap-0.5">
                        <button type="button" class="{{ $btnClasses }}" data-action="image" title="Insert image">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                                <circle cx="9" cy="9" r="2" />
                                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                            </svg>
                        </button>
                    </div>
                @break

                @case('history')
                    <div class="flex items-center gap-0.5">
                        <button type="button" class="{{ $btnClasses }}" data-action="undo" title="Undo (Ctrl+Z)">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 7v6h6" />
                                <path d="M21 17a9 9 0 0 0-9-9 9 9 0 0 0-6 2.3L3 13" />
                            </svg>
                        </button>
                        <button type="button" class="{{ $btnClasses }}" data-action="redo" title="Redo (Ctrl+Y)">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 7v6h-6" />
                                <path d="M3 17a9 9 0 0 1 9-9 9 9 0 0 1 6 2.3l3 2.7" />
                            </svg>
                        </button>
                    </div>
                @break

                @case('clear')
                    <div class="flex items-center gap-0.5">
                        <button type="button" class="{{ $btnClasses }}" data-action="removeFormat"
                            title="Clear formatting">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="m7 21-4.3-4.3c-1-1-1-2.5 0-3.4l9.6-9.6c1-1 2.5-1 3.4 0l5.6 5.6c1 1 1 2.5 0 3.4L13 21" />
                                <path d="M22 21H7" />
                                <path d="m5 11 9 9" />
                            </svg>
                        </button>
                    </div>
                @break
            @endswitch
        @endforeach
    </div>

    {{-- Link input popup --}}
    <div x-show="showLinkInput" x-cloak
        class="absolute z-50 flex gap-2 rounded-md border border-gray-100 bg-white p-3 shadow-lg dark:border-gray-740 dark:bg-gray-790"
        :style="linkInputPosition">
        <input type="url" x-ref="linkInput" placeholder="Enter URL..."
            class="block h-9 w-48 rounded-md border border-gray-200 bg-white px-3 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-400 focus:outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-gray-500"
            @keydown.enter.prevent="applyLink()" @keydown.escape="showLinkInput = false; $refs.content.focus()">
        <button type="button" class="{{ $btnClasses }}" @click="applyLink()">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
            </svg>
        </button>
        <button type="button" class="{{ $btnClasses }}" @click="showLinkInput = false; $refs.content.focus()">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
            </svg>
        </button>
    </div>

    {{-- Image input popup --}}
    <div x-show="showImageInput" x-cloak
        class="absolute z-50 flex gap-2 rounded-md border border-gray-100 bg-white p-3 shadow-lg dark:border-gray-740 dark:bg-gray-790"
        :style="imageInputPosition">
        <input type="url" x-ref="imageInput" placeholder="Enter image URL..."
            class="block h-9 w-48 rounded-md border border-gray-200 bg-white px-3 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-400 focus:outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 dark:focus:border-gray-500"
            @keydown.enter.prevent="applyImage()" @keydown.escape="showImageInput = false; $refs.content.focus()">
        <button type="button" class="{{ $btnClasses }}" @click="applyImage()">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
            </svg>
        </button>
        <button type="button" class="{{ $btnClasses }}" @click="showImageInput = false; $refs.content.focus()">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
            </svg>
        </button>
    </div>

    {{-- Editor content --}}
    <div x-ref="content" class="{{ $contentClasses }}" contenteditable="true" :data-placeholder="placeholder"
        @input="onInput()" @keydown="onKeydown($event)" @mouseup="updateActiveFormats()"
        @keyup="updateActiveFormats()" @paste="onPaste($event)"></div>

    {{-- Hidden input for form submission --}}
    <textarea id="{{ $id }}" @if ($name) name="{{ $name }}" @endif
        class="sr-only" x-model="content" aria-hidden="true">{{ $slot }}</textarea>

    @once
        <script>
            document.addEventListener('alpine:init', () => {
                if (Alpine.data.uiEditor) return;

                Alpine.data('uiEditor', (config) => ({
                    content: config.content || '',
                    placeholder: config.placeholder,
                    wireModel: config.wireModel || null,
                    wireModelBlur: config.wireModelBlur || false,
                    format: config.format || 'html',
                    showLinkInput: false,
                    linkInputPosition: '',
                    showImageInput: false,
                    imageInputPosition: '',
                    savedSelection: null,
                    selectedImage: null,
                    resizeOverlay: null,
                    activeFormats: {
                        bold: false,
                        italic: false,
                        strikethrough: false,
                        h1: false,
                        h2: false,
                        h3: false,
                        ul: false,
                        ol: false,
                        blockquote: false,
                        link: false,
                    },

                    // Markdown to HTML conversion
                    markdownToHtml(md) {
                        if (!md) return '';
                        let html = md;

                        // Code blocks (before other processing)
                        html = html.replace(/```([\s\S]*?)```/g, '<pre><code>$1</code></pre>');

                        // Headings
                        html = html.replace(/^### (.+)$/gm, '<h3>$1</h3>');
                        html = html.replace(/^## (.+)$/gm, '<h2>$1</h2>');
                        html = html.replace(/^# (.+)$/gm, '<h1>$1</h1>');

                        // Horizontal rule
                        html = html.replace(/^---$/gm, '<hr>');

                        // Blockquote
                        html = html.replace(/^> (.+)$/gm, '<blockquote>$1</blockquote>');

                        // Bold and italic
                        html = html.replace(/\*\*\*(.+?)\*\*\*/g, '<strong><em>$1</em></strong>');
                        html = html.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');
                        html = html.replace(/\*(.+?)\*/g, '<em>$1</em>');

                        // Strikethrough
                        html = html.replace(/~~(.+?)~~/g, '<s>$1</s>');

                        // Inline code
                        html = html.replace(/`([^`]+)`/g, '<code>$1</code>');

                // Images
                html = html.replace(/!\[([^\]]*)\]\(([^)]+)\)/g, '<img src="$2" alt="$1">');

                // Links
                html = html.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2">$1</a>');

                // Unordered lists
                html = html.replace(/^[\*\-] (.+)$/gm, '<li>$1</li>');
                html = html.replace(/(<li>.*<\/li>\n?)+/g, '<ul>$&</ul>');

                // Ordered lists
                html = html.replace(/^\d+\. (.+)$/gm, '<li>$1</li>');

                // Paragraphs (lines not already wrapped)
                const lines = html.split('\n');
                html = lines.map(line => {
                    line = line.trim();
                    if (!line) return '';
                    if (line.startsWith('<h') || line.startsWith('<p') || line.startsWith(
                            '<ul') ||
                        line.startsWith('<ol') || line.startsWith('<li') || line.startsWith(
                            '<blockquote') ||
                        line.startsWith('<pre') || line.startsWith('<hr') || line
                        .startsWith('</')) {
                        return line;
                    }
                    return '<p>' + line + '</p>';
                }).filter(l => l).join('\n');

                return html;
            },

            // HTML to Markdown conversion
            htmlToMarkdown(html) {
                if (!html) return '';

                // Create a temporary element to parse HTML
                const div = document.createElement('div');
                div.innerHTML = html;

                const convertNode = (node) => {
                    if (node.nodeType === Node.TEXT_NODE) {
                        return node.textContent;
                    }

                    if (node.nodeType !== Node.ELEMENT_NODE) {
                        return '';
                    }

                    const tag = node.tagName.toLowerCase();
                    const children = Array.from(node.childNodes).map(convertNode).join('');

                    switch (tag) {
                        case 'h1':
                            return '# ' + children + '\n\n';
                        case 'h2':
                            return '## ' + children + '\n\n';
                        case 'h3':
                            return '### ' + children + '\n\n';
                        case 'p':
                            return children + '\n\n';
                        case 'br':
                            return '\n';
                        case 'strong':
                        case 'b':
                            return '**' + children + '**';
                        case 'em':
                        case 'i':
                            return '*' + children + '*';
                        case 's':
                        case 'strike':
                        case 'del':
                            return '~~' + children + '~~';
                        case 'code':
                            if (node.parentElement?.tagName.toLowerCase() === 'pre') {
                                return children;
                            }
                            return '`' + children + '`';
                        case 'pre':
                            return '```\n' + children + '\n```\n\n';
                        case 'blockquote':
                            return '> ' + children.trim() + '\n\n';
                        case 'hr':
                            return '---\n\n';
                        case 'a':
                            const href = node.getAttribute('href') || '';
                            return '[' + children + '](' + href + ')';
                        case 'img':
                            const src = node.getAttribute('src') || '';
                            const alt = node.getAttribute('alt') || '';
                            return '![' + alt + '](' + src + ')';
                        case 'ul':
                            return Array.from(node.children).map(li =>
                                '- ' + convertNode(li).trim()
                            ).join('\n') + '\n\n';
                        case 'ol':
                            return Array.from(node.children).map((li, i) =>
                                (i + 1) +
                                '. ' + convertNode(li).trim()
                            ).join('\n') + '\n\n';
                        case 'li':
                            return children;
                        case 'div':
                            return children + '\n';
                        default:
                            return children;
                    }
                };

                let md = Array.from(div.childNodes).map(convertNode).join('');
                // Clean up extra newlines
                md = md.replace(/\n{3,}/g, '\n\n').trim();
                return md;
            },

            init() {
                // Initialize display from content
                this.$nextTick(() => {
                    if (this.content) {
                        const displayHtml = this.format === 'markdown' ?
                            this.markdownToHtml(this.content) :
                            this.content;
                        this.$refs.content.innerHTML = displayHtml;
                    }
                });

                // Sync to Livewire on blur if configured
                this.$refs.content.addEventListener('blur', () => {
                    if (this.wireModel && this.wireModelBlur) {
                        this.syncToWire();
                    }
                });

                this.$el.querySelectorAll('[data-action]').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        e.preventDefault();
                        this.execAction(btn.dataset.action);
                    });
                });

                // Image selection and resize
                this.$refs.content.addEventListener('click', (e) => {
                    if (e.target.tagName === 'IMG') {
                        e.preventDefault();
                        this.selectImage(e.target);
                    } else {
                        this.deselectImage();
                    }
                });

                // Deselect on click outside
                document.addEventListener('click', (e) => {
                    if (!this.$el.contains(e.target)) {
                        this.deselectImage();
                    }
                });
            },

            syncToWire() {
                if (this.wireModel && this.$wire) {
                    this.$wire.set(this.wireModel, this.content);
                }
            },

            onInput() {
                const html = this.$refs.content.innerHTML;
                // Convert to markdown if format is markdown, otherwise keep HTML
                this.content = this.format === 'markdown' ?
                    this.htmlToMarkdown(html) :
                    html;

                // Sync to Livewire on every input if not blur mode
                if (this.wireModel && !this.wireModelBlur) {
                    this.syncToWire();
                }
            },

            onKeydown(e) {
                if (e.ctrlKey || e.metaKey) {
                    switch (e.key.toLowerCase()) {
                        case 'b':
                            e.preventDefault();
                            this.execAction('bold');
                            break;
                        case 'i':
                            e.preventDefault();
                            this.execAction('italic');
                            break;
                        case 'u':
                            e.preventDefault();
                            this.execAction('underline');
                            break;
                    }
                }
            },

            onPaste(e) {
                e.preventDefault();
                const text = e.clipboardData.getData('text/plain');
                document.execCommand('insertText', false, text);
            },

            execAction(action) {
                this.$refs.content.focus();

                switch (action) {
                    case 'h1':
                        this.formatBlock('h1');
                        break;
                    case 'h2':
                        this.formatBlock('h2');
                        break;
                    case 'h3':
                        this.formatBlock('h3');
                        break;
                    case 'blockquote':
                        this.formatBlock('blockquote');
                        break;
                    case 'codeBlock':
                        this.insertCodeBlock();
                        break;
                    case 'code':
                        this.wrapSelection('code');
                        break;
                    case 'link':
                        this.showLinkDialog();
                        break;
                    case 'image':
                        this.showImageDialog();
                        break;
                    default:
                        document.execCommand(action, false, null);
                }

                this.onInput();
                this.updateActiveFormats();
            },

            formatBlock(tag) {
                const current = document.queryCommandValue('formatBlock');
                if (current.toLowerCase() === tag.toLowerCase()) {
                    document.execCommand('formatBlock', false, 'p');
                } else {
                    document.execCommand('formatBlock', false, tag);
                }
            },

            wrapSelection(tag) {
                const selection = window.getSelection();
                if (selection.rangeCount === 0) return;

                const range = selection.getRangeAt(0);
                const selectedText = range.toString();

                if (selectedText) {
                    const wrapper = document.createElement(tag);
                    wrapper.textContent = selectedText;
                    range.deleteContents();
                    range.insertNode(wrapper);
                }
            },

            insertCodeBlock() {
                const selection = window.getSelection();
                const range = selection.rangeCount > 0 ? selection.getRangeAt(0) : null;
                const text = range ? range.toString() : '';

                const pre = document.createElement('pre');
                const code = document.createElement('code');
                code.textContent = text || 'Code here...';
                pre.appendChild(code);

                if (range) {
                    range.deleteContents();
                    range.insertNode(pre);
                } else {
                    this.$refs.content.appendChild(pre);
                }

                const newRange = document.createRange();
                newRange.setStartAfter(pre);
                newRange.collapse(true);
                selection.removeAllRanges();
                selection.addRange(newRange);
            },

            showLinkDialog() {
                this.savedSelection = this.saveSelection();
                // Position below toolbar (toolbar is ~44px)
                this.linkInputPosition = 'top: 52px; left: 8px;';
                this.showLinkInput = true;
                this.$nextTick(() => {
                    this.$refs.linkInput.value = '';
                    this.$refs.linkInput.focus();
                });
            },

            applyLink() {
                const url = this.$refs.linkInput.value.trim();
                if (url && this.savedSelection) {
                    this.restoreSelection(this.savedSelection);
                    document.execCommand('createLink', false, url);
                }
                this.showLinkInput = false;
                this.$refs.content.focus();
                this.onInput();
            },

            showImageDialog() {
                this.savedSelection = this.saveSelection();
                this.imageInputPosition = 'top: 52px; left: 8px;';
                this.showImageInput = true;
                this.$nextTick(() => {
                    this.$refs.imageInput.value = '';
                    this.$refs.imageInput.focus();
                });
            },

            applyImage() {
                const url = this.$refs.imageInput.value.trim();
                if (url && this.savedSelection) {
                    this.restoreSelection(this.savedSelection);
                    document.execCommand('insertImage', false, url);
                }
                this.showImageInput = false;
                this.$refs.content.focus();
                this.onInput();
            },

            saveSelection() {
                const sel = window.getSelection();
                if (sel.rangeCount > 0) {
                    return sel.getRangeAt(0).cloneRange();
                }
                return null;
            },

            restoreSelection(range) {
                if (range) {
                    const sel = window.getSelection();
                    sel.removeAllRanges();
                    sel.addRange(range);
                }
            },

            updateActiveFormats() {
                this.activeFormats = {
                    bold: document.queryCommandState('bold'),
                    italic: document.queryCommandState('italic'),
                    strikethrough: document.queryCommandState('strikeThrough'),
                    h1: document.queryCommandValue('formatBlock').toLowerCase() === 'h1',
                    h2: document.queryCommandValue('formatBlock').toLowerCase() === 'h2',
                    h3: document.queryCommandValue('formatBlock').toLowerCase() === 'h3',
                    ul: document.queryCommandState('insertUnorderedList'),
                    ol: document.queryCommandState('insertOrderedList'),
                    blockquote: document.queryCommandValue('formatBlock').toLowerCase() ===
                        'blockquote',
                    link: document.queryCommandState('createLink') || this.isInTag('a'),
                };
            },

            isInTag(tagName) {
                const sel = window.getSelection();
                if (sel.rangeCount === 0) return false;

                let node = sel.anchorNode;
                while (node) {
                    if (node.nodeName && node.nodeName.toLowerCase() === tagName.toLowerCase()) {
                        return true;
                    }
                    node = node.parentNode;
                }
                return false;
            },

            selectImage(img) {
                this.deselectImage();
                this.selectedImage = img;
                img.classList.add('is-selected');

                // Create resize overlay
                const overlay = document.createElement('div');
                overlay.className = 'ui-editor-img-resize';
                overlay.innerHTML =
                    `
                                                                                                                                                                                                                                                <div class="ui-editor-img-resize-handle nw" data-handle="nw"></div>
                                                                                                                                                                                                                                                <div class="ui-editor-img-resize-handle ne" data-handle="ne"></div>
                                                                                                                                                                                                                                                <div class="ui-editor-img-resize-handle sw" data-handle="sw"></div>
                                                                                                                                                                                                                                                <div class="ui-editor-img-resize-handle se" data-handle="se"></div>
                                                                                                                                                                                                                                            `;

                        this.positionOverlay(overlay, img);
                        this.$refs.content.appendChild(overlay);
                        this.resizeOverlay = overlay;

                        // Add resize handlers
                        overlay.querySelectorAll('.ui-editor-img-resize-handle').forEach(handle => {
                            handle.addEventListener('mousedown', (e) => this.startResize(e, handle
                                .dataset.handle));
                        });
                    },

                    deselectImage() {
                        if (this.selectedImage) {
                            this.selectedImage.classList.remove('is-selected');
                            this.selectedImage = null;
                        }
                        if (this.resizeOverlay) {
                            this.resizeOverlay.remove();
                            this.resizeOverlay = null;
                        }
                    },

                    positionOverlay(overlay, img) {
                        const rect = img.getBoundingClientRect();
                        const contentRect = this.$refs.content.getBoundingClientRect();
                        overlay.style.left = (rect.left - contentRect.left + this.$refs.content
                            .scrollLeft) + 'px';
                        overlay.style.top = (rect.top - contentRect.top + this.$refs.content.scrollTop) +
                            'px';
                        overlay.style.width = rect.width + 'px';
                        overlay.style.height = rect.height + 'px';
                    },

                    startResize(e, handle) {
                        e.preventDefault();
                        e.stopPropagation();

                        const img = this.selectedImage;
                        if (!img) return;

                        const startX = e.clientX;
                        const startY = e.clientY;
                        const startWidth = img.offsetWidth;
                        const startHeight = img.offsetHeight;
                        const aspectRatio = startWidth / startHeight;

                        const onMouseMove = (e) => {
                            let newWidth, newHeight;
                            const deltaX = e.clientX - startX;
                            const deltaY = e.clientY - startY;

                            if (handle === 'se') {
                                newWidth = Math.max(50, startWidth + deltaX);
                            } else if (handle === 'sw') {
                                newWidth = Math.max(50, startWidth - deltaX);
                            } else if (handle === 'ne') {
                                newWidth = Math.max(50, startWidth + deltaX);
                            } else if (handle === 'nw') {
                                newWidth = Math.max(50, startWidth - deltaX);
                            }

                            newHeight = newWidth / aspectRatio;

                            img.style.width = newWidth + 'px';
                            img.style.height = newHeight + 'px';
                            img.setAttribute('width', Math.round(newWidth));
                            img.setAttribute('height', Math.round(newHeight));

                            this.positionOverlay(this.resizeOverlay, img);
                        };

                        const onMouseUp = () => {
                            document.removeEventListener('mousemove', onMouseMove);
                            document.removeEventListener('mouseup', onMouseUp);
                            this.onInput();
                        };

                        document.addEventListener('mousemove', onMouseMove);
                        document.addEventListener('mouseup', onMouseUp);
                    },
                }));
            });
        </script>
    @endonce
</div>
