<?php

use Illuminate\Support\Facades\Blade;

it('renders a basic input', function () {
    $html = Blade::render('<ui:input name="email" />');

    expect($html)
        ->toContain('<input')
        ->toContain('type="text"')
        ->toContain('name="email"');
});

it('renders with custom type', function () {
    $html = Blade::render('<ui:input name="password" type="password" />');

    expect($html)
        ->toContain('type="password"')
        ->toContain('name="password"');
});

it('renders with label when provided', function () {
    $html = Blade::render('<ui:input name="email" label="Email Address" />');

    expect($html)
        ->toContain('Email Address')
        ->toContain('<label')
        ->toContain('for=');
});

it('renders with hint when provided', function () {
    $html = Blade::render('<ui:input name="email" label="Email" hint="We will never share your email" />');

    expect($html)
        ->toContain('We will never share your email');
});

it('renders with placeholder', function () {
    $html = Blade::render('<ui:input name="email" placeholder="Enter your email" />');

    expect($html)
        ->toContain('placeholder="Enter your email"');
});

it('applies size variants', function () {
    $htmlSm = Blade::render('<ui:input name="email" size="sm" />');
    $htmlMd = Blade::render('<ui:input name="email" size="md" />');
    $htmlLg = Blade::render('<ui:input name="email" size="lg" />');

    // Size sm has h-8, md has h-10, lg has h-12
    expect($htmlSm)->toContain('h-8');
    expect($htmlMd)->toContain('h-10');
    expect($htmlLg)->toContain('h-12');
});

it('renders icon when provided', function () {
    $html = Blade::render('<ui:input name="search" icon="search" />');

    expect($html)
        ->toContain('<svg') // Icon should be rendered
        ->toContain('pl-10'); // Left padding for icon
});

it('renders end icon when provided', function () {
    $html = Blade::render('<ui:input name="password" icon:end="eye" />');

    expect($html)
        ->toContain('<svg')
        ->toContain('pr-10'); // Right padding for end icon
});

it('renders addon when provided', function () {
    $html = Blade::render('<ui:input name="website" addon="https://" />');

    expect($html)
        ->toContain('https://');
});

it('generates unique id when not provided', function () {
    $html = Blade::render('<ui:input name="email" />');

    // Should contain an id attribute
    expect($html)->toMatch('/id="[^"]+"/');
});

it('uses custom id when provided', function () {
    $html = Blade::render('<ui:input name="email" id="custom-email-id" />');

    expect($html)
        ->toContain('id="custom-email-id"');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:input name="email" required disabled maxlength="100" />');

    expect($html)
        ->toContain('required')
        ->toContain('disabled')
        ->toContain('maxlength="100"');
});

it('renders with data-control attribute', function () {
    $html = Blade::render('<ui:input name="email" />');

    expect($html)->toContain('data-control');
});

it('applies inverted variant styling', function () {
    $html = Blade::render('<ui:input name="email" variant="inverted" />');

    expect($html)->toContain('bg-gray-10');
});

it('only renders name attribute when explicitly provided', function () {
    $htmlWithName = Blade::render('<ui:input name="email" />');
    $htmlWithoutName = Blade::render('<ui:input />');

    expect($htmlWithName)->toContain('name="email"');
    // Without name prop, name attribute should not appear
    expect($htmlWithoutName)->not->toMatch('/name="[^"]*"/');
});

it('shows error message from error bag', function () {
    $this->withErrors(['email' => 'The email field is required.']);

    $html = Blade::render('<ui:input name="email" label="Email" />');

    expect($html)
        ->toContain('The email field is required.')
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('shows error styling without label', function () {
    $this->withErrors(['email' => 'Invalid email address']);

    $html = Blade::render('<ui:input name="email" />');

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});
