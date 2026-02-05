<?php

use Illuminate\Support\Facades\Blade;

/*
|--------------------------------------------------------------------------
| Pricing Container Component Tests
|--------------------------------------------------------------------------
*/

it('renders pricing component', function () {
    $html = Blade::render('<ui:pricing><ui:pricing.item title="Basic" price="$9" /></ui:pricing>');

    expect($html)
        ->toContain('Basic')
        ->toContain('$9')
        ->toContain('data-pricing');
});

it('renders pricing with default columns (3)', function () {
    $html = Blade::render('<ui:pricing>content</ui:pricing>');

    expect($html)->toContain('lg:grid-cols-3');
});

it('renders pricing with columns prop', function () {
    $html = Blade::render('<ui:pricing :columns="1">content</ui:pricing>');
    expect($html)->toContain('grid-cols-1');

    $html = Blade::render('<ui:pricing :columns="2">content</ui:pricing>');
    expect($html)->toContain('sm:grid-cols-2');

    $html = Blade::render('<ui:pricing :columns="4">content</ui:pricing>');
    expect($html)->toContain('lg:grid-cols-4');

    $html = Blade::render('<ui:pricing :columns="5">content</ui:pricing>');
    expect($html)->toContain('xl:grid-cols-5');

    $html = Blade::render('<ui:pricing :columns="6">content</ui:pricing>');
    expect($html)->toContain('xl:grid-cols-6');
});

it('renders pricing with default gap (md)', function () {
    $html = Blade::render('<ui:pricing>content</ui:pricing>');

    expect($html)->toContain('gap-4');
});

it('renders pricing with gap prop', function () {
    $html = Blade::render('<ui:pricing gap="none">content</ui:pricing>');
    expect($html)->toContain('gap-0');

    $html = Blade::render('<ui:pricing gap="xs">content</ui:pricing>');
    expect($html)->toContain('gap-1');

    $html = Blade::render('<ui:pricing gap="sm">content</ui:pricing>');
    expect($html)->toContain('gap-2');

    $html = Blade::render('<ui:pricing gap="lg">content</ui:pricing>');
    expect($html)->toContain('gap-6');

    $html = Blade::render('<ui:pricing gap="xl">content</ui:pricing>');
    expect($html)->toContain('gap-8');
});

it('renders pricing with slot content', function () {
    $html = Blade::render('<ui:pricing><div class="custom-item">Item</div></ui:pricing>');

    expect($html)->toContain('<div class="custom-item">Item</div>');
});

it('renders pricing with data-pricing attribute', function () {
    $html = Blade::render('<ui:pricing>content</ui:pricing>');

    expect($html)->toContain('data-pricing');
});

it('renders pricing with pass-through attributes', function () {
    $html = Blade::render('<ui:pricing id="plans" data-testid="pricing-grid">content</ui:pricing>');

    expect($html)
        ->toContain('id="plans"')
        ->toContain('data-testid="pricing-grid"');
});

/*
|--------------------------------------------------------------------------
| Pricing Item Component Tests
|--------------------------------------------------------------------------
*/

it('renders pricing item component', function () {
    $html = Blade::render('<ui:pricing.item title="Pro" price="$29" />');

    expect($html)
        ->toContain('Pro')
        ->toContain('$29')
        ->toContain('data-pricing-item');
});

it('renders pricing item with title prop', function () {
    $html = Blade::render('<ui:pricing.item title="Enterprise Plan" />');

    expect($html)
        ->toContain('Enterprise Plan')
        ->toContain('<h3');
});

it('renders pricing item without title', function () {
    $html = Blade::render('<ui:pricing.item price="$99" />');

    expect($html)->not->toContain('<h3');
});

it('renders pricing item with description prop', function () {
    $html = Blade::render('<ui:pricing.item title="Basic" description="Perfect for small teams" />');

    expect($html)
        ->toContain('Perfect for small teams')
        ->toContain('<p');
});

it('renders pricing item without description', function () {
    $html = Blade::render('<ui:pricing.item title="Basic" />');

    // Should not have description paragraph (only title h3)
    expect($html)->toContain('<h3');
});

it('renders pricing item with price prop', function () {
    $html = Blade::render('<ui:pricing.item price="$199" />');

    expect($html)
        ->toContain('$199')
        ->toContain('text-4xl');
});

it('renders pricing item without price', function () {
    $html = Blade::render('<ui:pricing.item title="Contact Us" />');

    expect($html)->not->toContain('text-4xl');
});

it('renders pricing item with period prop', function () {
    $html = Blade::render('<ui:pricing.item price="$29" period="month" />');

    expect($html)
        ->toContain('$29')
        ->toContain('/ month');
});

it('renders pricing item without period when no price', function () {
    $html = Blade::render('<ui:pricing.item title="Free" period="month" />');

    expect($html)->not->toContain('/ month');
});

it('renders pricing item with badge prop', function () {
    $html = Blade::render('<ui:pricing.item title="Pro" badge="Popular" />');

    expect($html)->toContain('Popular');
});

it('renders pricing item with badge:variant prop', function () {
    $html = Blade::render('<ui:pricing.item title="Pro" badge="Best Value" badge:variant="success" />');

    expect($html)->toContain('Best Value');
});

it('renders pricing item without badge', function () {
    $html = Blade::render('<ui:pricing.item title="Basic" />');

    // Badge component should not be rendered
    expect($html)->not->toContain('data-badge');
});

it('renders pricing item with featured prop', function () {
    $html = Blade::render('<ui:pricing.item title="Pro" :featured="true" />');

    expect($html)
        ->toContain('data-featured')
        ->toContain('ring-2');
});

it('renders pricing item without featured', function () {
    $html = Blade::render('<ui:pricing.item title="Basic" :featured="false" />');

    expect($html)
        ->not->toContain('data-featured')
        ->not->toContain('ring-2');
});

it('renders pricing item with features array prop', function () {
    $html = Blade::render('<ui:pricing.item title="Pro" :features="[\'Unlimited users\', \'24/7 Support\', \'API Access\']" />');

    expect($html)
        ->toContain('Unlimited users')
        ->toContain('24/7 Support')
        ->toContain('API Access')
        ->toContain('<ul')
        ->toContain('<li');
});

it('renders pricing item without features', function () {
    $html = Blade::render('<ui:pricing.item title="Basic" />');

    expect($html)->not->toContain('<ul');
});

it('renders pricing item with features slot', function () {
    $html = Blade::render('
        <ui:pricing.item title="Pro">
            <x-slot:features>
                <ul class="custom-features">
                    <li>Custom Feature 1</li>
                    <li>Custom Feature 2</li>
                </ul>
            </x-slot:features>
        </ui:pricing.item>
    ');

    expect($html)
        ->toContain('custom-features')
        ->toContain('Custom Feature 1')
        ->toContain('Custom Feature 2');
});

it('renders pricing item with action slot', function () {
    $html = Blade::render('
        <ui:pricing.item title="Pro" price="$29">
            <x-slot:action>
                <button class="buy-button">Buy Now</button>
            </x-slot:action>
        </ui:pricing.item>
    ');

    expect($html)
        ->toContain('buy-button')
        ->toContain('Buy Now');
});

it('renders pricing item with default slot content', function () {
    $html = Blade::render('
        <ui:pricing.item title="Pro" price="$29">
            <button class="cta-button">Get Started</button>
        </ui:pricing.item>
    ');

    expect($html)
        ->toContain('cta-button')
        ->toContain('Get Started');
});

it('renders pricing item with data-pricing-item attribute', function () {
    $html = Blade::render('<ui:pricing.item title="Basic" />');

    expect($html)->toContain('data-pricing-item');
});

it('renders pricing item with pass-through attributes', function () {
    $html = Blade::render('<ui:pricing.item title="Pro" id="pro-plan" data-testid="pricing-item" />');

    expect($html)
        ->toContain('id="pro-plan"')
        ->toContain('data-testid="pricing-item"');
});

/*
|--------------------------------------------------------------------------
| Integration Tests
|--------------------------------------------------------------------------
*/

it('renders complete pricing section', function () {
    $html = Blade::render('
        <ui:pricing :columns="3" gap="lg">
            <ui:pricing.item
                title="Basic"
                description="For individuals"
                price="$9"
                period="month"
                :features="[\'1 User\', \'5GB Storage\']"
            >
                <button>Choose Basic</button>
            </ui:pricing.item>

            <ui:pricing.item
                title="Pro"
                description="For teams"
                price="$29"
                period="month"
                badge="Popular"
                :featured="true"
                :features="[\'10 Users\', \'50GB Storage\', \'Priority Support\']"
            >
                <button>Choose Pro</button>
            </ui:pricing.item>

            <ui:pricing.item
                title="Enterprise"
                description="For organizations"
                price="$99"
                period="month"
                :features="[\'Unlimited Users\', \'Unlimited Storage\', \'24/7 Support\']"
            >
                <button>Contact Sales</button>
            </ui:pricing.item>
        </ui:pricing>
    ');

    expect($html)
        ->toContain('data-pricing')
        ->toContain('gap-6')
        ->toContain('lg:grid-cols-3')
        ->toContain('Basic')
        ->toContain('Pro')
        ->toContain('Enterprise')
        ->toContain('$9')
        ->toContain('$29')
        ->toContain('$99')
        ->toContain('Popular')
        ->toContain('data-featured')
        ->toContain('Choose Basic')
        ->toContain('Choose Pro')
        ->toContain('Contact Sales');
});
