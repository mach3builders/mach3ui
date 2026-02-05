<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Card (index.blade.php)
// =============================================================================

it('renders a basic card', function () {
    $html = Blade::render('<ui:card>Content</ui:card>');

    expect($html)
        ->toContain('Content')
        ->toContain('data-card');
});

it('renders card with slot content', function () {
    $html = Blade::render('<ui:card><p>Custom paragraph</p></ui:card>');

    expect($html)->toContain('<p>Custom paragraph</p>');
});

it('renders card with title prop', function () {
    $html = Blade::render('<ui:card title="Card Title">Content</ui:card>');

    expect($html)
        ->toContain('Card Title')
        ->toContain('data-card-header')
        ->toContain('data-card-title');
});

it('renders card with description prop', function () {
    $html = Blade::render('<ui:card description="Card description text">Content</ui:card>');

    expect($html)
        ->toContain('Card description text')
        ->toContain('data-card-header')
        ->toContain('data-card-description');
});

it('renders card with title and description props', function () {
    $html = Blade::render('<ui:card title="Title" description="Description">Content</ui:card>');

    expect($html)
        ->toContain('Title')
        ->toContain('Description')
        ->toContain('data-card-header')
        ->toContain('data-card-title')
        ->toContain('data-card-description');
});

it('applies default variant styling', function () {
    $html = Blade::render('<ui:card>Content</ui:card>');

    expect($html)
        ->toContain('data-variant="default"')
        ->toContain('bg-gray-30');
});

it('applies inverted variant styling', function () {
    $html = Blade::render('<ui:card variant="inverted">Content</ui:card>');

    expect($html)
        ->toContain('data-variant="inverted"')
        ->toContain('bg-white');
});

it('has rounded-xl styling', function () {
    $html = Blade::render('<ui:card>Content</ui:card>');

    expect($html)->toContain('rounded-xl');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:card data-test="value" id="my-card">Content</ui:card>');

    expect($html)
        ->toContain('data-test="value"')
        ->toContain('id="my-card"');
});

it('merges custom classes', function () {
    $html = Blade::render('<ui:card class="custom-class">Content</ui:card>');

    expect($html)->toContain('custom-class');
});

// =============================================================================
// Card Header (header.blade.php)
// =============================================================================

it('renders a basic card header', function () {
    $html = Blade::render('<ui:card.header>Header content</ui:card.header>');

    expect($html)
        ->toContain('Header content')
        ->toContain('data-card-header');
});

it('renders card header with icon prop', function () {
    $html = Blade::render('<ui:card.header icon="star">Header</ui:card.header>');

    expect($html)
        ->toContain('<svg')
        ->toContain('Header');
});

it('renders card header with icon slot', function () {
    $html = Blade::render('
        <ui:card.header>
            <x-slot:icon><span class="custom-icon">Icon</span></x-slot:icon>
            Header content
        </ui:card.header>
    ');

    expect($html)
        ->toContain('custom-icon')
        ->toContain('Header content');
});

it('renders card header with boxed icon', function () {
    $html = Blade::render('<ui:card.header icon="star" icon:boxed>Header</ui:card.header>');

    expect($html)->toContain('<svg');
});

it('renders card header with icon color', function () {
    $html = Blade::render('<ui:card.header icon="star" icon:color="primary">Header</ui:card.header>');

    expect($html)->toContain('<svg');
});

it('renders card header with icon size', function () {
    $html = Blade::render('<ui:card.header icon="star" icon:size="lg">Header</ui:card.header>');

    expect($html)->toContain('<svg');
});

it('renders card header with action slot', function () {
    $html = Blade::render('
        <ui:card.header>
            <x-slot:action><button>Action</button></x-slot:action>
            Header content
        </ui:card.header>
    ');

    expect($html)
        ->toContain('<button>Action</button>')
        ->toContain('Header content')
        ->toContain('absolute right-3 top-4');
});

it('applies relative class when action slot is present', function () {
    $html = Blade::render('
        <ui:card.header>
            <x-slot:action><button>Action</button></x-slot:action>
            Header content
        </ui:card.header>
    ');

    expect($html)->toContain('relative');
});

it('passes through additional attributes on header', function () {
    $html = Blade::render('<ui:card.header data-test="header-value">Header</ui:card.header>');

    expect($html)->toContain('data-test="header-value"');
});

// =============================================================================
// Card Body (body.blade.php)
// =============================================================================

it('renders a basic card body', function () {
    $html = Blade::render('<ui:card.body>Body content</ui:card.body>');

    expect($html)
        ->toContain('Body content')
        ->toContain('data-card-body');
});

it('applies default variant styling on body', function () {
    $html = Blade::render('<ui:card.body>Content</ui:card.body>');

    expect($html)
        ->toContain('border-gray-60')
        ->toContain('bg-white');
});

it('applies inverted variant styling on body', function () {
    $html = Blade::render('<ui:card.body variant="inverted">Content</ui:card.body>');

    expect($html)
        ->toContain('border-gray-80')
        ->toContain('bg-gray-30');
});

it('applies padding by default on body', function () {
    $html = Blade::render('<ui:card.body>Content</ui:card.body>');

    expect($html)->toContain('px-4.5');
});

it('removes padding when flush is true', function () {
    $html = Blade::render('<ui:card.body flush>Content</ui:card.body>');

    expect($html)->not->toContain('px-4.5');
});

it('has rounded-lg styling on body', function () {
    $html = Blade::render('<ui:card.body>Content</ui:card.body>');

    expect($html)->toContain('rounded-lg');
});

it('has border and shadow styling on body', function () {
    $html = Blade::render('<ui:card.body>Content</ui:card.body>');

    expect($html)
        ->toContain('border')
        ->toContain('shadow-xs');
});

it('passes through additional attributes on body', function () {
    $html = Blade::render('<ui:card.body data-test="body-value">Content</ui:card.body>');

    expect($html)->toContain('data-test="body-value"');
});

it('merges custom classes on body', function () {
    $html = Blade::render('<ui:card.body class="my-custom-class">Content</ui:card.body>');

    expect($html)->toContain('my-custom-class');
});

// =============================================================================
// Card Footer (footer.blade.php)
// =============================================================================

it('renders a basic card footer', function () {
    $html = Blade::render('<ui:card.footer>Footer content</ui:card.footer>');

    expect($html)
        ->toContain('Footer content')
        ->toContain('data-card-footer');
});

it('applies default variant styling on footer', function () {
    $html = Blade::render('<ui:card.footer>Content</ui:card.footer>');

    expect($html)
        ->toContain('border-gray-60')
        ->toContain('bg-white');
});

it('applies inverted variant styling on footer', function () {
    $html = Blade::render('<ui:card.footer variant="inverted">Content</ui:card.footer>');

    expect($html)
        ->toContain('border-gray-80')
        ->toContain('bg-gray-30');
});

it('does not render divider by default', function () {
    $html = Blade::render('<ui:card.footer>Content</ui:card.footer>');

    expect($html)->not->toContain('data-divider');
});

it('renders divider when divided is true', function () {
    $html = Blade::render('<ui:card.footer divided>Content</ui:card.footer>');

    expect($html)->toContain('data-divider');
});

it('has rounded-b-lg styling on footer', function () {
    $html = Blade::render('<ui:card.footer>Content</ui:card.footer>');

    expect($html)->toContain('rounded-b-lg');
});

it('has border-t-0 to connect with body', function () {
    $html = Blade::render('<ui:card.footer>Content</ui:card.footer>');

    expect($html)->toContain('border-t-0');
});

it('passes through additional attributes on footer', function () {
    $html = Blade::render('<ui:card.footer data-test="footer-value">Content</ui:card.footer>');

    expect($html)->toContain('data-test="footer-value"');
});

// =============================================================================
// Card Title (title.blade.php)
// =============================================================================

it('renders a basic card title', function () {
    $html = Blade::render('<ui:card.title>My Title</ui:card.title>');

    expect($html)
        ->toContain('My Title')
        ->toContain('data-card-title')
        ->toContain('<h3');
});

it('renders card title as h3 element', function () {
    $html = Blade::render('<ui:card.title>Title</ui:card.title>');

    expect($html)
        ->toContain('<h3')
        ->toContain('</h3>');
});

it('applies text styling on title', function () {
    $html = Blade::render('<ui:card.title>Title</ui:card.title>');

    expect($html)
        ->toContain('text-lg')
        ->toContain('font-semibold')
        ->toContain('text-gray-900');
});

it('passes through additional attributes on title', function () {
    $html = Blade::render('<ui:card.title data-test="title-value" id="my-title">Title</ui:card.title>');

    expect($html)
        ->toContain('data-test="title-value"')
        ->toContain('id="my-title"');
});

it('merges custom classes on title', function () {
    $html = Blade::render('<ui:card.title class="extra-title-class">Title</ui:card.title>');

    expect($html)->toContain('extra-title-class');
});

// =============================================================================
// Card Description (description.blade.php)
// =============================================================================

it('renders a basic card description', function () {
    $html = Blade::render('<ui:card.description>Description text</ui:card.description>');

    expect($html)
        ->toContain('Description text')
        ->toContain('data-card-description');
});

it('uses muted text variant', function () {
    $html = Blade::render('<ui:card.description>Description</ui:card.description>');

    // Uses ui:text component with variant="muted"
    expect($html)->toContain('data-text');
});

it('passes through additional attributes on description', function () {
    $html = Blade::render('<ui:card.description data-test="desc-value">Description</ui:card.description>');

    expect($html)->toContain('data-test="desc-value"');
});

// =============================================================================
// Composed Usage
// =============================================================================

it('renders a complete card with header, body, and footer', function () {
    $html = Blade::render('
        <ui:card>
            <ui:card.header>
                <ui:card.title>Card Title</ui:card.title>
                <ui:card.description>Card description</ui:card.description>
            </ui:card.header>
            <ui:card.body>
                Body content goes here
            </ui:card.body>
            <ui:card.footer>
                Footer content
            </ui:card.footer>
        </ui:card>
    ');

    expect($html)
        ->toContain('data-card')
        ->toContain('data-card-header')
        ->toContain('data-card-title')
        ->toContain('data-card-description')
        ->toContain('data-card-body')
        ->toContain('data-card-footer')
        ->toContain('Card Title')
        ->toContain('Card description')
        ->toContain('Body content goes here')
        ->toContain('Footer content');
});

it('renders card with header icon and action', function () {
    $html = Blade::render('
        <ui:card>
            <ui:card.header icon="settings">
                <x-slot:action>
                    <button>Edit</button>
                </x-slot:action>
                <ui:card.title>Settings</ui:card.title>
            </ui:card.header>
            <ui:card.body>
                Settings content
            </ui:card.body>
        </ui:card>
    ');

    expect($html)
        ->toContain('data-card')
        ->toContain('data-card-header')
        ->toContain('<svg')
        ->toContain('<button>Edit</button>')
        ->toContain('Settings')
        ->toContain('Settings content');
});

it('renders card with inverted variant throughout', function () {
    $html = Blade::render('
        <ui:card variant="inverted">
            <ui:card.body variant="inverted">Body</ui:card.body>
            <ui:card.footer variant="inverted">Footer</ui:card.footer>
        </ui:card>
    ');

    expect($html)->toContain('data-variant="inverted"');
});

it('renders card with flush body for custom layouts', function () {
    $html = Blade::render('
        <ui:card>
            <ui:card.body flush>
                <div class="custom-layout">Custom content without padding</div>
            </ui:card.body>
        </ui:card>
    ');

    expect($html)
        ->toContain('custom-layout')
        ->not->toContain('px-4.5 py-4');
});

it('renders card with divided footer', function () {
    $html = Blade::render('
        <ui:card>
            <ui:card.body>Body content</ui:card.body>
            <ui:card.footer divided>
                <button>Save</button>
                <button>Cancel</button>
            </ui:card.footer>
        </ui:card>
    ');

    expect($html)
        ->toContain('data-card-body')
        ->toContain('data-card-footer')
        ->toContain('data-divider')
        ->toContain('<button>Save</button>')
        ->toContain('<button>Cancel</button>');
});
