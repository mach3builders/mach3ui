<?php

use Illuminate\Support\Facades\Blade;

it('renders a basic button', function () {
    $html = Blade::render('<ui:button>Click me</ui:button>');

    expect($html)
        ->toContain('<button')
        ->toContain('Click me')
        ->toContain('type="button"');
});

it('renders as link when href is provided', function () {
    $html = Blade::render('<ui:button href="/test">Go to test</ui:button>');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/test"')
        ->toContain('Go to test')
        ->not->toContain('<button');
});

it('applies default variant styling', function () {
    $html = Blade::render('<ui:button>Default</ui:button>');

    expect($html)
        ->toContain('data-variant="default"')
        ->toContain('bg-white')
        ->toContain('text-gray-900');
});

it('applies primary variant styling', function () {
    $html = Blade::render('<ui:button variant="primary">Primary</ui:button>');

    expect($html)
        ->toContain('data-variant="primary"')
        ->toContain('bg-blue-500');
});

it('applies secondary variant styling', function () {
    $html = Blade::render('<ui:button variant="secondary">Secondary</ui:button>');

    expect($html)
        ->toContain('data-variant="secondary"')
        ->toContain('bg-gray-700');
});

it('applies success variant styling', function () {
    $html = Blade::render('<ui:button variant="success">Success</ui:button>');

    expect($html)
        ->toContain('data-variant="success"')
        ->toContain('bg-green-600');
});

it('applies danger variant styling', function () {
    $html = Blade::render('<ui:button variant="danger">Danger</ui:button>');

    expect($html)
        ->toContain('data-variant="danger"')
        ->toContain('bg-red-600');
});

it('applies subtle variant styling', function () {
    $html = Blade::render('<ui:button variant="subtle">Subtle</ui:button>');

    expect($html)
        ->toContain('data-variant="subtle"')
        ->toContain('bg-gray-500/10');
});

it('applies ghost variant styling', function () {
    $html = Blade::render('<ui:button variant="ghost">Ghost</ui:button>');

    expect($html)
        ->toContain('data-variant="ghost"')
        ->toContain('bg-transparent');
});

it('applies outline variant styling', function () {
    $html = Blade::render('<ui:button variant="outline">Outline</ui:button>');

    expect($html)
        ->toContain('data-variant="outline"')
        ->toContain('border-gray-100');
});

it('applies outline-info variant styling', function () {
    $html = Blade::render('<ui:button variant="outline-info">Outline Info</ui:button>');

    expect($html)
        ->toContain('data-variant="outline-info"')
        ->toContain('text-cyan-600');
});

it('applies outline-success variant styling', function () {
    $html = Blade::render('<ui:button variant="outline-success">Outline Success</ui:button>');

    expect($html)
        ->toContain('data-variant="outline-success"')
        ->toContain('text-green-600');
});

it('applies outline-warning variant styling', function () {
    $html = Blade::render('<ui:button variant="outline-warning">Outline Warning</ui:button>');

    expect($html)
        ->toContain('data-variant="outline-warning"')
        ->toContain('text-amber-600');
});

it('applies outline-danger variant styling', function () {
    $html = Blade::render('<ui:button variant="outline-danger">Outline Danger</ui:button>');

    expect($html)
        ->toContain('data-variant="outline-danger"')
        ->toContain('text-red-600');
});

it('applies xs size variant', function () {
    $html = Blade::render('<ui:button size="xs">XS</ui:button>');

    expect($html)->toContain('min-h-6');
});

it('applies sm size variant', function () {
    $html = Blade::render('<ui:button size="sm">SM</ui:button>');

    expect($html)->toContain('min-h-8');
});

it('applies md size variant (default)', function () {
    $html = Blade::render('<ui:button size="md">MD</ui:button>');

    expect($html)->toContain('min-h-10');
});

it('applies lg size variant', function () {
    $html = Blade::render('<ui:button size="lg">LG</ui:button>');

    expect($html)->toContain('min-h-12');
});

it('renders leading icon', function () {
    $html = Blade::render('<ui:button icon="search">Search</ui:button>');

    expect($html)
        ->toContain('<svg')
        ->toContain('icon-start');
});

it('renders trailing icon', function () {
    $html = Blade::render('<ui:button icon:end="arrow-right">Next</ui:button>');

    expect($html)
        ->toContain('<svg')
        ->toContain('icon-end');
});

it('renders icon-only button with square aspect', function () {
    $html = Blade::render('<ui:button icon="plus" />');

    expect($html)
        ->toContain('aspect-square')
        ->toContain('<svg');
});

it('renders square button when prop is set', function () {
    $html = Blade::render('<ui:button square>X</ui:button>');

    expect($html)->toContain('aspect-square');
});

it('shows loading state', function () {
    $html = Blade::render('<ui:button loading>Loading</ui:button>');

    expect($html)
        ->toContain('aria-busy="true"')
        ->toContain('data-loading')
        ->toContain('pointer-events-none');
});

it('handles disabled state on button', function () {
    $html = Blade::render('<ui:button disabled>Disabled</ui:button>');

    expect($html)->toContain('disabled');
});

it('handles disabled state on link', function () {
    $html = Blade::render('<ui:button href="/test" disabled>Disabled Link</ui:button>');

    expect($html)
        ->toContain('aria-disabled="true"')
        ->toContain('tabindex="-1"')
        ->toContain('pointer-events-none');
});

it('shows active state', function () {
    $html = Blade::render('<ui:button active>Active</ui:button>');

    expect($html)->toContain('data-active');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:button type="submit" data-test="value">Submit</ui:button>');

    expect($html)
        ->toContain('type="submit"')
        ->toContain('data-test="value"');
});

it('has data-button attribute', function () {
    $html = Blade::render('<ui:button>Test</ui:button>');

    expect($html)->toContain('data-button');
});

it('renders ai variant with wrapper', function () {
    $html = Blade::render('<ui:button variant="ai">AI Button</ui:button>');

    expect($html)
        ->toContain('data-variant="ai"')
        ->toContain('group/ai')
        ->toContain('rounded-full');
});
