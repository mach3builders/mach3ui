<?php

use Illuminate\Support\Facades\Blade;

it('renders main content with slots', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:header><h1>Page Title</h1></x-slot:header>
            <x-slot:nav><div class="nav-tabs">Tabs</div></x-slot:nav>
            <x-slot:badges><span class="badge">Active</span></x-slot:badges>
            <x-slot:actions><button>Save</button></x-slot:actions>
            Main content
        </ui:layout.main.content>
    ');

    expect($html)
        ->toContain('data-flux-main-content')
        ->toContain('Page Title')
        ->toContain('nav-tabs')
        ->toContain('Active')
        ->toContain('Save')
        ->toContain('Main content');
});

it('renders empty state', function () {
    $html = Blade::render('<ui:layout.empty-state title="No results" description="Try a different search" />');

    expect($html)
        ->toContain('data-flux-empty-state')
        ->toContain('No results')
        ->toContain('Try a different search');
});

it('renders error page', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)
        ->toContain('data-flux-error')
        ->toContain('errors.404_title')
        ->toContain('errors.404_body');
});

it('renders logo as link or div', function () {
    $withHref = Blade::render('<ui:logo href="/" />');
    expect($withHref)->toContain('<a')->toContain('href="/"');

    $withoutHref = Blade::render('<ui:logo />');
    expect($withoutHref)->toContain('data-flux-logo')->not->toContain('href');
});
