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

### Component Usage

```blade
<ui:section title="Profile" description="Update your account settings">
    <flux:input label="Name" wire:model="name" />
    <flux:input label="Email" wire:model="email" />
</ui:section>
```

### Definition list in modals

```blade
<ui:list variant="definition">
    <ui:list.item :label="__('user.name')" :value="$user->name" />
    <ui:list.item :label="__('user.email')" :value="$user->email" />
</ui:list>
```

## Do and Don't

Do:
- Use `<flux:*>` components for buttons, inputs, modals, tables, etc.
- Use `<ui:*>` only for components Flux doesn't provide (box, list, section, layout, logo)
- Use `Flux::classes()` for dynamic class building in components
- Use `data-flux-*` attributes for component identification

Don't:
- Don't use `Ui::classes()` or `ClassBuilder` (removed, use `Flux::classes()`)
- Don't use custom gray colors (gray-10/gray-990), use zinc palette
- Don't create standalone UI components that Flux already provides

## References
- `references/mach3ui-guide.md`
