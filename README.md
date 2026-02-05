# Mach3Builders User Interface

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mach3builders/ui.svg?style=flat-square)](https://packagist.org/packages/mach3builders/ui)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mach3builders/mach3ui/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mach3builders/mach3ui/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mach3builders/mach3ui/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mach3builders/mach3ui/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mach3builders/ui.svg?style=flat-square)](https://packagist.org/packages/mach3builders/ui)

A Laravel Blade UI component library that works seamlessly with and without Livewire. Built with Alpine.js for interactivity and Tailwind CSS for styling.

## Features

- 50+ ready-to-use Blade components
- Works with vanilla Laravel and Livewire
- `wire:model` support out of the box
- Smart class merging with `UI::classes()`
- Tailwind CSS 4 theming support
- Lucide icons included

## Requirements

- PHP 8.4+
- Laravel 11 or 12
- Tailwind CSS 4

## Installation

```bash
composer require mach3builders/ui
```

## Usage

All components use the `ui:` prefix:

```html
<ui:button>Click me</ui:button>

<ui:input name="email" label="Email" placeholder="you@example.com" />

<ui:select name="country" label="Country">
    <ui:select.option value="nl">Netherlands</ui:select.option>
    <ui:select.option value="be">Belgium</ui:select.option>
</ui:select>

<ui:checkbox name="terms" label="I agree to the terms" />
```

### With Livewire

Components automatically pass through `wire:` attributes:

```html
<ui:input wire:model="email" name="email" label="Email" />

<ui:select wire:model.live="country" name="country">
    ...
</ui:select>
```

## Available Components

### Form

`input`, `textarea`, `select`, `checkbox`, `radio`, `switch`, `datepicker`, `file-upload`, `field`, `label`, `hint`, `error`

### Buttons

`button`, `button.group`

### Feedback

`alert`, `badge`, `progress`, `skeleton`, `toast`, `toaster`

### Layout

`card`, `box`, `modal`, `dropdown`, `tabs`, `accordion`, `divider`, `section`

### Navigation

`nav`, `breadcrumbs`, `pagination`, `steps`

### Data Display

`table`, `thead`, `tbody`, `tr`, `th`, `td`, `avatar`, `icon`, `definition-list`

### Other

`heading`, `link`, `kbd`, `code-editor`, `chart`

## Class Builder

Use `UI::classes()` for smart Tailwind class merging:

```php
$classes = UI::classes()
    ->add('px-4 py-2 rounded')
    ->add($variant, [
        'primary' => 'bg-primary text-white',
        'secondary' => 'bg-secondary text-gray-900',
    ])
    ->add($size, [
        'sm' => 'text-sm',
        'md' => 'text-base',
        'lg' => 'text-lg',
    ])
    ->when($disabled, 'opacity-50 cursor-not-allowed')
    ->merge($attributes);
```

User classes automatically override base classes with the same Tailwind prefix:

```html
<!-- User's px-6 overrides component's px-4 -->
<ui:button class="px-6">Wide button</ui:button>
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
