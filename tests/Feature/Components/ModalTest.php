<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Modal (index.blade.php)
// =============================================================================

it('renders a basic modal', function () {
    $html = Blade::render('<ui:modal name="test">Content</ui:modal>');

    expect($html)
        ->toContain('Content')
        ->toContain('x-data')
        ->toContain('<dialog');
});

it('renders modal with name as id', function () {
    $html = Blade::render('<ui:modal name="my-modal">Content</ui:modal>');

    expect($html)->toContain('id="my-modal"');
});

it('generates unique id when name is not provided', function () {
    $html = Blade::render('<ui:modal>Content</ui:modal>');

    expect($html)->toMatch('/id="modal-[^"]+"/');
});

it('applies default size (md)', function () {
    $html = Blade::render('<ui:modal name="test">Content</ui:modal>');

    expect($html)->toContain('max-w-lg');
});

it('applies sm size', function () {
    $html = Blade::render('<ui:modal name="test" size="sm">Content</ui:modal>');

    expect($html)->toContain('max-w-sm');
});

it('applies lg size', function () {
    $html = Blade::render('<ui:modal name="test" size="lg">Content</ui:modal>');

    expect($html)->toContain('max-w-2xl');
});

it('applies xl size', function () {
    $html = Blade::render('<ui:modal name="test" size="xl">Content</ui:modal>');

    expect($html)->toContain('max-w-4xl');
});

it('applies full size', function () {
    $html = Blade::render('<ui:modal name="test" size="full">Content</ui:modal>');

    expect($html)->toContain('max-w-full');
});

it('is closeable by default', function () {
    $html = Blade::render('<ui:modal name="test">Content</ui:modal>');

    expect($html)->toContain('x-on:click.self="closeModal()"');
});

it('can disable closeable', function () {
    $html = Blade::render('<ui:modal name="test" :closeable="false">Content</ui:modal>');

    expect($html)->not->toContain('x-on:click.self="closeModal()"');
});

it('has escape key handler', function () {
    $html = Blade::render('<ui:modal name="test">Content</ui:modal>');

    expect($html)->toContain('x-on:keydown.escape.prevent="closeModal()"');
});

it('has named event listeners when name is provided', function () {
    $html = Blade::render('<ui:modal name="confirm-delete">Content</ui:modal>');

    expect($html)
        ->toContain('x-on:open-modal-confirm-delete.window="openModal()"')
        ->toContain('x-on:close-modal-confirm-delete.window="closeModal()"');
});

it('has proper ARIA attributes', function () {
    $html = Blade::render('<ui:modal name="test">Content</ui:modal>');

    expect($html)
        ->toContain('role="dialog"')
        ->toContain('aria-modal="true"');
});

it('has data-modal attribute', function () {
    $html = Blade::render('<ui:modal name="test">Content</ui:modal>');

    expect($html)->toContain('data-modal');
});

it('includes Alpine.js init and state management', function () {
    $html = Blade::render('<ui:modal name="test">Content</ui:modal>');

    expect($html)
        ->toContain('x-modelable="open"')
        ->toContain('open: false')
        ->toContain('init()')
        ->toContain('openModal()')
        ->toContain('closeModal()');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:modal name="test" data-testid="modal-test">Content</ui:modal>');

    expect($html)->toContain('data-testid="modal-test"');
});

it('has wire:ignore.self for Livewire compatibility', function () {
    $html = Blade::render('<ui:modal name="test">Content</ui:modal>');

    expect($html)->toContain('wire:ignore.self');
});

it('renders slot content', function () {
    $html = Blade::render('<ui:modal name="test"><p>Modal body content</p></ui:modal>');

    expect($html)->toContain('<p>Modal body content</p>');
});

// =============================================================================
// Modal Header (header.blade.php)
// =============================================================================

it('renders modal header', function () {
    $html = Blade::render('<ui:modal.header>Header Content</ui:modal.header>');

    expect($html)
        ->toContain('<div')
        ->toContain('Header Content')
        ->toContain('data-modal-header');
});

it('renders modal header with slot content', function () {
    $html = Blade::render('<ui:modal.header><span>Custom Header</span></ui:modal.header>');

    expect($html)->toContain('<span>Custom Header</span>');
});

it('passes through attributes on modal header', function () {
    $html = Blade::render('<ui:modal.header data-testid="header">Content</ui:modal.header>');

    expect($html)->toContain('data-testid="header"');
});

it('merges custom classes on modal header', function () {
    $html = Blade::render('<ui:modal.header class="custom-class">Content</ui:modal.header>');

    expect($html)->toContain('custom-class');
});

it('has default styling classes on modal header', function () {
    $html = Blade::render('<ui:modal.header>Content</ui:modal.header>');

    expect($html)
        ->toContain('flex')
        ->toContain('items-center')
        ->toContain('justify-between')
        ->toContain('px-6')
        ->toContain('py-4');
});

// =============================================================================
// Modal Body (body.blade.php)
// =============================================================================

it('renders modal body', function () {
    $html = Blade::render('<ui:modal.body>Body Content</ui:modal.body>');

    expect($html)
        ->toContain('<div')
        ->toContain('Body Content')
        ->toContain('data-modal-body');
});

it('renders modal body with slot content', function () {
    $html = Blade::render('<ui:modal.body><p>Paragraph content</p></ui:modal.body>');

    expect($html)->toContain('<p>Paragraph content</p>');
});

it('passes through attributes on modal body', function () {
    $html = Blade::render('<ui:modal.body data-testid="body">Content</ui:modal.body>');

    expect($html)->toContain('data-testid="body"');
});

it('merges custom classes on modal body', function () {
    $html = Blade::render('<ui:modal.body class="custom-class">Content</ui:modal.body>');

    expect($html)->toContain('custom-class');
});

it('has default styling classes on modal body', function () {
    $html = Blade::render('<ui:modal.body>Content</ui:modal.body>');

    expect($html)
        ->toContain('overflow-y-auto')
        ->toContain('px-6')
        ->toContain('text-sm');
});

// =============================================================================
// Modal Footer (footer.blade.php)
// =============================================================================

it('renders modal footer', function () {
    $html = Blade::render('<ui:modal.footer>Footer Content</ui:modal.footer>');

    expect($html)
        ->toContain('<div')
        ->toContain('Footer Content')
        ->toContain('data-modal-footer');
});

it('renders modal footer with slot content', function () {
    $html = Blade::render('<ui:modal.footer><button>Save</button></ui:modal.footer>');

    expect($html)->toContain('<button>Save</button>');
});

it('passes through attributes on modal footer', function () {
    $html = Blade::render('<ui:modal.footer data-testid="footer">Content</ui:modal.footer>');

    expect($html)->toContain('data-testid="footer"');
});

it('merges custom classes on modal footer', function () {
    $html = Blade::render('<ui:modal.footer class="custom-class">Content</ui:modal.footer>');

    expect($html)->toContain('custom-class');
});

it('has default styling classes on modal footer', function () {
    $html = Blade::render('<ui:modal.footer>Content</ui:modal.footer>');

    expect($html)
        ->toContain('flex')
        ->toContain('items-center')
        ->toContain('justify-end')
        ->toContain('gap-3')
        ->toContain('px-6')
        ->toContain('py-4');
});

// =============================================================================
// Modal Title (title.blade.php)
// =============================================================================

it('renders modal title', function () {
    $html = Blade::render('<ui:modal.title>Modal Title</ui:modal.title>');

    expect($html)
        ->toContain('<h2')
        ->toContain('Modal Title')
        ->toContain('data-modal-title');
});

it('renders modal title with slot content', function () {
    $html = Blade::render('<ui:modal.title><span>Styled Title</span></ui:modal.title>');

    expect($html)->toContain('<span>Styled Title</span>');
});

it('passes through attributes on modal title', function () {
    $html = Blade::render('<ui:modal.title data-testid="title">Content</ui:modal.title>');

    expect($html)->toContain('data-testid="title"');
});

it('merges custom classes on modal title', function () {
    $html = Blade::render('<ui:modal.title class="custom-class">Content</ui:modal.title>');

    expect($html)->toContain('custom-class');
});

it('has default styling classes on modal title', function () {
    $html = Blade::render('<ui:modal.title>Content</ui:modal.title>');

    expect($html)
        ->toContain('text-lg')
        ->toContain('font-semibold');
});

// =============================================================================
// Modal Description (description.blade.php)
// =============================================================================

it('renders modal description', function () {
    $html = Blade::render('<ui:modal.description>Description text</ui:modal.description>');

    expect($html)
        ->toContain('<p')
        ->toContain('Description text')
        ->toContain('data-modal-description');
});

it('renders modal description with slot content', function () {
    $html = Blade::render('<ui:modal.description><em>Emphasized description</em></ui:modal.description>');

    expect($html)->toContain('<em>Emphasized description</em>');
});

it('passes through attributes on modal description', function () {
    $html = Blade::render('<ui:modal.description data-testid="description">Content</ui:modal.description>');

    expect($html)->toContain('data-testid="description"');
});

it('merges custom classes on modal description', function () {
    $html = Blade::render('<ui:modal.description class="custom-class">Content</ui:modal.description>');

    expect($html)->toContain('custom-class');
});

it('has default styling classes on modal description', function () {
    $html = Blade::render('<ui:modal.description>Content</ui:modal.description>');

    expect($html)
        ->toContain('mt-1')
        ->toContain('text-sm');
});

// =============================================================================
// Modal Close (close.blade.php)
// =============================================================================

it('renders modal close button', function () {
    $html = Blade::render('<ui:modal name="test"><ui:modal.close /></ui:modal>');

    expect($html)
        ->toContain('x-on:click="closeModal()"')
        ->toContain('data-button');
});

it('uses default icon (x)', function () {
    $html = Blade::render('<ui:modal name="test"><ui:modal.close /></ui:modal>');

    expect($html)->toContain('<svg');
});

it('uses custom icon on close button', function () {
    $html = Blade::render('<ui:modal name="test"><ui:modal.close icon="arrow-left" /></ui:modal>');

    expect($html)->toContain('<svg');
});

it('uses default size (sm) on close button', function () {
    $html = Blade::render('<ui:modal name="test"><ui:modal.close /></ui:modal>');

    expect($html)->toContain('min-h-8');
});

it('uses custom size on close button', function () {
    $html = Blade::render('<ui:modal name="test"><ui:modal.close size="md" /></ui:modal>');

    expect($html)->toContain('min-h-10');
});

it('uses default variant (ghost) on close button', function () {
    $html = Blade::render('<ui:modal name="test"><ui:modal.close /></ui:modal>');

    expect($html)->toContain('data-variant="ghost"');
});

it('uses custom variant on close button', function () {
    $html = Blade::render('<ui:modal name="test"><ui:modal.close variant="subtle" /></ui:modal>');

    expect($html)->toContain('data-variant="subtle"');
});

it('passes through attributes on close button', function () {
    $html = Blade::render('<ui:modal name="test"><ui:modal.close data-testid="close" /></ui:modal>');

    expect($html)->toContain('data-testid="close"');
});

it('renders slot content in close button', function () {
    $html = Blade::render('<ui:modal name="test"><ui:modal.close>Close</ui:modal.close></ui:modal>');

    expect($html)->toContain('Close');
});

// =============================================================================
// Composed Usage
// =============================================================================

it('renders a complete modal composition', function () {
    $html = Blade::render('
        <ui:modal name="complete-modal" size="lg">
            <ui:modal.header>
                <ui:modal.title>Confirmation</ui:modal.title>
                <ui:modal.close />
            </ui:modal.header>
            <ui:modal.body>
                <ui:modal.description>Are you sure you want to continue?</ui:modal.description>
                <p>This action cannot be undone.</p>
            </ui:modal.body>
            <ui:modal.footer>
                <ui:button variant="ghost">Cancel</ui:button>
                <ui:button variant="primary">Confirm</ui:button>
            </ui:modal.footer>
        </ui:modal>
    ');

    expect($html)
        ->toContain('id="complete-modal"')
        ->toContain('max-w-2xl')
        ->toContain('data-modal-header')
        ->toContain('data-modal-title')
        ->toContain('Confirmation')
        ->toContain('x-on:click="closeModal()"')
        ->toContain('data-modal-body')
        ->toContain('data-modal-description')
        ->toContain('Are you sure you want to continue?')
        ->toContain('This action cannot be undone.')
        ->toContain('data-modal-footer')
        ->toContain('Cancel')
        ->toContain('Confirm');
});

it('renders modal with title and description in header', function () {
    $html = Blade::render('
        <ui:modal name="with-description">
            <ui:modal.header>
                <div>
                    <ui:modal.title>Edit Profile</ui:modal.title>
                    <ui:modal.description>Update your personal information</ui:modal.description>
                </div>
                <ui:modal.close />
            </ui:modal.header>
            <ui:modal.body>Form content here</ui:modal.body>
        </ui:modal>
    ');

    expect($html)
        ->toContain('Edit Profile')
        ->toContain('Update your personal information')
        ->toContain('Form content here');
});

it('renders modal without header or footer', function () {
    $html = Blade::render('
        <ui:modal name="simple-modal">
            <ui:modal.body>
                <p>Simple content only</p>
            </ui:modal.body>
        </ui:modal>
    ');

    expect($html)
        ->toContain('data-modal-body')
        ->toContain('Simple content only')
        ->not->toContain('data-modal-header')
        ->not->toContain('data-modal-footer');
});

it('renders nested content in modal body', function () {
    $html = Blade::render('
        <ui:modal name="nested-modal">
            <ui:modal.body>
                <div class="space-y-4">
                    <ui:input name="email" label="Email" />
                    <ui:textarea name="message" label="Message" />
                </div>
            </ui:modal.body>
        </ui:modal>
    ');

    expect($html)
        ->toContain('space-y-4')
        ->toContain('name="email"')
        ->toContain('name="message"')
        ->toContain('<input')
        ->toContain('<textarea');
});
