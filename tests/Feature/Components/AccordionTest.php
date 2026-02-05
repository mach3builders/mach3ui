<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Accordion Container (index.blade.php)
// =============================================================================

it('renders a basic accordion', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Section 1">Content 1</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('Section 1')
        ->toContain('Content 1');
});

it('renders accordion with data-accordion attribute', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)->toContain('data-accordion');
});

it('renders accordion with x-data for Alpine.js state management', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('x-data')
        ->toContain('active:')
        ->toContain('toggle(name)')
        ->toContain('isOpen(name)');
});

it('renders single-select mode by default', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    // Single mode uses null as active state
    expect($html)
        ->toContain('active: null')
        ->toContain('this.active === name ? null : name');
});

it('renders multiple mode when multiple prop is true', function () {
    $html = Blade::render('<ui:accordion multiple><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    // Multiple mode uses array as active state
    expect($html)
        ->toContain('active: []')
        ->toContain('this.active.includes(name)');
});

it('applies default variant styling', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('data-variant="default"')
        ->toContain('divide-y')
        ->toContain('divide-gray-100');
});

it('applies bordered variant styling', function () {
    $html = Blade::render('<ui:accordion variant="bordered"><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('data-variant="bordered"')
        ->toContain('rounded-lg')
        ->toContain('border')
        ->toContain('border-gray-100');
});

it('applies separated variant styling', function () {
    $html = Blade::render('<ui:accordion variant="separated"><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('data-variant="separated"')
        ->toContain('space-y-2');
});

it('renders multiple accordion items', function () {
    $html = Blade::render('
        <ui:accordion>
            <ui:accordion.item title="First">Content 1</ui:accordion.item>
            <ui:accordion.item title="Second">Content 2</ui:accordion.item>
            <ui:accordion.item title="Third">Content 3</ui:accordion.item>
        </ui:accordion>
    ');

    expect($html)
        ->toContain('First')
        ->toContain('Content 1')
        ->toContain('Second')
        ->toContain('Content 2')
        ->toContain('Third')
        ->toContain('Content 3');
});

it('passes through additional attributes on accordion container', function () {
    $html = Blade::render('<ui:accordion data-testid="my-accordion" id="custom-id"><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('data-testid="my-accordion"')
        ->toContain('id="custom-id"');
});

// =============================================================================
// Accordion Item (item.blade.php)
// =============================================================================

it('renders accordion item with data-accordion-item attribute', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)->toContain('data-accordion-item');
});

it('renders accordion item with title', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="My Section Title">Content</ui:accordion.item></ui:accordion>');

    expect($html)->toContain('My Section Title');
});

it('renders accordion item with slot content', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Title"><p>Rich HTML content</p></ui:accordion.item></ui:accordion>');

    expect($html)->toContain('<p>Rich HTML content</p>');
});

it('generates proper accessibility IDs from title', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Section Title">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('id="accordion-trigger-section-title"')
        ->toContain('id="accordion-panel-section-title"')
        ->toContain('aria-controls="accordion-panel-section-title"')
        ->toContain('aria-labelledby="accordion-trigger-section-title"');
});

it('renders button with proper type attribute', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)->toContain('type="button"');
});

it('renders toggle functionality with Alpine.js', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain("x-on:click=\"toggle('test')\"")
        ->toContain(":aria-expanded=\"isOpen('test')\"");
});

it('renders panel with role region', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)->toContain('role="region"');
});

it('renders panel with x-show for visibility', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain("x-show=\"isOpen('test')\"")
        ->toContain('x-cloak');
});

it('renders default chevron-down icon', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)->toContain('<svg');
});

it('allows custom icon override', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test" icon="plus">Content</ui:accordion.item></ui:accordion>');

    // Custom icon should be rendered
    expect($html)->toContain('<svg');
});

it('rotates icon when item is open', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)->toContain("isOpen('test') && 'rotate-180'");
});

it('renders disabled state', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test" disabled>Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('disabled')
        ->toContain('aria-disabled="true"')
        ->toContain('opacity-50')
        ->toContain('pointer-events-none');
});

it('passes through additional attributes on accordion item', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test" data-testid="my-item" id="custom-item">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('data-testid="my-item"')
        ->toContain('id="custom-item"');
});

it('applies group/item class for styling hooks', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)->toContain('group/item');
});

it('renders trigger with proper styling classes', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('cursor-pointer')
        ->toContain('font-semibold')
        ->toContain('justify-between');
});

it('renders panel content with proper styling', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('overflow-hidden')
        ->toContain('text-gray-600');
});

it('applies variant-specific padding for bordered variant', function () {
    $html = Blade::render('<ui:accordion variant="bordered"><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('group-data-[variant=bordered]:px-4');
});

it('applies variant-specific padding for separated variant', function () {
    $html = Blade::render('<ui:accordion variant="separated"><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('group-data-[variant=separated]:px-4')
        ->toContain('group-data-[variant=separated]:rounded-lg')
        ->toContain('group-data-[variant=separated]:border');
});

it('handles title with special characters for slug generation', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="What\'s New?">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('accordion-trigger-whats-new')
        ->toContain('accordion-panel-whats-new');
});

it('renders multiple items with unique IDs', function () {
    $html = Blade::render('
        <ui:accordion>
            <ui:accordion.item title="First Item">Content 1</ui:accordion.item>
            <ui:accordion.item title="Second Item">Content 2</ui:accordion.item>
        </ui:accordion>
    ');

    expect($html)
        ->toContain('accordion-trigger-first-item')
        ->toContain('accordion-panel-first-item')
        ->toContain('accordion-trigger-second-item')
        ->toContain('accordion-panel-second-item');
});

it('renders focus styles for accessibility', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('focus:outline-none')
        ->toContain('focus-visible:ring-2')
        ->toContain('focus-visible:ring-blue-500');
});

it('renders dark mode styles', function () {
    $html = Blade::render('<ui:accordion><ui:accordion.item title="Test">Content</ui:accordion.item></ui:accordion>');

    expect($html)
        ->toContain('dark:divide-gray-700')
        ->toContain('dark:text-gray-100')
        ->toContain('dark:text-gray-400');
});
