<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Section Component Tests
// =============================================================================

it('renders a basic section', function () {
    $html = Blade::render('<ui:section>Section content</ui:section>');

    expect($html)
        ->toContain('data-flux-section')
        ->toContain('Section content');
});

it('renders section with title prop', function () {
    $html = Blade::render('<ui:section title="Section Title">Content</ui:section>');

    expect($html)->toContain('Section Title');
});

it('renders section with description prop', function () {
    $html = Blade::render('<ui:section description="Section description">Content</ui:section>');

    expect($html)->toContain('Section description');
});

it('renders section with title and description', function () {
    $html = Blade::render('<ui:section title="Title" description="Description">Content</ui:section>');

    expect($html)
        ->toContain('Title')
        ->toContain('Description');
});

it('renders section with default responsive variant', function () {
    $html = Blade::render('<ui:section title="Title">Content</ui:section>');

    expect($html)
        ->toContain('data-variant="responsive"')
        ->toContain('xl:grid-cols-3');
});

it('renders section with stacked variant', function () {
    $html = Blade::render('<ui:section title="Title" variant="stacked">Content</ui:section>');

    expect($html)->toContain('data-variant="stacked"');
});

it('renders section without header when no title or description', function () {
    $html = Blade::render('<ui:section>Content only</ui:section>');

    expect($html)
        ->toContain('xl:col-span-3')
        ->toContain('Content only');
});

it('renders section content in a box', function () {
    $html = Blade::render('<ui:section>Content</ui:section>');

    expect($html)->toContain('data-flux-box');
});

it('passes through additional attributes on section', function () {
    $html = Blade::render('<ui:section id="section-1">Content</ui:section>');

    expect($html)->toContain('id="section-1"');
});

it('merges custom classes on section', function () {
    $html = Blade::render('<ui:section class="custom-class">Content</ui:section>');

    expect($html)->toContain('custom-class');
});

// =============================================================================
// Box Component Tests
// =============================================================================

it('renders a basic box', function () {
    $html = Blade::render('<ui:box>Box content</ui:box>');

    expect($html)
        ->toContain('data-flux-box')
        ->toContain('Box content');
});

it('applies box styling', function () {
    $html = Blade::render('<ui:box>Content</ui:box>');

    expect($html)
        ->toContain('rounded-xl')
        ->toContain('border-zinc-200')
        ->toContain('bg-zinc-50');
});

it('renders box with title prop', function () {
    $html = Blade::render('<ui:box title="Box Title">Content</ui:box>');

    expect($html)->toContain('Box Title');
});

it('renders box with description prop', function () {
    $html = Blade::render('<ui:box description="Box description">Content</ui:box>');

    expect($html)->toContain('Box description');
});

it('passes through additional attributes on box', function () {
    $html = Blade::render('<ui:box id="box-1" role="region">Content</ui:box>');

    expect($html)
        ->toContain('id="box-1"')
        ->toContain('role="region"');
});

it('merges custom classes on box', function () {
    $html = Blade::render('<ui:box class="custom-box-class">Content</ui:box>');

    expect($html)->toContain('custom-box-class');
});

// =============================================================================
// List Component Tests
// =============================================================================

it('renders a list', function () {
    $html = Blade::render('<ui:list>Items</ui:list>');

    expect($html)
        ->toContain('data-flux-list')
        ->toContain('Items');
});

it('renders a list with definition variant', function () {
    $html = Blade::render('<ui:list variant="definition">Items</ui:list>');

    expect($html)
        ->toContain('data-flux-list')
        ->toContain('data-variant="definition"')
        ->toContain('<dl');
});

it('renders a list item with label and value', function () {
    $html = Blade::render('<ui:list.item label="Name" value="John" />');

    expect($html)
        ->toContain('data-flux-list-item')
        ->toContain('Name')
        ->toContain('John');
});

it('renders list item with slot value', function () {
    $html = Blade::render('<ui:list.item label="Status"><span class="badge">Active</span></ui:list.item>');

    expect($html)
        ->toContain('Status')
        ->toContain('<span class="badge">Active</span>');
});

it('renders list item as link when href is provided', function () {
    $html = Blade::render('<ui:list.item href="/test" label="Link">Go</ui:list.item>');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/test"');
});

it('renders list item with dotted divider in definition variant', function () {
    $html = Blade::render('
        <ui:list variant="definition">
            <ui:list.item label="Key" value="Value" />
        </ui:list>
    ');

    expect($html)
        ->toContain('border-dotted')
        ->toContain('aria-hidden="true"');
});
