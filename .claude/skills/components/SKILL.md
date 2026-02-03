---
name: ui-components
description: "Universele Blade UI componenten die werken met én zonder Livewire. Gebruik wanneer: (1) UI component packages gebouwd worden, (2) Componenten nodig zijn die in vanilla Laravel én Livewire werken, (3) Form components met wire:model support nodig zijn."
---

# UI Components

Unstyled Blade componenten die werken in vanilla Laravel én Livewire projecten.

## Kernprincipe

- Alpine.js voor interactiviteit (Livewire heeft Alpine al)
- `wire:` attributes passeren automatisch via `$attributes`
- Componenten zijn unstyled — styling via `ui-styles` skill

## Component Categorieën

### Simpel — wire:model werkt native

| Component | Reden |
|-----------|-------|
| Input, Textarea, Select | Direct op native element |
| Checkbox, Radio | Direct op `<input>` |
| Button | Geen state, `wire:click` werkt gewoon |
| Card, Alert, Badge | Geen state |

### Complex — Alpine-state, brug naar Livewire nodig

| Component | Waarom |
|-----------|--------|
| Custom select | Alpine beheert open/close + selected |
| Combobox/autocomplete | Alpine beheert filtering + selected |
| Date picker | Alpine beheert kalender state |
| Tags input | Alpine beheert array van tags |

### Grijs gebied — Alpine nodig, geen binding-issue

| Component | Situatie |
|-----------|----------|
| Modal | Alpine voor open/close, geen form data |
| Dropdown menu | Alpine voor open/close, `wire:click` op items werkt |
| Tabs, Accordion | Alpine voor active state |

**Vuistregel:** Native HTML form element → simpel. UI-state los van form element → brug nodig.

---

## $attributes

Passeert alle attributes door:

```blade
<input {{ $attributes }}>
```

Bij `<ui:input type="email" wire:model="email" disabled>`:

```html
<input type="email" wire:model="email" disabled>
```

### Livewire attributes extracten

```php
$wireModel = $attributes->wire('model')->value();
$attributes->whereDoesntStartWith('wire:model')
```

---

## Props Conventies

### Algemeen

| Conventie | Voorbeeld |
|-----------|-----------|
| Alfabetische volgorde | `@props(['disabled' => false, 'name' => null, 'size' => 'md'])` |
| camelCase | `labelPosition` |
| Boolean zonder `is`/`has` | `disabled`, `required` |
| Enkelvoud voor waarde | `variant`, `size` |
| Meervoud voor arrays | `options`, `items` |

### Standaard Props

| Prop | Gebruik |
|------|---------|
| `name` | Form element naam + id |
| `label` | Label tekst |
| `placeholder` | Placeholder tekst |
| `hint` | Help tekst |
| `error` | Overschrijf error uit `$errors` bag |
| `variant` | `primary`, `secondary`, `danger`, `warning`, `success`, `ghost`, `outline` |
| `size` | `xs`, `sm`, `md`, `lg`, `xl` |

### Standaard Slots

| Slot | Gebruik |
|------|---------|
| `$slot` | Default content |
| `$trigger` | Element dat iets opent |
| `$icon` | Icon slot |

### Niet doen

| Vermijd | Gebruik |
|---------|---------|
| `isDisabled` | `disabled` |
| `hasError` | `error` |
| `type` als variant | `variant` |
| `class` als prop | Via `$attributes` |
| `id` als prop | Afleiden van `name` |

---

## Subcomponent Props (Colon Syntax)

Props doorpassen aan nested componenten:

```blade
@props([
    'icon' => null,
    'icon:end' => null,
])

@php
    $iconEnd = $__data['icon:end'] ?? null;
@endphp

<button {{ $attributes }}>
    @if($icon)
        <ui:icon :name="$icon" />
    @endif
    {{ $slot }}
    @if($iconEnd)
        <ui:icon :name="$iconEnd" />
    @endif
</button>
```

Gebruik:
```blade
<ui:button icon="check">Opslaan</ui:button>
<ui:button icon:end="arrow-right">Verder</ui:button>
<ui:button icon="download" icon:end="chevron-down">Export</ui:button>
```

### Regels

1. Prefix = subcomponent naam (`icon:`, `label:`)
2. `icon:size` wordt `$iconSize` (camelCase)
3. Defaults in parent component

---

## Data Attributes voor Styling

Hooks voor styling skills:

- `data-variant="primary|secondary|danger"`
- `data-active="true|false"`
- `data-selected="true|false"`
- `data-modal-backdrop`, `data-modal-content`
- `data-dropdown-content`
- `aria-invalid="true"`

---

## Package ServiceProvider

```php
namespace Mach3Builders\UI;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class UIServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views/components', 'ui');
        Blade::componentNamespace('Mach3Builders\\UI\\Components', 'ui');

        Blade::directive('uiScripts', function () {
            if (class_exists(\Livewire\Livewire::class)) {
                return '';
            }
            return '<script src="https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js" defer></script>';
        });
    }
}
```

---

## Component Implementaties

Zie references/components.md voor alle unstyled component implementaties.
