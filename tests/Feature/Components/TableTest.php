<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// Table (ui:table)
// =============================================================================

it('renders a basic table', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th>Header</ui:th></ui:tr></ui:thead><ui:tbody><ui:tr><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('<table')
        ->toContain('Header')
        ->toContain('Cell')
        ->toContain('data-table');
});

it('renders table with default variant', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Test</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('data-variant="default"')
        ->toContain('rounded-xl')
        ->toContain('bg-gray-30');
});

it('renders table with simple variant', function () {
    $html = Blade::render('<ui:table variant="simple"><ui:tbody><ui:tr><ui:td>Test</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('data-variant="simple"')
        ->not->toContain('rounded-xl');
});

it('sets hoverable data attribute to true by default', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Test</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('data-hoverable="true"');
});

it('sets hoverable data attribute to false when disabled', function () {
    $html = Blade::render('<ui:table :hoverable="false"><ui:tbody><ui:tr><ui:td>Test</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('data-hoverable="false"');
});

it('sets striped data attribute to false by default', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Test</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('data-striped="false"');
});

it('sets striped data attribute to true when enabled', function () {
    $html = Blade::render('<ui:table :striped="true"><ui:tbody><ui:tr><ui:td>Test</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('data-striped="true"');
});

it('passes through additional attributes on table', function () {
    $html = Blade::render('<ui:table data-test="value" id="my-table"><ui:tbody><ui:tr><ui:td>Test</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('data-test="value"')
        ->toContain('id="my-table"');
});

it('applies overflow-x-auto class', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Test</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('overflow-x-auto');
});

it('applies border-separate class to table element', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Test</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('border-separate');
});

// =============================================================================
// Table Action Bar (ui:table.action-bar)
// =============================================================================

it('renders action bar', function () {
    $html = Blade::render('<ui:table.action-bar>Actions</ui:table.action-bar>');

    expect($html)
        ->toContain('data-table-action-bar')
        ->toContain('Actions');
});

it('renders action bar with actions slot', function () {
    $html = Blade::render('<ui:table.action-bar><button>Add</button></ui:table.action-bar>');

    expect($html)
        ->toContain('data-table-action-bar-actions')
        ->toContain('<button>Add</button>');
});

it('renders action bar with search slot', function () {
    $html = Blade::render('<ui:table.action-bar><x-slot:search><input type="search" /></x-slot:search></ui:table.action-bar>');

    expect($html)
        ->toContain('data-table-action-bar-search')
        ->toContain('<input type="search"');
});

it('does not render search section when no search slot', function () {
    $html = Blade::render('<ui:table.action-bar>Actions only</ui:table.action-bar>');

    expect($html)->not->toContain('data-table-action-bar-search');
});

it('passes through additional attributes on action bar', function () {
    $html = Blade::render('<ui:table.action-bar data-custom="test" id="action-bar">Actions</ui:table.action-bar>');

    expect($html)
        ->toContain('data-custom="test"')
        ->toContain('id="action-bar"');
});

it('applies flex and gap classes on action bar', function () {
    $html = Blade::render('<ui:table.action-bar>Actions</ui:table.action-bar>');

    expect($html)
        ->toContain('flex')
        ->toContain('items-center')
        ->toContain('gap-4');
});

// =============================================================================
// Table Empty (ui:table.empty)
// =============================================================================

it('renders empty state', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:table.empty /></ui:tbody></ui:table>');

    expect($html)
        ->toContain('data-table-empty')
        ->toContain('No results found')
        ->toContain('Try adjusting your search or filters.');
});

it('renders empty state with custom title', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:table.empty title="No users" /></ui:tbody></ui:table>');

    expect($html)
        ->toContain('No users')
        ->toContain('data-table-empty-title');
});

it('renders empty state with custom description', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:table.empty description="Please add some users" /></ui:tbody></ui:table>');

    expect($html)
        ->toContain('Please add some users')
        ->toContain('data-table-empty-description');
});

it('renders empty state with custom colspan', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:table.empty :colspan="5" /></ui:tbody></ui:table>');

    expect($html)->toContain('colspan="5"');
});

it('renders empty state with default colspan of 1', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:table.empty /></ui:tbody></ui:table>');

    expect($html)->toContain('colspan="1"');
});

it('renders empty state with icon', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:table.empty /></ui:tbody></ui:table>');

    expect($html)->toContain('<svg');
});

it('renders empty state with custom icon', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:table.empty icon="users" /></ui:tbody></ui:table>');

    expect($html)->toContain('<svg');
});

it('renders empty state with slot content', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:table.empty><button>Add item</button></ui:table.empty></ui:tbody></ui:table>');

    expect($html)->toContain('<button>Add item</button>');
});

it('passes through additional attributes on empty state', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:table.empty data-test="empty" /></ui:tbody></ui:table>');

    expect($html)->toContain('data-test="empty"');
});

it('applies centered text styling on empty state', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:table.empty /></ui:tbody></ui:table>');

    expect($html)->toContain('text-center');
});

// =============================================================================
// Thead (ui:thead)
// =============================================================================

it('renders thead', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th>Header</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)
        ->toContain('<thead')
        ->toContain('data-thead')
        ->toContain('Header');
});

it('applies text-left class on thead', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th>Header</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)->toContain('text-left');
});

it('passes through additional attributes on thead', function () {
    $html = Blade::render('<ui:table><ui:thead data-custom="thead-test" id="table-head"><ui:tr><ui:th>Header</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)
        ->toContain('data-custom="thead-test"')
        ->toContain('id="table-head"');
});

// =============================================================================
// Tbody (ui:tbody)
// =============================================================================

it('renders tbody', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('<tbody')
        ->toContain('data-tbody')
        ->toContain('Cell');
});

it('passes through additional attributes on tbody', function () {
    $html = Blade::render('<ui:table><ui:tbody data-custom="tbody-test" id="table-body"><ui:tr><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('data-custom="tbody-test"')
        ->toContain('id="table-body"');
});

// =============================================================================
// Tr (ui:tr)
// =============================================================================

it('renders tr', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('<tr')
        ->toContain('data-tr')
        ->toContain('Cell');
});

it('applies group class on tr', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('group');
});

it('renders clickable tr with cursor-pointer', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr :clickable="true"><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('cursor-pointer');
});

it('renders clickable tr when data-href is present', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr data-href="/users/1"><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('cursor-pointer')
        ->toContain('data-href="/users/1"');
});

it('renders clickable tr when wire:click is present', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr wire:click="selectRow"><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('cursor-pointer');
});

it('renders clickable tr when x-on:click is present', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr x-on:click="handleClick"><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('cursor-pointer');
});

it('renders clickable tr when @click is present', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr @click="handleClick"><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('cursor-pointer');
});

it('renders tr with static selected state', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr :selected="true"><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('*:bg-gray-10');
});

it('renders tr with Alpine selected binding', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr selected="isSelected"><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('x-bind:class="isSelected');
});

it('renders nested tr with x-show', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr :nested="true"><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('x-show="expanded"')
        ->toContain('x-cloak');
});

it('does not apply nested attributes when nested is false', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr :nested="false"><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->not->toContain('x-show="expanded"')
        ->not->toContain('x-cloak');
});

it('passes through additional attributes on tr', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr data-row-id="123" id="row-1"><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('data-row-id="123"')
        ->toContain('id="row-1"');
});

// =============================================================================
// Th (ui:th)
// =============================================================================

it('renders th', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th>Header</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)
        ->toContain('<th')
        ->toContain('data-th')
        ->toContain('Header');
});

it('renders th with left alignment by default', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th>Header</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)->toContain('text-left');
});

it('renders th with center alignment', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th align="center">Header</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)->toContain('text-center');
});

it('renders th with right alignment', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th align="right">Header</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)->toContain('text-right');
});

it('renders th with fit width', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th :fit="true">ID</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)
        ->toContain('w-0')
        ->toContain('text-center');
});

it('renders sortable th', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th :sortable="true">Name</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)
        ->toContain('cursor-pointer')
        ->toContain('select-none')
        ->toContain('<svg');
});

it('renders th with ascending sort', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th :sortable="true" sorted="asc">Name</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)
        ->toContain('aria-sort="ascending"')
        ->toContain('text-gray-900');
});

it('renders th with descending sort', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th :sortable="true" sorted="desc">Name</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)
        ->toContain('aria-sort="descending"')
        ->toContain('rotate-180');
});

it('renders th without sort icon when not sortable', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th>Name</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)->not->toContain('chevron-up');
});

it('applies uppercase and tracking-wide on th', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th>Header</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)
        ->toContain('uppercase')
        ->toContain('tracking-wide');
});

it('passes through additional attributes on th', function () {
    $html = Blade::render('<ui:table><ui:thead><ui:tr><ui:th data-column="name" id="header-name">Name</ui:th></ui:tr></ui:thead></ui:table>');

    expect($html)
        ->toContain('data-column="name"')
        ->toContain('id="header-name"');
});

// =============================================================================
// Td (ui:td)
// =============================================================================

it('renders td', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Cell content</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('<td')
        ->toContain('data-td')
        ->toContain('Cell content');
});

it('renders td with left alignment by default', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('text-left');
});

it('renders td with center alignment', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td align="center">Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('text-center');
});

it('renders td with right alignment', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td align="right">Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('text-right');
});

it('renders td with fit width', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td :fit="true">ID</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('w-0')
        ->toContain('text-center');
});

it('renders td with actions styling', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td :actions="true"><button>Edit</button></ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('w-0')
        ->toContain('text-right')
        ->toContain('data-td-actions')
        ->toContain('<button>Edit</button>');
});

it('renders td with actions visibility classes', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td :actions="true"><button>Edit</button></ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('invisible')
        ->toContain('group-hover:visible');
});

it('renders td with highlight styling', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td :highlight="true">Important</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('font-medium')
        ->toContain('text-gray-900');
});

it('applies bg-white class on td', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('bg-white');
});

it('applies align-top class on td', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('align-top');
});

it('passes through additional attributes on td', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td data-cell="value" id="cell-1">Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)
        ->toContain('data-cell="value"')
        ->toContain('id="cell-1"');
});

it('applies padding classes on td', function () {
    $html = Blade::render('<ui:table><ui:tbody><ui:tr><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>');

    expect($html)->toContain('px-4');
});

// =============================================================================
// Integration Tests
// =============================================================================

it('renders a complete table structure', function () {
    $html = Blade::render('
        <ui:table>
            <ui:thead>
                <ui:tr>
                    <ui:th>Name</ui:th>
                    <ui:th>Email</ui:th>
                    <ui:th :fit="true">Actions</ui:th>
                </ui:tr>
            </ui:thead>
            <ui:tbody>
                <ui:tr>
                    <ui:td :highlight="true">John Doe</ui:td>
                    <ui:td>john@example.com</ui:td>
                    <ui:td :actions="true"><button>Edit</button></ui:td>
                </ui:tr>
            </ui:tbody>
        </ui:table>
    ');

    expect($html)
        ->toContain('data-table')
        ->toContain('data-thead')
        ->toContain('data-tbody')
        ->toContain('data-tr')
        ->toContain('data-th')
        ->toContain('data-td')
        ->toContain('Name')
        ->toContain('Email')
        ->toContain('John Doe')
        ->toContain('john@example.com')
        ->toContain('Edit');
});

it('renders table with action bar', function () {
    $html = Blade::render('
        <ui:table.action-bar>
            <button>Add User</button>
            <x-slot:search>
                <input type="search" placeholder="Search..." />
            </x-slot:search>
        </ui:table.action-bar>
        <ui:table>
            <ui:tbody>
                <ui:tr><ui:td>Data</ui:td></ui:tr>
            </ui:tbody>
        </ui:table>
    ');

    expect($html)
        ->toContain('data-table-action-bar')
        ->toContain('Add User')
        ->toContain('type="search"')
        ->toContain('data-table');
});

it('renders table with sortable headers', function () {
    $html = Blade::render('
        <ui:table>
            <ui:thead>
                <ui:tr>
                    <ui:th :sortable="true" sorted="asc">Name</ui:th>
                    <ui:th :sortable="true">Email</ui:th>
                    <ui:th>Status</ui:th>
                </ui:tr>
            </ui:thead>
        </ui:table>
    ');

    expect($html)
        ->toContain('aria-sort="ascending"')
        ->toContain('cursor-pointer')
        ->toContain('select-none');
});

it('renders table with empty state', function () {
    $html = Blade::render('
        <ui:table>
            <ui:thead>
                <ui:tr>
                    <ui:th>Name</ui:th>
                    <ui:th>Email</ui:th>
                </ui:tr>
            </ui:thead>
            <ui:tbody>
                <ui:table.empty :colspan="2" title="No users found" description="Add your first user to get started.">
                    <button>Add User</button>
                </ui:table.empty>
            </ui:tbody>
        </ui:table>
    ');

    expect($html)
        ->toContain('colspan="2"')
        ->toContain('No users found')
        ->toContain('Add your first user to get started.')
        ->toContain('<button>Add User</button>');
});
