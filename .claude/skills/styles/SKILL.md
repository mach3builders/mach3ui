---
name: ui-styles
description: "Tailwind 4 CSS styling voor ui-components. Gebruik wanneer: (1) ui: componenten gestyled moeten worden, (2) UI::classes() helper gebruikt wordt, (3) Theming via CSS variabelen opgezet moet worden."
---

# UI Styles

Styling voor ui: componenten via `UI::classes()` helper en Tailwind 4 theming.

## Theming (Tailwind 4)

Package default theme:

```css
/* resources/css/ui.css */
@theme {
    /* Brand colors */
    --color-primary: oklch(0.55 0.22 265);
    --color-primary-hover: oklch(0.48 0.22 265);
    --color-secondary: oklch(0.92 0.01 265);
    --color-secondary-hover: oklch(0.87 0.01 265);
    --color-danger: oklch(0.55 0.22 25);
    --color-danger-hover: oklch(0.48 0.22 25);
    --color-warning: oklch(0.75 0.18 85);
    --color-warning-hover: oklch(0.68 0.18 85);
    --color-success: oklch(0.55 0.18 145);
    --color-success-hover: oklch(0.48 0.18 145);
    
    /* Radius */
    --radius: 0.5rem;
}

/* Dark mode */
@variant dark {
    --color-primary: oklch(0.7 0.18 265);
    --color-primary-hover: oklch(0.75 0.18 265);
    --color-secondary: oklch(0.25 0.01 265);
    --color-secondary-hover: oklch(0.3 0.01 265);
    --color-danger: oklch(0.65 0.2 25);
    --color-danger-hover: oklch(0.7 0.2 25);
    --color-warning: oklch(0.8 0.16 85);
    --color-warning-hover: oklch(0.85 0.16 85);
    --color-success: oklch(0.65 0.16 145);
    --color-success-hover: oklch(0.7 0.16 145);
}
```

Project override:

```css
/* app.css */
@import "tailwindcss";
@import "@mach3builders/ui/css/ui.css";

@theme {
    --color-primary: oklch(0.55 0.27 310);
    --color-primary-hover: oklch(0.48 0.27 310);
    --radius: 9999px;
}

@variant dark {
    --color-primary: oklch(0.7 0.23 310);
    --color-primary-hover: oklch(0.75 0.23 310);
}
```

Gray kleuren gebruiken Tailwind's standaard `gray-*` classes.

---

## UI::classes() Helper

```php
namespace Mach3Builders\UI\Support;

use Illuminate\View\ComponentAttributeBag;

class Classes
{
    protected array $classes = [];
    protected array $userClasses = [];
    
    protected static array $conflictKeyCache = [];

    public static function make(): static
    {
        return new static();
    }

    public function add(string $key, array $options = null): static
    {
        if ($options === null) {
            $this->classes[] = $key;
        } else {
            $this->classes[] = $options[$key] ?? '';
        }
        return $this;
    }

    public function when(bool $condition, string $classes): static
    {
        if ($condition) {
            $this->classes[] = $classes;
        }
        return $this;
    }

    public function merge(ComponentAttributeBag $attributes): static
    {
        $this->userClasses = explode(' ', $attributes->get('class', ''));
        return $this;
    }

    public function __toString(): string
    {
        $base = array_filter($this->classes);
        $user = array_filter($this->userClasses);
        
        if (empty($user)) {
            return implode(' ', $base);
        }
        
        return implode(' ', $this->mergeWithOverride($base, $user));
    }

    protected function mergeWithOverride(array $base, array $user): array
    {
        $userKeys = [];
        foreach ($user as $class) {
            $key = $this->getConflictKey($class);
            if ($key) {
                $userKeys[$key] = true;
            }
        }

        $filtered = array_filter($base, function ($class) use ($userKeys) {
            $key = $this->getConflictKey($class);
            return !isset($userKeys[$key]);
        });

        return [...$filtered, ...$user];
    }

    protected function getConflictKey(string $class): ?string
    {
        if (isset(self::$conflictKeyCache[$class])) {
            return self::$conflictKeyCache[$class];
        }
        
        $parts = explode(':', $class);
        $utility = array_pop($parts);
        $modifiers = $parts;
        
        $utilityPrefix = $this->getUtilityPrefix($utility);
        
        if (!$utilityPrefix) {
            return self::$conflictKeyCache[$class] = null;
        }
        
        sort($modifiers);
        $modifiers[] = $utilityPrefix;
        
        return self::$conflictKeyCache[$class] = implode(':', $modifiers);
    }

    protected function getUtilityPrefix(string $utility): ?string
    {
        $multiPartPrefixes = [
            'min-w', 'max-w', 'min-h', 'max-h',
            'scroll-m', 'scroll-p', 'line-clamp',
            'flex-col', 'flex-row',
            'grid-cols', 'grid-rows',
            'col-span', 'row-span',
            'gap-x', 'gap-y',
            'space-x', 'space-y',
            'divide-x', 'divide-y',
            'border-t', 'border-r', 'border-b', 'border-l',
            'rounded-t', 'rounded-r', 'rounded-b', 'rounded-l',
            'rounded-tl', 'rounded-tr', 'rounded-bl', 'rounded-br',
            'inset-x', 'inset-y',
        ];

        foreach ($multiPartPrefixes as $prefix) {
            if (str_starts_with($utility, $prefix)) {
                return $prefix;
            }
        }

        if (preg_match('/^([a-z-]+?)(?:-[a-z]*\d|$|-\[)/i', $utility, $matches)) {
            return $matches[1];
        }

        $lastDash = strrpos($utility, '-');
        if ($lastDash !== false) {
            return substr($utility, 0, $lastDash);
        }

        return $utility;
    }
}
```

## UI Facade

```php
namespace Mach3Builders\UI\Facades;

use Illuminate\Support\Facades\Facade;

class UI extends Facade
{
    public static function classes(): \Mach3Builders\UI\Support\Classes
    {
        return new \Mach3Builders\UI\Support\Classes();
    }
}
```

## Gebruik Pattern

```blade
@php
    $classes = UI::classes()
        ->add('base classes')
        ->add($variant, [
            'primary' => 'variant classes',
            'secondary' => 'variant classes',
        ])
        ->add($size, [
            'sm' => 'size classes',
            'md' => 'size classes',
        ])
        ->when($condition, 'conditional classes')
        ->merge($attributes);
@endphp

<element {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $slot }}
</element>
```

## Merge Gedrag

User classes overschrijven component classes met zelfde utility prefix:

| User class | Overschrijft |
|------------|--------------|
| `bg-red-500` | `bg-blue-600` |
| `hover:bg-red-500` | `hover:bg-blue-600` |
| `sm:hover:bg-red-500` | `sm:hover:bg-blue-600` |
| `md:px-6` | `md:px-4` |

Modifier volgorde maakt niet uit — `sm:hover:` en `hover:sm:` zijn equivalent.

---

## Component Styling

Zie references/components.md voor styling per component.
