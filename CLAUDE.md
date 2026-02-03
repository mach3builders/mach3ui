# UI Components & Styling Skills

## Project Overzicht

Paul werkt aan een Laravel UI component package voor Mach3 Builders die zowel met als zonder Livewire werkt. Het systeem bestaat uit twee losse skills:

- **components** — Unstyled Blade componenten
- **styles** — Tailwind 4 styling met theming

## Kernbeslissingen

### Architectuur

- **Alpine.js voor alle interactiviteit** — geen Flux dependency, werkt overal
- **Livewire optioneel** — `wire:` attributes passeren automatisch via `$attributes`
- **Styling apart** — componenten zijn unstyled, styling via aparte skill
- **Prefix: `ui:`** — via `Blade::componentNamespace()`

### Component Categorieën

| Type         | Voorbeelden                            | Livewire Binding                      |
| ------------ | -------------------------------------- | ------------------------------------- |
| Simpel       | Input, Textarea, Select, Button        | `wire:model` werkt native             |
| Complex      | Custom Select, Tags Input, Date Picker | Alpine ↔ Livewire brug nodig          |
| Grijs gebied | Modal, Dropdown, Tabs, Accordion       | Alpine voor state, geen binding issue |

### Props Conventies

- Alfabetische volgorde in `@props([...])`
- camelCase naming
- Boolean zonder `is`/`has` prefix (`disabled`, niet `isDisabled`)
- Standaard props: `name`, `label`, `placeholder`, `hint`, `error`, `variant`, `size`
- Subcomponent props via colon syntax: `icon:end`, `label:position`
- **Gebruik component props i.p.v. utility classes** — `<ui:icon size="xs">` niet `<ui:icon class="size-3">`

### UI::classes() Helper

```php
$classes = UI::classes()
    ->add('base classes')
    ->add($variant, ['primary' => '...', 'secondary' => '...'])
    ->add($size, ['sm' => '...', 'md' => '...'])
    ->when($condition, 'conditional classes')
    ->merge($attributes);
```

Features:

- Static cache voor conflict keys (performance)
- Lazy merge — skip logic als geen user classes
- Smart merge — user classes overschrijven base met zelfde Tailwind prefix
- Breakpoints en states aware (`sm:hover:bg-red-500` overschrijft `sm:hover:bg-blue-600`)

### Theming (Tailwind 4)

```css
@theme {
    --color-primary: oklch(0.55 0.22 265);
    --color-primary-hover: oklch(0.48 0.22 265);
    --color-secondary: oklch(0.92 0.01 265);
    --color-danger: oklch(0.55 0.22 25);
    --color-warning: oklch(0.75 0.18 85);
    --color-success: oklch(0.55 0.18 145);
    --radius: 0.5rem;
}

@variant dark {
    --color-primary: oklch(0.7 0.18 265);
    /* etc */
}
```

- Brand colors via CSS vars: `primary`, `secondary`, `danger`, `warning`, `success`
- Gray blijft Tailwind's standaard `gray-*`
- Projects overriden via eigen `@theme` block

## Skill Structuur

```
components/
├── SKILL.md                    # Kern: categorieën, props, $attributes
└── references/
    └── components.md           # Unstyled implementaties

styles/
├── SKILL.md                    # UI::classes(), theming
└── references/
    └── components.md           # Styled implementaties
```

## Componenten

Geïmplementeerd:

- Form: Input, Textarea, Select, Checkbox, Radio
- Buttons: Button (met variant, size, href)
- Feedback: Alert, Badge
- Layout: Card, Modal, Dropdown, Tabs, Accordion
- Complex: Custom Select, Tags Input (met Livewire binding)

## Volgende Stappen

- [ ] Package repo opzetten
- [ ] Composer package configureren
- [ ] Tests schrijven
- [ ] Meer componenten: Toggle, Tooltip, Toast, Date Picker
