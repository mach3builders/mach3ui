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

## Buttons

Buttons are handled by Flux (`<flux:button>`), not mach3ui. See Flux documentation for button variants and props.
