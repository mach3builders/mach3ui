<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// TR Expandable (ui:tr.expandable)
// =============================================================================

it('renders expandable row', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Cell content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)
        ->toContain('<tbody')
        ->toContain('x-data')
        ->toContain('data-tr-expandable')
        ->toContain('Cell content');
});

it('renders tbody wrapper element', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)->toContain('<tbody');
});

it('renders tr inside tbody', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)
        ->toContain('<tbody')
        ->toContain('<tr');
});

it('renders with x-data for Alpine.js state management', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)
        ->toContain('x-data')
        ->toContain('expanded:');
});

it('renders data-tr-expandable attribute', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)->toContain('data-tr-expandable');
});

// =============================================================================
// Expanded Prop
// =============================================================================

it('renders with expanded false by default', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)->toContain('expanded: false');
});

it('renders with expanded true when prop is set', function () {
    $html = Blade::render('
        <ui:tr.expandable :expanded="true">
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)->toContain('expanded: true');
});

it('renders with expanded false when explicitly set', function () {
    $html = Blade::render('
        <ui:tr.expandable :expanded="false">
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)->toContain('expanded: false');
});

// =============================================================================
// Alpine.js Attributes
// =============================================================================

it('binds data-expanded attribute with Alpine.js', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)->toContain("x-bind:data-expanded=\"expanded ? 'true' : 'false'\"");
});

it('binds class for expanded state styling', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)->toContain('x-bind:class="expanded');
});

it('applies background class when expanded', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)
        ->toContain('[&_td]:bg-gray-20')
        ->toContain('dark:[&_td]:bg-gray-790');
});

// =============================================================================
// Slot Content
// =============================================================================

it('renders default slot content in tr', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Main row content</ui:td>
            <ui:td>More content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)
        ->toContain('Main row content')
        ->toContain('More content');
});

it('renders expansion slot when provided', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Main content</ui:td>
            <x-slot:expansion>
                <ui:tr :nested="true">
                    <ui:td colspan="2">Expanded content here</ui:td>
                </ui:tr>
            </x-slot:expansion>
        </ui:tr.expandable>
    ');

    expect($html)->toContain('Expanded content here');
});

it('does not render expansion content when slot is empty', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Main content only</ui:td>
        </ui:tr.expandable>
    ');

    // The expansion slot should not be rendered when empty
    expect($html)->toContain('Main content only');
});

// =============================================================================
// CSS Classes
// =============================================================================

it('applies group class to tr', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)->toContain('class="group"');
});

it('merges custom classes', function () {
    $html = Blade::render('
        <ui:tr.expandable class="custom-class">
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)->toContain('custom-class');
});

// =============================================================================
// Pass-through Attributes
// =============================================================================

it('passes through additional attributes on tr', function () {
    $html = Blade::render('
        <ui:tr.expandable data-row-id="123" id="expandable-row-1">
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)
        ->toContain('data-row-id="123"')
        ->toContain('id="expandable-row-1"');
});

it('passes through aria attributes', function () {
    $html = Blade::render('
        <ui:tr.expandable aria-label="Expandable row">
            <ui:td>Content</ui:td>
        </ui:tr.expandable>
    ');

    expect($html)->toContain('aria-label="Expandable row"');
});

// =============================================================================
// Integration with Table
// =============================================================================

it('renders within a table structure', function () {
    $html = Blade::render('
        <ui:table>
            <ui:thead>
                <ui:tr>
                    <ui:th>Name</ui:th>
                    <ui:th>Actions</ui:th>
                </ui:tr>
            </ui:thead>
            <ui:tr.expandable>
                <ui:td>John Doe</ui:td>
                <ui:td><ui:tr.toggle /></ui:td>
                <x-slot:expansion>
                    <ui:tr :nested="true">
                        <ui:td colspan="2">Details for John</ui:td>
                    </ui:tr>
                </x-slot:expansion>
            </ui:tr.expandable>
        </ui:table>
    ');

    expect($html)
        ->toContain('data-table')
        ->toContain('data-tr-expandable')
        ->toContain('John Doe')
        ->toContain('Details for John');
});

// =============================================================================
// TR Toggle (ui:tr.toggle)
// =============================================================================

it('renders toggle button', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle />
        </div>
    ');

    expect($html)
        ->toContain('<button')
        ->toContain('data-toggle');
});

it('renders with default chevron-right icon', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle />
        </div>
    ');

    expect($html)->toContain('<svg');
});

// =============================================================================
// Toggle Icon Prop
// =============================================================================

it('renders with custom icon', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle icon="plus" />
        </div>
    ');

    expect($html)->toContain('<svg');
});

// =============================================================================
// Toggle Icon:Active Prop
// =============================================================================

it('renders with default chevron-down active icon', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle />
        </div>
    ');

    // Toggle shows both icons (one hidden with x-show)
    expect($html)->toContain('<svg');
});

it('renders with custom active icon', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle icon="plus" icon:active="minus" />
        </div>
    ');

    expect($html)->toContain('<svg');
});

// =============================================================================
// Toggle Alpine.js State
// =============================================================================

it('uses expanded state variable', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle />
        </div>
    ');

    expect($html)->toContain('expanded');
});

it('binds to aria-pressed attribute', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle />
        </div>
    ');

    expect($html)->toContain('x-bind:aria-pressed');
});

it('binds to data-active attribute', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle />
        </div>
    ');

    expect($html)->toContain('x-bind:data-active');
});

// =============================================================================
// Toggle Styling
// =============================================================================

it('renders toggle with ghost variant', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle />
        </div>
    ');

    expect($html)->toContain('data-variant="ghost"');
});

it('renders toggle with sm size styling', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle />
        </div>
    ');

    // sm size applies min-h-8 and text-xs classes
    expect($html)
        ->toContain('min-h-8')
        ->toContain('text-xs');
});

// =============================================================================
// Toggle Pass-through Attributes
// =============================================================================

it('passes through additional attributes on toggle', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle data-testid="expand-btn" id="toggle-1" />
        </div>
    ');

    expect($html)
        ->toContain('data-testid="expand-btn"')
        ->toContain('id="toggle-1"');
});

it('passes through aria attributes on toggle', function () {
    $html = Blade::render('
        <div x-data="{ expanded: false }">
            <ui:tr.toggle aria-label="Toggle details" />
        </div>
    ');

    expect($html)->toContain('aria-label="Toggle details"');
});

// =============================================================================
// Toggle Integration with Expandable Row
// =============================================================================

it('renders toggle within expandable row', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Content</ui:td>
            <ui:td><ui:tr.toggle /></ui:td>
        </ui:tr.expandable>
    ');

    expect($html)
        ->toContain('data-tr-expandable')
        ->toContain('data-toggle');
});

it('toggle controls expandable row state', function () {
    $html = Blade::render('
        <ui:tr.expandable>
            <ui:td>Row content</ui:td>
            <ui:td><ui:tr.toggle /></ui:td>
            <x-slot:expansion>
                <ui:tr :nested="true">
                    <ui:td colspan="2">Nested content</ui:td>
                </ui:tr>
            </x-slot:expansion>
        </ui:tr.expandable>
    ');

    expect($html)
        ->toContain('x-data="{ expanded: false }"')
        ->toContain('data-toggle')
        ->toContain('Nested content');
});

// =============================================================================
// Complete Integration Test
// =============================================================================

it('renders complete expandable table row structure', function () {
    $html = Blade::render('
        <ui:table>
            <ui:thead>
                <ui:tr>
                    <ui:th>Name</ui:th>
                    <ui:th>Email</ui:th>
                    <ui:th :fit="true"></ui:th>
                </ui:tr>
            </ui:thead>
            <ui:tr.expandable :expanded="false">
                <ui:td :highlight="true">John Doe</ui:td>
                <ui:td>john@example.com</ui:td>
                <ui:td :fit="true"><ui:tr.toggle /></ui:td>
                <x-slot:expansion>
                    <ui:tr :nested="true">
                        <ui:td colspan="3">
                            <div>Additional details about John Doe</div>
                        </ui:td>
                    </ui:tr>
                </x-slot:expansion>
            </ui:tr.expandable>
        </ui:table>
    ');

    expect($html)
        ->toContain('data-table')
        ->toContain('data-thead')
        ->toContain('data-tr-expandable')
        ->toContain('x-data="{ expanded: false }"')
        ->toContain('John Doe')
        ->toContain('john@example.com')
        ->toContain('data-toggle')
        ->toContain('Additional details about John Doe')
        ->toContain('x-show="expanded"');
});
