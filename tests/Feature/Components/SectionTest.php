<?php

use Illuminate\Support\Facades\Blade;

it('renders a section with title and content in a box', function () {
    $html = Blade::render('<ui:section title="Settings">Content</ui:section>');

    expect($html)
        ->toContain('data-flux-section')
        ->toContain('Settings')
        ->toContain('data-flux-box')
        ->toContain('Content');
});

it('renders section variants', function () {
    $responsive = Blade::render('<ui:section title="T">C</ui:section>');
    expect($responsive)->toContain('data-variant="responsive"');

    $stacked = Blade::render('<ui:section title="T" variant="stacked">C</ui:section>');
    expect($stacked)->toContain('data-variant="stacked"');
});

it('renders a box', function () {
    $html = Blade::render('<ui:box title="Box Title">Box content</ui:box>');

    expect($html)
        ->toContain('data-flux-box')
        ->toContain('Box Title')
        ->toContain('Box content');
});

it('renders a list with items', function () {
    $html = Blade::render('
        <ui:list>
            <ui:list.item label="Name" value="John" />
        </ui:list>
    ');

    expect($html)
        ->toContain('data-flux-list')
        ->toContain('Name')
        ->toContain('John');
});

it('renders a definition list', function () {
    $html = Blade::render('
        <ui:list variant="definition">
            <ui:list.item label="Key" value="Value" />
        </ui:list>
    ');

    expect($html)
        ->toContain('<dl')
        ->toContain('data-variant="definition"');
});
