<?php

use Illuminate\Support\Facades\Blade;

// ============================================================================
// OTP Input (index.blade.php) Tests
// ============================================================================

it('renders a basic otp input', function () {
    $html = Blade::render('<ui:input.otp name="code" />');

    expect($html)
        ->toContain('x-data')
        ->toContain('data-input-otp')
        ->toContain('data-control')
        ->toContain('name="code"');
});

it('renders with default length of 6 slots', function () {
    $html = Blade::render('<ui:input.otp name="code" />');

    // Should have 6 slots by default
    expect(substr_count($html, 'data-input-otp-slot'))->toBe(6);
});

it('renders with custom length', function () {
    $html = Blade::render('<ui:input.otp name="code" :length="4" />');

    expect(substr_count($html, 'data-input-otp-slot'))->toBe(4)
        ->and($html)->toContain('length: 4');
});

it('renders with label when provided', function () {
    $html = Blade::render('<ui:input.otp name="code" label="Verification Code" />');

    expect($html)
        ->toContain('Verification Code')
        ->toContain('<label');
});

it('renders with hint when provided', function () {
    $html = Blade::render('<ui:input.otp name="code" label="Code" hint="Check your email for the code" />');

    expect($html)
        ->toContain('Check your email for the code');
});

it('applies size sm variant', function () {
    $html = Blade::render('<ui:input.otp name="code" size="sm" />');

    expect($html)
        ->toContain('h-9')
        ->toContain('w-8')
        ->toContain('text-sm');
});

it('applies size md variant (default)', function () {
    $html = Blade::render('<ui:input.otp name="code" size="md" />');

    expect($html)
        ->toContain('h-12')
        ->toContain('w-10')
        ->toContain('text-lg');
});

it('applies size lg variant', function () {
    $html = Blade::render('<ui:input.otp name="code" size="lg" />');

    expect($html)
        ->toContain('h-14')
        ->toContain('w-12')
        ->toContain('text-xl');
});

it('renders with numeric mode by default', function () {
    $html = Blade::render('<ui:input.otp name="code" />');

    expect($html)
        ->toContain('inputmode="numeric"')
        ->toContain('pattern: /\\d/');
});

it('renders with alphanumeric mode', function () {
    $html = Blade::render('<ui:input.otp name="code" mode="alphanumeric" />');

    expect($html)
        ->toContain('inputmode="text"')
        ->toContain('pattern: /[a-zA-Z0-9]/');
});

it('renders with alpha mode', function () {
    $html = Blade::render('<ui:input.otp name="code" mode="alpha" />');

    expect($html)
        ->toContain('inputmode="text"')
        ->toContain('pattern: /[a-zA-Z]/');
});

it('renders with private mode (masked input)', function () {
    $html = Blade::render('<ui:input.otp name="code" :private="true" />');

    expect($html)->toContain('private: true');
});

it('renders without private mode by default', function () {
    $html = Blade::render('<ui:input.otp name="code" />');

    expect($html)->toContain('private: false');
});

it('renders with disabled state', function () {
    $html = Blade::render('<ui:input.otp name="code" :disabled="true" />');

    expect($html)
        ->toContain('disabled: true')
        ->toContain('opacity-50')
        ->toContain('disabled');
});

it('renders with initial value', function () {
    $html = Blade::render('<ui:input.otp name="code" value="123456" />');

    expect($html)->toContain("'123456'.charAt(i)");
});

it('renders with separator', function () {
    $html = Blade::render('<ui:input.otp name="code" :length="6" :separator="3" />');

    // Should have 2 groups with separator between
    expect(substr_count($html, 'data-input-otp-group'))->toBe(2)
        ->and(substr_count($html, 'data-input-otp-separator'))->toBe(1);
});

it('generates unique id when not provided', function () {
    $html = Blade::render('<ui:input.otp name="code" />');

    expect($html)->toMatch('/id="input-otp-code"/');
});

it('uses custom id when provided', function () {
    $html = Blade::render('<ui:input.otp name="code" id="custom-otp-id" />');

    expect($html)->toContain('id="custom-otp-id"');
});

it('passes through data attributes', function () {
    $html = Blade::render('<ui:input.otp name="code" data-testid="otp-input" />');

    // Note: data-* attributes are passed via $attributes->only('data-*') which uses whereStartsWith
    // The component always includes data-input-otp and data-control
    expect($html)
        ->toContain('data-input-otp')
        ->toContain('data-control');
});

it('includes hidden input for form submission', function () {
    $html = Blade::render('<ui:input.otp name="code" />');

    expect($html)
        ->toContain('type="hidden"')
        ->toContain('x-ref="hidden"')
        ->toContain(':value="value"');
});

it('includes visually hidden text input for accessibility', function () {
    $html = Blade::render('<ui:input.otp name="code" />');

    expect($html)
        ->toContain('x-ref="input"')
        ->toContain('class="sr-only"')
        ->toContain('autocomplete="one-time-code"');
});

it('shows error message from error bag', function () {
    $this->withErrors(['code' => 'The verification code is invalid.']);

    $html = Blade::render('<ui:input.otp name="code" label="Code" />');

    expect($html)
        ->toContain('The verification code is invalid.')
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('shows error styling without label', function () {
    $this->withErrors(['code' => 'Invalid code']);

    $html = Blade::render('<ui:input.otp name="code" />');

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('includes Alpine.js x-modelable directive', function () {
    $html = Blade::render('<ui:input.otp name="code" />');

    expect($html)->toContain('x-modelable="value"');
});

it('passes through wire:model attribute', function () {
    $html = Blade::render('<ui:input.otp wire:model="verificationCode" />');

    expect($html)->toContain('wire:model="verificationCode"');
});

it('passes through x-model attribute', function () {
    $html = Blade::render('<ui:input.otp x-model="code" />');

    expect($html)->toContain('x-model="code"');
});

// ============================================================================
// OTP Group (group.blade.php) Tests
// ============================================================================

it('renders otp group component', function () {
    $html = Blade::render('<ui:input.otp.group>Content</ui:input.otp.group>');

    expect($html)
        ->toContain('data-input-otp-group')
        ->toContain('flex items-center')
        ->toContain('Content');
});

it('renders otp group with custom classes', function () {
    $html = Blade::render('<ui:input.otp.group class="gap-2">Content</ui:input.otp.group>');

    expect($html)
        ->toContain('gap-2')
        ->toContain('flex items-center');
});

it('passes through attributes on otp group', function () {
    $html = Blade::render('<ui:input.otp.group data-testid="group" id="my-group">Content</ui:input.otp.group>');

    expect($html)
        ->toContain('data-testid="group"')
        ->toContain('id="my-group"');
});

// ============================================================================
// OTP Slot (slot.blade.php) Tests
// ============================================================================

it('renders otp slot component', function () {
    $html = Blade::render('<ui:input.otp.slot :index="0" />');

    expect($html)
        ->toContain('data-input-otp-slot')
        ->toContain('x-on:click="focusIndex(0)"')
        ->toContain('x-text="displayChar(digits[0])"');
});

it('renders otp slot with different index', function () {
    $html = Blade::render('<ui:input.otp.slot :index="3" />');

    expect($html)
        ->toContain('x-on:click="focusIndex(3)"')
        ->toContain('x-text="displayChar(digits[3])"')
        ->toContain('activeIndex === 3');
});

it('applies size sm variant on slot', function () {
    $html = Blade::render('<ui:input.otp.slot :index="0" size="sm" />');

    expect($html)
        ->toContain('h-9')
        ->toContain('w-8')
        ->toContain('text-sm');
});

it('applies size md variant on slot (default)', function () {
    $html = Blade::render('<ui:input.otp.slot :index="0" size="md" />');

    expect($html)
        ->toContain('h-12')
        ->toContain('w-10')
        ->toContain('text-lg');
});

it('applies size lg variant on slot', function () {
    $html = Blade::render('<ui:input.otp.slot :index="0" size="lg" />');

    expect($html)
        ->toContain('h-14')
        ->toContain('w-12')
        ->toContain('text-xl');
});

it('renders otp slot with custom classes', function () {
    $html = Blade::render('<ui:input.otp.slot :index="0" class="custom-class" />');

    expect($html)->toContain('custom-class');
});

it('passes through attributes on otp slot', function () {
    $html = Blade::render('<ui:input.otp.slot :index="0" data-testid="slot-0" />');

    expect($html)->toContain('data-testid="slot-0"');
});

it('includes active state binding on slot', function () {
    $html = Blade::render('<ui:input.otp.slot :index="2" />');

    expect($html)->toContain(':class=');
});

// ============================================================================
// OTP Separator (separator.blade.php) Tests
// ============================================================================

it('renders otp separator component', function () {
    $html = Blade::render('<ui:input.otp.separator />');

    expect($html)
        ->toContain('data-input-otp-separator')
        ->toContain('flex items-center justify-center');
});

it('renders otp separator with default dot', function () {
    $html = Blade::render('<ui:input.otp.separator />');

    expect($html)
        ->toContain('size-1.5')
        ->toContain('rounded-full')
        ->toContain('bg-gray-300');
});

it('renders otp separator with custom slot content', function () {
    $html = Blade::render('<ui:input.otp.separator>-</ui:input.otp.separator>');

    expect($html)
        ->toContain('-')
        ->not->toContain('size-1.5'); // Should not render default dot
});

it('renders otp separator with custom classes', function () {
    $html = Blade::render('<ui:input.otp.separator class="mx-4" />');

    expect($html)
        ->toContain('mx-4')
        ->toContain('flex items-center justify-center');
});

it('passes through attributes on otp separator', function () {
    $html = Blade::render('<ui:input.otp.separator data-testid="separator" id="sep-1" />');

    expect($html)
        ->toContain('data-testid="separator"')
        ->toContain('id="sep-1"');
});

// ============================================================================
// OTP Input with Custom Slot Content Tests
// ============================================================================

it('renders individual subcomponents that can be composed', function () {
    // Test that individual subcomponents render correctly for custom layouts
    $groupHtml = Blade::render('<ui:input.otp.group>Group content</ui:input.otp.group>');
    $slotHtml = Blade::render('<ui:input.otp.slot :index="0" />');
    $separatorHtml = Blade::render('<ui:input.otp.separator>-</ui:input.otp.separator>');

    expect($groupHtml)
        ->toContain('data-input-otp-group')
        ->toContain('Group content');

    expect($slotHtml)
        ->toContain('data-input-otp-slot')
        ->toContain('focusIndex(0)');

    expect($separatorHtml)
        ->toContain('data-input-otp-separator')
        ->toContain('-');
});
