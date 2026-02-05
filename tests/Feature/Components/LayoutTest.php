<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Backdrop (backdrop.blade.php)
// Props: none (@props([]))
// =============================================================================

it('renders a backdrop', function () {
    $html = Blade::render('<ui:layout.backdrop />');

    expect($html)
        ->toContain('fixed')
        ->toContain('data-layout-backdrop');
});

it('renders backdrop with fixed positioning', function () {
    $html = Blade::render('<ui:layout.backdrop />');

    expect($html)
        ->toContain('fixed')
        ->toContain('inset-0');
});

it('renders backdrop with overlay styling', function () {
    $html = Blade::render('<ui:layout.backdrop />');

    expect($html)
        ->toContain('bg-black/50')
        ->toContain('opacity-0');
});

it('renders backdrop with transition classes', function () {
    $html = Blade::render('<ui:layout.backdrop />');

    expect($html)
        ->toContain('transition-opacity')
        ->toContain('duration-300');
});

it('renders backdrop hidden on xl screens', function () {
    $html = Blade::render('<ui:layout.backdrop />');

    expect($html)->toContain('xl:hidden');
});

it('renders backdrop with Alpine click handler', function () {
    $html = Blade::render('<ui:layout.backdrop />');

    expect($html)->toContain('x-on:click="sideBarOpen = false"');
});

it('renders backdrop with Alpine class binding', function () {
    $html = Blade::render('<ui:layout.backdrop />');

    expect($html)->toContain(':class=');
});

it('passes through additional attributes on backdrop', function () {
    $html = Blade::render('<ui:layout.backdrop data-test="backdrop-value" id="my-backdrop" />');

    expect($html)
        ->toContain('data-test="backdrop-value"')
        ->toContain('id="my-backdrop"');
});

it('merges custom classes on backdrop', function () {
    $html = Blade::render('<ui:layout.backdrop class="custom-backdrop-class" />');

    expect($html)->toContain('custom-backdrop-class');
});

it('has pointer-events-none by default', function () {
    $html = Blade::render('<ui:layout.backdrop />');

    expect($html)->toContain('pointer-events-none');
});

it('has z-index for proper layering', function () {
    $html = Blade::render('<ui:layout.backdrop />');

    expect($html)->toContain('z-40');
});

// =============================================================================
// Banner (banner.blade.php)
// Props: name, switchUrl
// =============================================================================

it('renders a banner', function () {
    $html = Blade::render('<ui:layout.banner name="John Doe" />');

    expect($html)
        ->toContain('data-layout-banner')
        ->toContain('John Doe');
});

it('renders banner with name prop', function () {
    $html = Blade::render('<ui:layout.banner name="Admin User" />');

    expect($html)
        ->toContain('Admin User')
        ->toContain('<strong>Admin User</strong>');
});

it('hides banner when name is null', function () {
    $html = Blade::render('<ui:layout.banner />');

    expect($html)->toContain('hidden');
});

it('shows banner when name is provided', function () {
    $html = Blade::render('<ui:layout.banner name="Test User" />');

    expect($html)->not->toContain('class="hidden"');
});

it('renders banner with default switchUrl', function () {
    $html = Blade::render('<ui:layout.banner name="User" />');

    expect($html)->toContain('href="#"');
});

it('renders banner with custom switchUrl', function () {
    $html = Blade::render('<ui:layout.banner name="User" switchUrl="/logout-as" />');

    expect($html)->toContain('href="/logout-as"');
});

it('renders banner with sticky positioning', function () {
    $html = Blade::render('<ui:layout.banner name="User" />');

    expect($html)
        ->toContain('sticky')
        ->toContain('top-0');
});

it('renders banner with proper z-index', function () {
    $html = Blade::render('<ui:layout.banner name="User" />');

    expect($html)->toContain('z-50');
});

it('renders banner with height styling', function () {
    $html = Blade::render('<ui:layout.banner name="User" />');

    expect($html)->toContain('h-10');
});

it('renders banner with flex centering', function () {
    $html = Blade::render('<ui:layout.banner name="User" />');

    expect($html)
        ->toContain('flex')
        ->toContain('items-center')
        ->toContain('justify-center');
});

it('renders banner with dark background', function () {
    $html = Blade::render('<ui:layout.banner name="User" />');

    expect($html)->toContain('bg-gray-800');
});

it('renders banner with light text', function () {
    $html = Blade::render('<ui:layout.banner name="User" />');

    expect($html)->toContain('text-gray-20');
});

it('renders banner with glasses icon', function () {
    $html = Blade::render('<ui:layout.banner name="User" />');

    expect($html)->toContain('<svg');
});

it('passes through additional attributes on banner', function () {
    $html = Blade::render('<ui:layout.banner name="User" data-test="banner-value" id="my-banner" />');

    expect($html)
        ->toContain('data-test="banner-value"')
        ->toContain('id="my-banner"');
});

it('merges custom classes on banner', function () {
    $html = Blade::render('<ui:layout.banner name="User" class="custom-banner-class" />');

    expect($html)->toContain('custom-banner-class');
});

// =============================================================================
// Empty State (empty-state.blade.php)
// Props: description, icon, title
// =============================================================================

it('renders an empty state', function () {
    $html = Blade::render('<ui:layout.empty-state />');

    expect($html)->toContain('data-layout-empty-state');
});

it('renders empty state with default icon', function () {
    $html = Blade::render('<ui:layout.empty-state />');

    // Default icon is 'search'
    expect($html)->toContain('<svg');
});

it('renders empty state with custom icon', function () {
    $html = Blade::render('<ui:layout.empty-state icon="inbox" />');

    expect($html)->toContain('<svg');
});

it('renders empty state with title prop', function () {
    $html = Blade::render('<ui:layout.empty-state title="No results found" />');

    expect($html)
        ->toContain('No results found')
        ->toContain('<h3');
});

it('does not render title when not provided', function () {
    $html = Blade::render('<ui:layout.empty-state />');

    expect($html)->not->toContain('<h3');
});

it('renders empty state with description prop', function () {
    $html = Blade::render('<ui:layout.empty-state description="Try adjusting your search" />');

    expect($html)
        ->toContain('Try adjusting your search')
        ->toContain('<p');
});

it('does not render description when not provided', function () {
    $html = Blade::render('<ui:layout.empty-state />');

    // Only icon wrapper div should be present
    expect($html)->not->toContain('mt-1 max-w-sm');
});

it('renders empty state with all props', function () {
    $html = Blade::render('<ui:layout.empty-state icon="folder" title="Empty folder" description="This folder has no files" />');

    expect($html)
        ->toContain('<svg')
        ->toContain('Empty folder')
        ->toContain('This folder has no files');
});

it('renders empty state with slot content', function () {
    $html = Blade::render('<ui:layout.empty-state title="No items"><button>Add Item</button></ui:layout.empty-state>');

    expect($html)
        ->toContain('<button>Add Item</button>')
        ->toContain('mt-6');
});

it('does not render slot wrapper when slot is empty', function () {
    $html = Blade::render('<ui:layout.empty-state title="No items" />');

    expect($html)->not->toContain('mt-6');
});

it('renders empty state with centered layout', function () {
    $html = Blade::render('<ui:layout.empty-state />');

    expect($html)
        ->toContain('flex')
        ->toContain('flex-col')
        ->toContain('items-center')
        ->toContain('justify-center')
        ->toContain('text-center');
});

it('renders empty state with vertical padding', function () {
    $html = Blade::render('<ui:layout.empty-state />');

    expect($html)->toContain('py-16');
});

it('renders empty state icon wrapper with rounded styling', function () {
    $html = Blade::render('<ui:layout.empty-state />');

    expect($html)->toContain('rounded-full');
});

it('renders empty state icon wrapper with size', function () {
    $html = Blade::render('<ui:layout.empty-state />');

    expect($html)
        ->toContain('h-18')
        ->toContain('w-18');
});

it('renders empty state title with proper styling', function () {
    $html = Blade::render('<ui:layout.empty-state title="Test Title" />');

    expect($html)
        ->toContain('text-lg')
        ->toContain('font-semibold');
});

it('renders empty state description with muted styling', function () {
    $html = Blade::render('<ui:layout.empty-state description="Test description" />');

    expect($html)
        ->toContain('text-sm')
        ->toContain('text-gray-500');
});

it('passes through additional attributes on empty state', function () {
    $html = Blade::render('<ui:layout.empty-state data-test="empty-value" id="my-empty-state" />');

    expect($html)
        ->toContain('data-test="empty-value"')
        ->toContain('id="my-empty-state"');
});

it('merges custom classes on empty state', function () {
    $html = Blade::render('<ui:layout.empty-state class="custom-empty-class" />');

    expect($html)->toContain('custom-empty-class');
});

// =============================================================================
// Error (error.blade.php)
// Props: code (required), message
// =============================================================================

it('renders an error page', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)->toContain('data-layout-error');
});

it('renders error with code prop', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)->toContain('<h1');
});

it('renders error with different codes', function () {
    $html500 = Blade::render('<ui:layout.error code="500" />');
    $html403 = Blade::render('<ui:layout.error code="403" />');

    expect($html500)->toContain('data-layout-error');
    expect($html403)->toContain('data-layout-error');
});

it('renders error with custom message prop', function () {
    $html = Blade::render('<ui:layout.error code="404" message="Custom error message" />');

    expect($html)->toContain('Custom error message');
});

it('renders error with centered layout', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)
        ->toContain('flex')
        ->toContain('flex-col')
        ->toContain('items-center')
        ->toContain('justify-center')
        ->toContain('text-center');
});

it('renders error with full height', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)->toContain('h-full');
});

it('renders error title with large font', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)
        ->toContain('text-[6rem]')
        ->toContain('font-semibold');
});

it('renders error description with muted styling', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)
        ->toContain('text-sm')
        ->toContain('text-gray-500');
});

it('renders error with go back button', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)
        ->toContain('href="/"')
        ->toContain('mt-8');
});

it('renders error with max width container', function () {
    $html = Blade::render('<ui:layout.error code="404" />');

    expect($html)->toContain('max-w-lg');
});

it('passes through additional attributes on error', function () {
    $html = Blade::render('<ui:layout.error code="404" data-test="error-value" id="my-error" />');

    expect($html)
        ->toContain('data-test="error-value"')
        ->toContain('id="my-error"');
});

it('merges custom classes on error', function () {
    $html = Blade::render('<ui:layout.error code="404" class="custom-error-class" />');

    expect($html)->toContain('custom-error-class');
});

// =============================================================================
// App Layout (app.blade.php)
// Props: banner
// Note: App layout requires sidebarLogo slot to avoid config('applications') dependency
// =============================================================================

it('renders an app layout', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('data-layout-app');
});

it('renders app layout with default banner false', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('h-screen');
});

it('renders app layout with banner true', function () {
    $html = Blade::render('
        <ui:layout.app :banner="true">
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('h-[calc(100vh-2.5rem)]');
});

it('renders app layout with Alpine x-data', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('x-data=');
});

it('renders app layout with sideBarOpen state', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('sideBarOpen: false');
});

it('renders app layout with init function', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('init()');
});

it('renders app layout with resize listener', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain("window.addEventListener('resize'");
});

it('renders app layout with backdrop', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('data-layout-backdrop');
});

it('renders app layout with main element', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('data-layout-main');
});

it('renders app layout with overflow styling', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('overflow-y-auto');
});

it('renders app layout with z-index', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('z-10');
});

it('renders app layout with scrollbar styling', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('[scrollbar-width:thin]');
});

it('renders app layout with slot content', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
            <div class="test-content">Main Content</div>
        </ui:layout.app>
    ');

    expect($html)->toContain('test-content');
});

it('renders app layout with inner flex container', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)
        ->toContain('mx-auto')
        ->toContain('flex')
        ->toContain('flex-col')
        ->toContain('xl:flex-row');
});

it('renders app layout with max width', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('max-w-10xl');
});

it('renders app layout with click handler for nav items', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('x-on:click=');
});

it('renders app layout with dynamic class binding for overflow', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain(":class=\"{ 'overflow-hidden!': sideBarOpen }\"");
});

it('passes through additional attributes on app layout', function () {
    $html = Blade::render('
        <ui:layout.app data-test="app-value" id="my-app">
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)
        ->toContain('data-test="app-value"')
        ->toContain('id="my-app"');
});

it('renders app layout min-height without banner', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('min-h-screen');
});

it('renders app layout min-height with banner', function () {
    $html = Blade::render('
        <ui:layout.app :banner="true">
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)->toContain('min-h-[calc(100vh-2.5rem)]');
});

it('renders app layout with sidebarLogo slot', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div class="custom-logo">My Logo</div></x-slot:sidebarLogo>
        </ui:layout.app>
    ');

    expect($html)
        ->toContain('custom-logo')
        ->toContain('My Logo');
});

it('renders app layout with sidebarNav slot', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
            <x-slot:sidebarNav><nav class="custom-nav">Navigation</nav></x-slot:sidebarNav>
        </ui:layout.app>
    ');

    expect($html)
        ->toContain('custom-nav')
        ->toContain('Navigation');
});

it('renders app layout with sidebarFooter slot', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
            <x-slot:sidebarFooter><div class="custom-footer">Footer</div></x-slot:sidebarFooter>
        </ui:layout.app>
    ');

    expect($html)
        ->toContain('custom-footer')
        ->toContain('Footer');
});

it('renders app layout with topbarActions slot', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
            <x-slot:topbarActions><button class="custom-action">Action</button></x-slot:topbarActions>
        </ui:layout.app>
    ');

    expect($html)
        ->toContain('custom-action')
        ->toContain('Action');
});

it('renders app layout with sidebarWorkspace slot', function () {
    $html = Blade::render('
        <ui:layout.app>
            <x-slot:sidebarLogo><div>Logo</div></x-slot:sidebarLogo>
            <x-slot:sidebarWorkspace><div class="custom-workspace">Workspace Selector</div></x-slot:sidebarWorkspace>
        </ui:layout.app>
    ');

    expect($html)
        ->toContain('custom-workspace')
        ->toContain('Workspace Selector');
});
