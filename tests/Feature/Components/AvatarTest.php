<?php

use Illuminate\Support\Facades\Blade;

// ============================================
// Avatar Component Tests
// ============================================

it('renders a basic avatar', function () {
    $html = Blade::render('<ui:avatar name="John Doe" />');

    expect($html)
        ->toContain('data-avatar');
});

it('renders with name and generates initials', function () {
    $html = Blade::render('<ui:avatar name="John Doe" />');

    expect($html)
        ->toContain('JD')
        ->toContain('data-avatar');
});

it('generates two-letter initials from single word name', function () {
    $html = Blade::render('<ui:avatar name="John" />');

    expect($html)->toContain('JO');
});

it('generates initials from first two words only', function () {
    $html = Blade::render('<ui:avatar name="John Michael Doe" />');

    expect($html)->toContain('JM');
});

it('handles unicode characters in name for initials', function () {
    $html = Blade::render('<ui:avatar name="Émile Zola" />');

    expect($html)->toContain('ÉZ');
});

it('renders with image src', function () {
    $html = Blade::render('<ui:avatar src="https://example.com/avatar.jpg" />');

    expect($html)
        ->toContain('src="https://example.com/avatar.jpg"')
        ->toContain('data-avatar-image')
        ->toContain('data-avatar');
});

it('renders with image src and name as alt', function () {
    $html = Blade::render('<ui:avatar src="https://example.com/avatar.jpg" name="John Doe" />');

    expect($html)
        ->toContain('alt="John Doe"')
        ->toContain('data-avatar-image');
});

it('renders fallback content when src is provided', function () {
    $html = Blade::render('<ui:avatar src="https://example.com/avatar.jpg" name="John Doe" />');

    expect($html)
        ->toContain('data-avatar-fallback')
        ->toContain('JD');
});

it('renders icon fallback when no name or src', function () {
    $html = Blade::render('<ui:avatar />');

    expect($html)
        ->toContain('<svg')
        ->toContain('data-avatar');
});

it('renders custom icon when no name provided', function () {
    $html = Blade::render('<ui:avatar icon="star" />');

    expect($html)
        ->toContain('<svg')
        ->toContain('data-avatar');
});

it('uses custom icon in fallback when src fails', function () {
    $html = Blade::render('<ui:avatar src="https://example.com/avatar.jpg" icon="star" />');

    expect($html)
        ->toContain('data-avatar-fallback')
        ->toContain('<svg');
});

// Size tests
it('applies xs size', function () {
    $html = Blade::render('<ui:avatar name="John Doe" size="xs" />');

    expect($html)
        ->toContain('size-6')
        ->toContain('text-[10px]');
});

it('applies sm size', function () {
    $html = Blade::render('<ui:avatar name="John Doe" size="sm" />');

    expect($html)
        ->toContain('size-8')
        ->toContain('text-xs');
});

it('applies md size by default', function () {
    $html = Blade::render('<ui:avatar name="John Doe" />');

    expect($html)
        ->toContain('size-10')
        ->toContain('text-sm');
});

it('applies lg size', function () {
    $html = Blade::render('<ui:avatar name="John Doe" size="lg" />');

    expect($html)
        ->toContain('size-12')
        ->toContain('text-base');
});

it('applies xl size', function () {
    $html = Blade::render('<ui:avatar name="John Doe" size="xl" />');

    expect($html)
        ->toContain('size-16')
        ->toContain('text-lg');
});

it('has rounded-full styling', function () {
    $html = Blade::render('<ui:avatar name="John Doe" />');

    expect($html)->toContain('rounded-full');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:avatar name="John Doe" data-test="value" />');

    expect($html)->toContain('data-test="value"');
});

it('passes through id attribute', function () {
    $html = Blade::render('<ui:avatar name="John Doe" id="my-avatar" />');

    expect($html)->toContain('id="my-avatar"');
});

it('includes Alpine x-data when src is provided', function () {
    $html = Blade::render('<ui:avatar src="https://example.com/avatar.jpg" />');

    expect($html)
        ->toContain('x-data')
        ->toContain('loaded')
        ->toContain('failed');
});

it('does not include Alpine x-data when no src', function () {
    $html = Blade::render('<ui:avatar name="John Doe" />');

    expect($html)->not->toContain('x-data');
});

it('includes load and error handlers on image', function () {
    $html = Blade::render('<ui:avatar src="https://example.com/avatar.jpg" />');

    expect($html)
        ->toContain('x-on:load="loaded = true"')
        ->toContain('x-on:error="failed = true"');
});

it('applies background and text colors', function () {
    $html = Blade::render('<ui:avatar name="John Doe" />');

    expect($html)
        ->toContain('bg-gray-100')
        ->toContain('text-gray-600');
});

// ============================================
// Avatar Group Component Tests
// ============================================

it('renders a basic avatar group', function () {
    $html = Blade::render('<ui:avatar.group><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)->toContain('data-avatar-group');
});

it('renders multiple avatars in group', function () {
    $html = Blade::render('
        <ui:avatar.group>
            <ui:avatar name="John Doe" />
            <ui:avatar name="Jane Doe" />
        </ui:avatar.group>
    ');

    expect($html)
        ->toContain('JD')
        ->toContain('data-avatar-group');
});

it('renders limit indicator when limit prop is set', function () {
    $html = Blade::render('<ui:avatar.group limit="5"><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)
        ->toContain('+5')
        ->toContain('data-avatar-group-limit');
});

it('does not render limit indicator when limit is null', function () {
    $html = Blade::render('<ui:avatar.group><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)->not->toContain('data-avatar-group-limit');
});

// Group size tests
it('applies xs size spacing to group', function () {
    $html = Blade::render('<ui:avatar.group size="xs"><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)->toContain('-space-x-2');
});

it('applies sm size spacing to group', function () {
    $html = Blade::render('<ui:avatar.group size="sm"><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)->toContain('-space-x-2.5');
});

it('applies md size spacing to group by default', function () {
    $html = Blade::render('<ui:avatar.group><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)->toContain('-space-x-3');
});

it('applies lg size spacing to group', function () {
    $html = Blade::render('<ui:avatar.group size="lg"><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)->toContain('-space-x-4');
});

it('applies xl size spacing to group', function () {
    $html = Blade::render('<ui:avatar.group size="xl"><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)->toContain('-space-x-5');
});

it('applies ring styling to group children', function () {
    $html = Blade::render('<ui:avatar.group><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)->toContain('*:ring-2');
});

it('applies limit indicator size styling based on group size', function () {
    $html = Blade::render('<ui:avatar.group size="lg" limit="3"><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)
        ->toContain('data-avatar-group-limit')
        ->toContain('size-12')
        ->toContain('text-base');
});

it('passes through additional attributes to group', function () {
    $html = Blade::render('<ui:avatar.group data-test="group-value"><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)->toContain('data-test="group-value"');
});

it('passes through id attribute to group', function () {
    $html = Blade::render('<ui:avatar.group id="my-group"><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)->toContain('id="my-group"');
});

it('renders as flex container', function () {
    $html = Blade::render('<ui:avatar.group><ui:avatar name="John" /></ui:avatar.group>');

    expect($html)
        ->toContain('flex')
        ->toContain('items-center');
});
