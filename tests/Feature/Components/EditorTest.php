<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Editor Component (Rich Text Editor)
// =============================================================================

it('renders a basic editor', function () {
    $html = Blade::render('<ui:editor name="content" />');

    expect($html)
        ->toContain('ui-editor')
        ->toContain('x-data="uiEditor');
});

it('renders editor with name prop', function () {
    $html = Blade::render('<ui:editor name="description" />');

    expect($html)->toContain('name="description"');
});

it('renders editor with label when provided', function () {
    $html = Blade::render('<ui:editor name="content" label="Content" />');

    expect($html)
        ->toContain('Content')
        ->toContain('<label')
        ->toContain('for=');
});

it('renders editor with hint when provided', function () {
    $html = Blade::render('<ui:editor name="content" label="Content" hint="Write your article here" />');

    expect($html)->toContain('Write your article here');
});

it('renders editor with placeholder', function () {
    $html = Blade::render('<ui:editor name="content" placeholder="Start typing..." />');

    expect($html)->toContain('Start typing...');
});

it('uses default placeholder when not provided', function () {
    $html = Blade::render('<ui:editor name="content" />');

    expect($html)->toContain('Write something...');
});

it('renders editor with html format by default', function () {
    $html = Blade::render('<ui:editor name="content" />');

    // @js outputs single quotes
    expect($html)->toContain("format: 'html'");
});

it('renders editor with custom format', function () {
    $html = Blade::render('<ui:editor name="content" format="markdown" />');

    expect($html)->toContain("format: 'markdown'");
});

it('renders editor with default toolbar groups', function () {
    $html = Blade::render('<ui:editor name="content" />');

    // Default toolbar includes formatting, headings, lists, extras
    expect($html)
        ->toContain('ui-editor-btn');
});

it('renders editor with custom toolbar array', function () {
    $html = Blade::render('<ui:editor name="content" :toolbar="[\'formatting\', \'lists\']" />');

    expect($html)->toContain('ui-editor');
});

it('renders editor with toolbar as string', function () {
    $html = Blade::render('<ui:editor name="content" toolbar="formatting,headings" />');

    expect($html)->toContain('ui-editor');
});

it('generates unique id for editor when not provided', function () {
    $html = Blade::render('<ui:editor name="content" />');

    expect($html)->toMatch('/id="[^"]+"/');
});

it('uses custom id for editor when provided', function () {
    $html = Blade::render('<ui:editor name="content" id="custom-editor-id" />');

    expect($html)->toContain('id="custom-editor-id"');
});

it('passes through additional attributes for editor', function () {
    $html = Blade::render('<ui:editor name="content" />');

    // Editor wraps in div with wire:ignore
    expect($html)->toContain('wire:ignore');
});

it('shows error message for editor from error bag', function () {
    $this->withErrors(['content' => 'The content field is required.']);

    $html = Blade::render('<ui:editor name="content" label="Content" />');

    expect($html)
        ->toContain('The content field is required.')
        ->toContain('border-red-500');
});

it('shows error styling for editor without label', function () {
    $this->withErrors(['content' => 'Invalid content']);

    $html = Blade::render('<ui:editor name="content" />');

    expect($html)->toContain('border-red-500');
});

it('renders editor slot content as initial value', function () {
    $html = Blade::render('<ui:editor name="content"><p>Initial content</p></ui:editor>');

    expect($html)->toContain('<p>Initial content</p>');
});

it('renders editor toolbar with styling classes', function () {
    $html = Blade::render('<ui:editor name="content" />');

    expect($html)
        ->toContain('flex')
        ->toContain('border-b');
});

it('renders editor content area', function () {
    $html = Blade::render('<ui:editor name="content" />');

    expect($html)->toContain('ui-editor-content');
});

it('renders editor with contenteditable area', function () {
    $html = Blade::render('<ui:editor name="content" />');

    expect($html)->toContain('contenteditable="true"');
});

it('renders editor hidden textarea for form submission', function () {
    $html = Blade::render('<ui:editor name="content" />');

    expect($html)
        ->toContain('<textarea')
        ->toContain('class="sr-only"');
});

// =============================================================================
// Code Editor Component
// =============================================================================

it('renders a basic code-editor', function () {
    $html = Blade::render('<ui:code-editor name="code" />');

    expect($html)
        ->toContain('data-code-editor')
        ->toContain('data-code-editor-content');
});

it('renders code-editor with name prop', function () {
    $html = Blade::render('<ui:code-editor name="source" />');

    expect($html)->toContain('name="source"');
});

it('renders code-editor with label when provided', function () {
    $html = Blade::render('<ui:code-editor name="code" label="Source Code" />');

    expect($html)
        ->toContain('Source Code')
        ->toContain('<label')
        ->toContain('for=');
});

it('renders code-editor with hint when provided', function () {
    $html = Blade::render('<ui:code-editor name="code" label="Code" hint="Enter your code here" />');

    expect($html)->toContain('Enter your code here');
});

it('renders code-editor with javascript language by default', function () {
    $html = Blade::render('<ui:code-editor name="code" />');

    expect($html)->toContain('data-language="javascript"');
});

it('renders code-editor with custom language', function () {
    $html = Blade::render('<ui:code-editor name="code" language="php" />');

    expect($html)->toContain('data-language="php"');
});

it('renders code-editor with language label in header', function () {
    $html = Blade::render('<ui:code-editor name="code" language="typescript" />');

    expect($html)->toContain('TypeScript');
});

it('renders code-editor with placeholder', function () {
    $html = Blade::render('<ui:code-editor name="code" placeholder="// Write code here" />');

    expect($html)->toContain('data-placeholder="// Write code here"');
});

it('renders code-editor in readonly mode', function () {
    $html = Blade::render('<ui:code-editor name="code" readonly />');

    expect($html)->toContain('data-readonly');
});

it('renders code-editor with default variant', function () {
    $html = Blade::render('<ui:code-editor name="code" />');

    expect($html)->toContain('bg-white');
});

it('renders code-editor with inverted variant', function () {
    $html = Blade::render('<ui:code-editor name="code" variant="inverted" />');

    expect($html)->toContain('bg-gray-10');
});

it('renders code-editor with sm size', function () {
    $html = Blade::render('<ui:code-editor name="code" size="sm" />');

    expect($html)->toContain('min-h-24');
});

it('renders code-editor with md size (default)', function () {
    $html = Blade::render('<ui:code-editor name="code" size="md" />');

    expect($html)->toContain('min-h-32');
});

it('renders code-editor with lg size', function () {
    $html = Blade::render('<ui:code-editor name="code" size="lg" />');

    expect($html)->toContain('min-h-48');
});

it('renders code-editor with header by default', function () {
    $html = Blade::render('<ui:code-editor name="code" />');

    expect($html)->toContain('data-code-editor-header');
});

it('renders code-editor without header when disabled', function () {
    $html = Blade::render('<ui:code-editor name="code" :header="false" />');

    expect($html)->not->toContain('data-code-editor-header');
});

it('renders code-editor without footer by default', function () {
    $html = Blade::render('<ui:code-editor name="code" />');

    expect($html)->not->toContain('data-code-editor-footer');
});

it('renders code-editor with footer when enabled', function () {
    $html = Blade::render('<ui:code-editor name="code" footer />');

    expect($html)->toContain('data-code-editor-footer');
});

it('renders code-editor with custom header slot', function () {
    $html = Blade::render('
        <ui:code-editor name="code">
            <x-slot:header>Custom Header</x-slot:header>
        </ui:code-editor>
    ');

    expect($html)->toContain('Custom Header');
});

it('renders code-editor with custom footer slot', function () {
    $html = Blade::render('
        <ui:code-editor name="code" footer>
            <x-slot:footer>Custom Footer</x-slot:footer>
        </ui:code-editor>
    ');

    expect($html)->toContain('Custom Footer');
});

it('generates unique id for code-editor when not provided', function () {
    $html = Blade::render('<ui:code-editor name="code" />');

    expect($html)->toMatch('/id="[^"]+"/');
});

it('uses custom id for code-editor when provided', function () {
    $html = Blade::render('<ui:code-editor name="code" id="custom-code-id" />');

    expect($html)->toContain('id="custom-code-id"');
});

it('passes through additional attributes for code-editor', function () {
    $html = Blade::render('<ui:code-editor name="code" data-testid="my-code-editor" />');

    expect($html)->toContain('data-testid="my-code-editor"');
});

it('shows error message for code-editor from error bag', function () {
    $this->withErrors(['code' => 'The code field is required.']);

    $html = Blade::render('<ui:code-editor name="code" label="Code" />');

    expect($html)
        ->toContain('The code field is required.')
        ->toContain('border-red-500');
});

it('renders code-editor slot content as initial value', function () {
    $html = Blade::render('<ui:code-editor name="code">console.log("Hello");</ui:code-editor>');

    expect($html)->toContain('console.log("Hello");');
});

it('renders code-editor with wire:ignore for Livewire', function () {
    $html = Blade::render('<ui:code-editor name="code" />');

    expect($html)->toContain('wire:ignore');
});

it('renders code-editor hidden textarea for form submission', function () {
    $html = Blade::render('<ui:code-editor name="code" />');

    expect($html)
        ->toContain('<textarea')
        ->toContain('class="hidden"');
});

// =============================================================================
// Coder Component (Lightweight Code Editor with CodeMirror)
// =============================================================================

it('renders a basic coder component', function () {
    $html = Blade::render('<ui:coder name="code" />');

    expect($html)
        ->toContain('ui-coder')
        ->toContain('x-data="uiCoder');
});

it('renders coder with name prop', function () {
    $html = Blade::render('<ui:coder name="snippet" />');

    expect($html)->toContain('name="snippet"');
});

it('renders coder with javascript language by default', function () {
    $html = Blade::render('<ui:coder name="code" />');

    // @js outputs single quotes
    expect($html)->toContain("language: 'javascript'");
});

it('renders coder with custom language', function () {
    $html = Blade::render('<ui:coder name="code" language="html" />');

    expect($html)->toContain("language: 'html'");
});

it('renders coder with placeholder', function () {
    $html = Blade::render('<ui:coder name="code" placeholder="// Enter code" />');

    // @js escapes forward slashes
    expect($html)->toContain("placeholder: '\\/\\/ Enter code'");
});

it('renders coder with empty placeholder by default', function () {
    $html = Blade::render('<ui:coder name="code" />');

    expect($html)->toContain("placeholder: ''");
});

it('renders coder in readonly mode', function () {
    $html = Blade::render('<ui:coder name="code" readonly />');

    expect($html)->toContain('readonly: true');
});

it('renders coder in editable mode by default', function () {
    $html = Blade::render('<ui:coder name="code" />');

    expect($html)->toContain('readonly: false');
});

it('generates unique id for coder when not provided', function () {
    $html = Blade::render('<ui:coder name="code" />');

    expect($html)->toMatch('/id="[^"]+"/');
});

it('uses custom id for coder when provided', function () {
    $html = Blade::render('<ui:coder name="code" id="custom-coder-id" />');

    expect($html)->toContain('id="custom-coder-id"');
});

it('passes through additional attributes for coder', function () {
    $html = Blade::render('<ui:coder name="code" data-testid="my-coder" />');

    expect($html)->toContain('data-testid="my-coder"');
});

it('renders coder slot content as initial value', function () {
    $html = Blade::render('<ui:coder name="code">const x = 1;</ui:coder>');

    expect($html)->toContain('const x = 1;');
});

it('renders coder with x-ref for editor container', function () {
    $html = Blade::render('<ui:coder name="code" />');

    expect($html)->toContain('x-ref="editor"');
});

it('renders coder with x-ref for input textarea', function () {
    $html = Blade::render('<ui:coder name="code" />');

    expect($html)->toContain('x-ref="input"');
});

it('renders coder hidden textarea with sr-only class', function () {
    $html = Blade::render('<ui:coder name="code" />');

    expect($html)
        ->toContain('<textarea')
        ->toContain('class="sr-only"');
});

it('renders coder with wire:ignore for Livewire', function () {
    $html = Blade::render('<ui:coder name="code" />');

    expect($html)->toContain('wire:ignore');
});

it('renders coder with styling classes', function () {
    $html = Blade::render('<ui:coder name="code" />');

    expect($html)
        ->toContain('rounded-md')
        ->toContain('border')
        ->toContain('shadow-xs');
});

it('renders coder with CodeMirror initialization script', function () {
    $html = Blade::render('<ui:coder name="code" />');

    expect($html)
        ->toContain('<script type="module">')
        ->toContain('@codemirror/state')
        ->toContain('@codemirror/view');
});

it('only renders coder script once with @once directive', function () {
    $html = Blade::render('
        <ui:coder name="code1" />
        <ui:coder name="code2" />
    ');

    // Script should only appear once despite multiple components
    expect(substr_count($html, 'async function loadModules()'))->toBe(1);
});

it('renders coder with focus-within styling', function () {
    $html = Blade::render('<ui:coder name="code" />');

    expect($html)->toContain('focus-within:border-gray-400');
});

it('renders coder without name attribute when not provided', function () {
    $html = Blade::render('<ui:coder />');

    // The textarea should not have a name attribute
    expect($html)->toMatch('/<textarea[^>]*x-ref="input"[^>]*>/');
});
