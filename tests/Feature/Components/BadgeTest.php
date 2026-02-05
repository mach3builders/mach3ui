<?php

use Illuminate\Support\Facades\Blade;

it('renders a basic badge', function () {
    $html = Blade::render('<ui:badge>Test</ui:badge>');

    expect($html)
        ->toContain('<span')
        ->toContain('Test')
        ->toContain('data-badge');
});

it('renders with label prop', function () {
    $html = Blade::render('<ui:badge label="Status" />');

    expect($html)->toContain('Status');
});

it('uses slot as label fallback', function () {
    $html = Blade::render('<ui:badge>Slot Content</ui:badge>');

    expect($html)->toContain('Slot Content');
});

it('prefers label prop over slot', function () {
    $html = Blade::render('<ui:badge label="Label Wins">Slot Loses</ui:badge>');

    // Label prop takes precedence, slot is ignored
    expect($html)
        ->toContain('Label Wins')
        ->not->toContain('Slot Loses');
});

it('renders with icon', function () {
    $html = Blade::render('<ui:badge icon="star">Featured</ui:badge>');

    expect($html)
        ->toContain('<svg')
        ->toContain('data-badge-icon')
        ->toContain('pl-1.5'); // Icon padding
});

it('renders with href', function () {
    $html = Blade::render('<ui:badge href="https://example.com">Link</ui:badge>');

    expect($html)
        ->toContain('href="https://example.com"')
        ->toContain('target="_blank"')
        ->toContain('rel="noopener noreferrer"')
        ->toContain('data-badge-link')
        ->toContain('pr-1'); // Href padding
});

it('applies default variant styling', function () {
    $html = Blade::render('<ui:badge>Default</ui:badge>');

    expect($html)
        ->toContain('data-variant="default"')
        ->toContain('bg-gray-900');
});

it('applies primary variant styling', function () {
    $html = Blade::render('<ui:badge variant="primary">Primary</ui:badge>');

    expect($html)
        ->toContain('data-variant="primary"')
        ->toContain('bg-blue-100')
        ->toContain('text-blue-800');
});

it('applies secondary variant styling', function () {
    $html = Blade::render('<ui:badge variant="secondary">Secondary</ui:badge>');

    expect($html)
        ->toContain('data-variant="secondary"')
        ->toContain('bg-gray-60');
});

it('applies outline variant styling', function () {
    $html = Blade::render('<ui:badge variant="outline">Outline</ui:badge>');

    expect($html)
        ->toContain('data-variant="outline"')
        ->toContain('border-gray-120')
        ->toContain('bg-transparent');
});

it('applies info variant styling', function () {
    $html = Blade::render('<ui:badge variant="info">Info</ui:badge>');

    expect($html)
        ->toContain('data-variant="info"')
        ->toContain('bg-cyan-100')
        ->toContain('text-cyan-800');
});

it('applies success variant styling', function () {
    $html = Blade::render('<ui:badge variant="success">Success</ui:badge>');

    expect($html)
        ->toContain('data-variant="success"')
        ->toContain('bg-green-100')
        ->toContain('text-green-800');
});

it('applies warning variant styling', function () {
    $html = Blade::render('<ui:badge variant="warning">Warning</ui:badge>');

    expect($html)
        ->toContain('data-variant="warning"')
        ->toContain('bg-amber-100')
        ->toContain('text-amber-800');
});

it('applies danger variant styling', function () {
    $html = Blade::render('<ui:badge variant="danger">Danger</ui:badge>');

    expect($html)
        ->toContain('data-variant="danger"')
        ->toContain('bg-red-100')
        ->toContain('text-red-800');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:badge data-test="value">Test</ui:badge>');

    expect($html)->toContain('data-test="value"');
});

it('has rounded-full styling', function () {
    $html = Blade::render('<ui:badge>Test</ui:badge>');

    expect($html)->toContain('rounded-full');
});
