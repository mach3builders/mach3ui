<?php

use Illuminate\Support\Facades\Blade;

it('renders image preview with source', function () {
    $html = Blade::render('<ui:image-preview src="/img/photo.jpg" />');

    expect($html)
        ->toContain('data-flux-image-preview')
        ->toContain('src="/img/photo.jpg"');
});

it('renders empty placeholder without source', function () {
    $html = Blade::render('<ui:image-preview />');

    expect($html)
        ->toContain('data-flux-image-preview')
        ->not->toContain('<img');
});
