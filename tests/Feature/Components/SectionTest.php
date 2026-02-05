<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Tooltip Component Tests
// =============================================================================

it('renders a basic tooltip', function () {
    $html = Blade::render('<ui:tooltip text="Tooltip text">Hover me</ui:tooltip>');

    expect($html)
        ->toContain('Hover me')
        ->toContain('Tooltip text')
        ->toContain('data-tooltip');
});

it('renders tooltip with default top position', function () {
    $html = Blade::render('<ui:tooltip text="Top tooltip">Content</ui:tooltip>');

    expect($html)
        ->toContain('data-tooltip')
        ->toContain('data-tooltip-trigger')
        ->toContain('data-tooltip-content')
        ->toContain('data-tooltip-arrow');
});

it('renders tooltip with top position', function () {
    $html = Blade::render('<ui:tooltip text="Top tooltip" position="top">Content</ui:tooltip>');

    expect($html)
        ->toContain('anchor(top)')
        ->toContain('border-t-gray-900');
});

it('renders tooltip with top-start position', function () {
    $html = Blade::render('<ui:tooltip text="Top start" position="top-start">Content</ui:tooltip>');

    expect($html)
        ->toContain('anchor(top)')
        ->toContain('anchor(left)')
        ->toContain('border-t-gray-900');
});

it('renders tooltip with top-end position', function () {
    $html = Blade::render('<ui:tooltip text="Top end" position="top-end">Content</ui:tooltip>');

    expect($html)
        ->toContain('anchor(top)')
        ->toContain('anchor(right)')
        ->toContain('border-t-gray-900');
});

it('renders tooltip with bottom position', function () {
    $html = Blade::render('<ui:tooltip text="Bottom tooltip" position="bottom">Content</ui:tooltip>');

    expect($html)
        ->toContain('anchor(bottom)')
        ->toContain('border-b-gray-900');
});

it('renders tooltip with bottom-start position', function () {
    $html = Blade::render('<ui:tooltip text="Bottom start" position="bottom-start">Content</ui:tooltip>');

    expect($html)
        ->toContain('anchor(bottom)')
        ->toContain('anchor(left)')
        ->toContain('border-b-gray-900');
});

it('renders tooltip with bottom-end position', function () {
    $html = Blade::render('<ui:tooltip text="Bottom end" position="bottom-end">Content</ui:tooltip>');

    expect($html)
        ->toContain('anchor(bottom)')
        ->toContain('anchor(right)')
        ->toContain('border-b-gray-900');
});

it('renders tooltip with left position', function () {
    $html = Blade::render('<ui:tooltip text="Left tooltip" position="left">Content</ui:tooltip>');

    expect($html)
        ->toContain('anchor(left)')
        ->toContain('border-l-gray-900');
});

it('renders tooltip with right position', function () {
    $html = Blade::render('<ui:tooltip text="Right tooltip" position="right">Content</ui:tooltip>');

    expect($html)
        ->toContain('anchor(right)')
        ->toContain('border-r-gray-900');
});

it('falls back to top for invalid position', function () {
    $html = Blade::render('<ui:tooltip text="Invalid" position="invalid">Content</ui:tooltip>');

    expect($html)
        ->toContain('border-t-gray-900');
});

it('renders tooltip with slot content', function () {
    $html = Blade::render('<ui:tooltip text="Help text"><span class="custom">Hover target</span></ui:tooltip>');

    expect($html)
        ->toContain('<span class="custom">Hover target</span>')
        ->toContain('Help text');
});

it('applies hover and focus visibility classes', function () {
    $html = Blade::render('<ui:tooltip text="Test">Content</ui:tooltip>');

    expect($html)
        ->toContain('group-hover/tooltip:opacity-100')
        ->toContain('group-focus-within/tooltip:opacity-100')
        ->toContain('opacity-0');
});

it('applies anchor positioning styles', function () {
    $html = Blade::render('<ui:tooltip text="Test">Content</ui:tooltip>');

    expect($html)
        ->toContain('anchor-scope: --tooltip-trigger')
        ->toContain('anchor-name:--tooltip-trigger')
        ->toContain('position-anchor: --tooltip-trigger');
});

it('passes through data-* attributes on tooltip', function () {
    $html = Blade::render('<ui:tooltip text="Test" data-testid="my-tooltip">Content</ui:tooltip>');

    expect($html)->toContain('data-testid="my-tooltip"');
});

it('passes through additional attributes on tooltip', function () {
    $html = Blade::render('<ui:tooltip text="Test" id="tooltip-1" aria-describedby="desc">Content</ui:tooltip>');

    expect($html)
        ->toContain('id="tooltip-1"')
        ->toContain('aria-describedby="desc"');
});

it('renders tooltip with dark mode classes', function () {
    $html = Blade::render('<ui:tooltip text="Dark mode">Content</ui:tooltip>');

    expect($html)
        ->toContain('dark:bg-gray-100')
        ->toContain('dark:text-gray-900')
        ->toContain('dark:border-t-gray-100');
});

// =============================================================================
// Section Component Tests
// =============================================================================

it('renders a basic section', function () {
    $html = Blade::render('<ui:section>Section content</ui:section>');

    expect($html)
        ->toContain('data-section')
        ->toContain('Section content');
});

it('renders section with title prop', function () {
    $html = Blade::render('<ui:section title="Section Title">Content</ui:section>');

    expect($html)
        ->toContain('Section Title')
        ->toContain('data-section-title')
        ->toContain('data-section-header');
});

it('renders section with description prop', function () {
    $html = Blade::render('<ui:section description="Section description">Content</ui:section>');

    expect($html)
        ->toContain('Section description')
        ->toContain('data-section-description');
});

it('renders section with title and description', function () {
    $html = Blade::render('<ui:section title="Title" description="Description">Content</ui:section>');

    expect($html)
        ->toContain('Title')
        ->toContain('Description')
        ->toContain('data-section-title')
        ->toContain('data-section-description');
});

it('renders section with header slot', function () {
    $html = Blade::render('
        <ui:section>
            <x-slot:header>
                <h2>Custom Header</h2>
            </x-slot:header>
            Content
        </ui:section>
    ');

    expect($html)
        ->toContain('Custom Header')
        ->toContain('data-section-header');
});

it('renders section with default responsive variant', function () {
    $html = Blade::render('<ui:section title="Title">Content</ui:section>');

    expect($html)
        ->toContain('data-variant="responsive"')
        ->toContain('@xl:items-start')
        ->toContain('@xl:gap-x-8');
});

it('renders section with stacked variant', function () {
    $html = Blade::render('<ui:section title="Title" variant="stacked">Content</ui:section>');

    expect($html)
        ->toContain('data-variant="stacked"');
});

it('renders section with custom header:cols', function () {
    $html = Blade::render('<ui:section title="Title" header:cols="col-span-6">Content</ui:section>');

    expect($html)->toContain('col-span-6');
});

it('renders section with custom content:cols', function () {
    $html = Blade::render('<ui:section title="Title" content:cols="col-span-6">Content</ui:section>');

    expect($html)->toContain('col-span-6');
});

it('renders section without header when no title/description/slot', function () {
    $html = Blade::render('<ui:section>Content only</ui:section>');

    expect($html)
        ->not->toContain('data-section-header')
        ->toContain('data-section-content')
        ->toContain('Content only');
});

it('passes through data-* attributes on section', function () {
    $html = Blade::render('<ui:section data-testid="my-section">Content</ui:section>');

    expect($html)->toContain('data-testid="my-section"');
});

it('passes through additional attributes on section', function () {
    $html = Blade::render('<ui:section id="section-1" aria-label="Main section">Content</ui:section>');

    expect($html)
        ->toContain('id="section-1"')
        ->toContain('aria-label="Main section"');
});

it('applies grid layout classes on section', function () {
    $html = Blade::render('<ui:section>Content</ui:section>');

    expect($html)
        ->toContain('@container')
        ->toContain('grid')
        ->toContain('grid-cols-12');
});

// =============================================================================
// Section Header Component Tests
// =============================================================================

it('renders section header', function () {
    $html = Blade::render('<ui:section.header>Header content</ui:section.header>');

    expect($html)
        ->toContain('data-section-header')
        ->toContain('Header content');
});

it('renders section header with responsive variant', function () {
    $html = Blade::render('<ui:section.header variant="responsive">Header</ui:section.header>');

    expect($html)
        ->toContain('col-span-12')
        ->toContain('@2xl:col-span-4')
        ->toContain('@2xl:pt-5');
});

it('renders section header with stacked variant', function () {
    $html = Blade::render('<ui:section.header variant="stacked">Header</ui:section.header>');

    expect($html)
        ->toContain('col-span-12')
        ->not->toContain('@2xl:col-span-4');
});

it('renders section header with custom cols', function () {
    $html = Blade::render('<ui:section.header cols="col-span-3">Header</ui:section.header>');

    expect($html)->toContain('col-span-3');
});

it('passes through data-* attributes on section header', function () {
    $html = Blade::render('<ui:section.header data-testid="header">Header</ui:section.header>');

    expect($html)->toContain('data-testid="header"');
});

it('passes through additional attributes on section header', function () {
    $html = Blade::render('<ui:section.header id="header-1">Header</ui:section.header>');

    expect($html)->toContain('id="header-1"');
});

// =============================================================================
// Section Title Component Tests
// =============================================================================

it('renders section title', function () {
    $html = Blade::render('<ui:section.title>My Title</ui:section.title>');

    expect($html)
        ->toContain('data-section-title')
        ->toContain('My Title')
        ->toContain('<h3');
});

it('applies title styling classes', function () {
    $html = Blade::render('<ui:section.title>Title</ui:section.title>');

    expect($html)
        ->toContain('text-base')
        ->toContain('font-semibold')
        ->toContain('text-gray-900');
});

it('applies dark mode classes on title', function () {
    $html = Blade::render('<ui:section.title>Title</ui:section.title>');

    expect($html)->toContain('dark:text-white');
});

it('passes through data-* attributes on section title', function () {
    $html = Blade::render('<ui:section.title data-testid="title">Title</ui:section.title>');

    expect($html)->toContain('data-testid="title"');
});

it('passes through additional attributes on section title', function () {
    $html = Blade::render('<ui:section.title id="title-1" aria-level="2">Title</ui:section.title>');

    expect($html)
        ->toContain('id="title-1"')
        ->toContain('aria-level="2"');
});

// =============================================================================
// Section Description Component Tests
// =============================================================================

it('renders section description', function () {
    $html = Blade::render('<ui:section.description>Description text</ui:section.description>');

    expect($html)
        ->toContain('data-section-description')
        ->toContain('Description text');
});

it('passes through data-* attributes on section description', function () {
    $html = Blade::render('<ui:section.description data-testid="desc">Description</ui:section.description>');

    expect($html)->toContain('data-testid="desc"');
});

it('passes through additional attributes on section description', function () {
    $html = Blade::render('<ui:section.description id="desc-1">Description</ui:section.description>');

    expect($html)->toContain('id="desc-1"');
});

// =============================================================================
// Section Content Component Tests
// =============================================================================

it('renders section content', function () {
    $html = Blade::render('<ui:section.content>Content here</ui:section.content>');

    expect($html)
        ->toContain('data-section-content')
        ->toContain('Content here');
});

it('renders section content with responsive variant', function () {
    $html = Blade::render('<ui:section.content variant="responsive">Content</ui:section.content>');

    expect($html)
        ->toContain('col-span-12')
        ->toContain('@2xl:col-span-8');
});

it('renders section content with stacked variant', function () {
    $html = Blade::render('<ui:section.content variant="stacked">Content</ui:section.content>');

    expect($html)
        ->toContain('col-span-12')
        ->not->toContain('@2xl:col-span-8');
});

it('renders section content with custom cols', function () {
    $html = Blade::render('<ui:section.content cols="col-span-10">Content</ui:section.content>');

    expect($html)->toContain('col-span-10');
});

it('passes through data-* attributes on section content', function () {
    $html = Blade::render('<ui:section.content data-testid="content">Content</ui:section.content>');

    expect($html)->toContain('data-testid="content"');
});

it('passes through additional attributes on section content', function () {
    $html = Blade::render('<ui:section.content id="content-1">Content</ui:section.content>');

    expect($html)->toContain('id="content-1"');
});

it('wraps content in box with subtle variant', function () {
    $html = Blade::render('<ui:section.content>Content</ui:section.content>');

    expect($html)
        ->toContain('data-box')
        ->toContain('data-variant="subtle"');
});

// =============================================================================
// Box Component Tests
// =============================================================================

it('renders a basic box', function () {
    $html = Blade::render('<ui:box>Box content</ui:box>');

    expect($html)
        ->toContain('data-box')
        ->toContain('Box content');
});

it('renders box with default variant', function () {
    $html = Blade::render('<ui:box>Content</ui:box>');

    expect($html)
        ->toContain('data-variant="default"')
        ->toContain('border-gray-100')
        ->toContain('bg-white');
});

it('renders box with subtle variant', function () {
    $html = Blade::render('<ui:box variant="subtle">Content</ui:box>');

    expect($html)
        ->toContain('data-variant="subtle"')
        ->toContain('border-transparent')
        ->toContain('bg-gray-30');
});

it('applies base box styling', function () {
    $html = Blade::render('<ui:box>Content</ui:box>');

    expect($html)
        ->toContain('rounded-lg')
        ->toContain('px-4.5')
        ->toContain('py-5');
});

it('applies dark mode classes on box default variant', function () {
    $html = Blade::render('<ui:box>Content</ui:box>');

    expect($html)
        ->toContain('dark:border-gray-700')
        ->toContain('dark:bg-gray-800');
});

it('applies dark mode classes on box subtle variant', function () {
    $html = Blade::render('<ui:box variant="subtle">Content</ui:box>');

    expect($html)->toContain('dark:bg-gray-830');
});

it('passes through data-* attributes on box', function () {
    $html = Blade::render('<ui:box data-testid="my-box">Content</ui:box>');

    expect($html)->toContain('data-testid="my-box"');
});

it('passes through additional attributes on box', function () {
    $html = Blade::render('<ui:box id="box-1" role="region">Content</ui:box>');

    expect($html)
        ->toContain('id="box-1"')
        ->toContain('role="region"');
});

it('renders box with slot content', function () {
    $html = Blade::render('<ui:box><div class="inner">Inner content</div></ui:box>');

    expect($html)->toContain('<div class="inner">Inner content</div>');
});
