# Mach3UI Reference

## Available Components

| Component | Props | Description |
|---|---|---|
| `<ui:box>` | `title`, `description` | Styled container, wraps content in rounded border |
| `<ui:list>` | `variant` | Generic list container, `variant="definition"` renders as `<dl>` |
| `<ui:list.item>` | `label`, `value`, `icon`, `icon:end`, `href`, `route` | Structured list item |
| `<ui:section>` | `title`, `description`, `variant` | Page section with responsive grid, wraps content in `<ui:box>` |
| `<ui:layout.empty-state>` | `icon`, `title`, `description` | Centered empty state with icon circle |
| `<ui:layout.error>` | `code` | Error page content using translation keys |
| `<ui:layout.main.content>` | — | Main content with `header`, `nav`, `badges`, `actions` slots |
| `<ui:logo>` | `href`, `size` | Mach3 brand logo, renders as `<a>` or `<div>` |

## Styling Pattern

All components follow this pattern:

```blade
@php
    $classes = Flux::classes()
        ->add('base classes')
        ->add($condition ? 'conditional' : '');
@endphp

<div {{ $attributes->class($classes) }} data-flux-component-name>
    {{ $slot }}
</div>
```

## Section Variants

- `responsive` (default) — 3-column grid on xl, header left, content right
- `stacked` — single column, header above content

## List Variants

- Default — bordered items with padding, supports icon/href/value
- `definition` — renders as `<dl>`, dotted divider between label and value

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
