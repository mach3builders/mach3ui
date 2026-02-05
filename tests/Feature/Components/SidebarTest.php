<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Sidebar (layout/sidebar/index.blade.php)
// Props: banner
// =============================================================================

it('renders a basic sidebar', function () {
    $html = Blade::render('<ui:layout.sidebar>Sidebar Content</ui:layout.sidebar>');

    expect($html)
        ->toContain('Sidebar Content')
        ->toContain('data-layout-sidebar');
});

it('renders sidebar with slot content', function () {
    $html = Blade::render('<ui:layout.sidebar><nav>Navigation items</nav></ui:layout.sidebar>');

    expect($html)->toContain('<nav>Navigation items</nav>');
});

it('renders sidebar without banner by default', function () {
    $html = Blade::render('<ui:layout.sidebar>Content</ui:layout.sidebar>');

    expect($html)
        ->toContain('top-0')
        ->toContain('h-screen');
});

it('renders sidebar with banner prop', function () {
    $html = Blade::render('<ui:layout.sidebar banner>Content</ui:layout.sidebar>');

    expect($html)
        ->toContain('top-10')
        ->toContain('h-[calc(100vh-2.5rem)]');
});

it('renders sidebar with banner set to false', function () {
    $html = Blade::render('<ui:layout.sidebar :banner="false">Content</ui:layout.sidebar>');

    expect($html)
        ->toContain('top-0')
        ->toContain('h-screen');
});

it('has fixed positioning and transition classes', function () {
    $html = Blade::render('<ui:layout.sidebar>Content</ui:layout.sidebar>');

    expect($html)
        ->toContain('fixed')
        ->toContain('left-0')
        ->toContain('z-40')
        ->toContain('w-56')
        ->toContain('-translate-x-full')
        ->toContain('transition-transform')
        ->toContain('duration-300');
});

it('has flex column layout', function () {
    $html = Blade::render('<ui:layout.sidebar>Content</ui:layout.sidebar>');

    expect($html)
        ->toContain('flex')
        ->toContain('flex-col')
        ->toContain('shrink-0');
});

it('has border styling', function () {
    $html = Blade::render('<ui:layout.sidebar>Content</ui:layout.sidebar>');

    expect($html)
        ->toContain('border-r')
        ->toContain('border-gray-100');
});

it('has background styling', function () {
    $html = Blade::render('<ui:layout.sidebar>Content</ui:layout.sidebar>');

    expect($html)->toContain('bg-gray-20');
});

it('has dark mode styling', function () {
    $html = Blade::render('<ui:layout.sidebar>Content</ui:layout.sidebar>');

    expect($html)
        ->toContain('dark:bg-gray-820')
        ->toContain('dark:border-gray-740');
});

it('has xl breakpoint responsive styling', function () {
    $html = Blade::render('<ui:layout.sidebar>Content</ui:layout.sidebar>');

    expect($html)
        ->toContain('xl:sticky')
        ->toContain('xl:translate-x-0')
        ->toContain('xl:self-start');
});

it('has Alpine.js binding for mobile toggle', function () {
    $html = Blade::render('<ui:layout.sidebar>Content</ui:layout.sidebar>');

    expect($html)->toContain(":class=\"{ 'translate-x-0!': sideBarOpen }\"");
});

it('renders overlay div for mobile', function () {
    $html = Blade::render('<ui:layout.sidebar>Content</ui:layout.sidebar>');

    expect($html)
        ->toContain('right-full')
        ->toContain('w-screen');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:layout.sidebar data-test="sidebar-value" id="main-sidebar">Content</ui:layout.sidebar>');

    expect($html)
        ->toContain('data-test="sidebar-value"')
        ->toContain('id="main-sidebar"');
});

it('merges custom classes', function () {
    $html = Blade::render('<ui:layout.sidebar class="custom-sidebar-class">Content</ui:layout.sidebar>');

    expect($html)->toContain('custom-sidebar-class');
});

// =============================================================================
// Sidebar Header (layout/sidebar/header.blade.php)
// Props: none
// =============================================================================

it('renders a basic sidebar header', function () {
    $html = Blade::render('<ui:layout.sidebar.header>Header Content</ui:layout.sidebar.header>');

    expect($html)
        ->toContain('Header Content')
        ->toContain('data-layout-sidebar-header');
});

it('renders sidebar header with slot content', function () {
    $html = Blade::render('<ui:layout.sidebar.header><img src="logo.png" alt="Logo"></ui:layout.sidebar.header>');

    expect($html)->toContain('<img src="logo.png" alt="Logo">');
});

it('renders sidebar header as header element', function () {
    $html = Blade::render('<ui:layout.sidebar.header>Content</ui:layout.sidebar.header>');

    expect($html)
        ->toContain('<header')
        ->toContain('</header>');
});

it('has sticky positioning on sidebar header', function () {
    $html = Blade::render('<ui:layout.sidebar.header>Content</ui:layout.sidebar.header>');

    expect($html)
        ->toContain('sticky')
        ->toContain('top-0')
        ->toContain('z-10');
});

it('has flex layout and gap on sidebar header', function () {
    $html = Blade::render('<ui:layout.sidebar.header>Content</ui:layout.sidebar.header>');

    expect($html)
        ->toContain('flex')
        ->toContain('flex-col')
        ->toContain('gap-2');
});

it('has padding and border on sidebar header', function () {
    $html = Blade::render('<ui:layout.sidebar.header>Content</ui:layout.sidebar.header>');

    expect($html)
        ->toContain('p-2')
        ->toContain('border-b')
        ->toContain('shrink-0');
});

it('has background styling on sidebar header', function () {
    $html = Blade::render('<ui:layout.sidebar.header>Content</ui:layout.sidebar.header>');

    expect($html)->toContain('bg-gray-20');
});

it('has dark mode styling on sidebar header', function () {
    $html = Blade::render('<ui:layout.sidebar.header>Content</ui:layout.sidebar.header>');

    expect($html)->toContain('dark:bg-gray-820');
});

it('has scrolled state styling on sidebar header', function () {
    $html = Blade::render('<ui:layout.sidebar.header>Content</ui:layout.sidebar.header>');

    // HTML entities are encoded in output
    expect($html)
        ->toContain('[&amp;.scrolled]:border-gray-80')
        ->toContain('[&amp;.scrolled]:dark:border-gray-740');
});

it('passes through additional attributes on sidebar header', function () {
    $html = Blade::render('<ui:layout.sidebar.header data-test="header-value" id="sidebar-header">Content</ui:layout.sidebar.header>');

    expect($html)
        ->toContain('data-test="header-value"')
        ->toContain('id="sidebar-header"');
});

it('merges custom classes on sidebar header', function () {
    $html = Blade::render('<ui:layout.sidebar.header class="custom-header-class">Content</ui:layout.sidebar.header>');

    expect($html)->toContain('custom-header-class');
});

// =============================================================================
// Sidebar Footer (layout/sidebar/footer.blade.php)
// Props: none
// =============================================================================

it('renders a basic sidebar footer', function () {
    $html = Blade::render('<ui:layout.sidebar.footer>Footer Content</ui:layout.sidebar.footer>');

    expect($html)
        ->toContain('Footer Content')
        ->toContain('data-layout-sidebar-footer');
});

it('renders sidebar footer with slot content', function () {
    $html = Blade::render('<ui:layout.sidebar.footer><button>Logout</button></ui:layout.sidebar.footer>');

    expect($html)->toContain('<button>Logout</button>');
});

it('renders sidebar footer as footer element', function () {
    $html = Blade::render('<ui:layout.sidebar.footer>Content</ui:layout.sidebar.footer>');

    expect($html)
        ->toContain('<footer')
        ->toContain('</footer>');
});

it('has sticky positioning at bottom on sidebar footer', function () {
    $html = Blade::render('<ui:layout.sidebar.footer>Content</ui:layout.sidebar.footer>');

    expect($html)
        ->toContain('sticky')
        ->toContain('bottom-0')
        ->toContain('z-10');
});

it('has flex layout and gap on sidebar footer', function () {
    $html = Blade::render('<ui:layout.sidebar.footer>Content</ui:layout.sidebar.footer>');

    expect($html)
        ->toContain('flex')
        ->toContain('flex-col')
        ->toContain('gap-2');
});

it('has padding and border on sidebar footer', function () {
    $html = Blade::render('<ui:layout.sidebar.footer>Content</ui:layout.sidebar.footer>');

    expect($html)
        ->toContain('p-2')
        ->toContain('border-t')
        ->toContain('shrink-0');
});

it('has mt-auto to push footer to bottom', function () {
    $html = Blade::render('<ui:layout.sidebar.footer>Content</ui:layout.sidebar.footer>');

    expect($html)->toContain('mt-auto');
});

it('has background styling on sidebar footer', function () {
    $html = Blade::render('<ui:layout.sidebar.footer>Content</ui:layout.sidebar.footer>');

    expect($html)->toContain('bg-gray-20');
});

it('has border color styling on sidebar footer', function () {
    $html = Blade::render('<ui:layout.sidebar.footer>Content</ui:layout.sidebar.footer>');

    expect($html)->toContain('border-gray-80');
});

it('has dark mode styling on sidebar footer', function () {
    $html = Blade::render('<ui:layout.sidebar.footer>Content</ui:layout.sidebar.footer>');

    expect($html)
        ->toContain('dark:bg-gray-820')
        ->toContain('dark:border-gray-740');
});

it('passes through additional attributes on sidebar footer', function () {
    $html = Blade::render('<ui:layout.sidebar.footer data-test="footer-value" id="sidebar-footer">Content</ui:layout.sidebar.footer>');

    expect($html)
        ->toContain('data-test="footer-value"')
        ->toContain('id="sidebar-footer"');
});

it('merges custom classes on sidebar footer', function () {
    $html = Blade::render('<ui:layout.sidebar.footer class="custom-footer-class">Content</ui:layout.sidebar.footer>');

    expect($html)->toContain('custom-footer-class');
});

// =============================================================================
// Sidebar Nav (layout/sidebar/nav.blade.php)
// Props: none
// =============================================================================

it('renders a basic sidebar nav', function () {
    $html = Blade::render('<ui:layout.sidebar.nav>Nav Content</ui:layout.sidebar.nav>');

    expect($html)
        ->toContain('Nav Content')
        ->toContain('data-layout-sidebar-nav');
});

it('renders sidebar nav with slot content', function () {
    $html = Blade::render('<ui:layout.sidebar.nav><ul><li>Item 1</li><li>Item 2</li></ul></ui:layout.sidebar.nav>');

    expect($html)->toContain('<ul><li>Item 1</li><li>Item 2</li></ul>');
});

it('renders sidebar nav as div element', function () {
    $html = Blade::render('<ui:layout.sidebar.nav>Content</ui:layout.sidebar.nav>');

    expect($html)->toContain('<div');
});

it('has flex column layout on sidebar nav', function () {
    $html = Blade::render('<ui:layout.sidebar.nav>Content</ui:layout.sidebar.nav>');

    expect($html)
        ->toContain('flex')
        ->toContain('flex-1')
        ->toContain('flex-col')
        ->toContain('gap-8');
});

it('has overflow and padding on sidebar nav', function () {
    $html = Blade::render('<ui:layout.sidebar.nav>Content</ui:layout.sidebar.nav>');

    expect($html)
        ->toContain('overflow-y-auto')
        ->toContain('px-2')
        ->toContain('pb-8')
        ->toContain('pt-4');
});

it('has Firefox scrollbar styling on sidebar nav', function () {
    $html = Blade::render('<ui:layout.sidebar.nav>Content</ui:layout.sidebar.nav>');

    expect($html)
        ->toContain('[scrollbar-width:thin]')
        ->toContain('[scrollbar-color:transparent_transparent]');
});

it('has Firefox hover scrollbar styling on sidebar nav', function () {
    $html = Blade::render('<ui:layout.sidebar.nav>Content</ui:layout.sidebar.nav>');

    expect($html)->toContain('hover:[scrollbar-color:theme(colors.gray.300)_transparent]');
});

it('has dark mode Firefox scrollbar styling on sidebar nav', function () {
    $html = Blade::render('<ui:layout.sidebar.nav>Content</ui:layout.sidebar.nav>');

    expect($html)->toContain('dark:hover:[scrollbar-color:theme(colors.gray.600)_transparent]');
});

it('has WebKit scrollbar styling on sidebar nav', function () {
    $html = Blade::render('<ui:layout.sidebar.nav>Content</ui:layout.sidebar.nav>');

    // HTML entities are encoded in output
    expect($html)
        ->toContain('[&amp;::-webkit-scrollbar]:w-2')
        ->toContain('[&amp;::-webkit-scrollbar-track]:bg-transparent')
        ->toContain('[&amp;::-webkit-scrollbar-thumb]:rounded-full')
        ->toContain('[&amp;::-webkit-scrollbar-thumb]:bg-transparent');
});

it('has WebKit hover scrollbar styling on sidebar nav', function () {
    $html = Blade::render('<ui:layout.sidebar.nav>Content</ui:layout.sidebar.nav>');

    // HTML entities are encoded in output
    expect($html)->toContain('hover:[&amp;::-webkit-scrollbar-thumb]:bg-gray-300');
});

it('has dark mode WebKit scrollbar styling on sidebar nav', function () {
    $html = Blade::render('<ui:layout.sidebar.nav>Content</ui:layout.sidebar.nav>');

    // HTML entities are encoded in output
    expect($html)->toContain('dark:hover:[&amp;::-webkit-scrollbar-thumb]:bg-gray-600');
});

it('passes through additional attributes on sidebar nav', function () {
    $html = Blade::render('<ui:layout.sidebar.nav data-test="nav-value" id="sidebar-nav">Content</ui:layout.sidebar.nav>');

    expect($html)
        ->toContain('data-test="nav-value"')
        ->toContain('id="sidebar-nav"');
});

it('merges custom classes on sidebar nav', function () {
    $html = Blade::render('<ui:layout.sidebar.nav class="custom-nav-class">Content</ui:layout.sidebar.nav>');

    expect($html)->toContain('custom-nav-class');
});

// =============================================================================
// Main Content (layout/main/content.blade.php)
// Props: banner, toc, width
// =============================================================================

it('renders a basic main content', function () {
    $html = Blade::render('<ui:layout.main.content>Main Content</ui:layout.main.content>');

    expect($html)
        ->toContain('Main Content')
        ->toContain('data-layout-main-content');
});

it('renders main content with slot content', function () {
    $html = Blade::render('<ui:layout.main.content><article>Article content</article></ui:layout.main.content>');

    expect($html)->toContain('<article>Article content</article>');
});

it('renders main content header', function () {
    $html = Blade::render('<ui:layout.main.content>Content</ui:layout.main.content>');

    expect($html)->toContain('data-layout-main-header');
});

it('renders main content body section', function () {
    $html = Blade::render('<ui:layout.main.content>Content</ui:layout.main.content>');

    expect($html)->toContain('data-layout-main-body');
});

it('renders default title when no title prop', function () {
    $html = Blade::render('<ui:layout.main.content>Content</ui:layout.main.content>');

    expect($html)->toContain('data-layout-main-header');
});

it('renders main content with title slot', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:title>Page Title</x-slot:title>
            Content
        </ui:layout.main.content>
    ');

    expect($html)->toContain('Page Title');
});

it('renders main content with description slot', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:description>Page description text</x-slot:description>
            Content
        </ui:layout.main.content>
    ');

    expect($html)->toContain('Page description text');
});

it('renders main content with header slot', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:header><h1 class="custom-title">Custom Header</h1></x-slot:header>
            Content
        </ui:layout.main.content>
    ');

    expect($html)->toContain('<h1 class="custom-title">Custom Header</h1>');
});

it('renders main content with badges slot', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:badges><span class="badge">New</span></x-slot:badges>
            Content
        </ui:layout.main.content>
    ');

    expect($html)->toContain('<span class="badge">New</span>');
});

it('renders main content with actions slot', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:actions><button>Save</button></x-slot:actions>
            Content
        </ui:layout.main.content>
    ');

    expect($html)->toContain('<button>Save</button>');
});

it('renders main content with progress slot', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:progress><div class="progress-bar">50%</div></x-slot:progress>
            Content
        </ui:layout.main.content>
    ');

    expect($html)->toContain('<div class="progress-bar">50%</div>');
});

it('renders main content with nav slot', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:nav><ul class="tabs"><li>Tab 1</li></ul></x-slot:nav>
            Content
        </ui:layout.main.content>
    ');

    expect($html)
        ->toContain('<ul class="tabs"><li>Tab 1</li></ul>')
        ->toContain('data-layout-main-nav');
});

it('does not render nav element when nav slot is not set', function () {
    $html = Blade::render('<ui:layout.main.content>Content</ui:layout.main.content>');

    // Check that the nav element is not rendered (data attribute still appears in CSS selectors)
    expect($html)->not->toContain('<nav');
});

it('renders main content without banner by default', function () {
    $html = Blade::render('
        <ui:layout.main.content>
            <x-slot:nav>Nav</x-slot:nav>
            Content
        </ui:layout.main.content>
    ');

    expect($html)->toContain('top-14');
});

it('renders main content with banner prop', function () {
    $html = Blade::render('
        <ui:layout.main.content banner>
            <x-slot:nav>Nav</x-slot:nav>
            Content
        </ui:layout.main.content>
    ');

    expect($html)->toContain('top-24');
});

it('renders main content with toc prop', function () {
    $html = Blade::render('
        <ui:layout.main.content toc="Table of Contents">
            Content
        </ui:layout.main.content>
    ');

    expect($html)
        ->toContain('Table of Contents')
        ->toContain('data-layout-main-toc');
});

it('does not render toc aside when toc is null', function () {
    $html = Blade::render('<ui:layout.main.content>Content</ui:layout.main.content>');

    // Check that the toc aside element is not rendered (data attribute still appears in CSS selectors)
    expect($html)->not->toContain('<aside');
});

it('renders main content with default width of full', function () {
    $html = Blade::render('<ui:layout.main.content>Content</ui:layout.main.content>');

    expect($html)->toContain('max-w-full');
});

it('renders main content with custom width prop', function () {
    $html = Blade::render('<ui:layout.main.content width="3xl">Content</ui:layout.main.content>');

    expect($html)->toContain('max-w-3xl');
});

it('renders main content with width xl', function () {
    $html = Blade::render('<ui:layout.main.content width="xl">Content</ui:layout.main.content>');

    expect($html)->toContain('max-w-xl');
});

it('has responsive padding on main content', function () {
    $html = Blade::render('<ui:layout.main.content>Content</ui:layout.main.content>');

    expect($html)
        ->toContain('px-4')
        ->toContain('sm:px-8')
        ->toContain('lg:px-16')
        ->toContain('xl:px-20');
});

it('has toc sticky positioning without banner', function () {
    $html = Blade::render('
        <ui:layout.main.content toc="TOC">
            Content
        </ui:layout.main.content>
    ');

    expect($html)->toContain('top-24');
});

it('has toc sticky positioning with banner', function () {
    $html = Blade::render('
        <ui:layout.main.content banner toc="TOC">
            Content
        </ui:layout.main.content>
    ');

    expect($html)->toContain('top-34');
});

it('passes through additional attributes on main content', function () {
    $html = Blade::render('<ui:layout.main.content data-test="content-value" id="main-content">Content</ui:layout.main.content>');

    expect($html)
        ->toContain('data-test="content-value"')
        ->toContain('id="main-content"');
});

// =============================================================================
// Top Bar (layout/main/top-bar.blade.php)
// Props: banner
// =============================================================================

it('renders a basic top bar', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Top Bar Content</ui:layout.main.top-bar>');

    expect($html)
        ->toContain('Top Bar Content')
        ->toContain('data-layout-main-top-bar');
});

it('renders top bar with slot content', function () {
    $html = Blade::render('<ui:layout.main.top-bar><div class="user-menu">User Menu</div></ui:layout.main.top-bar>');

    expect($html)->toContain('<div class="user-menu">User Menu</div>');
});

it('renders top bar as header element', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    expect($html)
        ->toContain('<header')
        ->toContain('</header>');
});

it('renders top bar without banner by default', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    expect($html)->toContain('top-0');
});

it('renders top bar with banner prop', function () {
    $html = Blade::render('<ui:layout.main.top-bar banner>Content</ui:layout.main.top-bar>');

    expect($html)->toContain('top-10');
});

it('renders top bar with banner set to false', function () {
    $html = Blade::render('<ui:layout.main.top-bar :banner="false">Content</ui:layout.main.top-bar>');

    expect($html)->toContain('top-0');
});

it('has sticky positioning on top bar', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    expect($html)
        ->toContain('sticky')
        ->toContain('z-30');
});

it('has flex layout on top bar', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    expect($html)
        ->toContain('flex')
        ->toContain('items-center')
        ->toContain('justify-between')
        ->toContain('gap-4');
});

it('has responsive padding on top bar', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    expect($html)
        ->toContain('px-4')
        ->toContain('sm:px-8')
        ->toContain('lg:px-16')
        ->toContain('xl:px-20');
});

it('has border styling on top bar', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    expect($html)->toContain('border-b');
});

it('has background styling on top bar', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    expect($html)->toContain('bg-white');
});

it('has dark mode styling on top bar', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    expect($html)->toContain('dark:bg-gray-800');
});

it('has scrolled state styling on top bar', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    // HTML entities are encoded in output
    expect($html)
        ->toContain('[&amp;.scrolled]:border-gray-60')
        ->toContain('[&amp;.scrolled]:dark:border-gray-740');
});

it('renders mobile menu toggle button', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    expect($html)
        ->toContain('xl:hidden')
        ->toContain('x-on:click="sideBarOpen = true"');
});

it('renders top bar with breadcrumbs slot', function () {
    $html = Blade::render('
        <ui:layout.main.top-bar>
            <x-slot:breadcrumbs>
                <span>Home</span> / <span>Page</span>
            </x-slot:breadcrumbs>
            Content
        </ui:layout.main.top-bar>
    ');

    expect($html)
        ->toContain('<span>Home</span>')
        ->toContain('<span>Page</span>');
});

it('does not render breadcrumbs wrapper when breadcrumbs slot is not set', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    // Check that breadcrumbs component is not rendered
    expect($html)->not->toContain('data-breadcrumbs');
});

it('renders top bar with actions slot', function () {
    $html = Blade::render('
        <ui:layout.main.top-bar>
            <x-slot:actions><button>Action</button></x-slot:actions>
            Content
        </ui:layout.main.top-bar>
    ');

    expect($html)->toContain('<button>Action</button>');
});

it('has fixed height for left section', function () {
    $html = Blade::render('<ui:layout.main.top-bar>Content</ui:layout.main.top-bar>');

    expect($html)->toContain('h-14');
});

// Note: top-bar component does not pass through additional attributes (by design)
// The class is hardcoded and $attributes is not used

// =============================================================================
// Composed Usage
// =============================================================================

it('renders a complete sidebar with header, nav, and footer', function () {
    $html = Blade::render('
        <ui:layout.sidebar>
            <ui:layout.sidebar.header>
                Logo
            </ui:layout.sidebar.header>
            <ui:layout.sidebar.nav>
                <ul>
                    <li>Dashboard</li>
                    <li>Settings</li>
                </ul>
            </ui:layout.sidebar.nav>
            <ui:layout.sidebar.footer>
                User Info
            </ui:layout.sidebar.footer>
        </ui:layout.sidebar>
    ');

    expect($html)
        ->toContain('data-layout-sidebar')
        ->toContain('data-layout-sidebar-header')
        ->toContain('data-layout-sidebar-nav')
        ->toContain('data-layout-sidebar-footer')
        ->toContain('Logo')
        ->toContain('Dashboard')
        ->toContain('Settings')
        ->toContain('User Info');
});

it('renders sidebar with banner affecting positioning', function () {
    $html = Blade::render('
        <ui:layout.sidebar banner>
            <ui:layout.sidebar.header>Header</ui:layout.sidebar.header>
            <ui:layout.sidebar.nav>Nav</ui:layout.sidebar.nav>
        </ui:layout.sidebar>
    ');

    expect($html)
        ->toContain('top-10')
        ->toContain('h-[calc(100vh-2.5rem)]');
});

it('renders main content with top bar, nav, and content', function () {
    $html = Blade::render('
        <div>
            <ui:layout.main.top-bar>
                <x-slot:breadcrumbs>Home / Page</x-slot:breadcrumbs>
                User Menu
            </ui:layout.main.top-bar>
            <ui:layout.main.content>
                <x-slot:title>Page Title</x-slot:title>
                <x-slot:actions><button>Save</button></x-slot:actions>
                <x-slot:nav>Tab Navigation</x-slot:nav>
                Main body content
            </ui:layout.main.content>
        </div>
    ');

    expect($html)
        ->toContain('data-layout-main-top-bar')
        ->toContain('data-layout-main-content')
        ->toContain('data-layout-main-header')
        ->toContain('data-layout-main-nav')
        ->toContain('data-layout-main-body')
        ->toContain('Home / Page')
        ->toContain('User Menu')
        ->toContain('Page Title')
        ->toContain('<button>Save</button>')
        ->toContain('Tab Navigation')
        ->toContain('Main body content');
});

it('renders main content with toc sidebar', function () {
    $html = Blade::render('
        <ui:layout.main.content toc="Table of contents here" width="4xl">
            <x-slot:title>Documentation</x-slot:title>
            Article content
        </ui:layout.main.content>
    ');

    expect($html)
        ->toContain('data-layout-main-content')
        ->toContain('data-layout-main-toc')
        ->toContain('Table of contents here')
        ->toContain('max-w-4xl')
        ->toContain('Documentation')
        ->toContain('Article content');
});

it('renders full layout with banner affecting all components', function () {
    $html = Blade::render('
        <div>
            <ui:layout.sidebar banner>
                <ui:layout.sidebar.header>Logo</ui:layout.sidebar.header>
                <ui:layout.sidebar.nav>Navigation</ui:layout.sidebar.nav>
            </ui:layout.sidebar>
            <ui:layout.main.top-bar banner>
                Breadcrumbs
            </ui:layout.main.top-bar>
            <ui:layout.main.content banner>
                <x-slot:nav>Tabs</x-slot:nav>
                Content
            </ui:layout.main.content>
        </div>
    ');

    // Sidebar with banner
    expect($html)
        ->toContain('data-layout-sidebar')
        ->toContain('h-[calc(100vh-2.5rem)]');

    // Top bar with banner
    expect($html)->toContain('data-layout-main-top-bar');

    // Main content with banner
    expect($html)
        ->toContain('data-layout-main-content')
        ->toContain('data-layout-main-nav');
});
