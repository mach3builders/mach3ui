# Component Skill

Use this skill to **create** or **refactor** Mach3UI components.

## Critical Rules

1. **Always use `<ui:...>` prefix** - Never `<x-...>` for UI components
2. **Components must work without Livewire** - No hardcoded `wire:` directives
3. **Use Tailwind classes in Blade** - No separate CSS files for components
4. **Use Alpine.js inline** - No separate JS files for components
5. **Minimal API** - Fewer props = easier to use
6. **Sensible defaults** - Components work with zero configuration
7. **Composition over configuration** - Use slots and child components instead of complex prop arrays
8. **Add `data-{component}` attribute** - Every root element needs this for CSS targeting

## Folder Structure

```
resources/views/components/[component]/
├── index.blade.php      # <ui:[component]>
├── item.blade.php       # <ui:[component].item> (if needed)
└── [sub].blade.php      # <ui:[component].[sub]> (if needed)
```

## Component Template

```blade
@props([
    'title' => null,
    'variant' => 'default',
])

@php
    $variant_classes = [
        'default' => [
            'bg-white border-gray-200',
            'dark:bg-gray-800 dark:border-gray-700',
        ],
        'primary' => [
            'bg-blue-500 border-transparent text-white',
            'dark:bg-blue-600',
        ],
    ];
@endphp

<div
    {{ $attributes->class([
        'rounded-lg border p-4',
        ...$variant_classes[$variant] ?? $variant_classes['default'],
    ]) }}
    data-example
>
    @if ($title)
        <h3>{{ $title }}</h3>
    @endif

    {{ $slot }}
</div>
```

## Variant Patterns

Components often need multiple class arrays for different concerns.

### Class Array Types

| Array | Purpose | Example Props |
|-------|---------|---------------|
| `$base_classes` | Always applied | - |
| `$variant_classes` | Visual style | `variant="primary"` |
| `$size_classes` | Dimensions | `size="sm"` |
| `$active_classes` | Active/selected state | `active` |

### Structure Pattern

Group related classes on separate lines for readability:

```blade
@php
    $variant_classes = [
        'default' => [
            'bg-white border-gray-200 text-gray-700',           // light: background, border, text
            'hover:bg-gray-50',                                  // light: hover
            'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200',  // dark mode
            'dark:hover:bg-gray-750',                            // dark: hover
        ],
        'primary' => [
            'bg-blue-500 border-transparent text-white',
            'hover:bg-blue-600',
            'dark:bg-blue-600',
            'dark:hover:bg-blue-500',
        ],
    ];

    $size_classes = [
        'sm' => [
            'min-h-8 px-3 text-xs',
            '[&>svg]:size-3.5',                                  // nested element sizing
        ],
        'md' => [
            'min-h-10 px-4 text-sm',
            '[&>svg]:size-4',
        ],
    ];
@endphp
```

### Applying Classes

Use spread operator with fallback:

```blade
{{ $attributes->class([
    // Base classes (always applied)
    'inline-flex items-center rounded-md border font-medium',

    // Variant classes (with fallback)
    ...$variant_classes[$variant] ?? $variant_classes['default'],

    // Size classes (with fallback)
    ...$size_classes[$size] ?? $size_classes['md'],

    // Conditional classes
    'opacity-50 cursor-not-allowed' => $disabled,
]) }}
```

### Active State Pattern

For components with active/selected states, use separate array with `data-active` selector:

```blade
@php
    $active_classes = [
        'default' => [
            'bg-gray-100 dark:bg-gray-700',                      // when $active prop is true
            '[&[data-active]]:bg-gray-100 dark:[&[data-active]]:bg-gray-700',  // when data-active attr
        ],
    ];
@endphp

<button
    {{ $attributes->class([
        ...$variant_classes[$variant],
        ($active_classes[$variant] ?? $active_classes['default'])[1],        // always include selector
        ($active_classes[$variant] ?? $active_classes['default'])[0] => $active,  // conditional
    ]) }}
    @if ($active) data-active @endif
>
```

### Standard Variants

| Variant | Use Case |
|---------|----------|
| `default` | Neutral, secondary actions |
| `primary` | Main CTA, primary actions |
| `secondary` | Alternative emphasis |
| `success` | Positive feedback, confirmations |
| `danger` | Destructive actions, errors |
| `warning` | Caution, alerts |
| `info` | Informational |
| `ghost` | Minimal, icon-only buttons |
| `subtle` | Low emphasis background |
| `outline-*` | Bordered variants (outline-success, etc.) |

### Standard Sizes

| Size | Use Case |
|------|----------|
| `xs` | Compact UI, tags |
| `sm` | Secondary actions, dense layouts |
| `md` | Default, most common |
| `lg` | Primary CTAs, emphasis |
| `xl` | Hero sections, large touch targets |

## Slots

### Named Slots

```blade
<ui:card>
    <x-slot name="header">
        <h2>Title</h2>
    </x-slot>

    Content here

    <x-slot name="footer">
        <ui:button>Save</ui:button>
    </x-slot>
</ui:card>
```

### Slot Existence Check

```blade
@if (isset($footer))
    <div class="card-footer">
        {{ $footer }}
    </div>
@endif
```

## Parent-Child Components

For components with items, create separate components:

```blade
<ui:accordion type="single">
    <ui:accordion.item title="First">Content</ui:accordion.item>
    <ui:accordion.item title="Second">Content</ui:accordion.item>
</ui:accordion>
```

### Communication via Alpine.js Events

```blade
{{-- Parent --}}
<div
    x-data="{ active: @js($default) }"
    x-on:item-toggle.stop="active = $event.detail"
>
    {{ $slot }}
</div>

{{-- Child --}}
<button x-on:click="$dispatch('item-toggle', 'value')">
    Toggle
</button>
```

### Context via Data Attributes

```blade
{{-- Parent --}}
<div data-accordion-type="single">

{{-- Child reads context --}}
x-data="{
    isSingle: !!$el.closest('[data-accordion-type=single]')
}"
```

## Livewire Compatibility

Components must forward `$attributes` to interactive elements:

```blade
<input {{ $attributes->merge(['type' => 'text']) }} />
<button {{ $attributes->merge(['type' => 'button']) }}>
    {{ $slot }}
</button>
```

Test that these work:

```blade
<ui:input wire:model="email" />
<ui:button wire:click="save">Save</ui:button>
<ui:input x-model="data" x-on:input="validate" />
```

## Refactoring Checklist

| Check | Issue | Fix |
|-------|-------|-----|
| **Prefix** | Uses `<x-*>` | Change to `<ui:*>` |
| **Livewire** | Hardcoded `wire:` | Remove, use `$attributes` forwarding |
| **Structure** | Single file in components/ | Move to folder with index.blade.php |
| **Styling** | Missing dark mode | Add `dark:` variants |
| **Styling** | Semantic CSS classes | Convert to Tailwind utilities |
| **Native HTML** | Custom JS for popover/modal | Use `popover`, `dialog`, `details` |
| **Data attr** | Missing `data-{component}` | Add to root element |

## After Changes

Run `php artisan view:clear` after modifying Blade components.
