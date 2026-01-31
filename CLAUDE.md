# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Mach3Builders UI is a Laravel package providing a Blade UI component library with 72 components (accordion, buttons, cards, forms, modals, tables, etc.).

## Commands

```bash
# Run tests
composer test
vendor/bin/pest tests/ExampleTest.php      # single file
vendor/bin/pest --filter="test_name"       # specific test

# Code quality
composer format                             # Laravel Pint
composer analyse                            # PHPStan level 5
```

## Architecture

### Namespace
- `Mach3Builders\Ui\` - Main package namespace

### Directory Structure

```
src/
├── Commands/         # Artisan commands
├── Facades/          # Laravel facades
├── Ui.php            # Main class
└── UiServiceProvider.php

resources/views/components/  # 72 Blade UI components
```

## UI Components

### Component Conventions
- **Prefix**: Always use `<ui:...>` - never `<x-...>` for UI components
- **Structure**: Each component in its own folder with `index.blade.php`
- **Styling**: Tailwind classes in Blade, no separate CSS files
- **Interactivity**: Alpine.js inline, no separate JS files
- **Livewire**: Components must work without Livewire (no hardcoded `wire:` directives)
- **Data attribute**: Root element needs `data-{component}` for CSS targeting
- **@props**: Always include `@props([...])` at top, even if empty: `@props([])`
- **Classes**: Always use `Ui::classes()`, never plain strings for class variables
- **IDs**: Generate unique IDs with `$id = uniqid('component-');`

### Livewire Wire Model
Extract wire:model using the official Livewire API:

```blade
@php
    $wireModel = $attributes->wire('model');
    $hasWireModel = (bool) $wireModel?->directive;
    $wireModelValue = $wireModel?->value();
    $isLive = $wireModel?->hasModifier('live');
@endphp
```

### Component Structure
```
resources/views/components/[component]/
├── index.blade.php      # <ui:[component]>
├── item.blade.php       # <ui:[component].item> (if needed)
└── [sub].blade.php      # <ui:[component].[sub]> (if needed)
```

### Class Management
Use `Ui::classes()` for all class definitions. Returns a `ClassBuilder` (implements `Stringable`):

```blade
@php
    $classes = Ui::classes()
        ->add('base classes')           // Always added
        ->add(match ($variant) { ... }) // Match expression
        ->add($bool ? 'class' : '')     // Ternary
        ->when($icon, 'pl-6')           // Add if truthy
        ->unless($icon, 'pl-2');        // Add if falsy
@endphp

<div {{ $attributes->class($classes) }} data-component>
```

**Important**: No `.get()` needed - ClassBuilder converts to string automatically.

### Multiple Class Variables
Use descriptive names for different element classes within a component:

```blade
@php
    $itemClasses = Ui::classes()->add('...');
    $titleClasses = Ui::classes()->add('...');
    $contentClasses = Ui::classes()->add('...');
    $iconClasses = Ui::classes()->add('...');
@endphp

<div {{ $attributes->class($itemClasses) }} data-component>
    <div class="{{ $titleClasses }}" data-component-title>...</div>
    <div class="{{ $contentClasses }}" data-component-content>...</div>
</div>
```

Note: Root element uses `$attributes->class()`, inner elements use `class="{{ $classes }}"`.

### Props Naming
- **camelCase** for all props: `iconLeading`, `iconTrailing`, `iconVariant`
- **Positioning suffixes**: `Leading` / `Trailing` for before/after content
- **Boolean props**: Simple names like `open`, `disabled`, `loading`

### Data Attributes
- Root element: `data-{component}` (e.g., `data-accordion`)
- Sub-elements: `data-{component}-{part}` (e.g., `data-accordion-title`, `data-accordion-content`)
- State/config: `data-variant="{{ $variant }}"`, `data-type="{{ $type }}"`

### Slot Access
Access named slots safely:
```blade
@php
    $actionSlot = $__laravel_slots['action'] ?? null;
    $hasAction = $actionSlot !== null;
@endphp
```

### Default Icon Maps
Map variants to default icons:
```blade
@php
    $icons = [
        'default' => 'megaphone',
        'info' => 'info',
        'success' => 'circle-check',
        'warning' => 'triangle-alert',
        'danger' => 'circle-x',
    ];
@endphp

<ui:icon :name="$icon ?? $icons[$variant] ?? $icons['default']" />
```

### Icons
Always use `<ui:icon>` instead of `<x-lucide-*>` or `<x-dynamic-component>`:

```blade
<ui:icon name="user" size="md" />
<ui:icon :name="$icon" :size="$iconSize" />
<ui:icon :name="$icon" :class="$iconClasses" />
```

### Dark Mode
Light and dark mode classes on separate `->add()` lines:
```blade
$classes = Ui::classes()
    ->add('bg-gray-100 text-gray-600')
    ->add('dark:bg-gray-700 dark:text-gray-300');
```

**Exception:** Inside `match()` statements, keep light+dark together per variant:
```blade
->add(match ($variant) {
    'info' => 'bg-cyan-50 text-cyan-800 dark:bg-cyan-900/20 dark:text-cyan-400',
    'danger' => 'bg-red-50 text-red-800 dark:bg-red-900/20 dark:text-red-400',
    default => 'bg-gray-50 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400',
});
```

### Alpine.js Patterns

**Always use `x-on:` instead of `@` shorthand:**
```blade
x-on:click="..."      ✓
@click="..."          ✗
```

**State-based parent/child pattern (preferred):**
```blade
{{-- Parent: manages state, listens for events --}}
<div
    x-data="{ active: null }"
    x-on:item-toggle.stop="active = (active === $event.detail) ? null : $event.detail">

{{-- Child: has local state, dispatches events to parent --}}
<div
    x-data="{ id: '{{ $id }}', localOpen: @js($open) }"
    x-effect="
        const parent = $el.closest('[data-parent]');
        const isSingle = parent?.dataset.type === 'single';
        $el.open = isSingle ? Alpine.$data(parent).active === id : localOpen;
    ">
    <button x-on:click="isSingle ? $dispatch('item-toggle', id) : localOpen = !localOpen">
```

**Simple state:**
```blade
<div x-data="{ open: false }">
```

**Common directives:**
- `x-show="open"` - Toggle visibility
- `x-cloak` - Hide until Alpine loads (pair with x-show)
- `x-on:click="open = !open"` - Event handling
- `x-effect="..."` - Reactive side effects
- `x-init="..."` - Run on init
- `x-ref="name"` - Element reference
- `$dispatch('event', data)` - Emit events to parent

### Focus & Ring States
Buttons:
```blade
'focus:ring-1 focus:ring-offset-1 focus:outline-none'
'focus:ring-blue-600 focus:ring-offset-white'
'dark:focus:ring-offset-gray-800'
```

Inputs:
```blade
'focus:border-gray-400 focus:outline-none'
'dark:focus:border-gray-500'
```

Checkboxes/Radios:
```blade
'focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:ring-offset-0'
'dark:focus:ring-blue-500/20'
```

### Tailwind v4 Syntax
Use modern child selectors:
- `*:ring-2` instead of `[&>*]:ring-2`
- `*:border-t` instead of `[&>*]:border-t`

### Standard Variants
`default`, `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `ghost`, `subtle`, `outline-*`

### Standard Sizes
`xs`, `sm`, `md` (default), `lg`, `xl`

## Testing

Uses Pest PHP with Orchestra Testbench. Architecture tests enforce no debugging functions (`dd`, `dump`, `ray`).

## Code Style

- Laravel Pint with strict comparison (`strict_comparison`, `strict_param`)
- PHPStan level 5

### Auto-formatting Hooks
After Edit/Write operations, these hooks run automatically:
- `vendor/bin/pint --dirty` - PHP code formatting
- `blade-formatter` - Blade template formatting
