<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Tabs Container (index.blade.php)
// =============================================================================

it('renders basic tabs container', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list><ui:tabs.panel value="tab1">Content 1</ui:tabs.panel></ui:tabs>');

    expect($html)
        ->toContain('x-data')
        ->toContain('data-tabs')
        ->toContain('Tab 1')
        ->toContain('Content 1');
});

it('renders with default prop', function () {
    $html = Blade::render('<ui:tabs default="tab2"><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item><ui:tabs.item value="tab2">Tab 2</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain("active: 'tab2'");
});

it('renders with name prop for global store', function () {
    $html = Blade::render('<ui:tabs name="my-tabs"><ui:tabs.list><ui:tabs.item value="tab1" name="my-tabs">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain("Alpine.store('tabs_my-tabs'")
        ->toContain('data-tabs-name="my-tabs"');
});

it('renders with default variant', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain('data-variant="default"');
});

it('renders with boxed variant', function () {
    $html = Blade::render('<ui:tabs variant="boxed"><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain('data-variant="boxed"');
});

it('renders with sm size', function () {
    $html = Blade::render('<ui:tabs size="sm"><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain('data-size="sm"');
});

it('renders with md size by default', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain('data-size="md"');
});

it('includes init logic when no default is set', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain('init()');
});

it('includes select and isActive methods in local state', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain('select(value)')
        ->toContain('isActive(value)');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:tabs data-test="value" id="my-tabs"><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain('data-test="value"')
        ->toContain('id="my-tabs"');
});

// =============================================================================
// Tabs List (list.blade.php)
// =============================================================================

it('renders tabs list with tablist role', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain('role="tablist"')
        ->toContain('data-tabs-list');
});

it('renders tabs list with flex layout', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain('inline-flex');
});

it('renders tabs list with default variant styling', function () {
    $html = Blade::render('<ui:tabs variant="default"><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain('data-variant="default"');
});

it('renders tabs list with boxed variant styling', function () {
    $html = Blade::render('<ui:tabs variant="boxed"><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain('data-variant="boxed"');
});

it('passes through additional attributes on tabs list', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list data-custom="test" aria-label="Navigation"><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain('data-custom="test"')
        ->toContain('aria-label="Navigation"');
});

// =============================================================================
// Tabs Item (item.blade.php)
// =============================================================================

it('renders tabs item as button', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain('<button')
        ->toContain('type="button"')
        ->toContain('role="tab"');
});

it('renders tabs item with correct id and aria-controls', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="settings">Settings</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain('id="tab-settings"')
        ->toContain('aria-controls="tabpanel-settings"');
});

it('renders tabs item with value data attribute', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="profile">Profile</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain('data-tabs-tab')
        ->toContain('data-value="profile"');
});

it('renders tabs item with local Alpine binding', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain("x-on:click=\"select('tab1')\"")
        ->toContain(":aria-selected=\"isActive('tab1').toString()\"")
        ->toContain(":tabindex=\"isActive('tab1') ? 0 : -1\"");
});

it('renders tabs item with global store binding when name is provided', function () {
    $html = Blade::render('<ui:tabs name="global-tabs"><ui:tabs.list><ui:tabs.item value="tab1" name="global-tabs">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain("Alpine.store('tabs_global-tabs')")
        ->toContain(":aria-selected=\"(Alpine.store('tabs_global-tabs')?.active === 'tab1').toString()\"");
});

it('renders tabs item with icon', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1" icon="settings">Settings</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain('<svg');
});

it('renders disabled tabs item', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1" disabled>Disabled Tab</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain('disabled')
        ->toContain('aria-disabled="true"');
});

it('renders tabs item slot content', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1"><span class="custom">Custom Content</span></ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)
        ->toContain('<span class="custom">')
        ->toContain('Custom Content');
});

it('passes through additional attributes on tabs item', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1" data-analytics="tab-click">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain('data-analytics="tab-click"');
});

it('renders tabs item with cursor-pointer class', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list></ui:tabs>');

    expect($html)->toContain('cursor-pointer');
});

// =============================================================================
// Tabs Panel (panel.blade.php)
// =============================================================================

it('renders tabs panel with tabpanel role', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list><ui:tabs.panel value="tab1">Panel Content</ui:tabs.panel></ui:tabs>');

    expect($html)
        ->toContain('role="tabpanel"')
        ->toContain('data-tabs-panel');
});

it('renders tabs panel with correct id and aria-labelledby', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="settings">Settings</ui:tabs.item></ui:tabs.list><ui:tabs.panel value="settings">Settings Panel</ui:tabs.panel></ui:tabs>');

    expect($html)
        ->toContain('id="tabpanel-settings"')
        ->toContain('aria-labelledby="tab-settings"');
});

it('renders tabs panel with local Alpine visibility binding', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list><ui:tabs.panel value="tab1">Content</ui:tabs.panel></ui:tabs>');

    expect($html)
        ->toContain("x-show=\"isActive('tab1')\"")
        ->toContain(":tabindex=\"isActive('tab1') ? 0 : -1\"");
});

it('renders tabs panel with global store binding when name is provided', function () {
    $html = Blade::render('<ui:tabs name="global-tabs"><ui:tabs.list><ui:tabs.item value="tab1" name="global-tabs">Tab 1</ui:tabs.item></ui:tabs.list><ui:tabs.panel value="tab1" name="global-tabs">Content</ui:tabs.panel></ui:tabs>');

    expect($html)
        ->toContain("x-show=\"Alpine.store('tabs_global-tabs')?.active === 'tab1'\"")
        ->toContain(":tabindex=\"Alpine.store('tabs_global-tabs')?.active === 'tab1' ? 0 : -1\"");
});

it('renders tabs panel with x-cloak', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list><ui:tabs.panel value="tab1">Content</ui:tabs.panel></ui:tabs>');

    expect($html)->toContain('x-cloak');
});

it('renders tabs panel slot content', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list><ui:tabs.panel value="tab1"><div class="panel-content">Rich content here</div></ui:tabs.panel></ui:tabs>');

    expect($html)
        ->toContain('<div class="panel-content">')
        ->toContain('Rich content here');
});

it('passes through additional attributes on tabs panel', function () {
    $html = Blade::render('<ui:tabs><ui:tabs.list><ui:tabs.item value="tab1">Tab 1</ui:tabs.item></ui:tabs.list><ui:tabs.panel value="tab1" data-test="panel-test">Content</ui:tabs.panel></ui:tabs>');

    expect($html)->toContain('data-test="panel-test"');
});

// =============================================================================
// Multiple Tabs Integration
// =============================================================================

it('renders multiple tabs and panels', function () {
    $html = Blade::render('
        <ui:tabs default="tab1">
            <ui:tabs.list>
                <ui:tabs.item value="tab1">First</ui:tabs.item>
                <ui:tabs.item value="tab2">Second</ui:tabs.item>
                <ui:tabs.item value="tab3">Third</ui:tabs.item>
            </ui:tabs.list>
            <ui:tabs.panel value="tab1">First Panel</ui:tabs.panel>
            <ui:tabs.panel value="tab2">Second Panel</ui:tabs.panel>
            <ui:tabs.panel value="tab3">Third Panel</ui:tabs.panel>
        </ui:tabs>
    ');

    expect($html)
        ->toContain('First')
        ->toContain('Second')
        ->toContain('Third')
        ->toContain('First Panel')
        ->toContain('Second Panel')
        ->toContain('Third Panel')
        ->toContain('id="tab-tab1"')
        ->toContain('id="tab-tab2"')
        ->toContain('id="tab-tab3"')
        ->toContain('id="tabpanel-tab1"')
        ->toContain('id="tabpanel-tab2"')
        ->toContain('id="tabpanel-tab3"');
});

it('renders tabs with icons on multiple items', function () {
    $html = Blade::render('
        <ui:tabs>
            <ui:tabs.list>
                <ui:tabs.item value="tab1" icon="user">Profile</ui:tabs.item>
                <ui:tabs.item value="tab2" icon="settings">Settings</ui:tabs.item>
            </ui:tabs.list>
        </ui:tabs>
    ');

    // Should contain two SVG icons
    expect(substr_count($html, '<svg'))->toBeGreaterThanOrEqual(2);
});

it('renders tabs with mixed disabled and enabled items', function () {
    $html = Blade::render('
        <ui:tabs>
            <ui:tabs.list>
                <ui:tabs.item value="tab1">Enabled</ui:tabs.item>
                <ui:tabs.item value="tab2" disabled>Disabled</ui:tabs.item>
                <ui:tabs.item value="tab3">Also Enabled</ui:tabs.item>
            </ui:tabs.list>
        </ui:tabs>
    ');

    expect($html)
        ->toContain('Enabled')
        ->toContain('Disabled')
        ->toContain('Also Enabled')
        ->toContain('aria-disabled="true"');
});
