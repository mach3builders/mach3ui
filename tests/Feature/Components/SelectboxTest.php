<?php

use Illuminate\Support\Facades\Blade;

// ============================================================================
// SELECTBOX INDEX (ui:selectbox)
// ============================================================================

it('renders a basic selectbox', function () {
    $html = Blade::render('<ui:selectbox name="country" />');

    expect($html)
        ->toContain('x-data')
        ->toContain('data-selectbox')
        ->toContain('data-control');
});

it('renders selectbox with options', function () {
    $html = Blade::render('
        <ui:selectbox name="country">
            <ui:selectbox.option value="nl">Netherlands</ui:selectbox.option>
            <ui:selectbox.option value="be">Belgium</ui:selectbox.option>
        </ui:selectbox>
    ');

    expect($html)
        ->toContain('Netherlands')
        ->toContain('Belgium')
        ->toContain('data-value="nl"')
        ->toContain('data-value="be"');
});

it('renders selectbox with label', function () {
    $html = Blade::render('<ui:selectbox name="country" label="Country" />');

    expect($html)
        ->toContain('Country')
        ->toContain('<label');
});

it('renders selectbox with hint', function () {
    $html = Blade::render('<ui:selectbox name="country" label="Country" hint="Select your country of residence" />');

    expect($html)
        ->toContain('Select your country of residence');
});

it('renders selectbox with placeholder', function () {
    $html = Blade::render('<ui:selectbox name="country" placeholder="Select a country" />');

    expect($html)
        ->toContain('Select a country');
});

it('renders searchable selectbox', function () {
    $html = Blade::render('<ui:selectbox name="country" :searchable="true" />');

    expect($html)
        ->toContain('data-searchable')
        ->toContain('searchable: true')
        ->toContain('data-selectbox-search');
});

it('renders searchable selectbox with custom placeholder', function () {
    $html = Blade::render('<ui:selectbox name="country" :searchable="true" search-placeholder="Find country..." />');

    expect($html)
        ->toContain('placeholder="Find country..."');
});

it('renders multiple selectbox', function () {
    $html = Blade::render('<ui:selectbox name="countries" :multiple="true" />');

    expect($html)
        ->toContain('data-multiple')
        ->toContain('multiple: true')
        ->toContain('aria-multiselectable="true"');
});

it('renders nullable selectbox', function () {
    $html = Blade::render('<ui:selectbox name="country" :nullable="true" />');

    expect($html)
        ->toContain('data-value=""'); // null option
});

it('renders nullable selectbox with custom label', function () {
    $html = Blade::render('<ui:selectbox name="country" :nullable="true" nullable-label="No preference" />');

    expect($html)
        ->toContain('No preference');
});

it('applies size variants to selectbox', function () {
    $htmlSm = Blade::render('<ui:selectbox name="country" size="sm" />');
    $htmlMd = Blade::render('<ui:selectbox name="country" size="md" />');
    $htmlLg = Blade::render('<ui:selectbox name="country" size="lg" />');

    // Size sm has h-8, md has h-10, lg has h-12
    expect($htmlSm)->toContain('h-8');
    expect($htmlMd)->toContain('h-10');
    expect($htmlLg)->toContain('h-12');
});

it('applies inverted variant styling to selectbox', function () {
    $html = Blade::render('<ui:selectbox name="country" variant="inverted" />');

    expect($html)->toContain('bg-gray-10');
});

it('renders disabled selectbox', function () {
    $html = Blade::render('<ui:selectbox name="country" :disabled="true" />');

    expect($html)
        ->toContain('disabled');
});

it('renders selectbox with custom id', function () {
    $html = Blade::render('<ui:selectbox name="country" id="my-country-select" />');

    expect($html)
        ->toContain('id="my-country-select"');
});

it('generates unique id when not provided', function () {
    $html = Blade::render('<ui:selectbox name="country" />');

    expect($html)->toMatch('/id="[^"]+"/');
});

it('renders selectbox trigger with popover attributes', function () {
    $html = Blade::render('<ui:selectbox name="country" />');

    expect($html)
        ->toContain('data-selectbox-trigger')
        ->toContain('aria-haspopup="listbox"')
        ->toContain('popovertarget=');
});

it('renders selectbox menu with popover', function () {
    $html = Blade::render('<ui:selectbox name="country" />');

    expect($html)
        ->toContain('popover')
        ->toContain('data-selectbox-menu')
        ->toContain('role="listbox"');
});

it('renders hidden input for form submission', function () {
    $html = Blade::render('<ui:selectbox name="country" />');

    expect($html)
        ->toContain('type="hidden"')
        ->toContain('name="country"');
});

it('renders multiple hidden inputs for multi-select form submission', function () {
    $html = Blade::render('<ui:selectbox name="countries" :multiple="true" />');

    expect($html)
        ->toContain("name=\"'countries[]'\""); // Template for multiple
});

it('passes through data attributes', function () {
    $html = Blade::render('<ui:selectbox name="country" data-testid="country-select" />');

    expect($html)
        ->toContain('data-testid="country-select"');
});

it('shows error message from error bag', function () {
    $this->withErrors(['country' => 'Please select a country.']);

    $html = Blade::render('<ui:selectbox name="country" label="Country" />');

    expect($html)
        ->toContain('Please select a country.')
        ->toContain('aria-invalid="true"');
});

it('shows error styling without label', function () {
    $this->withErrors(['country' => 'Invalid selection']);

    $html = Blade::render('<ui:selectbox name="country" />');

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('renders with default position bottom-start', function () {
    $html = Blade::render('<ui:selectbox name="country" />');

    expect($html)
        ->toContain('top: calc(anchor(bottom)');
});

it('renders Alpine.js reactive properties', function () {
    $html = Blade::render('<ui:selectbox name="country" />');

    expect($html)
        ->toContain('x-ref="trigger"')
        ->toContain('x-ref="menu"')
        ->toContain('x-on:click="toggle()"')
        ->toContain('x-bind:aria-expanded="open"');
});

// ============================================================================
// SELECTBOX GROUP (ui:selectbox.group)
// ============================================================================

it('renders a selectbox group', function () {
    $html = Blade::render('
        <ui:selectbox.group label="Europe">
            <ui:selectbox.option value="nl">Netherlands</ui:selectbox.option>
        </ui:selectbox.group>
    ');

    expect($html)
        ->toContain('data-selectbox-group')
        ->toContain('role="group"');
});

it('renders selectbox group with label', function () {
    $html = Blade::render('<ui:selectbox.group label="Europe" />');

    expect($html)
        ->toContain('Europe')
        ->toContain('data-selectbox-group-label');
});

it('renders selectbox group without label', function () {
    $html = Blade::render('
        <ui:selectbox.group>
            <ui:selectbox.option value="nl">Netherlands</ui:selectbox.option>
        </ui:selectbox.group>
    ');

    expect($html)
        ->toContain('data-selectbox-group')
        ->not->toContain('data-selectbox-group-label');
});

it('renders selectbox group with slot content', function () {
    $html = Blade::render('
        <ui:selectbox.group label="Benelux">
            <ui:selectbox.option value="nl">Netherlands</ui:selectbox.option>
            <ui:selectbox.option value="be">Belgium</ui:selectbox.option>
            <ui:selectbox.option value="lu">Luxembourg</ui:selectbox.option>
        </ui:selectbox.group>
    ');

    expect($html)
        ->toContain('Netherlands')
        ->toContain('Belgium')
        ->toContain('Luxembourg');
});

it('passes through attributes to selectbox group', function () {
    $html = Blade::render('<ui:selectbox.group label="Test" data-testid="group-test" class="custom-class" />');

    expect($html)
        ->toContain('data-testid="group-test"')
        ->toContain('custom-class');
});

// ============================================================================
// SELECTBOX OPTION (ui:selectbox.option)
// ============================================================================

it('renders a selectbox option', function () {
    $html = Blade::render('<ui:selectbox.option value="nl">Netherlands</ui:selectbox.option>');

    expect($html)
        ->toContain('data-selectbox-option')
        ->toContain('data-value="nl"')
        ->toContain('Netherlands')
        ->toContain('role="option"');
});

it('renders selectbox option with label slot', function () {
    $html = Blade::render('<ui:selectbox.option value="nl">Netherlands</ui:selectbox.option>');

    expect($html)
        ->toContain('data-label')
        ->toContain('Netherlands');
});

it('renders selectbox option with Alpine bindings', function () {
    $html = Blade::render('<ui:selectbox.option value="nl">Netherlands</ui:selectbox.option>');

    expect($html)
        ->toContain('x-on:click="select(')
        ->toContain('x-bind:data-selected')
        ->toContain('x-bind:data-focused')
        ->toContain('x-bind:aria-selected');
});

it('renders disabled selectbox option', function () {
    $html = Blade::render('<ui:selectbox.option value="nl" :disabled="true">Netherlands</ui:selectbox.option>');

    expect($html)
        ->toContain('disabled')
        ->toContain('aria-disabled="true"')
        ->toContain('pointer-events-none');
});

it('renders selectbox option with check icon', function () {
    $html = Blade::render('<ui:selectbox.option value="nl">Netherlands</ui:selectbox.option>');

    expect($html)
        ->toContain('<svg') // SVG icon for selected state
        ->toContain('data-icon="1"');
});

it('passes through attributes to selectbox option', function () {
    $html = Blade::render('<ui:selectbox.option value="nl" data-testid="option-nl">Netherlands</ui:selectbox.option>');

    expect($html)
        ->toContain('data-testid="option-nl"');
});

it('renders selectbox option as button', function () {
    $html = Blade::render('<ui:selectbox.option value="nl">Netherlands</ui:selectbox.option>');

    expect($html)
        ->toContain('<button')
        ->toContain('type="button"');
});

// ============================================================================
// RADIO GROUP (ui:radio.group)
// ============================================================================

it('renders a radio group', function () {
    $html = Blade::render('<ui:radio.group />');

    expect($html)
        ->toContain('data-radio-group')
        ->toContain('role="radiogroup"');
});

it('renders radio group with column variant', function () {
    $html = Blade::render('<ui:radio.group variant="column" />');

    expect($html)
        ->toContain('flex-col');
});

it('renders radio group with row variant', function () {
    $html = Blade::render('<ui:radio.group variant="row" />');

    expect($html)
        ->toContain('flex-row');
});

it('renders radio group with slot content', function () {
    $html = Blade::render('
        <ui:radio.group>
            <ui:radio name="color" value="red" label="Red" />
            <ui:radio name="color" value="blue" label="Blue" />
        </ui:radio.group>
    ');

    expect($html)
        ->toContain('Red')
        ->toContain('Blue')
        ->toContain('value="red"')
        ->toContain('value="blue"');
});

it('passes through attributes to radio group', function () {
    $html = Blade::render('<ui:radio.group data-testid="color-group" class="custom-class" />');

    expect($html)
        ->toContain('data-testid="color-group"')
        ->toContain('custom-class');
});

// ============================================================================
// RADIO CARD (ui:radio.card)
// ============================================================================

it('renders a radio card', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" />');

    expect($html)
        ->toContain('data-radio-card')
        ->toContain('data-control')
        ->toContain('type="radio"')
        ->toContain('name="plan"');
});

it('renders radio card with title', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" title="Pro Plan" />');

    expect($html)
        ->toContain('Pro Plan');
});

it('renders radio card with description', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" title="Pro Plan" description="$99/month" />');

    expect($html)
        ->toContain('Pro Plan')
        ->toContain('$99/month');
});

it('renders radio card with icon', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" icon="star" title="Pro Plan" />');

    expect($html)
        ->toContain('data-radio-card-icon')
        ->toContain('<svg'); // SVG icon rendered inline
});

it('renders radio card with reversed layout', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" :reversed="true" title="Pro Plan" />');

    expect($html)
        ->toContain('order-first');
});

it('renders radio card as label wrapper', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" title="Pro Plan" />');

    expect($html)
        ->toContain('<label');
});

it('renders radio card with slot content', function () {
    $html = Blade::render('
        <ui:radio.card name="plan" value="pro" title="Pro Plan">
            <span class="custom-content">Custom content</span>
        </ui:radio.card>
    ');

    expect($html)
        ->toContain('Custom content')
        ->toContain('custom-content');
});

it('renders radio card with data-radio-card-content', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" title="Pro Plan" />');

    expect($html)
        ->toContain('data-radio-card-content');
});

it('passes through attributes to radio card', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" data-testid="pro-plan" />');

    expect($html)
        ->toContain('data-testid="pro-plan"');
});

it('passes through checked attribute to radio card', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" checked />');

    expect($html)
        ->toContain('checked');
});

it('passes through disabled attribute to radio card', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" disabled />');

    expect($html)
        ->toContain('disabled');
});

it('renders radio card input with data-radio attribute', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" />');

    expect($html)
        ->toContain('data-radio');
});

it('renders radio card with rounded-full for circular radio', function () {
    $html = Blade::render('<ui:radio.card name="plan" value="pro" />');

    expect($html)
        ->toContain('rounded-full');
});

// ============================================================================
// CHECKBOX CARD (ui:checkbox.card)
// ============================================================================

it('renders a checkbox card', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" />');

    expect($html)
        ->toContain('data-checkbox-card')
        ->toContain('data-control')
        ->toContain('type="checkbox"');
});

it('renders checkbox card with name', function () {
    $html = Blade::render('<ui:checkbox.card name="notifications" />');

    expect($html)
        ->toContain('name="notifications"');
});

it('renders checkbox card with title', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" title="Enable notifications" />');

    expect($html)
        ->toContain('Enable notifications');
});

it('renders checkbox card with description', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" title="Notifications" description="Receive email notifications" />');

    expect($html)
        ->toContain('Notifications')
        ->toContain('Receive email notifications');
});

it('renders checkbox card with icon', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" icon="bell" title="Notifications" />');

    expect($html)
        ->toContain('data-checkbox-card-icon')
        ->toContain('<svg'); // SVG icon rendered inline
});

it('renders checkbox card with reversed layout', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" :reversed="true" title="Feature" />');

    expect($html)
        ->toContain('order-first');
});

it('renders checkbox card with indeterminate state', function () {
    $html = Blade::render('<ui:checkbox.card name="select-all" :indeterminate="true" title="Select all" />');

    expect($html)
        ->toContain('x-init="$el.indeterminate = true"');
});

it('renders checkbox card as label wrapper', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" title="Feature" />');

    expect($html)
        ->toContain('<label');
});

it('renders checkbox card with slot content', function () {
    $html = Blade::render('
        <ui:checkbox.card name="feature" title="Feature">
            <span class="custom-content">Additional info</span>
        </ui:checkbox.card>
    ');

    expect($html)
        ->toContain('Additional info')
        ->toContain('custom-content');
});

it('renders checkbox card with data-checkbox-card-content', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" title="Feature" />');

    expect($html)
        ->toContain('data-checkbox-card-content');
});

it('passes through attributes to checkbox card', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" data-testid="feature-checkbox" />');

    expect($html)
        ->toContain('data-testid="feature-checkbox"');
});

it('passes through checked attribute to checkbox card', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" checked />');

    expect($html)
        ->toContain('checked');
});

it('passes through disabled attribute to checkbox card', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" disabled />');

    expect($html)
        ->toContain('disabled');
});

it('renders checkbox card input with data-checkbox attribute', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" />');

    expect($html)
        ->toContain('data-checkbox');
});

it('renders checkbox card with rounded corners (not full)', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" />');

    expect($html)
        ->toContain('rounded-[5px]');
});

it('renders checkbox card with style variables for icons', function () {
    $html = Blade::render('<ui:checkbox.card name="feature" />');

    expect($html)
        ->toContain('--check-icon:')
        ->toContain('--indet-icon:')
        ->toContain('--check-size:');
});
