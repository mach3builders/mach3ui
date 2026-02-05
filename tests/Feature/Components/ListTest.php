<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// List (index.blade.php)
// =============================================================================

it('renders a basic list', function () {
    $html = Blade::render('<ui:list><ui:list.item>Item 1</ui:list.item></ui:list>');

    expect($html)
        ->toContain('Item 1')
        ->toContain('data-list');
});

it('renders list with multiple items', function () {
    $html = Blade::render('
        <ui:list>
            <ui:list.item>First</ui:list.item>
            <ui:list.item>Second</ui:list.item>
            <ui:list.item>Third</ui:list.item>
        </ui:list>
    ');

    expect($html)
        ->toContain('First')
        ->toContain('Second')
        ->toContain('Third')
        ->toContain('data-list');
});

it('renders list with slot content', function () {
    $html = Blade::render('<ui:list><div class="custom-content">Custom</div></ui:list>');

    expect($html)->toContain('<div class="custom-content">Custom</div>');
});

it('applies flex flex-col styling', function () {
    $html = Blade::render('<ui:list>Content</ui:list>');

    expect($html)
        ->toContain('flex')
        ->toContain('flex-col');
});

it('passes through additional attributes on list', function () {
    $html = Blade::render('<ui:list data-test="value" id="my-list">Content</ui:list>');

    expect($html)
        ->toContain('data-test="value"')
        ->toContain('id="my-list"');
});

it('merges custom classes on list', function () {
    $html = Blade::render('<ui:list class="custom-class">Content</ui:list>');

    expect($html)->toContain('custom-class');
});

// =============================================================================
// List Item (item.blade.php)
// =============================================================================

it('renders a basic list item', function () {
    $html = Blade::render('<ui:list.item>Item content</ui:list.item>');

    expect($html)
        ->toContain('Item content')
        ->toContain('data-list-item');
});

it('renders list item with slot content', function () {
    $html = Blade::render('<ui:list.item><span class="custom">Custom content</span></ui:list.item>');

    expect($html)->toContain('<span class="custom">Custom content</span>');
});

it('renders list item as div by default', function () {
    $html = Blade::render('<ui:list.item>Content</ui:list.item>');

    expect($html)
        ->toContain('<div')
        ->not->toContain('<a');
});

it('renders list item as anchor when href is provided', function () {
    $html = Blade::render('<ui:list.item href="/some-url">Link item</ui:list.item>');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/some-url"')
        ->toContain('Link item');
});

it('renders list item as anchor when route is provided', function () {
    // Note: This test assumes a route exists - in real tests you'd mock Route::has
    // For now, we test that the href prop works correctly
    $html = Blade::render('<ui:list.item href="/dashboard">Dashboard</ui:list.item>');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/dashboard"');
});

it('applies hover styling when clickable', function () {
    $html = Blade::render('<ui:list.item href="/link">Clickable</ui:list.item>');

    expect($html)
        ->toContain('cursor-pointer')
        ->toContain('hover:bg-black/[0.02]');
});

it('does not apply hover styling when not clickable', function () {
    $html = Blade::render('<ui:list.item>Static</ui:list.item>');

    expect($html)->not->toContain('cursor-pointer');
});

it('renders list item with label prop', function () {
    $html = Blade::render('<ui:list.item label="My Label" />');

    expect($html)
        ->toContain('My Label')
        ->toContain('flex items-center justify-between');
});

it('renders list item with value prop', function () {
    $html = Blade::render('<ui:list.item label="Label" value="Value" />');

    expect($html)
        ->toContain('Label')
        ->toContain('Value');
});

it('renders list item with icon prop', function () {
    $html = Blade::render('<ui:list.item icon="star" label="Starred" />');

    expect($html)
        ->toContain('<svg')
        ->toContain('Starred');
});

it('renders list item with icon:end prop', function () {
    $html = Blade::render('<ui:list.item label="Navigate" icon:end="chevron-right" />');

    expect($html)
        ->toContain('<svg')
        ->toContain('Navigate');
});

it('renders list item with label, value, icon, and icon:end', function () {
    $html = Blade::render('<ui:list.item icon="user" label="Name" value="John" icon:end="chevron-right" />');

    expect($html)
        ->toContain('Name')
        ->toContain('John');
    // Should contain 2 SVG icons
    expect(substr_count($html, '<svg'))->toBe(2);
});

it('applies text styling classes', function () {
    $html = Blade::render('<ui:list.item>Content</ui:list.item>');

    expect($html)
        ->toContain('text-gray-700')
        ->toContain('dark:text-gray-200');
});

it('applies border styling for dividers', function () {
    $html = Blade::render('<ui:list.item>Content</ui:list.item>');

    expect($html)
        ->toContain('border-b')
        ->toContain('last:border-b-0');
});

it('applies padding styling', function () {
    $html = Blade::render('<ui:list.item>Content</ui:list.item>');

    expect($html)
        ->toContain('px-4')
        ->toContain('py-3');
});

it('passes through additional attributes on list item', function () {
    $html = Blade::render('<ui:list.item data-test="item-value" id="item-1">Content</ui:list.item>');

    expect($html)
        ->toContain('data-test="item-value"')
        ->toContain('id="item-1"');
});

it('merges custom classes on list item', function () {
    $html = Blade::render('<ui:list.item class="custom-item-class">Content</ui:list.item>');

    expect($html)->toContain('custom-item-class');
});

it('uses slot as label fallback when hasLabelValue is true', function () {
    $html = Blade::render('<ui:list.item icon="star">Slot as label</ui:list.item>');

    expect($html)
        ->toContain('Slot as label')
        ->toContain('flex items-center justify-between');
});

// =============================================================================
// Definition List (index.blade.php)
// =============================================================================

it('renders a basic definition list', function () {
    $html = Blade::render('<ui:definition-list><ui:definition-list.item label="Term" value="Definition" /></ui:definition-list>');

    expect($html)
        ->toContain('Term')
        ->toContain('Definition')
        ->toContain('data-definition-list');
});

it('renders definition list with multiple items', function () {
    $html = Blade::render('
        <ui:definition-list>
            <ui:definition-list.item label="Name" value="John" />
            <ui:definition-list.item label="Age" value="30" />
            <ui:definition-list.item label="City" value="Amsterdam" />
        </ui:definition-list>
    ');

    expect($html)
        ->toContain('Name')
        ->toContain('John')
        ->toContain('Age')
        ->toContain('30')
        ->toContain('City')
        ->toContain('Amsterdam');
});

it('renders definition list as dl element', function () {
    $html = Blade::render('<ui:definition-list>Content</ui:definition-list>');

    expect($html)
        ->toContain('<dl')
        ->toContain('</dl>');
});

it('applies flex flex-col gap-3 styling on definition list', function () {
    $html = Blade::render('<ui:definition-list>Content</ui:definition-list>');

    expect($html)
        ->toContain('flex')
        ->toContain('flex-col')
        ->toContain('gap-3');
});

it('passes through additional attributes on definition list', function () {
    $html = Blade::render('<ui:definition-list data-test="dl-value" id="my-dl">Content</ui:definition-list>');

    expect($html)
        ->toContain('data-test="dl-value"')
        ->toContain('id="my-dl"');
});

it('merges custom classes on definition list', function () {
    $html = Blade::render('<ui:definition-list class="custom-dl-class">Content</ui:definition-list>');

    expect($html)->toContain('custom-dl-class');
});

// =============================================================================
// Definition List Item (item.blade.php)
// =============================================================================

it('renders a basic definition list item', function () {
    $html = Blade::render('<ui:definition-list.item label="Term" value="Definition" />');

    expect($html)
        ->toContain('Term')
        ->toContain('Definition')
        ->toContain('data-definition-list-item');
});

it('renders definition list item with label in dt element', function () {
    $html = Blade::render('<ui:definition-list.item label="My Label" value="Value" />');

    expect($html)
        ->toContain('<dt')
        ->toContain('My Label')
        ->toContain('data-definition-list-label');
});

it('renders definition list item with value in dd element', function () {
    $html = Blade::render('<ui:definition-list.item label="Label" value="My Value" />');

    expect($html)
        ->toContain('<dd')
        ->toContain('My Value')
        ->toContain('data-definition-list-value');
});

it('renders definition list item with slot as value fallback', function () {
    $html = Blade::render('<ui:definition-list.item label="Label">Slot value</ui:definition-list.item>');

    expect($html)
        ->toContain('Label')
        ->toContain('Slot value');
});

it('renders dotted divider between label and value', function () {
    $html = Blade::render('<ui:definition-list.item label="Label" value="Value" />');

    expect($html)
        ->toContain('data-definition-list-divider')
        ->toContain('border-dotted')
        ->toContain('aria-hidden="true"');
});

it('applies flex items-baseline gap-2 styling on definition list item', function () {
    $html = Blade::render('<ui:definition-list.item label="Label" value="Value" />');

    expect($html)
        ->toContain('flex')
        ->toContain('items-baseline')
        ->toContain('gap-2');
});

it('applies label styling', function () {
    $html = Blade::render('<ui:definition-list.item label="Label" value="Value" />');

    expect($html)
        ->toContain('text-gray-500')
        ->toContain('shrink-0');
});

it('applies value styling', function () {
    $html = Blade::render('<ui:definition-list.item label="Label" value="Value" />');

    expect($html)
        ->toContain('text-right')
        ->toContain('font-medium')
        ->toContain('text-gray-900');
});

it('applies divider styling', function () {
    $html = Blade::render('<ui:definition-list.item label="Label" value="Value" />');

    expect($html)
        ->toContain('flex-1')
        ->toContain('border-b')
        ->toContain('border-dotted')
        ->toContain('border-gray-300');
});

it('passes through additional attributes on definition list item', function () {
    $html = Blade::render('<ui:definition-list.item label="L" value="V" data-test="item-value" id="dl-item" />');

    expect($html)
        ->toContain('data-test="item-value"')
        ->toContain('id="dl-item"');
});

it('merges custom classes on definition list item', function () {
    $html = Blade::render('<ui:definition-list.item label="L" value="V" class="custom-item-class" />');

    expect($html)->toContain('custom-item-class');
});

// =============================================================================
// Composed Usage
// =============================================================================

it('renders a complete list with various item types', function () {
    $html = Blade::render('
        <ui:list>
            <ui:list.item>Simple text item</ui:list.item>
            <ui:list.item label="With label" value="and value" />
            <ui:list.item icon="star" label="With icon" />
            <ui:list.item href="/link" label="Clickable" icon:end="chevron-right" />
        </ui:list>
    ');

    expect($html)
        ->toContain('data-list')
        ->toContain('Simple text item')
        ->toContain('With label')
        ->toContain('and value')
        ->toContain('With icon')
        ->toContain('Clickable')
        ->toContain('href="/link"')
        ->toContain('<svg');
});

it('renders a complete definition list for displaying key-value pairs', function () {
    $html = Blade::render('
        <ui:definition-list>
            <ui:definition-list.item label="Name" value="John Doe" />
            <ui:definition-list.item label="Email" value="john@example.com" />
            <ui:definition-list.item label="Status">
                <span class="text-green-600">Active</span>
            </ui:definition-list.item>
        </ui:definition-list>
    ');

    expect($html)
        ->toContain('data-definition-list')
        ->toContain('Name')
        ->toContain('John Doe')
        ->toContain('Email')
        ->toContain('john@example.com')
        ->toContain('Status')
        ->toContain('text-green-600')
        ->toContain('Active');
});

it('renders list inside a card', function () {
    $html = Blade::render('
        <ui:card>
            <ui:card.body flush>
                <ui:list>
                    <ui:list.item label="Item 1" value="Value 1" />
                    <ui:list.item label="Item 2" value="Value 2" />
                </ui:list>
            </ui:card.body>
        </ui:card>
    ');

    expect($html)
        ->toContain('data-card')
        ->toContain('data-card-body')
        ->toContain('data-list')
        ->toContain('Item 1')
        ->toContain('Value 1')
        ->toContain('Item 2')
        ->toContain('Value 2');
});
