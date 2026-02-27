<?php

use Illuminate\Support\Facades\Blade;

it('renders main content with slots', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:header><h1>Page Title</h1></x-slot:header>
            <x-slot:nav><div class="nav-tabs">Tabs</div></x-slot:nav>
            Main content
        </ui:layout.main.content>
    ');

    expect($html)
        ->toContain('data-flux-main-content')
        ->toContain('Page Title')
        ->toContain('nav-tabs')
        ->toContain('Main content');
});

it('renders logo as link or div', function () {
    $withHref = Blade::render('<ui:logo href="/" />');
    expect($withHref)->toContain('<a')->toContain('href="/"');

    $withoutHref = Blade::render('<ui:logo />');
    expect($withoutHref)->toContain('data-flux-logo')->not->toContain('href');
});
