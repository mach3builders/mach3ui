<?php

use Illuminate\Support\Facades\Blade;

// ============================================================================
// Progress Bar Component (progress/index.blade.php)
// ============================================================================

it('renders a basic progress bar', function () {
    $html = Blade::render('<ui:progress value="50" />');

    expect($html)
        ->toContain('data-progress')
        ->toContain('role="progressbar"')
        ->toContain('aria-valuenow="50"')
        ->toContain('style="width: 50%"');
});

it('renders progress bar with label', function () {
    $html = Blade::render('<ui:progress value="75" label="Uploading..." />');

    expect($html)
        ->toContain('Uploading...')
        ->toContain('data-progress-label');
});

it('shows value when showValue is true', function () {
    $html = Blade::render('<ui:progress value="60" :showValue="true" />');

    expect($html)
        ->toContain('60%')
        ->toContain('data-progress-value');
});

it('shows both label and value', function () {
    $html = Blade::render('<ui:progress value="80" label="Progress" :showValue="true" />');

    expect($html)
        ->toContain('Progress')
        ->toContain('80%')
        ->toContain('data-progress-label');
});

it('calculates percentage from custom max', function () {
    $html = Blade::render('<ui:progress value="25" :max="50" :showValue="true" />');

    expect($html)
        ->toContain('50%') // 25/50 = 50%
        ->toContain('aria-valuemax="50"')
        ->toContain('style="width: 50%"');
});

it('clamps percentage to 0-100 range', function () {
    $htmlOver = Blade::render('<ui:progress value="150" :max="100" :showValue="true" />');
    $htmlUnder = Blade::render('<ui:progress value="-50" :max="100" :showValue="true" />');

    expect($htmlOver)->toContain('100%');
    expect($htmlUnder)->toContain('0%');
});

it('handles zero max safely', function () {
    $html = Blade::render('<ui:progress value="50" :max="0" />');

    // Should not divide by zero, max becomes 1
    expect($html)->toContain('data-progress');
});

it('applies size variants', function () {
    $htmlXs = Blade::render('<ui:progress value="50" size="xs" />');
    $htmlSm = Blade::render('<ui:progress value="50" size="sm" />');
    $htmlMd = Blade::render('<ui:progress value="50" size="md" />');
    $htmlLg = Blade::render('<ui:progress value="50" size="lg" />');
    $htmlXl = Blade::render('<ui:progress value="50" size="xl" />');

    expect($htmlXs)->toContain('h-1');
    expect($htmlSm)->toContain('h-1.5');
    expect($htmlMd)->toContain('h-2');
    expect($htmlLg)->toContain('h-3');
    expect($htmlXl)->toContain('h-4');
});

it('applies variant styling', function () {
    $htmlPrimary = Blade::render('<ui:progress value="50" variant="primary" />');
    $htmlSuccess = Blade::render('<ui:progress value="50" variant="success" />');
    $htmlWarning = Blade::render('<ui:progress value="50" variant="warning" />');
    $htmlDanger = Blade::render('<ui:progress value="50" variant="danger" />');

    expect($htmlPrimary)
        ->toContain('data-variant="primary"')
        ->toContain('bg-blue-500');

    expect($htmlSuccess)
        ->toContain('data-variant="success"')
        ->toContain('bg-green-600');

    expect($htmlWarning)
        ->toContain('data-variant="warning"')
        ->toContain('bg-amber-500');

    expect($htmlDanger)
        ->toContain('data-variant="danger"')
        ->toContain('bg-red-600');
});

it('has proper aria attributes', function () {
    $html = Blade::render('<ui:progress value="30" :max="100" />');

    expect($html)
        ->toContain('role="progressbar"')
        ->toContain('aria-valuenow="30"')
        ->toContain('aria-valuemin="0"')
        ->toContain('aria-valuemax="100"');
});

it('passes through additional attributes on progress bar', function () {
    $html = Blade::render('<ui:progress value="50" data-test="value" id="my-progress" />');

    expect($html)
        ->toContain('data-test="value"')
        ->toContain('id="my-progress"');
});

it('renders data-progress-track and data-progress-bar', function () {
    $html = Blade::render('<ui:progress value="50" />');

    expect($html)
        ->toContain('data-progress-track')
        ->toContain('data-progress-bar');
});

// ============================================================================
// Progress Steps Component (progress/steps.blade.php)
// ============================================================================

it('renders basic progress steps', function () {
    $html = Blade::render('<ui:progress.steps :current="2" :total="4" />');

    expect($html)
        ->toContain('data-progress-steps')
        ->toContain('2 / 4')
        ->toContain('role="progressbar"');
});

it('shows count by default', function () {
    $html = Blade::render('<ui:progress.steps :current="1" :total="5" />');

    expect($html)
        ->toContain('data-progress-count')
        ->toContain('1 / 5');
});

it('hides count when showCount is false', function () {
    $html = Blade::render('<ui:progress.steps :current="1" :total="5" :showCount="false" />');

    expect($html)->not->toContain('data-progress-count');
});

it('shows percentage when showPercent is true', function () {
    $html = Blade::render('<ui:progress.steps :current="2" :total="4" :showPercent="true" />');

    expect($html)
        ->toContain('data-progress-percent')
        ->toContain('50%');
});

it('calculates percentage correctly', function () {
    $html = Blade::render('<ui:progress.steps :current="1" :total="3" :showPercent="true" />');

    expect($html)->toContain('33%'); // round(1/3 * 100) = 33
});

it('renders correct number of step indicators', function () {
    $html = Blade::render('<ui:progress.steps :current="2" :total="4" />');

    // Should have 4 step indicators (use data-step attribute which is unique per step)
    expect(substr_count($html, 'data-step="'))->toBe(4);
    expect(substr_count($html, 'data-progress-indicator'))->toBe(4);
});

it('marks active steps with data-active attribute', function () {
    $html = Blade::render('<ui:progress.steps :current="2" :total="4" />');

    // Should have 2 active steps (1 and 2)
    expect(substr_count($html, 'data-active'))->toBe(2);
});

it('renders buttons without href', function () {
    $html = Blade::render('<ui:progress.steps :current="2" :total="3" />');

    expect($html)
        ->toContain('<button')
        ->toContain('x-on:click')
        ->toContain('$dispatch(\'step\'');
});

it('renders links with href', function () {
    $html = Blade::render('<ui:progress.steps :current="2" :total="3" href="/wizard/{step}" />');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/wizard/1"')
        ->toContain('href="/wizard/2"');
});

it('adds x-data when no href', function () {
    $htmlNoHref = Blade::render('<ui:progress.steps :current="2" :total="3" />');
    $htmlWithHref = Blade::render('<ui:progress.steps :current="2" :total="3" href="/step/{step}" />');

    expect($htmlNoHref)->toContain('x-data');
    expect($htmlWithHref)->not->toContain('x-data');
});

it('has proper aria attributes on steps', function () {
    $html = Blade::render('<ui:progress.steps :current="2" :total="4" />');

    expect($html)
        ->toContain('role="progressbar"')
        ->toContain('aria-valuenow="2"')
        ->toContain('aria-valuemin="1"')
        ->toContain('aria-valuemax="4"');
});

it('passes through additional attributes on progress steps', function () {
    $html = Blade::render('<ui:progress.steps :current="1" :total="3" data-test="value" />');

    expect($html)->toContain('data-test="value"');
});

it('handles total of zero safely', function () {
    $html = Blade::render('<ui:progress.steps :current="0" :total="0" />');

    // Should not crash, total becomes 1
    expect($html)->toContain('data-progress-steps');
});

// ============================================================================
// Steps Container Component (steps/index.blade.php)
// ============================================================================

it('renders steps container', function () {
    $html = Blade::render('<ui:steps>Content</ui:steps>');

    expect($html)
        ->toContain('<nav')
        ->toContain('data-steps')
        ->toContain('aria-label="Progress"')
        ->toContain('Content');
});

it('renders steps with items', function () {
    $html = Blade::render('
        <ui:steps>
            <ui:steps.item step="1" status="done" />
            <ui:steps.item step="2" status="current" />
        </ui:steps>
    ');

    expect($html)
        ->toContain('data-steps')
        ->toContain('data-steps-item');
});

it('passes through additional attributes on steps container', function () {
    $html = Blade::render('<ui:steps data-test="value" id="my-steps">Content</ui:steps>');

    expect($html)
        ->toContain('data-test="value"')
        ->toContain('id="my-steps"');
});

// ============================================================================
// Steps Item Component (steps/item.blade.php)
// ============================================================================

it('renders steps item with step number', function () {
    $html = Blade::render('<ui:steps.item step="1" />');

    expect($html)
        ->toContain('data-steps-item')
        ->toContain('data-steps-indicator')
        ->toContain('1');
});

it('renders steps item with title', function () {
    $html = Blade::render('<ui:steps.item step="1" title="Account" />');

    expect($html)
        ->toContain('Account')
        ->toContain('data-steps-label');
});

it('applies done status styling', function () {
    $html = Blade::render('<ui:steps.item step="1" status="done" />');

    expect($html)
        ->toContain('data-status="done"')
        ->toContain('<svg') // Check icon
        ->toContain('bg-gray-900');
});

it('applies current status styling', function () {
    $html = Blade::render('<ui:steps.item step="2" status="current" />');

    expect($html)
        ->toContain('data-status="current"')
        ->toContain('aria-current="step"')
        ->toContain('2'); // Shows step number, not check
});

it('applies pending status styling', function () {
    $html = Blade::render('<ui:steps.item step="3" status="pending" />');

    expect($html)
        ->toContain('data-status="pending"')
        ->toContain('border-gray-100')
        ->toContain('text-gray-500');
});

it('renders as div when no href or pending', function () {
    $html = Blade::render('<ui:steps.item step="1" status="pending" />');

    expect($html)->not->toContain('<a');
});

it('renders as link when done with href', function () {
    $html = Blade::render('<ui:steps.item step="1" status="done" href="/step/1" />');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/step/1"')
        ->toContain('cursor-pointer');
});

it('renders as link when current with href', function () {
    $html = Blade::render('<ui:steps.item step="2" status="current" href="/step/2" />');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/step/2"');
});

it('does not render as link when pending with href', function () {
    $html = Blade::render('<ui:steps.item step="3" status="pending" href="/step/3" />');

    // Pending items are not clickable even with href
    expect($html)->not->toContain('href="/step/3"');
});

it('renders connector element', function () {
    $html = Blade::render('<ui:steps.item step="1" status="done" />');

    expect($html)->toContain('data-steps-connector');
});

it('applies active connector styling for done/current', function () {
    $htmlDone = Blade::render('<ui:steps.item step="1" status="done" />');
    $htmlCurrent = Blade::render('<ui:steps.item step="2" status="current" />');

    expect($htmlDone)->toContain('bg-gray-900');
    expect($htmlCurrent)->toContain('bg-gray-900');
});

it('applies inactive connector styling for pending', function () {
    $html = Blade::render('<ui:steps.item step="3" status="pending" />');

    expect($html)->toContain('bg-gray-200');
});

it('passes through additional attributes on steps item', function () {
    $html = Blade::render('<ui:steps.item step="1" data-test="value" />');

    expect($html)->toContain('data-test="value"');
});

// ============================================================================
// Skeleton Component (skeleton/index.blade.php)
// ============================================================================

it('renders a basic skeleton', function () {
    $html = Blade::render('<ui:skeleton />');

    expect($html)
        ->toContain('data-skeleton')
        ->toContain('animate-pulse')
        ->toContain('rounded');
});

it('renders multiple skeletons with count', function () {
    $html = Blade::render('<ui:skeleton :count="3" />');

    expect(substr_count($html, 'data-skeleton'))->toBe(3);
});

it('applies default variant styling', function () {
    $html = Blade::render('<ui:skeleton />');

    expect($html)->toContain('bg-gray-120');
});

it('applies subtle variant styling', function () {
    $html = Blade::render('<ui:skeleton variant="subtle" />');

    expect($html)->toContain('bg-gray-40');
});

it('applies circle styling', function () {
    $html = Blade::render('<ui:skeleton :circle="true" />');

    expect($html)->toContain('rounded-full');
});

it('applies custom width', function () {
    $html = Blade::render('<ui:skeleton width="100px" />');

    expect($html)->toContain('style="width: 100px"');
});

it('applies custom height', function () {
    $html = Blade::render('<ui:skeleton height="50px" />');

    expect($html)->toContain('style="height: 50px"');
});

it('applies both width and height', function () {
    $html = Blade::render('<ui:skeleton width="100px" height="50px" />');

    expect($html)->toContain('width: 100px');
    expect($html)->toContain('height: 50px');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:skeleton data-test="value" id="my-skeleton" />');

    expect($html)
        ->toContain('data-test="value"')
        ->toContain('id="my-skeleton"');
});

// ============================================================================
// Skeleton Text Component (skeleton/text.blade.php)
// ============================================================================

it('renders skeleton text with default lines', function () {
    $html = Blade::render('<ui:skeleton.text />');

    expect($html)
        ->toContain('data-skeleton-text')
        ->toContain('animate-pulse');

    // Default is 3 lines
    expect(substr_count($html, 'rounded'))->toBeGreaterThanOrEqual(3);
});

it('renders custom number of lines', function () {
    $html = Blade::render('<ui:skeleton.text :lines="5" />');

    // Should have 5 line elements inside wrapper
    expect($html)->toContain('data-skeleton-text');
});

it('applies size variants to skeleton text', function () {
    $htmlSm = Blade::render('<ui:skeleton.text size="sm" />');
    $htmlMd = Blade::render('<ui:skeleton.text size="md" />');
    $htmlLg = Blade::render('<ui:skeleton.text size="lg" />');

    expect($htmlSm)->toContain('h-3');
    expect($htmlMd)->toContain('h-4');
    expect($htmlLg)->toContain('h-5');
});

it('applies gap variants to skeleton text', function () {
    $htmlSm = Blade::render('<ui:skeleton.text size="sm" />');
    $htmlMd = Blade::render('<ui:skeleton.text size="md" />');
    $htmlLg = Blade::render('<ui:skeleton.text size="lg" />');

    expect($htmlSm)->toContain('gap-2');
    expect($htmlMd)->toContain('gap-2.5');
    expect($htmlLg)->toContain('gap-3');
});

it('applies default variant to skeleton text', function () {
    $html = Blade::render('<ui:skeleton.text />');

    expect($html)->toContain('bg-gray-200');
});

it('applies subtle variant to skeleton text', function () {
    $html = Blade::render('<ui:skeleton.text variant="subtle" />');

    expect($html)->toContain('bg-gray-100');
});

it('varies line widths for realistic appearance', function () {
    $html = Blade::render('<ui:skeleton.text :lines="4" />');

    // Should contain various width classes
    expect($html)->toMatch('/w-(full|11\/12|10\/12|9\/12|8\/12|7\/12)/');
});

it('passes through additional attributes to skeleton text', function () {
    $html = Blade::render('<ui:skeleton.text data-test="value" />');

    expect($html)->toContain('data-test="value"');
});
