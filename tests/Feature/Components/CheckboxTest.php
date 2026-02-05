<?php

use Illuminate\Support\Facades\Blade;

it('renders a basic checkbox', function () {
    $html = Blade::render('<ui:checkbox name="terms" />');

    expect($html)
        ->toContain('<input')
        ->toContain('type="checkbox"')
        ->toContain('name="terms"');
});

it('renders with label', function () {
    $html = Blade::render('<ui:checkbox name="terms" label="I agree to the terms" />');

    expect($html)
        ->toContain('I agree to the terms')
        ->toContain('<label');
});

it('renders with description', function () {
    $html = Blade::render('<ui:checkbox name="newsletter" label="Newsletter" description="Receive weekly updates" />');

    expect($html)
        ->toContain('Newsletter')
        ->toContain('Receive weekly updates');
});

it('handles indeterminate state', function () {
    $html = Blade::render('<ui:checkbox name="select-all" :indeterminate="true" />');

    expect($html)
        ->toContain('x-init="$el.indeterminate = true"');
});

it('applies size variants', function () {
    $htmlSm = Blade::render('<ui:checkbox name="terms" size="sm" />');
    $htmlMd = Blade::render('<ui:checkbox name="terms" size="md" />');
    $htmlLg = Blade::render('<ui:checkbox name="terms" size="lg" />');

    // Size sm has size-4, md has size-5, lg has size-6
    expect($htmlSm)->toContain('size-4');
    expect($htmlMd)->toContain('size-5');
    expect($htmlLg)->toContain('size-6');
});

it('generates unique id when not provided', function () {
    $html = Blade::render('<ui:checkbox name="terms" />');

    expect($html)->toMatch('/id="[^"]+"/');
});

it('uses custom id when provided', function () {
    $html = Blade::render('<ui:checkbox name="terms" id="custom-terms-id" />');

    expect($html)
        ->toContain('id="custom-terms-id"');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:checkbox name="terms" required disabled />');

    expect($html)
        ->toContain('required')
        ->toContain('disabled');
});

it('passes through checked attribute', function () {
    $html = Blade::render('<ui:checkbox name="terms" checked />');

    expect($html)->toContain('checked');
});

it('renders with data-checkbox attribute', function () {
    $html = Blade::render('<ui:checkbox name="terms" />');

    expect($html)->toContain('data-checkbox');
});

it('renders with data-control attribute', function () {
    $html = Blade::render('<ui:checkbox name="terms" />');

    expect($html)->toContain('data-control');
});

it('only renders name attribute when explicitly provided', function () {
    $htmlWithName = Blade::render('<ui:checkbox name="terms" />');
    $htmlWithoutName = Blade::render('<ui:checkbox />');

    expect($htmlWithName)->toContain('name="terms"');
    // Without name prop, name attribute should not appear
    expect($htmlWithoutName)->not->toMatch('/<input[^>]*name="[^"]*"/');
});

it('applies label text size based on size variant', function () {
    $htmlSm = Blade::render('<ui:checkbox name="terms" size="sm" label="Terms" />');
    $htmlMd = Blade::render('<ui:checkbox name="terms" size="md" label="Terms" />');
    $htmlLg = Blade::render('<ui:checkbox name="terms" size="lg" label="Terms" />');

    expect($htmlSm)->toContain('text-xs');
    expect($htmlMd)->toContain('text-sm');
    expect($htmlLg)->toContain('text-base');
});

it('shows error message from error bag', function () {
    $this->withErrors(['terms' => 'You must accept the terms.']);

    $html = Blade::render('<ui:checkbox name="terms" label="I agree" />');

    expect($html)
        ->toContain('You must accept the terms.')
        ->toContain('aria-invalid="true"')
        ->toContain('role="alert"');
});
