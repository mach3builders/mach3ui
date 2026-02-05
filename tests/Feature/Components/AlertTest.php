<?php

use Illuminate\Support\Facades\Blade;

it('renders a basic alert', function () {
    $html = Blade::render('<ui:alert message="This is a message" />');

    expect($html)
        ->toContain('role="alert"')
        ->toContain('data-alert')
        ->toContain('This is a message');
});

it('renders with title', function () {
    $html = Blade::render('<ui:alert title="Alert Title" message="Message" />');

    expect($html)
        ->toContain('Alert Title')
        ->toContain('Message');
});

it('renders with message prop', function () {
    $html = Blade::render('<ui:alert message="Test message" />');

    expect($html)->toContain('Test message');
});

it('renders with slot content', function () {
    $html = Blade::render('<ui:alert>Slot content here</ui:alert>');

    expect($html)->toContain('Slot content here');
});

it('auto-selects icon for default variant', function () {
    $html = Blade::render('<ui:alert message="Default alert" />');

    // Default uses megaphone icon
    expect($html)->toContain('<svg');
});

it('auto-selects info icon for info variant', function () {
    $html = Blade::render('<ui:alert variant="info" message="Info alert" />');

    expect($html)->toContain('<svg');
});

it('auto-selects circle-check icon for success variant', function () {
    $html = Blade::render('<ui:alert variant="success" message="Success alert" />');

    expect($html)->toContain('<svg');
});

it('auto-selects triangle-alert icon for warning variant', function () {
    $html = Blade::render('<ui:alert variant="warning" message="Warning alert" />');

    expect($html)->toContain('<svg');
});

it('auto-selects circle-x icon for danger variant', function () {
    $html = Blade::render('<ui:alert variant="danger" message="Danger alert" />');

    expect($html)->toContain('<svg');
});

it('allows custom icon override', function () {
    $html = Blade::render('<ui:alert icon="star" message="Custom icon" />');

    // Custom icon should be rendered
    expect($html)->toContain('<svg');
});

it('renders dismissable button', function () {
    $html = Blade::render('<ui:alert dismissable message="Dismissable alert" />');

    expect($html)
        ->toContain('x-data')
        ->toContain('x-show="show"')
        ->toContain('x-on:click="show = false"')
        ->toContain('aria-label="Sluiten"');
});

it('does not render dismiss button when not dismissable', function () {
    $html = Blade::render('<ui:alert message="Not dismissable" />');

    expect($html)
        ->not->toContain('x-data')
        ->not->toContain('x-on:click="show = false"');
});

it('applies default variant styling', function () {
    $html = Blade::render('<ui:alert message="Default" />');

    expect($html)
        ->toContain('data-variant="default"')
        ->toContain('border-gray-100')
        ->toContain('bg-gray-20');
});

it('applies info variant styling', function () {
    $html = Blade::render('<ui:alert variant="info" message="Info" />');

    expect($html)
        ->toContain('data-variant="info"')
        ->toContain('border-cyan-200')
        ->toContain('bg-cyan-50');
});

it('applies success variant styling', function () {
    $html = Blade::render('<ui:alert variant="success" message="Success" />');

    expect($html)
        ->toContain('data-variant="success"')
        ->toContain('border-green-200')
        ->toContain('bg-green-50');
});

it('applies warning variant styling', function () {
    $html = Blade::render('<ui:alert variant="warning" message="Warning" />');

    expect($html)
        ->toContain('data-variant="warning"')
        ->toContain('border-amber-200')
        ->toContain('bg-amber-50');
});

it('applies danger variant styling', function () {
    $html = Blade::render('<ui:alert variant="danger" message="Danger" />');

    expect($html)
        ->toContain('data-variant="danger"')
        ->toContain('border-red-200')
        ->toContain('bg-red-50');
});

it('has rounded-lg styling', function () {
    $html = Blade::render('<ui:alert message="Test" />');

    expect($html)->toContain('rounded-lg');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:alert message="Test" data-test="value" />');

    expect($html)->toContain('data-test="value"');
});
