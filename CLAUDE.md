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

### Component Structure
```
resources/views/components/[component]/
├── index.blade.php      # <ui:[component]>
├── item.blade.php       # <ui:[component].item> (if needed)
└── [sub].blade.php      # <ui:[component].[sub]> (if needed)
```

### Variant Pattern
Components use class arrays for variants, sizes, and states:
```blade
$variant_classes = [
    'default' => ['light classes', 'hover classes', 'dark: classes'],
    'primary' => [...],
];
$size_classes = ['xs' => [...], 'sm' => [...], 'md' => [...], 'lg' => [...]];
```

Apply with spread operator: `...$variant_classes[$variant] ?? $variant_classes['default']`

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
