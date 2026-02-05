<?php

use Illuminate\Support\Facades\Blade;

it('renders a basic textarea', function () {
    $html = Blade::render('<ui:textarea name="content" />');

    expect($html)
        ->toContain('<textarea')
        ->toContain('name="content"')
        ->toContain('data-control');
});

it('renders with label when provided', function () {
    $html = Blade::render('<ui:textarea name="content" label="Description" />');

    expect($html)
        ->toContain('Description')
        ->toContain('<label')
        ->toContain('for=');
});

it('renders with hint when provided', function () {
    $html = Blade::render('<ui:textarea name="content" label="Description" hint="Enter a detailed description" />');

    expect($html)->toContain('Enter a detailed description');
});

it('renders with placeholder', function () {
    $html = Blade::render('<ui:textarea name="content" placeholder="Enter your text..." />');

    expect($html)->toContain('placeholder="Enter your text..."');
});

it('applies sm size variant', function () {
    $html = Blade::render('<ui:textarea name="content" size="sm" />');

    expect($html)
        ->toContain('min-h-20')
        ->toContain('text-xs');
});

it('applies md size variant (default)', function () {
    $html = Blade::render('<ui:textarea name="content" size="md" />');

    expect($html)
        ->toContain('min-h-32')
        ->toContain('text-sm');
});

it('applies lg size variant', function () {
    $html = Blade::render('<ui:textarea name="content" size="lg" />');

    expect($html)
        ->toContain('min-h-40')
        ->toContain('text-base');
});

it('applies rows attribute', function () {
    $html = Blade::render('<ui:textarea name="content" rows="5" />');

    expect($html)->toContain('rows="5"');
});

it('handles auto-resize by default', function () {
    $html = Blade::render('<ui:textarea name="content" />');

    expect($html)
        ->toContain('x-data')
        ->toContain('x-init="resize()"')
        ->toContain('x-on:input="resize()"')
        ->toContain('max-h-96');
});

it('disables auto-resize when prop is false', function () {
    $html = Blade::render('<ui:textarea name="content" :autoResize="false" />');

    expect($html)
        ->not->toContain('x-data')
        ->not->toContain('x-init')
        ->not->toContain('max-h-96');
});

it('enables manual resize when prop is true', function () {
    $html = Blade::render('<ui:textarea name="content" resize />');

    expect($html)->toContain('resize-y');
});

it('disables resize by default', function () {
    $html = Blade::render('<ui:textarea name="content" />');

    expect($html)->toContain('resize-none');
});

it('generates unique id when not provided', function () {
    $html = Blade::render('<ui:textarea name="content" />');

    expect($html)->toMatch('/id="[^"]+"/');
});

it('uses custom id when provided', function () {
    $html = Blade::render('<ui:textarea name="content" id="custom-textarea-id" />');

    expect($html)->toContain('id="custom-textarea-id"');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:textarea name="content" required disabled maxlength="500" />');

    expect($html)
        ->toContain('required')
        ->toContain('disabled')
        ->toContain('maxlength="500"');
});

it('applies inverted variant styling', function () {
    $html = Blade::render('<ui:textarea name="content" variant="inverted" />');

    expect($html)->toContain('bg-gray-10');
});

it('only renders name attribute when explicitly provided', function () {
    $htmlWithName = Blade::render('<ui:textarea name="content" />');
    $htmlWithoutName = Blade::render('<ui:textarea />');

    expect($htmlWithName)->toContain('name="content"');
    expect($htmlWithoutName)->not->toMatch('/name="[^"]*"/');
});

it('shows error message from error bag', function () {
    $this->withErrors(['content' => 'The content field is required.']);

    $html = Blade::render('<ui:textarea name="content" label="Content" />');

    expect($html)
        ->toContain('The content field is required.')
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('shows error styling without label', function () {
    $this->withErrors(['content' => 'Invalid content']);

    $html = Blade::render('<ui:textarea name="content" />');

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('renders slot content as initial value', function () {
    $html = Blade::render('<ui:textarea name="content">Initial text content</ui:textarea>');

    expect($html)->toContain('Initial text content');
});
