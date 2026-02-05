<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Button Group Component Tests
// =============================================================================

it('renders a button group', function () {
    $html = Blade::render('<ui:button.group><ui:button>A</ui:button><ui:button>B</ui:button></ui:button.group>');

    expect($html)
        ->toContain('data-button-group')
        ->toContain('<div')
        ->toContain('inline-flex');
});

it('renders button group with attached buttons by default', function () {
    $html = Blade::render('<ui:button.group><ui:button>A</ui:button><ui:button>B</ui:button></ui:button.group>');

    // HTML entities are escaped in output
    expect($html)
        ->toContain('[&amp;&gt;*]:rounded-none')
        ->toContain('[&amp;&gt;*:first-child]:rounded-l-md')
        ->toContain('[&amp;&gt;*:last-child]:rounded-r-md')
        ->toContain('[&amp;&gt;*:not(:first-child)]:-ml-px');
});

it('renders button group with attached=true explicitly', function () {
    $html = Blade::render('<ui:button.group :attached="true"><ui:button>A</ui:button><ui:button>B</ui:button></ui:button.group>');

    // HTML entities are escaped in output
    expect($html)
        ->toContain('[&amp;&gt;*]:rounded-none')
        ->toContain('[&amp;&gt;*:first-child]:rounded-l-md');
});

it('renders button group with attached=false', function () {
    $html = Blade::render('<ui:button.group :attached="false"><ui:button>A</ui:button><ui:button>B</ui:button></ui:button.group>');

    expect($html)
        ->toContain('gap-2')
        ->not->toContain('[&>*]:rounded-none')
        ->not->toContain('[&>*:first-child]:rounded-l-md');
});

it('renders slot content', function () {
    $html = Blade::render('<ui:button.group><ui:button>First</ui:button><ui:button>Second</ui:button><ui:button>Third</ui:button></ui:button.group>');

    expect($html)
        ->toContain('First')
        ->toContain('Second')
        ->toContain('Third');
});

it('has focus z-index styling for buttons', function () {
    $html = Blade::render('<ui:button.group><ui:button>A</ui:button></ui:button.group>');

    // HTML entities are escaped in output
    expect($html)
        ->toContain('[&amp;&gt;*:focus]:z-10')
        ->toContain('[&amp;&gt;*:focus-visible]:z-10');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:button.group id="my-group" data-test="value"><ui:button>A</ui:button></ui:button.group>');

    expect($html)
        ->toContain('id="my-group"')
        ->toContain('data-test="value"');
});

it('merges custom classes', function () {
    $html = Blade::render('<ui:button.group class="my-custom-class"><ui:button>A</ui:button></ui:button.group>');

    expect($html)
        ->toContain('my-custom-class')
        ->toContain('inline-flex');
});

// =============================================================================
// Action Bar Component Tests
// =============================================================================

it('renders an action bar', function () {
    $html = Blade::render('<ui:action-bar><ui:action-bar.action>Edit</ui:action-bar.action></ui:action-bar>');

    expect($html)
        ->toContain('data-action-bar')
        ->toContain('<div')
        ->toContain('x-data');
});

it('renders action bar with default styling', function () {
    $html = Blade::render('<ui:action-bar><ui:action-bar.action>Edit</ui:action-bar.action></ui:action-bar>');

    expect($html)
        ->toContain('inline-flex')
        ->toContain('h-10')
        ->toContain('items-center')
        ->toContain('rounded-lg')
        ->toContain('border');
});

it('renders action bar without count by default', function () {
    $html = Blade::render('<ui:action-bar><ui:action-bar.action>Edit</ui:action-bar.action></ui:action-bar>');

    // x-if template is still in the markup but won't be displayed
    expect($html)
        ->toContain('count: null')
        ->toContain('x-if="count !== null"');
});

it('renders action bar with count prop', function () {
    $html = Blade::render('<ui:action-bar :count="5"><ui:action-bar.action>Edit</ui:action-bar.action></ui:action-bar>');

    expect($html)
        ->toContain('count: 5')
        ->toContain('x-text="count"')
        ->toContain('selected');
});

it('renders action bar with custom countLabel', function () {
    $html = Blade::render('<ui:action-bar :count="3" countLabel="items"><ui:action-bar.action>Delete</ui:action-bar.action></ui:action-bar>');

    expect($html)
        ->toContain('count: 3')
        ->toContain('items');
});

it('renders action bar with default countLabel "selected"', function () {
    $html = Blade::render('<ui:action-bar :count="1"><ui:action-bar.action>Edit</ui:action-bar.action></ui:action-bar>');

    expect($html)->toContain('selected');
});

it('renders action bar slot content', function () {
    $html = Blade::render('<ui:action-bar><ui:action-bar.action>Edit</ui:action-bar.action><ui:action-bar.action>Delete</ui:action-bar.action></ui:action-bar>');

    expect($html)
        ->toContain('data-action-bar-actions')
        ->toContain('Edit')
        ->toContain('Delete');
});

it('renders action bar with more slot', function () {
    $html = Blade::render('
        <ui:action-bar>
            <ui:action-bar.action>Edit</ui:action-bar.action>
            <x-slot:more>
                <ui:dropdown.item>Archive</ui:dropdown.item>
            </x-slot:more>
        </ui:action-bar>
    ');

    expect($html)
        ->toContain('Edit')
        ->toContain('Archive');
});

it('passes through additional attributes on action bar', function () {
    $html = Blade::render('<ui:action-bar id="my-bar" data-test="value"><ui:action-bar.action>A</ui:action-bar.action></ui:action-bar>');

    expect($html)
        ->toContain('id="my-bar"')
        ->toContain('data-test="value"');
});

it('merges custom classes on action bar', function () {
    $html = Blade::render('<ui:action-bar class="my-custom-class"><ui:action-bar.action>A</ui:action-bar.action></ui:action-bar>');

    expect($html)
        ->toContain('my-custom-class')
        ->toContain('inline-flex');
});

// =============================================================================
// Action Bar Action Component Tests
// =============================================================================

it('renders an action bar action', function () {
    $html = Blade::render('<ui:action-bar.action>Edit</ui:action-bar.action>');

    expect($html)
        ->toContain('data-action-bar-action')
        ->toContain('<button')
        ->toContain('type="button"')
        ->toContain('Edit');
});

it('renders action with default variant', function () {
    $html = Blade::render('<ui:action-bar.action>Edit</ui:action-bar.action>');

    expect($html)
        ->toContain('data-variant="default"')
        ->toContain('text-gray-600');
});

it('renders action with danger variant', function () {
    $html = Blade::render('<ui:action-bar.action variant="danger">Delete</ui:action-bar.action>');

    expect($html)
        ->toContain('data-variant="danger"')
        ->toContain('text-red-600');
});

it('renders action with success variant', function () {
    $html = Blade::render('<ui:action-bar.action variant="success">Approve</ui:action-bar.action>');

    expect($html)
        ->toContain('data-variant="success"')
        ->toContain('text-green-600');
});

it('renders action with icon prop', function () {
    $html = Blade::render('<ui:action-bar.action icon="pencil">Edit</ui:action-bar.action>');

    expect($html)
        ->toContain('<svg')
        ->toContain('Edit');
});

it('renders action without icon when not provided', function () {
    $html = Blade::render('<ui:action-bar.action>Edit</ui:action-bar.action>');

    expect($html)
        ->not->toContain('<svg');
});

it('renders action with icon only (empty slot)', function () {
    $html = Blade::render('<ui:action-bar.action icon="trash" />');

    expect($html)
        ->toContain('<svg')
        ->toContain('data-action-bar-action');
});

it('renders action slot content in span', function () {
    $html = Blade::render('<ui:action-bar.action>My Action</ui:action-bar.action>');

    expect($html)
        ->toContain('<span>')
        ->toContain('My Action')
        ->toContain('</span>');
});

it('applies base styling to action', function () {
    $html = Blade::render('<ui:action-bar.action>Edit</ui:action-bar.action>');

    expect($html)
        ->toContain('inline-flex')
        ->toContain('cursor-pointer')
        ->toContain('items-center')
        ->toContain('rounded-md')
        ->toContain('text-xs')
        ->toContain('font-medium')
        ->toContain('transition-colors');
});

it('applies focus styling to action', function () {
    $html = Blade::render('<ui:action-bar.action>Edit</ui:action-bar.action>');

    expect($html)
        ->toContain('focus:ring-1')
        ->toContain('focus:ring-offset-1')
        ->toContain('focus:outline-none');
});

it('applies disabled styling to action', function () {
    $html = Blade::render('<ui:action-bar.action>Edit</ui:action-bar.action>');

    expect($html)
        ->toContain('disabled:cursor-not-allowed')
        ->toContain('disabled:opacity-50');
});

it('passes through additional attributes on action', function () {
    $html = Blade::render('<ui:action-bar.action id="edit-btn" data-test="value">Edit</ui:action-bar.action>');

    expect($html)
        ->toContain('id="edit-btn"')
        ->toContain('data-test="value"');
});

it('merges custom classes on action', function () {
    $html = Blade::render('<ui:action-bar.action class="my-custom-class">Edit</ui:action-bar.action>');

    expect($html)
        ->toContain('my-custom-class')
        ->toContain('inline-flex');
});

it('renders disabled action', function () {
    $html = Blade::render('<ui:action-bar.action disabled>Edit</ui:action-bar.action>');

    expect($html)->toContain('disabled');
});
