# Mach3UI — Flux Companion Components

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mach3builders/ui.svg?style=flat-square)](https://packagist.org/packages/mach3builders/ui)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mach3builders/mach3ui/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mach3builders/mach3ui/actions?query=workflow%3Arun-tests+branch%3Amain)

A Flux companion package that provides Blade components Flux doesn't offer. Requires `livewire/flux-pro` as a dependency.

## Requirements

- PHP 8.4+
- Laravel 11 or 12
- Livewire Flux Pro 2.x

## Installation

Projects must have the Flux Pro composer repository configured (`https://composer.fluxui.dev`).

```bash
composer require mach3builders/mach3ui
```

This pulls in `livewire/flux-pro` automatically.

## Components

All components use the `ui:` prefix and `Flux::classes()` internally.

| Component | Description |
|---|---|
| `<ui:box>` | Styled container with optional title/description |
| `<ui:list>` | Generic list, `variant="definition"` for dl/dt/dd |
| `<ui:list.item>` | List item with label, value, icon, href support |
| `<ui:section>` | Responsive page section with title/description |
| `<ui:layout.empty-state>` | Centered empty state with icon |
| `<ui:layout.error>` | Error page content |
| `<ui:layout.main.content>` | Main content area with header/nav slots |
| `<ui:logo>` | Mach3 brand logo |

## Usage

```html
<ui:section title="Profile" description="Update your account settings">
    <flux:input label="Name" wire:model="name" />
    <flux:input label="Email" wire:model="email" />
</ui:section>

<ui:list variant="definition">
    <ui:list.item label="Name" :value="$user->name" />
    <ui:list.item label="Email" :value="$user->email" />
</ui:list>
```

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
