---
name: mach3ui-development
description: Build and work with mach3builders/mach3ui Flux companion components.
license: MIT
metadata:
  author: Mach3Builders
---

# Mach3UI Development

## Overview

Mach3UI is a Flux companion package that provides components Flux doesn't offer. All components use `Flux::classes()` for styling and `<flux:*>` components internally.

## When to activate

Activate this skill when working with `<ui:*>` components: box, list, section, layout (empty-state, error, main content), or logo.

## Blade/HTML

- Add a blank line between sibling HTML elements at the same indentation level
- Use `<flux:*>` components first. For components Flux doesn't provide, use mach3ui's `<ui:*>` components (Flux companion) which follow Flux conventions (`Flux::classes()`, `data-flux-*` attributes).
- Custom components: `<ui:box>`, `<ui:logo>`, `<ui:section>`, `<ui:list>` (+ `<ui:list.item>`, `variant="definition"`), `<ui:layout.main.content>`, `<ui:layout.empty-state>`, `<ui:layout.error>`
- Check the component source in `vendor/mach3builders/mach3ui/resources/views/components/` for available props and slots before using a component.
- Use `:prop` syntax only on Blade components (`<x-*>`, `<flux:*>`, `<ui:*>`). On plain HTML elements, use `{{ }}` interpolation instead (e.g., `action="{{ route('login') }}"`, not `:action="route('login')"`)
- In Blade views with PHP `use` imports, always reference classes via their imported name (e.g., `Account::class`), never inline FQCN (e.g., `\App\Models\Account::class`)
- Confirm modals (delete, invite, etc.) must display key record info inside a `<ui:box>` with a `<ui:list variant="definition">`. Use `space-y-6` on the modal body.
- Form fields inside modals must always be wrapped in `<ui:box>`. When grouping is needed, use multiple boxes each with a title (+ description).
- Badge columns in tables: `<flux:table.column>` gets `align="center" class="w-0"`, `<flux:table.cell>` gets `align="center"`, and the `<flux:badge>` gets `size="sm" align="center"`.
- `<flux:badge>` uses `color` for colors (e.g. `green`, `red`, `amber`, `zinc`, `blue`) and `variant` for style (`solid`, `outline`). Never pass colors like `success` or `warning` to `variant`.
- Badges in the `badges` slot of `<ui:layout.main.content>` must always include the `rounded` prop.
- Icon columns in tables (standalone `<flux:icon>` in a cell): same layout — `<flux:table.column>` gets `align="center" class="w-0"`, `<flux:table.cell>` gets `align="center"`, and the `<flux:icon>` gets `class="mx-auto size-5"`.
- Action columns in tables (edit, delete buttons): `<flux:table.column>` gets `class="w-0"`, `<flux:table.cell>` gets `align="end"`.

### Buttons

- **Create actions**: `variant="primary"`, no icon
- **Table icon-only actions** (edit, delete): `variant="subtle" size="sm" square` + tooltip (`common.destroy` / `common.edit`)
- **Table textual actions** (with or without icon): `variant="filled" size="sm"` with label (e.g. `common.invite`)
- **Form submit (persists data)**: text-only, no icon. Use `variant="success"` for single-form pages, `variant="secondary"` when multiple save sections exist
- **Form submit (triggers action, e.g. sending an invite)**: `variant="secondary"` with text

## Do and Don't

Do:
- Use `Flux::classes()` for dynamic class building in components
- Use `data-flux-*` attributes for component identification

Don't:
- Don't use `Ui::classes()` or `ClassBuilder` (removed, use `Flux::classes()`)
- Don't use custom gray colors (gray-10/gray-990), use zinc palette
- Don't create standalone UI components that Flux already provides

## References
- `references/mach3ui-guide.md`
