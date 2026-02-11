<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Toast Component Tests
// =============================================================================

it('renders a basic toast with title prop', function () {
    $html = Blade::render('<ui:toast title="Test Title" />');

    expect($html)
        ->toContain('data-toast')
        ->toContain('Test Title')
        ->toContain('data-toast-title');
});

it('renders toast with slot content when no title prop', function () {
    $html = Blade::render('<ui:toast>Custom slot content</ui:toast>');

    expect($html)
        ->toContain('data-toast')
        ->toContain('Custom slot content');
});

it('renders toast with title and description', function () {
    $html = Blade::render('<ui:toast title="Title" description="Description text" />');

    expect($html)
        ->toContain('Title')
        ->toContain('Description text')
        ->toContain('data-toast-description');
});

it('renders toast with dismissible close button by default', function () {
    $html = Blade::render('<ui:toast title="Title" />');

    expect($html)
        ->toContain('data-toast-close')
        ->toContain('x-on:click="open = false"');
});

it('hides close button when dismissible is false', function () {
    $html = Blade::render('<ui:toast title="Title" :dismissible="false" />');

    expect($html)
        ->not->toContain('data-toast-close');
});

it('renders toast icon by default', function () {
    $html = Blade::render('<ui:toast title="Title" />');

    expect($html)
        ->toContain('data-toast-icon')
        ->toContain('<svg');
});

it('hides icon when icon is false', function () {
    $html = Blade::render('<ui:toast title="Title" :icon="false" />');

    expect($html)
        ->not->toContain('data-toast-icon');
});

it('allows custom icon', function () {
    $html = Blade::render('<ui:toast title="Title" icon="star" />');

    expect($html)
        ->toContain('data-toast-icon')
        ->toContain('<svg');
});

it('has Alpine.js x-data attribute', function () {
    $html = Blade::render('<ui:toast title="Title" />');

    expect($html)
        ->toContain('x-data="{ open: false }"')
        ->toContain('x-init="$nextTick(() => open = true)"')
        ->toContain('x-show="open"');
});

it('has x-cloak attribute', function () {
    $html = Blade::render('<ui:toast title="Title" />');

    expect($html)->toContain('x-cloak');
});

it('has transition attributes', function () {
    $html = Blade::render('<ui:toast title="Title" />');

    expect($html)
        ->toContain('x-transition:enter="transition ease-out duration-200"')
        ->toContain('x-transition:leave="transition ease-in duration-150"');
});

it('applies default variant styling', function () {
    $html = Blade::render('<ui:toast title="Title" />');

    expect($html)
        ->toContain('data-variant="default"')
        ->toContain('border-gray-100')
        ->toContain('bg-gray-20');
});

it('applies info variant styling', function () {
    $html = Blade::render('<ui:toast title="Title" variant="info" />');

    expect($html)
        ->toContain('data-variant="info"')
        ->toContain('border-cyan-200')
        ->toContain('bg-cyan-50');
});

it('applies success variant styling', function () {
    $html = Blade::render('<ui:toast title="Title" variant="success" />');

    expect($html)
        ->toContain('data-variant="success"')
        ->toContain('border-green-200')
        ->toContain('bg-green-50');
});

it('applies warning variant styling', function () {
    $html = Blade::render('<ui:toast title="Title" variant="warning" />');

    expect($html)
        ->toContain('data-variant="warning"')
        ->toContain('border-amber-200')
        ->toContain('bg-amber-50');
});

it('applies danger variant styling', function () {
    $html = Blade::render('<ui:toast title="Title" variant="danger" />');

    expect($html)
        ->toContain('data-variant="danger"')
        ->toContain('border-red-200')
        ->toContain('bg-red-50');
});

it('has rounded-lg styling', function () {
    $html = Blade::render('<ui:toast title="Title" />');

    expect($html)->toContain('rounded-lg');
});

it('has shadow-lg styling', function () {
    $html = Blade::render('<ui:toast title="Title" />');

    expect($html)->toContain('shadow-lg');
});

it('has backdrop-blur-xl styling', function () {
    $html = Blade::render('<ui:toast title="Title" />');

    expect($html)->toContain('backdrop-blur-xl');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:toast title="Title" data-test="value" />');

    expect($html)->toContain('data-test="value"');
});

// =============================================================================
// Toast Title Component Tests
// =============================================================================

it('renders toast title with slot content', function () {
    $html = Blade::render('<ui:toast.title>My Title</ui:toast.title>');

    expect($html)
        ->toContain('data-toast-title')
        ->toContain('My Title');
});

it('applies title styling', function () {
    $html = Blade::render('<ui:toast.title>Title</ui:toast.title>');

    expect($html)
        ->toContain('font-semibold')
        ->toContain('leading-6')
        ->toContain('text-gray-900');
});

it('passes through attributes to toast title', function () {
    $html = Blade::render('<ui:toast.title id="my-title" data-custom="value">Title</ui:toast.title>');

    expect($html)
        ->toContain('id="my-title"')
        ->toContain('data-custom="value"');
});

// =============================================================================
// Toast Description Component Tests
// =============================================================================

it('renders toast description with slot content', function () {
    $html = Blade::render('<ui:toast.description>My description</ui:toast.description>');

    expect($html)
        ->toContain('data-toast-description')
        ->toContain('My description');
});

it('applies default variant styling to description', function () {
    $html = Blade::render('<ui:toast.description>Description</ui:toast.description>');

    expect($html)
        ->toContain('text-gray-600');
});

it('applies info variant styling to description', function () {
    $html = Blade::render('<ui:toast.description variant="info">Description</ui:toast.description>');

    expect($html)
        ->toContain('text-cyan-700');
});

it('applies success variant styling to description', function () {
    $html = Blade::render('<ui:toast.description variant="success">Description</ui:toast.description>');

    expect($html)
        ->toContain('text-green-700');
});

it('applies warning variant styling to description', function () {
    $html = Blade::render('<ui:toast.description variant="warning">Description</ui:toast.description>');

    expect($html)
        ->toContain('text-amber-700');
});

it('applies danger variant styling to description', function () {
    $html = Blade::render('<ui:toast.description variant="danger">Description</ui:toast.description>');

    expect($html)
        ->toContain('text-red-700');
});

it('passes through attributes to toast description', function () {
    $html = Blade::render('<ui:toast.description id="desc" data-test="val">Desc</ui:toast.description>');

    expect($html)
        ->toContain('id="desc"')
        ->toContain('data-test="val"');
});

// =============================================================================
// Toast Action Component Tests
// =============================================================================

it('renders toast action with slot content', function () {
    $html = Blade::render('<ui:toast.action><button>Click me</button></ui:toast.action>');

    expect($html)
        ->toContain('data-toast-action')
        ->toContain('Click me');
});

it('applies action styling', function () {
    $html = Blade::render('<ui:toast.action>Action</ui:toast.action>');

    expect($html)
        ->toContain('mt-4')
        ->toContain('flex')
        ->toContain('gap-2');
});

it('passes through attributes to toast action', function () {
    $html = Blade::render('<ui:toast.action id="actions" data-test="value">Action</ui:toast.action>');

    expect($html)
        ->toContain('id="actions"')
        ->toContain('data-test="value"');
});

// =============================================================================
// Toast Close Component Tests
// =============================================================================

it('renders toast close button', function () {
    $html = Blade::render('<ui:toast.close />');

    expect($html)
        ->toContain('data-toast-close')
        ->toContain('type="button"')
        ->toContain('x-on:click="open = false"');
});

it('renders close button with x icon', function () {
    $html = Blade::render('<ui:toast.close />');

    expect($html)->toContain('<svg');
});

it('applies default variant styling to close button', function () {
    $html = Blade::render('<ui:toast.close />');

    expect($html)
        ->toContain('text-gray-400')
        ->toContain('hover:bg-gray-100');
});

it('applies info variant styling to close button', function () {
    $html = Blade::render('<ui:toast.close variant="info" />');

    expect($html)
        ->toContain('text-cyan-400')
        ->toContain('hover:bg-cyan-100/50');
});

it('applies success variant styling to close button', function () {
    $html = Blade::render('<ui:toast.close variant="success" />');

    expect($html)
        ->toContain('text-green-400')
        ->toContain('hover:bg-green-100/50');
});

it('applies warning variant styling to close button', function () {
    $html = Blade::render('<ui:toast.close variant="warning" />');

    expect($html)
        ->toContain('text-amber-400')
        ->toContain('hover:bg-amber-100/50');
});

it('applies danger variant styling to close button', function () {
    $html = Blade::render('<ui:toast.close variant="danger" />');

    expect($html)
        ->toContain('text-red-400')
        ->toContain('hover:bg-red-100/50');
});

it('applies close button base styling', function () {
    $html = Blade::render('<ui:toast.close />');

    expect($html)
        ->toContain('cursor-pointer')
        ->toContain('rounded')
        ->toContain('size-6');
});

it('passes through attributes to toast close', function () {
    $html = Blade::render('<ui:toast.close id="close-btn" data-test="value" />');

    expect($html)
        ->toContain('id="close-btn"')
        ->toContain('data-test="value"');
});

// =============================================================================
// Toaster Component Tests
// =============================================================================

it('renders toaster container', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)
        ->toContain('data-toaster')
        ->toContain('x-data');
});

it('has default position bottom-right', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)
        ->toContain('data-position="bottom-right"')
        ->toContain('bottom-4')
        ->toContain('right-4')
        ->toContain('items-end');
});

it('applies top-left position', function () {
    $html = Blade::render('<ui:toaster position="top-left" />');

    expect($html)
        ->toContain('data-position="top-left"')
        ->toContain('top-4')
        ->toContain('left-4')
        ->toContain('items-start');
});

it('applies top-right position', function () {
    $html = Blade::render('<ui:toaster position="top-right" />');

    expect($html)
        ->toContain('data-position="top-right"')
        ->toContain('top-4')
        ->toContain('right-4')
        ->toContain('items-end');
});

it('applies top-center position', function () {
    $html = Blade::render('<ui:toaster position="top-center" />');

    expect($html)
        ->toContain('data-position="top-center"')
        ->toContain('top-4')
        ->toContain('left-1/2')
        ->toContain('-translate-x-1/2')
        ->toContain('items-center');
});

it('applies bottom-left position', function () {
    $html = Blade::render('<ui:toaster position="bottom-left" />');

    expect($html)
        ->toContain('data-position="bottom-left"')
        ->toContain('bottom-4')
        ->toContain('left-4')
        ->toContain('items-start');
});

it('applies bottom-center position', function () {
    $html = Blade::render('<ui:toaster position="bottom-center" />');

    expect($html)
        ->toContain('data-position="bottom-center"')
        ->toContain('bottom-4')
        ->toContain('left-1/2')
        ->toContain('-translate-x-1/2')
        ->toContain('items-center');
});

it('has fixed positioning', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('fixed');
});

it('has high z-index', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('z-[9999]');
});

it('has pointer-events-none on container', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('pointer-events-none');
});

it('has flex column layout with gap', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)
        ->toContain('flex')
        ->toContain('flex-col')
        ->toContain('gap-3');
});

it('listens for notify window event', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('x-on:notify.window="add($event.detail)"');
});

it('has default duration of 4000ms', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('duration: 4000');
});

it('accepts custom duration', function () {
    $html = Blade::render('<ui:toaster :duration="3000" />');

    expect($html)->toContain('duration: 3000');
});

it('has Alpine.js add method', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('add(toast)');
});

it('has Alpine.js dismiss method', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('dismiss(id)');
});

it('has toasts array in x-data', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('toasts: []');
});

it('has template with x-for for rendering toasts', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('x-for="toast in toasts"');
});

it('has variant classes defined', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)
        ->toContain('variantClasses')
        ->toContain('iconClasses')
        ->toContain('messageClasses')
        ->toContain('closeClasses');
});

it('has icons defined for each variant', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('icons');
});

it('renders toast item template with pointer-events-auto', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('pointer-events-auto');
});

it('has data-toaster-item attribute in template', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('data-toaster-item');
});

it('has data-toaster-title in template', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('data-toaster-title');
});

it('has data-toaster-message in template', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('data-toaster-message');
});

it('has data-toaster-close in template', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('data-toaster-close');
});

it('has data-toast-icon in template', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)->toContain('data-toast-icon');
});

it('passes through additional attributes to toaster', function () {
    $html = Blade::render('<ui:toaster id="my-toaster" data-test="value" />');

    expect($html)
        ->toContain('id="my-toaster"')
        ->toContain('data-test="value"');
});

it('has transition attributes for toast items', function () {
    $html = Blade::render('<ui:toaster />');

    expect($html)
        ->toContain('x-transition:enter="transition ease-out duration-200"')
        ->toContain('x-transition:leave="transition ease-in duration-150"');
});

it('calculates translate direction based on position', function () {
    $html = Blade::render('<ui:toaster position="top-left" />');

    expect($html)->toContain('-translate-x-full');
});
