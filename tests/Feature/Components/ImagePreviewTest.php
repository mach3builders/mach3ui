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

it('renders preview tile on a dark background with the dark prop', function () {
    $html = Blade::render('<ui:image-preview src="/img/photo.jpg" dark />');

    expect($html)
        ->toContain('bg-zinc-900')
        ->not->toContain('bg-white');
});

it('renders preview tile on a plain white background with the light prop', function () {
    $html = Blade::render('<ui:image-preview src="/img/photo.jpg" light />');

    expect($html)
        ->toContain('bg-white')
        ->not->toContain('dark:bg-white/5')
        ->not->toContain('bg-zinc-900');
});

it('renders preview tile on a white background by default', function () {
    $html = Blade::render('<ui:image-preview src="/img/photo.jpg" />');

    expect($html)
        ->toContain('bg-white')
        ->not->toContain('bg-zinc-900');
});
