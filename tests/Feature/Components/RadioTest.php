<?php

use Illuminate\Support\Facades\Blade;

it('renders a basic radio', function () {
    $html = Blade::render('<ui:radio name="gender" value="male" />');

    expect($html)
        ->toContain('<input')
        ->toContain('type="radio"')
        ->toContain('name="gender"')
        ->toContain('value="male"');
});

it('renders with label', function () {
    $html = Blade::render('<ui:radio name="gender" value="male" label="Male" />');

    expect($html)
        ->toContain('Male')
        ->toContain('<label');
});

it('renders with description', function () {
    $html = Blade::render('<ui:radio name="plan" value="pro" label="Pro Plan" description="$99/month" />');

    expect($html)
        ->toContain('Pro Plan')
        ->toContain('$99/month');
});

it('applies size variants', function () {
    $htmlSm = Blade::render('<ui:radio name="size" value="s" size="sm" />');
    $htmlMd = Blade::render('<ui:radio name="size" value="m" size="md" />');
    $htmlLg = Blade::render('<ui:radio name="size" value="l" size="lg" />');

    // Size sm has size-4, md has size-5, lg has size-6
    expect($htmlSm)->toContain('size-4');
    expect($htmlMd)->toContain('size-5');
    expect($htmlLg)->toContain('size-6');
});

it('generates unique id when not provided', function () {
    $html = Blade::render('<ui:radio name="gender" value="male" />');

    expect($html)->toMatch('/id="[^"]+"/');
});

it('uses custom id when provided', function () {
    $html = Blade::render('<ui:radio name="gender" value="male" id="custom-radio-id" />');

    expect($html)
        ->toContain('id="custom-radio-id"');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:radio name="gender" value="male" required disabled />');

    expect($html)
        ->toContain('required')
        ->toContain('disabled');
});

it('passes through checked attribute', function () {
    $html = Blade::render('<ui:radio name="gender" value="male" checked />');

    expect($html)->toContain('checked');
});

it('renders with data-radio attribute', function () {
    $html = Blade::render('<ui:radio name="gender" value="male" />');

    expect($html)->toContain('data-radio');
});

it('renders with data-control attribute', function () {
    $html = Blade::render('<ui:radio name="gender" value="male" />');

    expect($html)->toContain('data-control');
});

it('renders radio group correctly', function () {
    $html = Blade::render('
        <div>
            <ui:radio name="color" value="red" label="Red" />
            <ui:radio name="color" value="blue" label="Blue" />
            <ui:radio name="color" value="green" label="Green" />
        </div>
    ');

    // All radios should have the same name
    expect($html)
        ->toContain('name="color"')
        ->toContain('value="red"')
        ->toContain('value="blue"')
        ->toContain('value="green"')
        ->toContain('Red')
        ->toContain('Blue')
        ->toContain('Green');

    // Count occurrences of name="color"
    $count = substr_count($html, 'name="color"');
    expect($count)->toBe(3);
});

it('only renders name attribute when explicitly provided', function () {
    $htmlWithName = Blade::render('<ui:radio name="gender" value="male" />');
    $htmlWithoutName = Blade::render('<ui:radio value="male" />');

    expect($htmlWithName)->toContain('name="gender"');
    // Without name prop, name attribute should not appear
    expect($htmlWithoutName)->not->toMatch('/<input[^>]*name="[^"]*"/');
});

it('applies label text size based on size variant', function () {
    $htmlSm = Blade::render('<ui:radio name="size" value="s" size="sm" label="Small" />');
    $htmlMd = Blade::render('<ui:radio name="size" value="m" size="md" label="Medium" />');
    $htmlLg = Blade::render('<ui:radio name="size" value="l" size="lg" label="Large" />');

    expect($htmlSm)->toContain('text-xs');
    expect($htmlMd)->toContain('text-sm');
    expect($htmlLg)->toContain('text-base');
});

it('has rounded-full class for circular shape', function () {
    $html = Blade::render('<ui:radio name="gender" value="male" />');

    expect($html)->toContain('rounded-full');
});

it('shows error message from error bag', function () {
    $this->withErrors(['gender' => 'Please select a gender.']);

    $html = Blade::render('<ui:radio name="gender" value="male" label="Male" />');

    expect($html)
        ->toContain('Please select a gender.')
        ->toContain('aria-invalid="true"')
        ->toContain('role="alert"');
});
