# Mach3UI — Flux Companion Package

## Overview

Mach3UI is a Flux companion package that provides components Flux doesn't offer. It requires `livewire/flux-pro` as a dependency and uses Flux internals (`Flux::classes()`, `<flux:heading>`, etc.).

## Architecture

- **Prefix: `ui:`** — `<ui:box>`, `<ui:section>`, etc.
- **Flux dependency** — all components use `Flux::classes()` for styling, `<flux:*>` for sub-components
- **Data attributes** — all components use `data-flux-*` attributes (e.g., `data-flux-box`, `data-flux-section`)
- **Zinc color palette** — follows Flux conventions (zinc-based, not custom gray scale)
- **UiTagCompiler** — transforms `<ui:*>` to `<x-ui::*>` before Blade compilation

## Components

| Component | Usage | Description |
|---|---|---|
| `<ui:box>` | `title`, `description` | Styled container with optional heading |
| `<ui:list>` | `variant="definition"` | Generic list, definition variant uses `<dl>` |
| `<ui:list.item>` | `label`, `value`, `icon`, `href` | List item with structured layout |
| `<ui:section>` | `title`, `description`, `variant` | Page section with responsive grid layout |
| `<ui:layout.empty-state>` | `icon`, `title`, `description` | Centered empty state with icon |
| `<ui:layout.error>` | `code` | Error page content (no layout wrapper) |
| `<ui:layout.main.content>` | `header`, `nav`, `badges`, `actions` slots | Main content area with header and nav |
| `<ui:logo>` | `href`, `size` | Mach3 brand logo |

## Conventions

- Use `Flux::classes()` for all dynamic class composition
- Use `$attributes->class($classes)` pattern (not `$attributes->except('class')` + separate `class=""`)
- Internal component references use `<ui:*>` prefix (e.g., section uses `<ui:box>`)
- CSS: `--font-brand` and `--font-sans` theme variables + `@source` directive in `ui.css`

## Service Provider

- `bootComponentPath()` — registers anonymous Blade components under `ui:` prefix
- `bootTagCompiler()` — `<ui:*>` → `<x-ui::*>` transformation
