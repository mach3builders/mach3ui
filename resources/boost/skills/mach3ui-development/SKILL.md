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
- `<flux:table.row>` must never carry an `href` or `wire:navigate`. Wrap the name cell's value in a `<flux:link>` instead so only the name is clickable.

### Buttons & Links

- `<flux:link>` must always have `class="cursor-pointer"`. `<flux:button>` must never set `cursor-pointer` (already styled by Flux).
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

## View Conventions

### Page Layout

Every page uses `<ui:layout.main.content>` with a `header` slot. Optional slots: `badges`, `actions`, `nav`.

```blade
<ui:layout.main.content>
    <x-slot name="header">
        <flux:heading level="1" size="xl">{{ __('model.plural') }}</flux:heading>
        <flux:text variant="subtle">{{ __('model.plural_description') }}</flux:text>
    </x-slot>

    <x-slot:nav>
        @include('pages::model.partials.nav', ['tab' => 'details'])
    </x-slot>

    {{-- content --}}
</ui:layout.main.content>
```

### Index Page (Table)

```blade
@if (count($items) || $search)
    <div class="space-y-6">
        <div class="flex items-center gap-4">
            <flux:button variant="primary" wire:click="create">{{ __('model.create') }}</flux:button>

            <flux:input wire:model.live.debounce.300ms="search" icon="search"
                :placeholder="__('common.search')" class="ms-auto max-w-64" />
        </div>

        @if (count($items))
            <flux:table :paginate="$items">
                <flux:table.columns>...</flux:table.columns>
                <flux:table.rows>...</flux:table.rows>
            </flux:table>
        @else
            <flux:text variant="subtle" class="py-8 text-center">{{ __('common.no_results_message') }}</flux:text>
        @endif
    </div>
@else
    <ui:layout.empty-state :title="__('common.no_results_title')" :description="__('common.no_results_message')">
        <flux:button variant="primary" wire:click="create">{{ __('model.create') }}</flux:button>
    </ui:layout.empty-state>
@endif
```

- Toolbar: primary create button left, search right (`ms-auto max-w-64`)
- Empty state (`<ui:layout.empty-state>`) only when no data AND no active search
- No search results: centered subtle text, not empty state

### Index Page (Grid/Cards)

```blade
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($items as $item)
        <a wire:navigate href="{{ route('model.show', $item) }}" class="group">
            <ui:box class="space-y-3! hover:ring-1 hover:ring-zinc-300 dark:hover:ring-zinc-600">
                <div class="flex items-center justify-between">
                    <flux:heading size="sm">{{ $item->name }}</flux:heading>

                    <flux:icon.arrow-right class="size-5 shrink-0 text-zinc-300 opacity-0
                        transition group-hover:translate-x-0.5 group-hover:text-zinc-500
                        group-hover:opacity-100 dark:text-zinc-600 dark:group-hover:text-zinc-400" />
                </div>
            </ui:box>
        </a>
    @endforeach
</div>

<div>{{ $items->links() }}</div>
```

- Responsive: `grid-cols-1 sm:grid-cols-2 lg:grid-cols-3` with `gap-4`
- Cards: `<ui:box>` with hover ring effect, arrow icon appears on hover
- Pagination outside the grid

### Form Page

```blade
<form wire:submit="save" class="space-y-6">
    <ui:section :title="__('model.details')" :description="__('model.details_description')">
        <flux:input :label="__('model.name')" wire:model="name" required />

        <div class="grid grid-cols-2 gap-4">
            <flux:input :label="__('model.first_name')" wire:model="first_name" required />
            <flux:input :label="__('model.last_name')" wire:model="last_name" required />
        </div>
    </ui:section>

    <ui:section bare>
        <flux:button type="submit" variant="primary" wire:loading.attr="data-loading">
            {{ __('common.save') }}
        </flux:button>
    </ui:section>
</form>
```

- Group fields in `<ui:section :title :description>` — title/description on left, fields on right (responsive)
- Multi-column fields: `<div class="grid grid-cols-N gap-4">`
- Submit button: always in `<ui:section bare>` at end of form, always `variant="primary"`

### Navigation

- **Sidebar items**: always include an icon, use `wire:navigate` and `:current` for active state
- **Tab navigation**: `<flux:tabs>` in the `nav` slot, always include icons, use `:selected` for active state
- Tab partials go in `partials/nav.blade.php` or `partials/tabs.blade.php`

### Modals

**Create/edit modal** (`max-w-lg`):

```blade
<flux:modal wire:model.self="show_create_modal" class="w-full max-w-lg space-y-6">
    <div>
        <flux:heading size="lg">{{ __('model.create') }}</flux:heading>
    </div>

    <form wire:submit="store" class="space-y-6">
        <ui:box>
            <div class="space-y-6">
                {{-- fields --}}
            </div>
        </ui:box>

        <div class="flex justify-end gap-2">
            <flux:modal.close>
                <flux:button variant="ghost">{{ __('common.cancel') }}</flux:button>
            </flux:modal.close>

            <flux:button type="submit" variant="primary" wire:target="store" wire:loading.attr="disabled">
                {{ __('common.save') }}
            </flux:button>
        </div>
    </form>
</flux:modal>
```

**Delete/confirm modal** (`max-w-md`):

```blade
<flux:modal wire:model.self="show_delete_modal" class="w-full max-w-md space-y-6">
    <div>
        <flux:heading size="lg">{{ __('model.destroy') }}</flux:heading>
    </div>

    <flux:text>{{ __('model.destroy_message') }}</flux:text>

    @if ($deleting)
        <ui:box>
            <ui:list variant="definition">
                <ui:list.item :label="__('model.name')" :value="$deleting->name" />
            </ui:list>
        </ui:box>
    @endif

    <div class="flex justify-end gap-2">
        <flux:modal.close>
            <flux:button variant="ghost">{{ __('common.cancel') }}</flux:button>
        </flux:modal.close>

        <flux:button variant="danger" wire:click="confirmDelete">{{ __('common.destroy') }}</flux:button>
    </div>
</flux:modal>
```

- Create/edit modals: `max-w-lg`, fields wrapped in `<ui:box>`
- Delete/confirm modals: `max-w-md`, record info in `<ui:box>` with `<ui:list variant="definition">`
- Footer: `<div class="flex justify-end gap-2">` — cancel (`ghost`) left, action button right

## References

- `references/mach3ui-guide.md`
