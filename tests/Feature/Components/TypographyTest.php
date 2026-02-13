<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Icon Component Tests
// =============================================================================

it('renders a basic icon', function () {
    $html = Blade::render('<ui:icon name="star" />');

    expect($html)
        ->toContain('<svg')
        ->toContain('data-icon');
});

it('renders icon with xs size', function () {
    $html = Blade::render('<ui:icon name="star" size="xs" />');

    expect($html)->toContain('size-3');
});

it('renders icon with sm size (default)', function () {
    $html = Blade::render('<ui:icon name="star" size="sm" />');

    expect($html)->toContain('size-4');
});

it('renders icon with md size', function () {
    $html = Blade::render('<ui:icon name="star" size="md" />');

    expect($html)->toContain('size-5');
});

it('renders icon with lg size', function () {
    $html = Blade::render('<ui:icon name="star" size="lg" />');

    expect($html)->toContain('size-6');
});

it('renders icon with xl size', function () {
    $html = Blade::render('<ui:icon name="star" size="xl" />');

    expect($html)->toContain('size-8');
});

it('renders icon with color', function () {
    $html = Blade::render('<ui:icon name="star" color="blue" />');

    expect($html)->toContain('text-blue-600');
});

it('renders icon with semantic primary color', function () {
    $html = Blade::render('<ui:icon name="star" color="primary" />');

    expect($html)->toContain('text-blue-600');
});

it('renders icon with semantic danger color', function () {
    $html = Blade::render('<ui:icon name="star" color="danger" />');

    expect($html)->toContain('text-red-600');
});

it('renders icon with semantic success color', function () {
    $html = Blade::render('<ui:icon name="star" color="success" />');

    expect($html)->toContain('text-green-600');
});

it('renders icon with semantic warning color', function () {
    $html = Blade::render('<ui:icon name="star" color="warning" />');

    expect($html)->toContain('text-amber-600');
});

it('renders boxed icon', function () {
    $html = Blade::render('<ui:icon name="star" boxed />');

    expect($html)
        ->toContain('<span')
        ->toContain('data-icon')
        ->toContain('flex items-center justify-center')
        ->toContain('rounded-lg');
});

it('renders boxed icon with round styling', function () {
    $html = Blade::render('<ui:icon name="star" boxed round />');

    expect($html)->toContain('rounded-full');
});

it('renders boxed icon with color', function () {
    $html = Blade::render('<ui:icon name="star" boxed color="blue" />');

    expect($html)
        ->toContain('bg-blue-100')
        ->toContain('text-blue-600')
        ->toContain('data-color="blue"');
});

it('renders boxed icon with size xs', function () {
    $html = Blade::render('<ui:icon name="star" boxed size="xs" />');

    expect($html)->toContain('size-5');
});

it('renders boxed icon with size lg', function () {
    $html = Blade::render('<ui:icon name="star" boxed size="lg" />');

    expect($html)->toContain('size-12');
});

it('applies custom stroke width', function () {
    $html = Blade::render('<ui:icon name="star" stroke="3" />');

    expect($html)->toContain('stroke-width="3"');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:icon name="star" data-test="value" />');

    expect($html)->toContain('data-test="value"');
});

// =============================================================================
// Heading Component Tests
// =============================================================================

it('renders a basic heading', function () {
    $html = Blade::render('<ui:heading>Title</ui:heading>');

    expect($html)
        ->toContain('<div')
        ->toContain('Title')
        ->toContain('data-heading');
});

it('renders heading with level 1', function () {
    $html = Blade::render('<ui:heading level="1">H1 Title</ui:heading>');

    expect($html)
        ->toContain('<h1')
        ->toContain('</h1>')
        ->toContain('text-xl');
});

it('renders heading with level 2', function () {
    $html = Blade::render('<ui:heading level="2">H2 Title</ui:heading>');

    expect($html)
        ->toContain('<h2')
        ->toContain('</h2>')
        ->toContain('text-lg');
});

it('renders heading with level 3', function () {
    $html = Blade::render('<ui:heading level="3">H3 Title</ui:heading>');

    expect($html)
        ->toContain('<h3')
        ->toContain('</h3>')
        ->toContain('text-base');
});

it('renders heading with level 4', function () {
    $html = Blade::render('<ui:heading level="4">H4 Title</ui:heading>');

    expect($html)
        ->toContain('<h4')
        ->toContain('</h4>')
        ->toContain('text-sm');
});

it('renders heading with level 5', function () {
    $html = Blade::render('<ui:heading level="5">H5 Title</ui:heading>');

    expect($html)
        ->toContain('<h5')
        ->toContain('</h5>')
        ->toContain('text-xs');
});

it('renders heading with level 6', function () {
    $html = Blade::render('<ui:heading level="6">H6 Title</ui:heading>');

    expect($html)
        ->toContain('<h6')
        ->toContain('</h6>')
        ->toContain('text-base');
});

it('renders heading with custom size', function () {
    $html = Blade::render('<ui:heading size="xl">Custom Size</ui:heading>');

    expect($html)->toContain('text-xl');
});

it('renders heading with size override on level', function () {
    $html = Blade::render('<ui:heading level="1" size="sm">Small H1</ui:heading>');

    expect($html)
        ->toContain('<h1')
        ->toContain('text-sm');
});

it('renders heading with normal weight', function () {
    $html = Blade::render('<ui:heading weight="normal">Normal</ui:heading>');

    expect($html)->toContain('font-normal');
});

it('renders heading with medium weight', function () {
    $html = Blade::render('<ui:heading weight="medium">Medium</ui:heading>');

    expect($html)->toContain('font-medium');
});

it('renders heading with semibold weight (default)', function () {
    $html = Blade::render('<ui:heading weight="semibold">Semibold</ui:heading>');

    expect($html)->toContain('font-semibold');
});

it('renders heading with bold weight', function () {
    $html = Blade::render('<ui:heading weight="bold">Bold</ui:heading>');

    expect($html)->toContain('font-bold');
});

it('renders heading with default variant', function () {
    $html = Blade::render('<ui:heading>Default</ui:heading>');

    expect($html)->toContain('data-variant="default"');
});

it('renders heading with muted variant', function () {
    $html = Blade::render('<ui:heading variant="muted">Muted</ui:heading>');

    expect($html)
        ->toContain('data-variant="muted"')
        ->toContain('text-gray-500');
});

it('renders heading with info variant', function () {
    $html = Blade::render('<ui:heading variant="info">Info</ui:heading>');

    expect($html)
        ->toContain('data-variant="info"')
        ->toContain('text-blue-600');
});

it('renders heading with success variant', function () {
    $html = Blade::render('<ui:heading variant="success">Success</ui:heading>');

    expect($html)
        ->toContain('data-variant="success"')
        ->toContain('text-green-600');
});

it('renders heading with warning variant', function () {
    $html = Blade::render('<ui:heading variant="warning">Warning</ui:heading>');

    expect($html)
        ->toContain('data-variant="warning"')
        ->toContain('text-amber-600');
});

it('renders heading with danger variant', function () {
    $html = Blade::render('<ui:heading variant="danger">Danger</ui:heading>');

    expect($html)
        ->toContain('data-variant="danger"')
        ->toContain('text-red-600');
});

it('passes through heading additional attributes', function () {
    $html = Blade::render('<ui:heading data-test="value">Test</ui:heading>');

    expect($html)->toContain('data-test="value"');
});

// =============================================================================
// Text Component Tests
// =============================================================================

it('renders a basic text', function () {
    $html = Blade::render('<ui:text>Paragraph text</ui:text>');

    expect($html)
        ->toContain('<p')
        ->toContain('Paragraph text')
        ->toContain('data-text');
});

it('renders text with custom tag', function () {
    $html = Blade::render('<ui:text tag="span">Span text</ui:text>');

    expect($html)
        ->toContain('<span')
        ->toContain('</span>');
});

it('renders text with div tag', function () {
    $html = Blade::render('<ui:text tag="div">Div text</ui:text>');

    expect($html)
        ->toContain('<div')
        ->toContain('</div>');
});

it('renders text with xs size', function () {
    $html = Blade::render('<ui:text size="xs">Extra small</ui:text>');

    expect($html)->toContain('text-xs');
});

it('renders text with sm size (default)', function () {
    $html = Blade::render('<ui:text size="sm">Small</ui:text>');

    expect($html)->toContain('text-sm');
});

it('renders text with md size', function () {
    $html = Blade::render('<ui:text size="md">Medium</ui:text>');

    expect($html)->toContain('text-base');
});

it('renders text with lg size', function () {
    $html = Blade::render('<ui:text size="lg">Large</ui:text>');

    expect($html)->toContain('text-lg');
});

it('renders text with xl size', function () {
    $html = Blade::render('<ui:text size="xl">Extra large</ui:text>');

    expect($html)->toContain('text-xl');
});

it('renders text with normal weight (default)', function () {
    $html = Blade::render('<ui:text weight="normal">Normal</ui:text>');

    expect($html)->toContain('font-normal');
});

it('renders text with medium weight', function () {
    $html = Blade::render('<ui:text weight="medium">Medium</ui:text>');

    expect($html)->toContain('font-medium');
});

it('renders text with semibold weight', function () {
    $html = Blade::render('<ui:text weight="semibold">Semibold</ui:text>');

    expect($html)->toContain('font-semibold');
});

it('renders text with bold weight', function () {
    $html = Blade::render('<ui:text weight="bold">Bold</ui:text>');

    expect($html)->toContain('font-bold');
});

it('renders text with default variant', function () {
    $html = Blade::render('<ui:text>Default</ui:text>');

    expect($html)->toContain('data-variant="default"');
});

it('renders text with muted variant', function () {
    $html = Blade::render('<ui:text variant="muted">Muted</ui:text>');

    expect($html)
        ->toContain('data-variant="muted"')
        ->toContain('text-gray-500');
});

it('renders text with info variant', function () {
    $html = Blade::render('<ui:text variant="info">Info</ui:text>');

    expect($html)
        ->toContain('data-variant="info"')
        ->toContain('text-blue-600');
});

it('renders text with success variant', function () {
    $html = Blade::render('<ui:text variant="success">Success</ui:text>');

    expect($html)
        ->toContain('data-variant="success"')
        ->toContain('text-green-600');
});

it('renders text with warning variant', function () {
    $html = Blade::render('<ui:text variant="warning">Warning</ui:text>');

    expect($html)
        ->toContain('data-variant="warning"')
        ->toContain('text-amber-600');
});

it('renders text with danger variant', function () {
    $html = Blade::render('<ui:text variant="danger">Danger</ui:text>');

    expect($html)
        ->toContain('data-variant="danger"')
        ->toContain('text-red-600');
});

it('passes through text additional attributes', function () {
    $html = Blade::render('<ui:text data-test="value">Test</ui:text>');

    expect($html)->toContain('data-test="value"');
});

// =============================================================================
// Link Component Tests
// =============================================================================

it('renders a basic link', function () {
    $html = Blade::render('<ui:link href="/test">Click me</ui:link>');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/test"')
        ->toContain('Click me');
});

it('renders link without href', function () {
    $html = Blade::render('<ui:link>No href</ui:link>');

    expect($html)
        ->toContain('<a')
        ->not->toContain('href=');
});

it('renders link with default variant', function () {
    $html = Blade::render('<ui:link href="/test">Default</ui:link>');

    expect($html)
        ->toContain('underline')
        ->toContain('underline-offset-4')
        ->toContain('text-gray-900');
});

it('renders link with primary variant', function () {
    $html = Blade::render('<ui:link href="/test" variant="primary">Primary</ui:link>');

    expect($html)
        ->toContain('text-primary')
        ->toContain('underline');
});

it('renders link with muted variant', function () {
    $html = Blade::render('<ui:link href="/test" variant="muted">Muted</ui:link>');

    expect($html)
        ->toContain('no-underline')
        ->toContain('text-gray-500');
});

it('renders link with subtle variant', function () {
    $html = Blade::render('<ui:link href="/test" variant="subtle">Subtle</ui:link>');

    expect($html)
        ->toContain('no-underline')
        ->toContain('hover:underline');
});

it('renders link with xs size', function () {
    $html = Blade::render('<ui:link href="/test" size="xs">Extra small</ui:link>');

    expect($html)->toContain('text-xs');
});

it('renders link with sm size', function () {
    $html = Blade::render('<ui:link href="/test" size="sm">Small</ui:link>');

    expect($html)->toContain('text-sm');
});

it('renders link with md size (default)', function () {
    $html = Blade::render('<ui:link href="/test" size="md">Medium</ui:link>');

    expect($html)->toContain('text-sm');
});

it('renders link with lg size', function () {
    $html = Blade::render('<ui:link href="/test" size="lg">Large</ui:link>');

    expect($html)->toContain('text-base');
});

it('renders link with leading icon', function () {
    $html = Blade::render('<ui:link href="/test" icon="arrow-left">Back</ui:link>');

    expect($html)->toContain('<svg');
});

it('renders link with trailing icon', function () {
    $html = Blade::render('<ui:link href="/test" icon:end="arrow-right">Next</ui:link>');

    expect($html)->toContain('<svg');
});

it('renders link with both icons', function () {
    $html = Blade::render('<ui:link href="/test" icon="star" icon:end="chevron-right">Featured</ui:link>');

    expect($html)->toContain('<svg');
});

it('renders disabled link', function () {
    $html = Blade::render('<ui:link href="/test" disabled>Disabled</ui:link>');

    expect($html)
        ->toContain('aria-disabled="true"')
        ->toContain('tabindex="-1"')
        ->toContain('pointer-events-none')
        ->toContain('opacity-50');
});

it('passes through link additional attributes', function () {
    $html = Blade::render('<ui:link href="/test" data-test="value">Test</ui:link>');

    expect($html)->toContain('data-test="value"');
});

it('renders link with inline-flex styling', function () {
    $html = Blade::render('<ui:link href="/test">Flex</ui:link>');

    expect($html)->toContain('inline-flex items-center');
});

// =============================================================================
// Divider Component Tests
// =============================================================================

it('renders a basic horizontal divider', function () {
    $html = Blade::render('<ui:divider />');

    expect($html)
        ->toContain('<hr')
        ->toContain('data-divider');
});

it('renders horizontal divider with default variant', function () {
    $html = Blade::render('<ui:divider />');

    expect($html)->toContain('bg-gray-200');
});

it('renders horizontal divider with subtle variant', function () {
    $html = Blade::render('<ui:divider variant="subtle" />');

    expect($html)->toContain('bg-gray-100');
});

it('renders horizontal divider with strong variant', function () {
    $html = Blade::render('<ui:divider variant="strong" />');

    expect($html)->toContain('bg-gray-500');
});

it('renders vertical divider', function () {
    $html = Blade::render('<ui:divider orientation="vertical" />');

    expect($html)
        ->toContain('<div')
        ->toContain('role="separator"')
        ->toContain('aria-orientation="vertical"')
        ->toContain('w-px')
        ->toContain('self-stretch');
});

it('renders divider with text', function () {
    $html = Blade::render('<ui:divider text="OR" />');

    expect($html)
        ->toContain('<div')
        ->toContain('OR')
        ->toContain('data-divider')
        ->toContain('before:h-px')
        ->toContain('after:h-px');
});

it('renders divider with text and custom variant', function () {
    $html = Blade::render('<ui:divider text="OR" variant="subtle" />');

    expect($html)
        ->toContain('OR')
        ->toContain('before:bg-gray-100')
        ->toContain('after:bg-gray-100');
});

it('renders divider text label with styling', function () {
    $html = Blade::render('<ui:divider text="Section" />');

    expect($html)
        ->toContain('text-xs')
        ->toContain('text-gray-500');
});

it('passes through divider additional attributes', function () {
    $html = Blade::render('<ui:divider data-test="value" />');

    expect($html)->toContain('data-test="value"');
});

it('renders horizontal divider with h-px class', function () {
    $html = Blade::render('<ui:divider />');

    expect($html)->toContain('h-px');
});

it('renders vertical divider with min-h-4 class', function () {
    $html = Blade::render('<ui:divider orientation="vertical" />');

    expect($html)->toContain('min-h-4');
});

// =============================================================================
// Kbd Component Tests
// =============================================================================

it('renders a basic kbd', function () {
    $html = Blade::render('<ui:kbd>K</ui:kbd>');

    expect($html)
        ->toContain('<kbd')
        ->toContain('K')
        ->toContain('data-kbd');
});

it('renders kbd with sm size', function () {
    $html = Blade::render('<ui:kbd size="sm">Esc</ui:kbd>');

    expect($html)
        ->toContain('data-size="sm"')
        ->toContain('h-4')
        ->toContain('min-w-4')
        ->toContain('text-[10px]');
});

it('renders kbd with md size (default)', function () {
    $html = Blade::render('<ui:kbd size="md">Enter</ui:kbd>');

    expect($html)
        ->toContain('data-size="md"')
        ->toContain('h-5')
        ->toContain('min-w-5')
        ->toContain('text-[12px]');
});

it('renders kbd with lg size', function () {
    $html = Blade::render('<ui:kbd size="lg">Space</ui:kbd>');

    expect($html)
        ->toContain('data-size="lg"')
        ->toContain('h-6')
        ->toContain('min-w-6')
        ->toContain('text-[14px]');
});

it('renders kbd with monospace font', function () {
    $html = Blade::render('<ui:kbd>Cmd</ui:kbd>');

    expect($html)->toContain('font-mono');
});

it('renders kbd with border styling', function () {
    $html = Blade::render('<ui:kbd>Tab</ui:kbd>');

    expect($html)
        ->toContain('border')
        ->toContain('border-gray-200');
});

it('renders kbd with background styling', function () {
    $html = Blade::render('<ui:kbd>Shift</ui:kbd>');

    expect($html)->toContain('bg-gray-50');
});

it('renders kbd with rounded styling', function () {
    $html = Blade::render('<ui:kbd>A</ui:kbd>');

    expect($html)->toContain('rounded-md');
});

it('renders kbd with sm rounded styling', function () {
    $html = Blade::render('<ui:kbd size="sm">B</ui:kbd>');

    expect($html)->toContain('rounded-sm');
});

it('renders kbd with flex centering', function () {
    $html = Blade::render('<ui:kbd>C</ui:kbd>');

    expect($html)->toContain('inline-flex items-center justify-center');
});

it('passes through kbd additional attributes', function () {
    $html = Blade::render('<ui:kbd data-test="value">X</ui:kbd>');

    expect($html)->toContain('data-test="value"');
});

it('renders kbd with medium font weight', function () {
    $html = Blade::render('<ui:kbd>D</ui:kbd>');

    expect($html)->toContain('font-medium');
});

it('renders kbd with slot content', function () {
    $html = Blade::render('<ui:kbd>Ctrl + C</ui:kbd>');

    expect($html)->toContain('Ctrl + C');
});
