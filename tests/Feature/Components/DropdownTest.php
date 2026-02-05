<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Dropdown (index) Tests
// =============================================================================

it('renders a basic dropdown', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger><ui:dropdown.menu><ui:dropdown.item>Item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('x-data')
        ->toContain('Click')
        ->toContain('Item');
});

it('renders dropdown with x-data containing open state', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Open</ui:dropdown.trigger></ui:dropdown>');

    expect($html)
        ->toContain('x-data')
        ->toContain('open: false');
});

it('renders dropdown with unique id', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain("id: 'dropdown-");
});

it('applies default position bottom-start', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain("position: 'bottom-start'");
});

it('applies custom position', function () {
    $html = Blade::render('<ui:dropdown position="top-end"><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain("position: 'top-end'");
});

it('has data-dropdown attribute', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('data-dropdown');
});

it('has relative positioning class', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('relative');
});

it('has inline-block class', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('inline-block');
});

it('has anchor-scope style', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('anchor-scope: --dropdown-trigger');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:dropdown data-test="value" id="my-dropdown"><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)
        ->toContain('data-test="value"')
        ->toContain('id="my-dropdown"');
});

it('renders slot content', function () {
    $html = Blade::render('<ui:dropdown><div class="custom-content">Custom</div></ui:dropdown>');

    expect($html)->toContain('class="custom-content"');
});

// =============================================================================
// Dropdown Trigger Tests
// =============================================================================

it('renders trigger with slot content', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click me</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('Click me');
});

it('renders trigger as button', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('data-button');
});

it('renders trigger with default arrow icon', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Select</ui:dropdown.trigger></ui:dropdown>');

    // chevrons-up-down is rendered as SVG
    expect($html)->toContain('<svg');
});

it('renders trigger with custom arrow icon', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger arrow="chevron-down">Select</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('<svg');
});

it('renders trigger without arrow when set to false', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger :arrow="false">Select</ui:dropdown.trigger></ui:dropdown>');

    // Button still renders but without the end icon for arrow
    expect($html)->toContain('Select');
});

it('renders trigger with leading icon', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger icon="settings">Settings</ui:dropdown.trigger></ui:dropdown>');

    expect($html)
        ->toContain('<svg')
        ->toContain('Settings');
});

it('has popovertarget binding', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('x-bind:popovertarget="id"');
});

it('has aria-haspopup attribute', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('aria-haspopup="true"');
});

it('has data-dropdown-trigger attribute', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('data-dropdown-trigger');
});

it('has anchor-name style', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('anchor-name: --dropdown-trigger');
});

it('applies default variant to trigger', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('data-variant="default"');
});

it('applies custom variant to trigger', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger variant="primary">Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('data-variant="primary"');
});

it('applies size to trigger', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger size="sm">Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('min-h-8');
});

it('passes through additional attributes on trigger', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.trigger data-test="trigger-value">Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)->toContain('data-test="trigger-value"');
});

// =============================================================================
// Dropdown Menu Tests
// =============================================================================

it('renders menu with slot content', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><div>Menu content</div></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('Menu content');
});

it('has popover attribute', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('popover');
});

it('has role menu attribute', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('role="menu"');
});

it('has data-dropdown-menu attribute', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('data-dropdown-menu');
});

it('has x-bind id', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('x-bind:id="id"');
});

it('has x-bind style for position', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('x-bind:style');
});

it('has fixed positioning', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('fixed');
});

it('has hidden by default class', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('hidden');
});

it('has min-width class', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('min-w-52');
});

it('has rounded-lg class', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('rounded-lg');
});

it('has border styling', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('border')
        ->toContain('border-gray-100');
});

it('has shadow styling', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('shadow-lg');
});

it('has bg-white styling', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('bg-white');
});

it('has dark mode styling', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('dark:border-gray-740')
        ->toContain('dark:bg-gray-790');
});

it('has popover-open flex display', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu>Content</ui:dropdown.menu></ui:dropdown>');

    // The & is HTML-encoded in the output
    expect($html)->toContain('[&amp;:popover-open]:flex');
});

it('passes through additional attributes on menu', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu data-test="menu-value">Content</ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('data-test="menu-value"');
});

// =============================================================================
// Dropdown Item Tests
// =============================================================================

it('renders item with slot content', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item>Item text</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('Item text');
});

it('renders item with label prop', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item label="Label text" /></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('Label text');
});

it('renders item as button by default', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item>Item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('<button')
        ->toContain('type="button"');
});

it('renders item as link when href is provided', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item href="/test">Link item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/test"')
        ->not->toContain('type="button"');
});

it('renders item with leading icon', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item icon="settings">Settings</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('<svg');
});

it('renders item with trailing icon', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item icon:end="arrow-right">Next</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('<svg');
});

it('has role menuitem attribute', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item>Item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('role="menuitem"');
});

it('has data-dropdown-item attribute', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item>Item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('data-dropdown-item');
});

it('has x-on:click to close popover', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item>Item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain("x-on:click=\"\$el.closest('[popover]').hidePopover()\"");
});

it('applies default variant styling', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item>Item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('text-gray-600')
        ->toContain('hover:bg-black/5');
});

it('applies danger variant styling', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item variant="danger">Delete</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('text-red-600')
        ->toContain('hover:bg-red-50');
});

it('applies active state styling', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item :active="true">Active item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('bg-black/5')
        ->toContain('text-gray-900');
});

it('applies disabled state on button item', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item :disabled="true">Disabled</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('disabled')
        ->toContain('pointer-events-none')
        ->toContain('opacity-50');
});

it('applies disabled state on link item', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item href="/test" :disabled="true">Disabled link</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('aria-disabled="true"')
        ->toContain('tabindex="-1"')
        ->toContain('pointer-events-none')
        ->toContain('opacity-50');
});

it('has flex layout classes', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item>Item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('flex')
        ->toContain('items-center')
        ->toContain('gap-2');
});

it('has rounded-md class', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item>Item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('rounded-md');
});

it('has padding classes', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item>Item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('px-3')
        ->toContain('py-2');
});

it('passes through additional attributes on item', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item data-test="item-value">Item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('data-test="item-value"');
});

it('renders item with custom type', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.item type="submit">Submit</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('type="submit"');
});

// =============================================================================
// Dropdown Header Tests
// =============================================================================

it('renders header with slot content', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.header>Header text</ui:dropdown.header></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('Header text');
});

it('renders header with title prop', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.header title="Section Title" /></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('Section Title');
});

it('has data-dropdown-header attribute', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.header>Header</ui:dropdown.header></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('data-dropdown-header');
});

it('has text-xs class', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.header>Header</ui:dropdown.header></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('text-xs');
});

it('has font-semibold class', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.header>Header</ui:dropdown.header></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('font-semibold');
});

it('has padding classes on header', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.header>Header</ui:dropdown.header></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('px-3')
        ->toContain('pt-2')
        ->toContain('pb-3');
});

it('has border-b class', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.header>Header</ui:dropdown.header></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('border-b');
});

it('has text color styling', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.header>Header</ui:dropdown.header></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('text-gray-980')
        ->toContain('border-gray-100');
});

it('has dark mode styling on header', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.header>Header</ui:dropdown.header></ui:dropdown.menu></ui:dropdown>');

    expect($html)
        ->toContain('dark:text-gray-100')
        ->toContain('dark:border-gray-700');
});

it('passes through additional attributes on header', function () {
    $html = Blade::render('<ui:dropdown><ui:dropdown.menu><ui:dropdown.header data-test="header-value">Header</ui:dropdown.header></ui:dropdown.menu></ui:dropdown>');

    expect($html)->toContain('data-test="header-value"');
});

// =============================================================================
// Integration Tests
// =============================================================================

it('renders complete dropdown with all subcomponents', function () {
    $html = Blade::render('
        <ui:dropdown position="bottom-end">
            <ui:dropdown.trigger icon="settings" variant="primary">Settings</ui:dropdown.trigger>
            <ui:dropdown.menu>
                <ui:dropdown.header title="Account" />
                <ui:dropdown.item icon="user">Profile</ui:dropdown.item>
                <ui:dropdown.item icon="settings">Settings</ui:dropdown.item>
                <ui:dropdown.item href="/logout" variant="danger" icon="log-out">Logout</ui:dropdown.item>
            </ui:dropdown.menu>
        </ui:dropdown>
    ');

    expect($html)
        ->toContain('data-dropdown')
        ->toContain('data-dropdown-trigger')
        ->toContain('data-dropdown-menu')
        ->toContain('data-dropdown-header')
        ->toContain('data-dropdown-item')
        ->toContain("position: 'bottom-end'")
        ->toContain('Settings')
        ->toContain('Account')
        ->toContain('Profile')
        ->toContain('Logout');
});

it('renders multiple items correctly', function () {
    $html = Blade::render('
        <ui:dropdown>
            <ui:dropdown.trigger>Actions</ui:dropdown.trigger>
            <ui:dropdown.menu>
                <ui:dropdown.item>Edit</ui:dropdown.item>
                <ui:dropdown.item>Duplicate</ui:dropdown.item>
                <ui:dropdown.item>Archive</ui:dropdown.item>
                <ui:dropdown.item variant="danger">Delete</ui:dropdown.item>
            </ui:dropdown.menu>
        </ui:dropdown>
    ');

    expect($html)
        ->toContain('Edit')
        ->toContain('Duplicate')
        ->toContain('Archive')
        ->toContain('Delete');
});

it('renders with custom classes merged', function () {
    $html = Blade::render('<ui:dropdown class="my-custom-class"><ui:dropdown.trigger>Click</ui:dropdown.trigger></ui:dropdown>');

    expect($html)
        ->toContain('my-custom-class')
        ->toContain('relative');
});
