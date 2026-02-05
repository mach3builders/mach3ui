<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Select Group Component Tests
// =============================================================================

it('renders a basic select group', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.group><ui:select.option value="nl">Netherlands</ui:select.option></ui:select.group></ui:select>');

    expect($html)
        ->toContain('<optgroup')
        ->toContain('</optgroup>')
        ->toContain('Netherlands');
});

it('renders select group with label prop', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.group label="Europe"><ui:select.option value="nl">Netherlands</ui:select.option></ui:select.group></ui:select>');

    expect($html)
        ->toContain('<optgroup')
        ->toContain('label="Europe"');
});

it('renders select group without label when not provided', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.group><ui:select.option value="nl">Netherlands</ui:select.option></ui:select.group></ui:select>');

    expect($html)
        ->toContain('<optgroup')
        ->not->toMatch('/<optgroup[^>]*label="[^"]*"/');
});

it('renders select group with disabled prop', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.group label="Europe" disabled><ui:select.option value="nl">Netherlands</ui:select.option></ui:select.group></ui:select>');

    expect($html)->toMatch('/<optgroup[^>]*disabled[^>]*>/');
});

it('renders select group without disabled when not set', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.group label="Europe"><ui:select.option value="nl">Netherlands</ui:select.option></ui:select.group></ui:select>');

    expect($html)->not->toMatch('/<optgroup[^>]*disabled[^>]*>/');
});

it('renders select group with disabled set to false', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.group label="Europe" :disabled="false"><ui:select.option value="nl">Netherlands</ui:select.option></ui:select.group></ui:select>');

    expect($html)->not->toMatch('/<optgroup[^>]*disabled[^>]*>/');
});

it('renders select group slot content', function () {
    $html = Blade::render('
        <ui:select name="country">
            <ui:select.group label="Europe">
                <ui:select.option value="nl">Netherlands</ui:select.option>
                <ui:select.option value="de">Germany</ui:select.option>
                <ui:select.option value="fr">France</ui:select.option>
            </ui:select.group>
        </ui:select>
    ');

    expect($html)
        ->toContain('Netherlands')
        ->toContain('Germany')
        ->toContain('France');
});

it('passes through data attributes on select group', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.group label="Europe" data-testid="europe-group"><ui:select.option value="nl">Netherlands</ui:select.option></ui:select.group></ui:select>');

    expect($html)->toContain('data-testid="europe-group"');
});

it('passes through additional attributes on select group', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.group label="Europe" class="custom-class" aria-label="European countries"><ui:select.option value="nl">Netherlands</ui:select.option></ui:select.group></ui:select>');

    expect($html)
        ->toContain('class="custom-class"')
        ->toContain('aria-label="European countries"');
});

it('renders multiple select groups', function () {
    $html = Blade::render('
        <ui:select name="country">
            <ui:select.group label="Europe">
                <ui:select.option value="nl">Netherlands</ui:select.option>
            </ui:select.group>
            <ui:select.group label="Asia">
                <ui:select.option value="jp">Japan</ui:select.option>
            </ui:select.group>
        </ui:select>
    ');

    expect($html)
        ->toContain('label="Europe"')
        ->toContain('label="Asia"')
        ->toContain('Netherlands')
        ->toContain('Japan');
});

// =============================================================================
// Select Option Component Tests
// =============================================================================

it('renders a basic select option', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="nl">Netherlands</ui:select.option></ui:select>');

    expect($html)
        ->toContain('<option')
        ->toContain('value="nl"')
        ->toContain('Netherlands')
        ->toContain('</option>');
});

it('renders select option with value prop', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="test-value">Test</ui:select.option></ui:select>');

    expect($html)->toContain('value="test-value"');
});

it('renders select option with empty value by default', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option>Choose...</ui:select.option></ui:select>');

    expect($html)->toContain('value=""');
});

it('renders select option with disabled prop', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="nl" disabled>Netherlands</ui:select.option></ui:select>');

    expect($html)->toMatch('/<option[^>]*disabled[^>]*>/');
});

it('renders select option without disabled when not set', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="nl">Netherlands</ui:select.option></ui:select>');

    expect($html)->not->toMatch('/<option[^>]*value="nl"[^>]*disabled/');
});

it('renders select option with disabled set to false', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="nl" :disabled="false">Netherlands</ui:select.option></ui:select>');

    expect($html)->not->toMatch('/<option[^>]*value="nl"[^>]*disabled/');
});

it('renders select option with selected prop', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="nl" selected>Netherlands</ui:select.option></ui:select>');

    expect($html)->toMatch('/<option[^>]*selected[^>]*>/');
});

it('renders select option without selected when not set', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="nl">Netherlands</ui:select.option></ui:select>');

    expect($html)->not->toMatch('/<option[^>]*value="nl"[^>]*selected/');
});

it('renders select option with selected set to false', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="nl" :selected="false">Netherlands</ui:select.option></ui:select>');

    expect($html)->not->toMatch('/<option[^>]*value="nl"[^>]*selected/');
});

it('renders select option with both disabled and selected props', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="nl" disabled selected>Netherlands</ui:select.option></ui:select>');

    expect($html)
        ->toMatch('/<option[^>]*disabled[^>]*>/')
        ->toMatch('/<option[^>]*selected[^>]*>/');
});

it('renders select option slot content', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="nl">The Kingdom of the Netherlands</ui:select.option></ui:select>');

    expect($html)->toContain('The Kingdom of the Netherlands');
});

it('passes through data attributes on select option', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="nl" data-testid="nl-option">Netherlands</ui:select.option></ui:select>');

    expect($html)->toContain('data-testid="nl-option"');
});

it('passes through additional attributes on select option', function () {
    $html = Blade::render('<ui:select name="country"><ui:select.option value="nl" class="custom-option" aria-label="Netherlands option">Netherlands</ui:select.option></ui:select>');

    expect($html)
        ->toContain('class="custom-option"')
        ->toContain('aria-label="Netherlands option"');
});

it('renders multiple select options', function () {
    $html = Blade::render('
        <ui:select name="country">
            <ui:select.option value="nl">Netherlands</ui:select.option>
            <ui:select.option value="de">Germany</ui:select.option>
            <ui:select.option value="fr">France</ui:select.option>
        </ui:select>
    ');

    expect($html)
        ->toContain('value="nl"')
        ->toContain('value="de"')
        ->toContain('value="fr"')
        ->toContain('Netherlands')
        ->toContain('Germany')
        ->toContain('France');
});

// =============================================================================
// Select Option Inside Group Tests
// =============================================================================

it('renders select options inside groups correctly', function () {
    $html = Blade::render('
        <ui:select name="country">
            <ui:select.group label="Europe">
                <ui:select.option value="nl" selected>Netherlands</ui:select.option>
                <ui:select.option value="de">Germany</ui:select.option>
            </ui:select.group>
            <ui:select.group label="Asia" disabled>
                <ui:select.option value="jp">Japan</ui:select.option>
                <ui:select.option value="kr" disabled>South Korea</ui:select.option>
            </ui:select.group>
        </ui:select>
    ');

    expect($html)
        ->toContain('label="Europe"')
        ->toContain('label="Asia"')
        ->toContain('value="nl"')
        ->toContain('value="de"')
        ->toContain('value="jp"')
        ->toContain('value="kr"')
        ->toMatch('/<option[^>]*value="nl"[^>]*selected[^>]*>/')
        ->toMatch('/<option[^>]*value="kr"[^>]*disabled[^>]*>/');
});

it('renders select with mixed groups and standalone options', function () {
    $html = Blade::render('
        <ui:select name="country">
            <ui:select.option value="">Select a country...</ui:select.option>
            <ui:select.group label="Europe">
                <ui:select.option value="nl">Netherlands</ui:select.option>
            </ui:select.group>
            <ui:select.group label="Asia">
                <ui:select.option value="jp">Japan</ui:select.option>
            </ui:select.group>
        </ui:select>
    ');

    expect($html)
        ->toContain('Select a country...')
        ->toContain('label="Europe"')
        ->toContain('label="Asia"');
});
