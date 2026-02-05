<?php

use Illuminate\Support\Facades\Blade;

it('renders a basic select', function () {
    $html = Blade::render('<ui:select name="country"><option value="nl">Netherlands</option></ui:select>');

    expect($html)
        ->toContain('<select')
        ->toContain('name="country"')
        ->toContain('<option')
        ->toContain('Netherlands');
});

it('renders options from slot', function () {
    $html = Blade::render('
        <ui:select name="color">
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="green">Green</option>
        </ui:select>
    ');

    expect($html)
        ->toContain('value="red"')
        ->toContain('value="blue"')
        ->toContain('value="green"')
        ->toContain('Red')
        ->toContain('Blue')
        ->toContain('Green');
});

it('renders placeholder option', function () {
    $html = Blade::render('<ui:select name="country" placeholder="Select a country" />');

    expect($html)
        ->toContain('Select a country')
        ->toContain('disabled')
        ->toContain('selected')
        ->toContain('class="placeholder"');
});

it('renders with label when provided', function () {
    $html = Blade::render('<ui:select name="country" label="Country"><option>NL</option></ui:select>');

    expect($html)
        ->toContain('Country')
        ->toContain('<label');
});

it('renders with hint when provided', function () {
    $html = Blade::render('<ui:select name="country" label="Country" hint="Select your country of residence"><option>NL</option></ui:select>');

    expect($html)
        ->toContain('Select your country of residence');
});

it('applies size variants', function () {
    $htmlSm = Blade::render('<ui:select name="country" size="sm"><option>NL</option></ui:select>');
    $htmlMd = Blade::render('<ui:select name="country" size="md"><option>NL</option></ui:select>');
    $htmlLg = Blade::render('<ui:select name="country" size="lg"><option>NL</option></ui:select>');

    // Size sm has h-8, md has h-10, lg has h-12
    expect($htmlSm)->toContain('h-8');
    expect($htmlMd)->toContain('h-10');
    expect($htmlLg)->toContain('h-12');
});

it('generates unique id when not provided', function () {
    $html = Blade::render('<ui:select name="country"><option>NL</option></ui:select>');

    expect($html)->toMatch('/id="[^"]+"/');
});

it('uses custom id when provided', function () {
    $html = Blade::render('<ui:select name="country" id="custom-country-id"><option>NL</option></ui:select>');

    expect($html)
        ->toContain('id="custom-country-id"');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:select name="country" required disabled><option>NL</option></ui:select>');

    expect($html)
        ->toContain('required')
        ->toContain('disabled');
});

it('renders with data-control attribute', function () {
    $html = Blade::render('<ui:select name="country"><option>NL</option></ui:select>');

    expect($html)->toContain('data-control');
});

it('applies inverted variant styling', function () {
    $html = Blade::render('<ui:select name="country" variant="inverted"><option>NL</option></ui:select>');

    expect($html)->toContain('bg-gray-10');
});

it('only renders name attribute when explicitly provided', function () {
    $htmlWithName = Blade::render('<ui:select name="country"><option>NL</option></ui:select>');
    $htmlWithoutName = Blade::render('<ui:select><option>NL</option></ui:select>');

    expect($htmlWithName)->toContain('name="country"');
    // Without name prop, name attribute should not appear on select
    expect($htmlWithoutName)->not->toMatch('/<select[^>]*name="[^"]*"/');
});

it('shows error message from error bag', function () {
    $this->withErrors(['country' => 'Please select a country.']);

    $html = Blade::render('<ui:select name="country" label="Country"><option>NL</option></ui:select>');

    expect($html)
        ->toContain('Please select a country.')
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('shows error styling without label', function () {
    $this->withErrors(['country' => 'Invalid selection']);

    $html = Blade::render('<ui:select name="country"><option>NL</option></ui:select>');

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});
