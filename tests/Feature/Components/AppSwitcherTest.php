<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// App Switcher (index.blade.php)
// Props: current, title
// =============================================================================

it('renders app switcher', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)
        ->toContain('x-data')
        ->toContain('data-app-switcher');
});

it('renders app switcher with default current value of 0', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)->toContain('current: 0');
});

it('renders app switcher with custom current value', function () {
    $html = Blade::render('<ui:app-switcher :current="2" />');

    expect($html)->toContain('current: 2');
});

it('renders app switcher with default title', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)->toContain('Switch app');
});

it('renders app switcher with custom title', function () {
    $html = Blade::render('<ui:app-switcher title="Select Application" />');

    expect($html)->toContain('Select Application');
});

it('has data-app-switcher-overlay attribute', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)->toContain('data-app-switcher-overlay');
});

it('has data-app-switcher-panel attribute', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)->toContain('data-app-switcher-panel');
});

it('has data-app-switcher-title attribute', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)->toContain('data-app-switcher-title');
});

it('has data-app-switcher-hint attribute', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)->toContain('data-app-switcher-hint');
});

it('has proper ARIA attributes', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)
        ->toContain('role="dialog"')
        ->toContain('aria-modal="true"')
        ->toContain('role="listbox"');
});

it('has x-cloak attribute on overlay', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)->toContain('x-cloak');
});

it('has keyboard navigation handlers', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)
        ->toContain('x-on:keydown.window="handleKeydown"')
        ->toContain('x-on:keyup.window="handleKeyup"');
});

it('includes Alpine.js state management methods', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)
        ->toContain('open: false')
        ->toContain('selected: 0')
        ->toContain('toggle()')
        ->toContain('openSwitcher()')
        ->toContain('close()')
        ->toContain('next()')
        ->toContain('previous()')
        ->toContain('select(index)')
        ->toContain('activate()');
});

it('has transition animations', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)
        ->toContain('x-transition:enter')
        ->toContain('x-transition:leave');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:app-switcher data-testid="app-switcher-test" />');

    expect($html)->toContain('data-testid="app-switcher-test"');
});

it('renders slot content', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <div class="custom-slot-content">Custom Content</div>
        </ui:app-switcher>
    ');

    expect($html)->toContain('custom-slot-content');
});

it('has overlay styling classes', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)
        ->toContain('fixed')
        ->toContain('inset-0')
        ->toContain('z-50');
});

it('has panel styling classes', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)
        ->toContain('min-w-72')
        ->toContain('rounded-xl')
        ->toContain('shadow-2xl');
});

it('displays keyboard shortcuts in hint', function () {
    $html = Blade::render('<ui:app-switcher />');

    expect($html)
        ->toContain('to cycle')
        ->toContain('to select')
        ->toContain('to close');
});

// =============================================================================
// App Switcher Item (item.blade.php)
// Props: color, description, href, icon, name
// =============================================================================

it('renders app switcher item', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item />
        </ui:app-switcher>
    ');

    expect($html)->toContain('data-app-switcher-item');
});

it('renders app switcher item with name prop', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Dashboard" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('Dashboard');
});

it('renders app switcher item with description prop', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Dashboard" description="Main application dashboard" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('Main application dashboard');
});

it('renders app switcher item with href prop', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Dashboard" href="/dashboard" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('data-href="/dashboard"');
});

it('renders app switcher item with default href #', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Test" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('data-href="#"');
});

it('renders app switcher item with icon prop', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Settings" icon="settings" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('<svg');
});

it('renders app switcher item with color prop', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="CRM" color="blue" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('text-blue-500');
});

it('renders app switcher item with various color options', function () {
    $colors = ['blue', 'cyan', 'emerald', 'lime', 'orange', 'pink', 'purple', 'red', 'yellow'];

    foreach ($colors as $color) {
        $html = Blade::render("
            <ui:app-switcher>
                <ui:app-switcher.item name=\"Test\" color=\"{$color}\" />
            </ui:app-switcher>
        ");

        expect($html)->toContain("text-{$color}-500");
    }
});

it('renders app switcher item with default logo when no icon or slot', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item />
        </ui:app-switcher>
    ');

    expect($html)
        ->toContain('-skew-x-12')
        ->toContain('III');
});

it('renders app switcher item with slot content', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Custom">
                <img src="/logo.png" alt="Logo" />
            </ui:app-switcher.item>
        </ui:app-switcher>
    ');

    expect($html)->toContain('src="/logo.png"');
});

it('has role option attribute on item', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Test" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('role="option"');
});

it('has tabindex on item', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Test" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('tabindex="0"');
});

it('has data-app-switcher-item-content attribute', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Test" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('data-app-switcher-item-content');
});

it('has Alpine.js x-data and x-init on item', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Test" />
        </ui:app-switcher>
    ');

    expect($html)
        ->toContain('x-data="{ index: null }"')
        ->toContain('x-init');
});

it('has click handler on item', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Test" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('x-on:click="select(index); activate()"');
});

it('has conditional selected styling on item', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Test" />
        </ui:app-switcher>
    ');

    expect($html)->toContain(':class="{ \'bg-gray-50 dark:bg-gray-700\': selected === index }"');
});

it('passes through additional attributes on item', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Test" data-testid="item-test" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('data-testid="item-test"');
});

it('has cursor-pointer class on item', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Test" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('cursor-pointer');
});

it('has hover styling on item', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Test" />
        </ui:app-switcher>
    ');

    expect($html)->toContain('hover:bg-gray-50');
});

it('shows check icon for current item', function () {
    $html = Blade::render('
        <ui:app-switcher>
            <ui:app-switcher.item name="Test" />
        </ui:app-switcher>
    ');

    expect($html)->toContain("x-bind:class=\"current === index ? 'opacity-100' : 'opacity-0'\"");
});

// =============================================================================
// Theme Switcher (index.blade.php)
// Props: size, storageKey, variant
// =============================================================================

it('renders theme switcher', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)
        ->toContain('x-data')
        ->toContain('data-theme-switcher');
});

it('renders theme switcher with default size sm', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)->toContain('min-h-8');
});

it('renders theme switcher with custom size', function () {
    $html = Blade::render('<ui:theme-switcher size="md" />');

    expect($html)->toContain('min-h-10');
});

it('renders theme switcher with default storageKey', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)->toContain("localStorage.getItem('mach3ui-theme')");
});

it('renders theme switcher with custom storageKey', function () {
    $html = Blade::render('<ui:theme-switcher storageKey="my-app-theme" />');

    expect($html)->toContain("localStorage.getItem('my-app-theme')");
});

it('renders theme switcher with default variant ghost', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)->toContain('data-variant="ghost"');
});

it('renders theme switcher with custom variant', function () {
    $html = Blade::render('<ui:theme-switcher variant="subtle" />');

    expect($html)->toContain('data-variant="subtle"');
});

it('renders three mode buttons (system, light, dark)', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)
        ->toContain('aria-label="System mode"')
        ->toContain('aria-label="Light mode"')
        ->toContain('aria-label="Dark mode"');
});

it('has click handlers for each mode', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)
        ->toContain("x-on:click=\"mode = 'system'\"")
        ->toContain("x-on:click=\"mode = 'light'\"")
        ->toContain("x-on:click=\"mode = 'dark'\"");
});

it('has data-active binding for selected mode', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)
        ->toContain("x-bind:data-active=\"mode === 'system' ? '' : null\"")
        ->toContain("x-bind:data-active=\"mode === 'light' ? '' : null\"")
        ->toContain("x-bind:data-active=\"mode === 'dark' ? '' : null\"");
});

it('includes Alpine.js state management', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)
        ->toContain('mode:')
        ->toContain('init()')
        ->toContain('setMode(mode)')
        ->toContain('applyTheme(mode)');
});

it('handles localStorage for theme persistence', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)
        ->toContain('localStorage.getItem')
        ->toContain('localStorage.setItem')
        ->toContain('localStorage.removeItem');
});

it('listens for system preference changes', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)->toContain("window.matchMedia('(prefers-color-scheme: dark)')");
});

it('toggles dark and light classes on html element', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)
        ->toContain("html.classList.toggle('dark'")
        ->toContain("html.classList.toggle('light'");
});

it('has inline-flex and gap classes', function () {
    $html = Blade::render('<ui:theme-switcher />');

    expect($html)
        ->toContain('inline-flex')
        ->toContain('gap-1');
});

it('passes through additional attributes on theme switcher', function () {
    $html = Blade::render('<ui:theme-switcher data-testid="theme-test" />');

    expect($html)->toContain('data-testid="theme-test"');
});

it('merges custom classes on theme switcher', function () {
    $html = Blade::render('<ui:theme-switcher class="custom-class" />');

    expect($html)->toContain('custom-class');
});

// =============================================================================
// Browser (index.blade.php)
// Props: height, src, title
// =============================================================================

it('renders browser component', function () {
    $html = Blade::render('<ui:browser />');

    expect($html)->toContain('data-browser');
});

it('renders browser with default height', function () {
    $html = Blade::render('<ui:browser />');

    expect($html)->toContain('height: 600px');
});

it('renders browser with custom height', function () {
    $html = Blade::render('<ui:browser height="400px" />');

    expect($html)->toContain('height: 400px');
});

it('renders browser without title by default', function () {
    $html = Blade::render('<ui:browser />');

    expect($html)->not->toContain('data-browser-title');
});

it('renders browser with title prop', function () {
    $html = Blade::render('<ui:browser title="Example Website" />');

    expect($html)
        ->toContain('data-browser-title')
        ->toContain('Example Website');
});

it('renders browser with src as iframe', function () {
    $html = Blade::render('<ui:browser src="https://example.com" />');

    expect($html)
        ->toContain('<iframe')
        ->toContain('src="https://example.com"')
        ->toContain('data-browser-iframe');
});

it('renders browser without src as content div', function () {
    $html = Blade::render('<ui:browser />');

    expect($html)
        ->toContain('data-browser-content')
        ->not->toContain('data-browser-iframe');
});

it('renders browser slot content when no src', function () {
    $html = Blade::render('
        <ui:browser>
            <div class="custom-content">Custom browser content</div>
        </ui:browser>
    ');

    expect($html)->toContain('custom-content');
});

it('has browser header with dots', function () {
    $html = Blade::render('<ui:browser />');

    expect($html)
        ->toContain('data-browser-header')
        ->toContain('data-browser-dots');
});

it('has three colored dots', function () {
    $html = Blade::render('<ui:browser />');

    expect($html)
        ->toContain('bg-red-400')
        ->toContain('bg-yellow-400')
        ->toContain('bg-green-400');
});

it('has browser body', function () {
    $html = Blade::render('<ui:browser />');

    expect($html)->toContain('data-browser-body');
});

it('has rounded-lg class on browser', function () {
    $html = Blade::render('<ui:browser />');

    expect($html)->toContain('rounded-lg');
});

it('has border styling on browser', function () {
    $html = Blade::render('<ui:browser />');

    expect($html)->toContain('border');
});

it('has overflow-hidden class on browser', function () {
    $html = Blade::render('<ui:browser />');

    expect($html)->toContain('overflow-hidden');
});

it('passes through additional attributes on browser', function () {
    $html = Blade::render('<ui:browser data-testid="browser-test" />');

    expect($html)->toContain('data-testid="browser-test"');
});

it('merges custom classes on browser', function () {
    $html = Blade::render('<ui:browser class="custom-class" />');

    expect($html)->toContain('custom-class');
});

it('renders browser with both title and src', function () {
    $html = Blade::render('<ui:browser title="My Site" src="https://mysite.com" />');

    expect($html)
        ->toContain('My Site')
        ->toContain('src="https://mysite.com"')
        ->toContain('<iframe');
});

// =============================================================================
// Logo (index.blade.php)
// Props: brand, color, href, image, size
// =============================================================================

it('renders logo component', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)->toContain('data-logo');
});

it('renders logo as div by default (no href)', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)
        ->toContain('<div')
        ->not->toContain('<a');
});

it('renders logo as link when href is provided', function () {
    $html = Blade::render('<ui:logo href="/home" />');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/home"');
});

it('renders logo with default brand from config or fallback', function () {
    config(['app.name' => null]);
    $html = Blade::render('<ui:logo />');

    expect($html)->toContain('Builders');
});

it('renders logo with custom brand', function () {
    $html = Blade::render('<ui:logo brand="Studio" />');

    expect($html)->toContain('Studio');
});

it('renders logo with default color gray', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)->toContain('text-gray-500');
});

it('renders logo with custom color', function () {
    $html = Blade::render('<ui:logo color="blue" />');

    expect($html)->toContain('text-blue-500');
});

it('renders logo with various color options', function () {
    $colors = ['gray', 'blue', 'orange', 'emerald', 'cyan', 'teal', 'lime', 'red', 'purple', 'pink', 'yellow'];

    foreach ($colors as $color) {
        $html = Blade::render("<ui:logo color=\"{$color}\" />");

        expect($html)->toContain("text-{$color}-500");
    }
});

it('renders logo with default size md', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)->toContain('text-base');
});

it('renders logo with sm size', function () {
    $html = Blade::render('<ui:logo size="sm" />');

    expect($html)->toContain('text-sm');
});

it('renders logo with lg size', function () {
    $html = Blade::render('<ui:logo size="lg" />');

    expect($html)->toContain('text-lg');
});

it('renders logo with xl size', function () {
    $html = Blade::render('<ui:logo size="xl" />');

    expect($html)->toContain('text-xl');
});

it('renders logo with 2xl size', function () {
    $html = Blade::render('<ui:logo size="2xl" />');

    expect($html)->toContain('text-2xl');
});

it('renders logo with image when provided', function () {
    $html = Blade::render('<ui:logo image="/logo.png" />');

    expect($html)
        ->toContain('<img')
        ->toContain('src="/logo.png"')
        ->toContain('data-logo-image');
});

it('renders logo text parts when no image', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)
        ->toContain('data-logo-prefix')
        ->toContain('data-logo-accent')
        ->toContain('data-logo-brand')
        ->toContain('Mach3')
        ->toContain('III');
});

it('hides text parts when image is provided', function () {
    $html = Blade::render('<ui:logo image="/logo.png" />');

    expect($html)
        ->not->toContain('data-logo-prefix')
        ->not->toContain('data-logo-accent')
        ->not->toContain('data-logo-brand');
});

it('has skewed accent element', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)->toContain('-skew-x-12');
});

it('has uppercase and tracking-wide classes', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)
        ->toContain('uppercase')
        ->toContain('tracking-wide');
});

it('has font-brand and font-bold classes', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)
        ->toContain('font-brand')
        ->toContain('font-bold');
});

it('has no-underline class when href is provided', function () {
    $html = Blade::render('<ui:logo href="/home" />');

    expect($html)->toContain('no-underline');
});

it('only passes specific attributes on logo (wire:navigate, x-on:click, x-bind:href)', function () {
    // Logo component intentionally only passes specific attributes
    $html = Blade::render('<ui:logo href="/" />');

    expect($html)
        ->toContain('href="/"')
        ->toContain('data-logo');
});

it('merges custom classes on logo', function () {
    $html = Blade::render('<ui:logo class="custom-class" />');

    expect($html)->toContain('custom-class');
});

it('passes wire:navigate attribute on link', function () {
    $html = Blade::render('<ui:logo href="/home" wire:navigate />');

    expect($html)->toContain('wire:navigate');
});

it('passes x-on:click attribute on logo', function () {
    $html = Blade::render('<ui:logo href="/home" x-on:click="handleClick" />');

    expect($html)->toContain('x-on:click="handleClick"');
});

it('has inline-flex and items-center classes', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)
        ->toContain('inline-flex')
        ->toContain('items-center');
});

it('has select-none class', function () {
    $html = Blade::render('<ui:logo />');

    expect($html)->toContain('select-none');
});

// =============================================================================
// Integration Tests
// =============================================================================

it('renders complete app switcher with multiple items', function () {
    $html = Blade::render('
        <ui:app-switcher :current="1" title="My Apps">
            <ui:app-switcher.item name="Dashboard" description="Main dashboard" href="/dashboard" color="blue" />
            <ui:app-switcher.item name="CRM" description="Customer management" href="/crm" color="emerald" />
            <ui:app-switcher.item name="Settings" icon="settings" href="/settings" />
        </ui:app-switcher>
    ');

    expect($html)
        ->toContain('data-app-switcher')
        ->toContain('current: 1')
        ->toContain('My Apps')
        ->toContain('Dashboard')
        ->toContain('Main dashboard')
        ->toContain('data-href="/dashboard"')
        ->toContain('text-blue-500')
        ->toContain('CRM')
        ->toContain('Customer management')
        ->toContain('text-emerald-500')
        ->toContain('Settings')
        ->toContain('data-href="/settings"');
});

it('renders logo as navigation link with all props', function () {
    $html = Blade::render('<ui:logo href="/" brand="Studio" color="purple" size="lg" wire:navigate />');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/"')
        ->toContain('Studio')
        ->toContain('text-purple-500')
        ->toContain('text-lg')
        ->toContain('wire:navigate')
        ->toContain('no-underline');
});

it('renders browser as documentation preview', function () {
    $html = Blade::render('
        <ui:browser title="Component Preview" height="300px">
            <div class="p-4">
                <ui:button>Click me</ui:button>
            </div>
        </ui:browser>
    ');

    expect($html)
        ->toContain('data-browser')
        ->toContain('Component Preview')
        ->toContain('height: 300px')
        ->toContain('data-browser-content')
        ->toContain('Click me');
});

it('renders theme switcher with custom configuration', function () {
    $html = Blade::render('<ui:theme-switcher size="md" variant="subtle" storageKey="app-theme" />');

    expect($html)
        ->toContain('data-theme-switcher')
        ->toContain('min-h-10')
        ->toContain('data-variant="subtle"')
        ->toContain("localStorage.getItem('app-theme')");
});
