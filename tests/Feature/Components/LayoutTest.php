<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Empty State Component Tests
// =============================================================================

it('renders an empty state', function () {
    $html = Blade::render('<ui:layout.empty-state />');

    expect($html)->toContain('data-flux-empty-state');
})->skip('Requires Flux icon components');

it('renders empty state with title prop', function () {
    $html = Blade::render('<ui:layout.empty-state title="No results found" />');

    expect($html)->toContain('No results found');
})->skip('Requires Flux icon components');

it('does not render title when not provided', function () {
    $html = Blade::render('<ui:layout.empty-state />');

    expect($html)->not->toContain('No results');
})->skip('Requires Flux icon components');

it('renders empty state with description prop', function () {
    $html = Blade::render('<ui:layout.empty-state description="Try adjusting your search" />');

    expect($html)->toContain('Try adjusting your search');
})->skip('Requires Flux icon components');

it('renders empty state with all props', function () {
    $html = Blade::render('<ui:layout.empty-state icon="folder" title="Empty folder" description="This folder has no files" />');

    expect($html)
        ->toContain('Empty folder')
        ->toContain('This folder has no files');
})->skip('Requires Flux icon components');

it('renders empty state with slot content', function () {
    $html = Blade::render('<ui:layout.empty-state title="No items"><button>Add Item</button></ui:layout.empty-state>');

    expect($html)
        ->toContain('<button>Add Item</button>')
        ->toContain('mt-6');
})->skip('Requires Flux icon components');

it('does not render slot wrapper when slot is empty', function () {
    $html = Blade::render('<ui:layout.empty-state title="No items" />');

    expect($html)->not->toContain('mt-6');
})->skip('Requires Flux icon components');

it('renders empty state with centered layout', function () {
    $html = Blade::render('<ui:layout.empty-state />');

    expect($html)
        ->toContain('flex')
        ->toContain('items-center')
        ->toContain('justify-center')
        ->toContain('text-center');
})->skip('Requires Flux icon components');

it('passes through additional attributes on empty state', function () {
    $html = Blade::render('<ui:layout.empty-state data-test="empty-value" id="my-empty-state" />');

    expect($html)
        ->toContain('data-test="empty-value"')
        ->toContain('id="my-empty-state"');
})->skip('Requires Flux icon components');

it('merges custom classes on empty state', function () {
    $html = Blade::render('<ui:layout.empty-state class="custom-empty-class" />');

    expect($html)->toContain('custom-empty-class');
})->skip('Requires Flux icon components');

// =============================================================================
// Error Component Tests
// =============================================================================

it('renders an error page', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)
        ->toContain('text-[6rem]')
        ->toContain('href="/"');
})->skip('Requires Flux icon components');

it('renders error with centered layout', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)
        ->toContain('flex')
        ->toContain('items-center')
        ->toContain('justify-center')
        ->toContain('text-center');
})->skip('Requires Flux icon components');

it('renders error with max width container', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)->toContain('max-w-lg');
})->skip('Requires Flux icon components');

it('passes through additional attributes on error', function () {
    $html = Blade::render('<ui:layout.error code="404" data-test="error-value" id="my-error" />');

    expect($html)
        ->toContain('data-test="error-value"')
        ->toContain('id="my-error"');
})->skip('Requires Flux icon components');

// =============================================================================
// Main Content Component Tests
// =============================================================================

it('renders main content', function () {
    $html = Blade::render('<ui:layout.main.content>Main content</ui:layout.main.content>');

    expect($html)
        ->toContain('data-flux-main-content')
        ->toContain('Main content');
});

it('renders main content with header slot', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:header><h1>Page Title</h1></x-slot:header>
            Content
        </ui:layout.main.content>
    ');

    expect($html)->toContain('Page Title');
});

it('renders main content with nav slot', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:header><h1>Title</h1></x-slot:header>
            <x-slot:nav><div class="nav-tabs">Tabs</div></x-slot:nav>
            Content
        </ui:layout.main.content>
    ');

    expect($html)
        ->toContain('nav-tabs')
        ->toContain('sticky');
});

it('renders main content with border when no nav', function () {
    $html = Blade::render('<ui:layout.main.content>Content</ui:layout.main.content>');

    expect($html)->toContain('border-b');
});

it('passes through additional attributes on main content', function () {
    $html = Blade::render('<ui:layout.main.content id="main-1">Content</ui:layout.main.content>');

    expect($html)->toContain('id="main-1"');
});

// =============================================================================
// Logo Component Tests
// =============================================================================

it('renders a logo', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)
        ->toContain('data-flux-logo')
        ->toContain('Mach3')
        ->toContain('III');
});

it('renders logo as link when href is provided', function () {
    $html = Blade::render('<ui:logo href="/" />');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/"');
});

it('renders logo as div when no href', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)
        ->toContain('<div')
        ->not->toContain('href');
});

it('renders logo with different sizes', function () {
    $html = Blade::render('<ui:logo size="sm" />');
    expect($html)->toContain('text-sm');

    $html = Blade::render('<ui:logo size="lg" />');
    expect($html)->toContain('text-lg');
});

it('merges custom classes on logo', function () {
    $html = Blade::render('<ui:logo class="custom-logo" />');

    expect($html)->toContain('custom-logo');
});
