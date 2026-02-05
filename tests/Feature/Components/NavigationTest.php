<?php

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;

// =============================================================================
// Nav Component
// =============================================================================

it('renders a basic nav', function () {
    $html = Blade::render('<ui:nav><ui:nav.item href="/">Home</ui:nav.item></ui:nav>');

    expect($html)
        ->toContain('Home')
        ->toContain('href="/"')
        ->toContain('<nav')
        ->toContain('data-nav');
});

it('renders nav with multiple items', function () {
    $html = Blade::render('
        <ui:nav>
            <ui:nav.item href="/">Home</ui:nav.item>
            <ui:nav.item href="/about">About</ui:nav.item>
            <ui:nav.item href="/contact">Contact</ui:nav.item>
        </ui:nav>
    ');

    expect($html)
        ->toContain('Home')
        ->toContain('About')
        ->toContain('Contact');
});

it('nav passes through additional attributes', function () {
    $html = Blade::render('<ui:nav id="main-nav" data-test="value"><ui:nav.item>Test</ui:nav.item></ui:nav>');

    expect($html)
        ->toContain('id="main-nav"')
        ->toContain('data-test="value"');
});

it('nav has flex layout classes', function () {
    $html = Blade::render('<ui:nav><ui:nav.item>Test</ui:nav.item></ui:nav>');

    expect($html)
        ->toContain('flex')
        ->toContain('flex-col');
});

// =============================================================================
// Nav Title Component
// =============================================================================

it('renders a nav title', function () {
    $html = Blade::render('<ui:nav.title>Settings</ui:nav.title>');

    expect($html)
        ->toContain('Settings')
        ->toContain('data-nav-title');
});

it('nav title renders with icon', function () {
    $html = Blade::render('<ui:nav.title icon="settings">Settings</ui:nav.title>');

    expect($html)
        ->toContain('Settings')
        ->toContain('<svg');
});

it('nav title has uppercase styling', function () {
    $html = Blade::render('<ui:nav.title>Section</ui:nav.title>');

    expect($html)
        ->toContain('uppercase')
        ->toContain('text-xs')
        ->toContain('font-semibold');
});

it('nav title passes through additional attributes', function () {
    $html = Blade::render('<ui:nav.title id="section-title" data-section="main">Main</ui:nav.title>');

    expect($html)
        ->toContain('id="section-title"')
        ->toContain('data-section="main"');
});

// =============================================================================
// Nav Item Component
// =============================================================================

it('renders a nav item as button by default', function () {
    $html = Blade::render('<ui:nav.item>Dashboard</ui:nav.item>');

    expect($html)
        ->toContain('Dashboard')
        ->toContain('<button')
        ->toContain('type="button"')
        ->toContain('data-nav-item');
});

it('renders a nav item as link when href is provided', function () {
    $html = Blade::render('<ui:nav.item href="/dashboard">Dashboard</ui:nav.item>');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/dashboard"')
        ->toContain('Dashboard')
        ->not->toContain('<button');
});

it('nav item shows active state', function () {
    $html = Blade::render('<ui:nav.item :active="true">Active Item</ui:nav.item>');

    expect($html)
        ->toContain('bg-black/5')
        ->toContain('text-gray-900');
});

it('nav item renders with leading icon', function () {
    $html = Blade::render('<ui:nav.item icon="home">Home</ui:nav.item>');

    expect($html)
        ->toContain('Home')
        ->toContain('<svg');
});

it('nav item renders with trailing icon', function () {
    $html = Blade::render('<ui:nav.item icon:end="arrow-right">Next</ui:nav.item>');

    expect($html)
        ->toContain('Next')
        ->toContain('<svg');
});

it('nav item renders with badge', function () {
    $html = Blade::render('<ui:nav.item badge="5">Messages</ui:nav.item>');

    expect($html)
        ->toContain('Messages')
        ->toContain('5');
});

it('nav item badge shows 99+ for large numbers', function () {
    $html = Blade::render('<ui:nav.item badge="150">Notifications</ui:nav.item>');

    expect($html)->toContain('99+');
});

it('nav item renders with badge variant', function () {
    $html = Blade::render('<ui:nav.item badge="3" badge:variant="danger">Errors</ui:nav.item>');

    expect($html)
        ->toContain('Errors')
        ->toContain('3');
});

it('nav item renders with indicator', function () {
    $html = Blade::render('<ui:nav.item :indicator="true">Updates</ui:nav.item>');

    expect($html)
        ->toContain('Updates')
        ->toContain('data-nav-indicator');
});

it('nav item renders with indicator variant', function () {
    $html = Blade::render('<ui:nav.item :indicator="true" indicator:variant="danger">Critical</ui:nav.item>');

    expect($html)
        ->toContain('Critical')
        ->toContain('bg-red-500');
});

it('nav item handles disabled state on button', function () {
    $html = Blade::render('<ui:nav.item :disabled="true">Disabled</ui:nav.item>');

    expect($html)
        ->toContain('disabled')
        ->toContain('opacity-50')
        ->toContain('pointer-events-none');
});

it('nav item handles disabled state on link', function () {
    $html = Blade::render('<ui:nav.item href="/test" :disabled="true">Disabled Link</ui:nav.item>');

    expect($html)
        ->toContain('aria-disabled="true"')
        ->toContain('tabindex="-1"')
        ->toContain('opacity-50');
});

it('nav item applies danger variant', function () {
    $html = Blade::render('<ui:nav.item variant="danger">Delete</ui:nav.item>');

    expect($html)
        ->toContain('Delete')
        ->toContain('text-red-600');
});

it('nav item passes through additional attributes', function () {
    $html = Blade::render('<ui:nav.item data-action="click" x-on:click="doSomething">Action</ui:nav.item>');

    expect($html)
        ->toContain('data-action="click"')
        ->toContain('x-on:click="doSomething"');
});

// =============================================================================
// Nav Group Component
// =============================================================================

it('renders a nav group', function () {
    $html = Blade::render('
        <ui:nav.group title="Settings">
            <ui:nav.item>Profile</ui:nav.item>
        </ui:nav.group>
    ');

    expect($html)
        ->toContain('Settings')
        ->toContain('Profile')
        ->toContain('data-nav-group')
        ->toContain('x-data');
});

it('nav group renders with icon', function () {
    $html = Blade::render('
        <ui:nav.group title="Admin" icon="shield">
            <ui:nav.item>Users</ui:nav.item>
        </ui:nav.group>
    ');

    expect($html)
        ->toContain('Admin')
        ->toContain('<svg');
});

it('nav group can be open by default', function () {
    $html = Blade::render('
        <ui:nav.group title="Open Group" :open="true">
            <ui:nav.item>Item</ui:nav.item>
        </ui:nav.group>
    ');

    expect($html)->toContain('open: true');
});

it('nav group is closed by default', function () {
    $html = Blade::render('
        <ui:nav.group title="Closed Group">
            <ui:nav.item>Item</ui:nav.item>
        </ui:nav.group>
    ');

    expect($html)->toContain('open: false');
});

it('nav group has expand/collapse button', function () {
    $html = Blade::render('
        <ui:nav.group title="Expandable">
            <ui:nav.item>Item</ui:nav.item>
        </ui:nav.group>
    ');

    expect($html)
        ->toContain('x-on:click="open = !open"')
        ->toContain(':aria-expanded="open"');
});

it('nav group has chevron icon that rotates', function () {
    $html = Blade::render('
        <ui:nav.group title="With Chevron">
            <ui:nav.item>Item</ui:nav.item>
        </ui:nav.group>
    ');

    expect($html)->toContain('rotate-90');
});

it('nav group passes through additional attributes', function () {
    $html = Blade::render('
        <ui:nav.group title="Custom" id="custom-group" data-section="admin">
            <ui:nav.item>Item</ui:nav.item>
        </ui:nav.group>
    ');

    expect($html)
        ->toContain('id="custom-group"')
        ->toContain('data-section="admin"');
});

// =============================================================================
// Breadcrumbs Component
// =============================================================================

it('renders basic breadcrumbs', function () {
    $html = Blade::render('
        <ui:breadcrumbs>
            <ui:breadcrumbs.item href="/">Home</ui:breadcrumbs.item>
            <ui:breadcrumbs.item>Current</ui:breadcrumbs.item>
        </ui:breadcrumbs>
    ');

    expect($html)
        ->toContain('Home')
        ->toContain('Current')
        ->toContain('data-breadcrumbs')
        ->toContain('aria-label="Breadcrumb"');
});

it('breadcrumbs has alpine x-data', function () {
    $html = Blade::render('
        <ui:breadcrumbs>
            <ui:breadcrumbs.item href="/">Home</ui:breadcrumbs.item>
        </ui:breadcrumbs>
    ');

    expect($html)
        ->toContain('x-data')
        ->toContain('items: []')
        ->toContain('register(url)');
});

it('breadcrumbs passes through additional attributes', function () {
    $html = Blade::render('
        <ui:breadcrumbs id="main-breadcrumbs" data-test="value">
            <ui:breadcrumbs.item href="/">Home</ui:breadcrumbs.item>
        </ui:breadcrumbs>
    ');

    expect($html)
        ->toContain('id="main-breadcrumbs"')
        ->toContain('data-test="value"');
});

// =============================================================================
// Breadcrumbs Item Component
// =============================================================================

it('renders breadcrumbs item as link when href is provided', function () {
    $html = Blade::render('<ui:breadcrumbs><ui:breadcrumbs.item href="/products">Products</ui:breadcrumbs.item></ui:breadcrumbs>');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/products"')
        ->toContain('Products')
        ->toContain('data-breadcrumbs-item');
});

it('renders breadcrumbs item as span when no href', function () {
    $html = Blade::render('<ui:breadcrumbs><ui:breadcrumbs.item>Current Page</ui:breadcrumbs.item></ui:breadcrumbs>');

    expect($html)
        ->toContain('<span')
        ->toContain('Current Page')
        ->toContain('aria-current="page"')
        ->toContain('data-active');
});

it('breadcrumbs item link registers url with alpine', function () {
    $html = Blade::render('<ui:breadcrumbs><ui:breadcrumbs.item href="/test">Test</ui:breadcrumbs.item></ui:breadcrumbs>');

    expect($html)->toContain('x-init="register');
});

it('breadcrumbs item has hover underline on links', function () {
    $html = Blade::render('<ui:breadcrumbs><ui:breadcrumbs.item href="/test">Link</ui:breadcrumbs.item></ui:breadcrumbs>');

    expect($html)
        ->toContain('hover:underline')
        ->toContain('underline-offset-4');
});

it('breadcrumbs item passes through additional attributes', function () {
    $html = Blade::render('
        <ui:breadcrumbs>
            <ui:breadcrumbs.item href="/test" id="crumb-1" data-index="0">Test</ui:breadcrumbs.item>
        </ui:breadcrumbs>
    ');

    expect($html)
        ->toContain('id="crumb-1"')
        ->toContain('data-index="0"');
});

// =============================================================================
// Pagination Component
// =============================================================================

it('does not render pagination when paginator has no pages', function () {
    $paginator = new LengthAwarePaginator([], 0, 10);

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    expect($html)->toBe('');
});

it('renders pagination when paginator has pages', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 50,
        perPage: 10,
        currentPage: 1
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    expect($html)
        ->toContain('data-pagination')
        ->toContain('<nav');
});

it('pagination shows item count for length aware paginator', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 50,
        perPage: 10,
        currentPage: 1
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    expect($html)
        ->toContain('Showing 1 to 10 of 50');
});

it('pagination renders page numbers', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 50,
        perPage: 10,
        currentPage: 1
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    expect($html)
        ->toContain('>1<')
        ->toContain('>2<')
        ->toContain('>3<');
});

it('pagination highlights current page', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 50,
        perPage: 10,
        currentPage: 2
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    expect($html)->toContain('cursor-default');
});

it('pagination disables previous on first page', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 50,
        perPage: 10,
        currentPage: 1
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    expect($html)->toContain('opacity-40');
});

it('pagination disables next on last page', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 50,
        perPage: 10,
        currentPage: 5
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    // Should have disabled next button (last span with opacity-40)
    expect($html)->toContain('opacity-40');
});

it('pagination shows ellipsis for many pages', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 200,
        perPage: 10,
        currentPage: 10
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    expect($html)->toContain('...');
});

it('pagination accepts visible prop', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 100,
        perPage: 10,
        currentPage: 5
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" :visible="3" />', ['paginator' => $paginator]);

    expect($html)->toContain('data-pagination');
});

it('pagination works with simple paginator', function () {
    $paginator = new Paginator(
        items: range(1, 10),
        perPage: 10,
        currentPage: 1
    );
    $paginator->hasMorePagesWhen(true);

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    expect($html)
        ->toContain('data-pagination')
        ->not->toContain('Showing'); // Simple paginator doesn't show count
});

it('pagination passes through additional attributes', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 50,
        perPage: 10,
        currentPage: 1
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" id="main-pagination" data-test="value" />', ['paginator' => $paginator]);

    expect($html)
        ->toContain('id="main-pagination"')
        ->toContain('data-test="value"');
});

it('pagination has navigation arrows with icons', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 50,
        perPage: 10,
        currentPage: 2
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    // Should contain SVG icons for chevron-left and chevron-right
    expect($html)->toContain('<svg');
});

it('pagination previous link is active on middle pages', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 50,
        perPage: 10,
        currentPage: 3
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    // Should have previous link with page=2
    expect($html)->toContain('page=2');
});

it('pagination next link is active on middle pages', function () {
    $paginator = new LengthAwarePaginator(
        items: range(1, 10),
        total: 50,
        perPage: 10,
        currentPage: 3
    );

    $html = Blade::render('<ui:pagination :paginator="$paginator" />', ['paginator' => $paginator]);

    // Should have next link with page=4
    expect($html)->toContain('page=4');
});
