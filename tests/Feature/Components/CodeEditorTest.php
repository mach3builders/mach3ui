<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ViewErrorBag;

beforeEach(function () {
    view()->share('errors', new ViewErrorBag);
});

it('renders code editor with defaults', function () {
    $html = Blade::render('<ui:code-editor wire:model="code" />');

    expect($html)
        ->toContain('data-flux-code-editor')
        ->toContain('x-ref="editor"')
        ->toContain('x-ref="textarea"');
});

it('renders code editor with custom language and placeholder', function () {
    $html = Blade::render('<ui:code-editor wire:model="code" language="css" placeholder="Write CSS..." />');

    expect($html)
        ->toContain('data-flux-code-editor')
        ->toContain("'css'")
        ->toContain("'Write CSS...'");
});

it('renders code editor as readonly when disabled', function () {
    $html = Blade::render('<ui:code-editor wire:model="code" disabled />');

    expect($html)
        ->toContain('data-flux-code-editor')
        ->toContain('disabled');
});
