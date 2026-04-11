<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ViewErrorBag;

beforeEach(function () {
    view()->share('errors', new ViewErrorBag);
});

it('renders color picker with default placeholder', function () {
    $html = Blade::render('<ui:color-picker wire:model="color" />');

    expect($html)
        ->toContain('data-flux-color-picker')
        ->toContain('#')
        ->toContain('type="color"');
});

it('renders color picker with custom placeholder', function () {
    $html = Blade::render('<ui:color-picker wire:model="color" placeholder="#ff0000" />');

    expect($html)
        ->toContain('data-flux-color-picker')
        ->toContain('ff0000');
});
