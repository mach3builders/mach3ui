<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// FIELD COMPONENT
// =============================================================================

it('renders a basic field wrapper', function () {
    $html = Blade::render('<ui:field>Content</ui:field>');

    expect($html)
        ->toContain('Content')
        ->toContain('data-field');
});

it('renders field with block variant by default', function () {
    $html = Blade::render('<ui:field>Content</ui:field>');

    expect($html)
        ->toContain('data-variant="block"')
        ->toContain('flex flex-col');
});

it('renders field with inline variant', function () {
    $html = Blade::render('<ui:field variant="inline">Content</ui:field>');

    expect($html)
        ->toContain('data-variant="inline"')
        ->toContain('grid');
});

it('shares id prop to child components via @aware', function () {
    // The id prop is used for @aware sharing with child labels, not as HTML attribute
    $html = Blade::render('<ui:field id="email"><ui:label>Email</ui:label></ui:field>');

    // The label should receive the id via @aware and use it for 'for' attribute
    expect($html)->toContain('for="email"');
});

it('passes through data-* attributes on field', function () {
    $html = Blade::render('<ui:field data-testid="test-field">Content</ui:field>');

    expect($html)->toContain('data-testid="test-field"');
});

it('merges custom classes on field', function () {
    $html = Blade::render('<ui:field class="mt-4">Content</ui:field>');

    expect($html)->toContain('mt-4');
});

// =============================================================================
// LABEL COMPONENT
// =============================================================================

it('renders a basic label', function () {
    $html = Blade::render('<ui:label>Email Address</ui:label>');

    expect($html)
        ->toContain('<label')
        ->toContain('Email Address')
        ->toContain('data-label');
});

it('renders label with for attribute', function () {
    $html = Blade::render('<ui:label for="email">Email</ui:label>');

    expect($html)->toContain('for="email"');
});

it('renders label with badge', function () {
    $html = Blade::render('<ui:label badge="Required">Email</ui:label>');

    expect($html)
        ->toContain('Email')
        ->toContain('Required');
});

it('inherits id from parent field via @aware', function () {
    $html = Blade::render('<ui:field id="email"><ui:label>Email</ui:label></ui:field>');

    expect($html)->toContain('for="email"');
});

it('explicit for attribute overrides inherited id on label', function () {
    $html = Blade::render('<ui:field id="email"><ui:label for="custom-id">Email</ui:label></ui:field>');

    expect($html)->toContain('for="custom-id"');
});

it('passes through data-* attributes on label', function () {
    $html = Blade::render('<ui:label data-testid="test-label">Email</ui:label>');

    expect($html)->toContain('data-testid="test-label"');
});

it('merges custom classes on label', function () {
    $html = Blade::render('<ui:label class="font-bold">Email</ui:label>');

    expect($html)->toContain('font-bold');
});

// =============================================================================
// HINT COMPONENT
// =============================================================================

it('renders a basic hint', function () {
    $html = Blade::render('<ui:hint>We will never share your email</ui:hint>');

    expect($html)
        ->toContain('<p')
        ->toContain('We will never share your email')
        ->toContain('data-hint');
});

it('renders hint with icon', function () {
    $html = Blade::render('<ui:hint icon="info">Additional info</ui:hint>');

    expect($html)
        ->toContain('<svg')
        ->toContain('Additional info')
        ->toContain('flex items-center');
});

it('passes through data-* attributes on hint', function () {
    $html = Blade::render('<ui:hint data-testid="test-hint">Help text</ui:hint>');

    expect($html)->toContain('data-testid="test-hint"');
});

it('merges custom classes on hint', function () {
    $html = Blade::render('<ui:hint class="mt-2">Help text</ui:hint>');

    expect($html)->toContain('mt-2');
});

// =============================================================================
// ERROR COMPONENT
// =============================================================================

it('renders error with slot content', function () {
    $html = Blade::render('<ui:error>This field is required</ui:error>');

    expect($html)
        ->toContain('This field is required')
        ->toContain('data-error')
        ->toContain('<svg'); // Error icon
});

it('renders error from error bag', function () {
    $this->withErrors(['email' => 'The email field is required.']);

    $html = Blade::render('<ui:error name="email" />');

    expect($html)
        ->toContain('The email field is required.')
        ->toContain('data-error');
});

it('does not render when no error exists', function () {
    $html = Blade::render('<ui:error name="email" />');

    expect($html)->not->toContain('data-error');
});

it('does not render error from non-matching bag', function () {
    // When errors are in 'default' bag, but we request 'custom' bag, no error shows
    $this->withErrors(['email' => 'Default bag error']);

    $html = Blade::render('<ui:error name="email" bag="custom" />');

    expect($html)->not->toContain('Default bag error');
});

it('slot content takes precedence over error bag', function () {
    $this->withErrors(['email' => 'Bag error']);

    $html = Blade::render('<ui:error name="email">Slot error</ui:error>');

    expect($html)
        ->toContain('Slot error')
        ->not->toContain('Bag error');
});

it('passes through data-* attributes on error', function () {
    $html = Blade::render('<ui:error data-testid="test-error">Error message</ui:error>');

    expect($html)->toContain('data-testid="test-error"');
});

it('merges custom classes on error', function () {
    $html = Blade::render('<ui:error class="mt-2">Error message</ui:error>');

    expect($html)->toContain('mt-2');
});

// =============================================================================
// SWITCH COMPONENT
// =============================================================================

it('renders a basic switch', function () {
    $html = Blade::render('<ui:switch name="notifications" />');

    expect($html)
        ->toContain('<input')
        ->toContain('type="checkbox"')
        ->toContain('name="notifications"')
        ->toContain('role="switch"')
        ->toContain('data-switch')
        ->toContain('data-control');
});

it('renders switch with label', function () {
    $html = Blade::render('<ui:switch name="notifications" label="Enable notifications" />');

    expect($html)
        ->toContain('Enable notifications')
        ->toContain('<label');
});

it('renders switch with description', function () {
    $html = Blade::render('<ui:switch name="notifications" label="Notifications" description="Receive email updates" />');

    expect($html)
        ->toContain('Notifications')
        ->toContain('Receive email updates');
});

it('applies switch size variants', function () {
    $htmlSm = Blade::render('<ui:switch name="test" size="sm" />');
    $htmlMd = Blade::render('<ui:switch name="test" size="md" />');
    $htmlLg = Blade::render('<ui:switch name="test" size="lg" />');

    // Track sizes: sm has h-4 w-7, md has h-5 w-9, lg has h-6 w-11
    expect($htmlSm)->toContain('h-4')->toContain('w-7');
    expect($htmlMd)->toContain('h-5')->toContain('w-9');
    expect($htmlLg)->toContain('h-6')->toContain('w-11');
});

it('generates unique id for switch when not provided', function () {
    $html = Blade::render('<ui:switch name="test" />');

    expect($html)->toMatch('/id="[^"]+"/');
});

it('uses custom id for switch when provided', function () {
    $html = Blade::render('<ui:switch name="test" id="custom-switch-id" />');

    expect($html)->toContain('id="custom-switch-id"');
});

it('passes through additional attributes on switch', function () {
    $html = Blade::render('<ui:switch name="test" disabled />');

    expect($html)->toContain('disabled');
});

it('passes through data-* attributes on switch', function () {
    $html = Blade::render('<ui:switch name="test" data-testid="test-switch" />');

    expect($html)->toContain('data-testid="test-switch"');
});

it('shows error message on switch from error bag', function () {
    $this->withErrors(['notifications' => 'You must enable notifications.']);

    $html = Blade::render('<ui:switch name="notifications" label="Notifications" />');

    expect($html)
        ->toContain('You must enable notifications.')
        ->toContain('aria-invalid="true"')
        ->toContain('role="alert"');
});

it('applies label text size based on switch size variant', function () {
    $htmlSm = Blade::render('<ui:switch name="test" size="sm" label="Label" />');
    $htmlMd = Blade::render('<ui:switch name="test" size="md" label="Label" />');
    $htmlLg = Blade::render('<ui:switch name="test" size="lg" label="Label" />');

    expect($htmlSm)->toContain('text-xs');
    expect($htmlMd)->toContain('text-sm');
    expect($htmlLg)->toContain('text-base');
});

// =============================================================================
// TOGGLE COMPONENT
// =============================================================================

it('renders a basic toggle button', function () {
    $html = Blade::render('<ui:toggle label="Bold" />');

    expect($html)
        ->toContain('<button')
        ->toContain('Bold')
        ->toContain('data-toggle')
        ->toContain('aria-pressed');
});

it('renders toggle with icon', function () {
    $html = Blade::render('<ui:toggle icon="bold" />');

    expect($html)
        ->toContain('<svg')
        ->toContain('data-toggle');
});

it('renders toggle with active icon swap', function () {
    // Use valid lucide icons: star and star-off
    $html = Blade::render('<ui:toggle icon="star" icon:active="star-off" />');

    expect($html)
        ->toContain('x-show="!on"')
        ->toContain('x-show="on"');
});

it('renders toggle with active label swap', function () {
    $html = Blade::render('<ui:toggle label="Mute" label:active="Unmute" />');

    expect($html)
        ->toContain('Mute')
        ->toContain('Unmute')
        ->toContain('x-show="!on"')
        ->toContain('x-show="on"');
});

it('renders toggle with external state variable', function () {
    $html = Blade::render('<ui:toggle label="Toggle" state="isActive" />');

    expect($html)
        ->toContain('x-bind:aria-pressed="isActive.toString()"')
        ->toContain('x-bind:data-active="isActive"');
});

it('renders toggle with initial active state', function () {
    $html = Blade::render('<ui:toggle label="Bold" :active="true" />');

    expect($html)
        ->toContain('aria-pressed="true"')
        ->toContain('on: true');
});

it('applies toggle size variants', function () {
    $htmlSm = Blade::render('<ui:toggle label="Test" size="sm" />');
    $htmlMd = Blade::render('<ui:toggle label="Test" size="md" />');
    $htmlLg = Blade::render('<ui:toggle label="Test" size="lg" />');

    // Button sizes: sm has h-8, md has h-10, lg has h-12
    expect($htmlSm)->toContain('h-8');
    expect($htmlMd)->toContain('h-10');
    expect($htmlLg)->toContain('h-12');
});

it('applies toggle variant styling', function () {
    $htmlDefault = Blade::render('<ui:toggle label="Test" variant="default" />');
    $htmlGhost = Blade::render('<ui:toggle label="Test" variant="ghost" />');

    // Default variant uses bg-white
    expect($htmlDefault)->toContain('bg-white');
    // Ghost variant uses bg-transparent
    expect($htmlGhost)->toContain('bg-transparent');
});

it('renders toggle with slot content', function () {
    $html = Blade::render('<ui:toggle><span class="custom-content">Custom</span></ui:toggle>');

    expect($html)->toContain('custom-content');
});

it('passes through data-* attributes on toggle', function () {
    $html = Blade::render('<ui:toggle label="Test" data-testid="test-toggle" />');

    expect($html)->toContain('data-testid="test-toggle"');
});

it('passes through wire:click on toggle', function () {
    $html = Blade::render('<ui:toggle label="Test" wire:click="toggleSomething" />');

    expect($html)->toContain('wire:click="toggleSomething"');
});

it('renders toggle with icon color', function () {
    $html = Blade::render('<ui:toggle icon="star" icon:color="warning" />');

    expect($html)->toContain('<svg');
});

it('renders toggle with different active icon color', function () {
    $html = Blade::render('<ui:toggle icon="heart" icon:color="default" icon:color:active="danger" />');

    expect($html)
        ->toContain('x-show="!on"')
        ->toContain('x-show="on"');
});

// =============================================================================
// SLIDER COMPONENT
// =============================================================================

it('renders a basic slider', function () {
    $html = Blade::render('<ui:slider />');

    expect($html)
        ->toContain('<input')
        ->toContain('type="range"')
        ->toContain('min="0"')
        ->toContain('max="100"')
        ->toContain('value="50"');
});

it('renders slider with custom min max step value', function () {
    $html = Blade::render('<ui:slider min="10" max="200" step="5" value="75" />');

    expect($html)
        ->toContain('min="10"')
        ->toContain('max="200"')
        ->toContain('step="5"')
        ->toContain('value="75"');
});

it('renders slider with label', function () {
    $html = Blade::render('<ui:slider label="Volume" />');

    expect($html)
        ->toContain('Volume')
        ->toContain('<label')
        ->toContain('data-field');
});

it('renders slider with hint', function () {
    $html = Blade::render('<ui:slider label="Volume" hint="Adjust the volume level" />');

    expect($html)
        ->toContain('Volume')
        ->toContain('Adjust the volume level')
        ->toContain('data-hint');
});

it('renders slider with name attribute', function () {
    $html = Blade::render('<ui:slider name="volume" />');

    expect($html)->toContain('name="volume"');
});

it('renders slider with showValue', function () {
    $html = Blade::render('<ui:slider showValue />');

    expect($html)
        ->toContain('x-data')
        ->toContain('x-text');
});

it('renders slider with showRange', function () {
    $html = Blade::render('<ui:slider min="0" max="100" showRange />');

    expect($html)
        ->toContain('>0<')
        ->toContain('>100<');
});

it('renders slider with showValue and showRange combined', function () {
    $html = Blade::render('<ui:slider label="Volume" showValue showRange min="0" max="100" />');

    expect($html)
        ->toContain('x-text')
        ->toContain('>0<')
        ->toContain('>100<');
});

it('renders slider with custom id', function () {
    $html = Blade::render('<ui:slider id="volume-slider" />');

    expect($html)->toContain('id="volume-slider"');
});

it('renders slider with label and field wrapper', function () {
    $html = Blade::render('<ui:slider label="Volume" />');

    // With label, slider is wrapped in ui:field
    expect($html)
        ->toContain('data-field')
        ->toContain('data-control')
        ->toContain('Volume');
});

it('merges custom classes on slider wrapper', function () {
    $html = Blade::render('<ui:slider class="max-w-md" />');

    expect($html)->toContain('max-w-md');
});

it('shows error message on slider from error bag', function () {
    $this->withErrors(['volume' => 'Volume must be between 0 and 100.']);

    $html = Blade::render('<ui:slider name="volume" label="Volume" />');

    expect($html)
        ->toContain('Volume must be between 0 and 100.')
        ->toContain('aria-invalid="true"');
});

it('renders slider without label in simpler format', function () {
    $html = Blade::render('<ui:slider name="volume" />');

    // Without label, should not have ui:field wrapper
    expect($html)
        ->not->toContain('data-field')
        ->toContain('type="range"');
});

it('passes through disabled attribute on slider', function () {
    $html = Blade::render('<ui:slider disabled />');

    expect($html)->toContain('disabled');
});
