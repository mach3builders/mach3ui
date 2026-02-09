<?php

use Illuminate\Support\Facades\Blade;

// ============================================================================
// INPUT
// ============================================================================

it('restores old value for text input', function () {
    $this->withOldInput(['email' => 'john@example.com']);

    $html = Blade::render('<ui:input name="email" label="Email" />');

    expect($html)->toContain('value="john@example.com"');
});

it('does not restore old value for password input', function () {
    $this->withOldInput(['password' => 'secret123']);

    $html = Blade::render('<ui:input name="password" type="password" label="Password" />');

    expect($html)->not->toContain('secret123');
});

it('does not restore old value for input when no old input exists', function () {
    $html = Blade::render('<ui:input name="email" label="Email" />');

    expect($html)->not->toMatch('/value="[^"]+"/');
});

it('does not override explicit value attribute on input', function () {
    $this->withOldInput(['email' => 'old@example.com']);

    $html = Blade::render('<ui:input name="email" label="Email" value="explicit@example.com" />');

    expect($html)
        ->toContain('value="explicit@example.com"')
        ->not->toContain('old@example.com');
});

it('does not restore old value for input with wire:model', function () {
    $this->withOldInput(['email' => 'old@example.com']);

    $html = Blade::render('<ui:input wire:model="email" label="Email" />');

    expect($html)->not->toContain('old@example.com');
});

it('does not restore old value for input with x-model', function () {
    $this->withOldInput(['email' => 'old@example.com']);

    $html = Blade::render('<ui:input x-model="email" label="Email" />');

    expect($html)->not->toContain('old@example.com');
});

// ============================================================================
// TEXTAREA
// ============================================================================

it('restores old value for textarea', function () {
    $this->withOldInput(['bio' => 'My bio text']);

    $html = Blade::render('<ui:textarea name="bio" label="Bio" />');

    expect($html)->toContain('My bio text');
});

it('does not restore old value for textarea when no old input exists', function () {
    $html = Blade::render('<ui:textarea name="bio" label="Bio" />');

    expect($html)->toMatch('/<textarea[^>]*><\/textarea>/s');
});

it('slot content takes precedence over old value in textarea', function () {
    $this->withOldInput(['bio' => 'Old bio']);

    $html = Blade::render('<ui:textarea name="bio" label="Bio">Explicit content</ui:textarea>');

    expect($html)
        ->toContain('Explicit content')
        ->not->toContain('Old bio');
});

it('does not restore old value for textarea with wire:model', function () {
    $this->withOldInput(['bio' => 'Old bio']);

    $html = Blade::render('<ui:textarea wire:model="bio" label="Bio" />');

    expect($html)->not->toContain('Old bio');
});

// ============================================================================
// SELECT
// ============================================================================

it('restores old value for select via x-init', function () {
    $this->withOldInput(['country' => 'be']);

    $html = Blade::render('
        <ui:select name="country" label="Country">
            <option value="nl">Netherlands</option>
            <option value="be">Belgium</option>
        </ui:select>
    ');

    expect($html)->toContain('x-init');
});

it('does not add x-init for select when no old input exists', function () {
    $html = Blade::render('
        <ui:select name="country" label="Country">
            <option value="nl">Netherlands</option>
        </ui:select>
    ');

    expect($html)->not->toContain('x-init');
});

it('does not restore old value for select with wire:model', function () {
    $this->withOldInput(['country' => 'be']);

    $html = Blade::render('
        <ui:select wire:model="country" label="Country">
            <option value="nl">Netherlands</option>
            <option value="be">Belgium</option>
        </ui:select>
    ');

    expect($html)->not->toContain('x-init');
});

// ============================================================================
// SELECTBOX
// ============================================================================

it('restores old value for selectbox', function () {
    $this->withOldInput(['country' => 'be']);

    $html = Blade::render('
        <ui:selectbox name="country" label="Country">
            <ui:selectbox.option value="nl">Netherlands</ui:selectbox.option>
            <ui:selectbox.option value="be">Belgium</ui:selectbox.option>
        </ui:selectbox>
    ');

    expect($html)->toContain("'be'");
});

it('does not restore old value for selectbox with explicit value', function () {
    $this->withOldInput(['country' => 'be']);

    $html = Blade::render('
        <ui:selectbox name="country" label="Country" value="nl">
            <ui:selectbox.option value="nl">Netherlands</ui:selectbox.option>
            <ui:selectbox.option value="be">Belgium</ui:selectbox.option>
        </ui:selectbox>
    ');

    expect($html)->toContain("'nl'");
});

// ============================================================================
// CHECKBOX
// ============================================================================

it('restores checked state for checkbox from old input', function () {
    $this->withOldInput(['terms' => '1']);

    $html = Blade::render('<ui:checkbox name="terms" label="I agree" />');

    expect($html)->toMatch('/<input[^>]* checked[\s>=]/');
});

it('does not check checkbox when old input is absent', function () {
    $html = Blade::render('<ui:checkbox name="terms" label="I agree" />');

    expect($html)->not->toMatch('/<input[^>]* checked[\s>=]/');
});

it('does not restore checked for checkbox with wire:model', function () {
    $this->withOldInput(['terms' => '1']);

    $html = Blade::render('<ui:checkbox wire:model="terms" label="I agree" />');

    expect($html)->not->toMatch('/<input[^>]* checked[\s>=]/');
});

// ============================================================================
// RADIO
// ============================================================================

it('restores checked state for radio when old value matches', function () {
    $this->withOldInput(['color' => 'blue']);

    $html = Blade::render('<ui:radio name="color" value="blue" label="Blue" />');

    expect($html)->toMatch('/<input[^>]* checked[\s>=]/');
});

it('does not check radio when old value does not match', function () {
    $this->withOldInput(['color' => 'red']);

    $html = Blade::render('<ui:radio name="color" value="blue" label="Blue" />');

    expect($html)->not->toMatch('/<input[^>]* checked[\s>=]/');
});

it('does not restore checked for radio with wire:model', function () {
    $this->withOldInput(['color' => 'blue']);

    $html = Blade::render('<ui:radio wire:model="color" value="blue" label="Blue" />');

    expect($html)->not->toMatch('/<input[^>]* checked[\s>=]/');
});
