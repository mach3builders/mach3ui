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

## Shared UI handbook and AI skill

Mach3UI ships the `mach3ui-development` skill and the complete Mach3 UI handbook (221 stable M3 rules). The handbook is maintained in [`resources/boost/skills/mach3ui-development/references/ui-handbook.md`](resources/boost/skills/mach3ui-development/references/ui-handbook.md). Its short Boost guideline requires UI tasks to read the applicable rules before implementation; the full handbook is not injected into every backend task.

In each consuming project, install Laravel Boost as a development dependency if needed, then run:

```bash
php artisan boost:install --guidelines --skills
```

Select **Claude Code and Codex**, include **mach3builders/mach3ui**, and enable **mach3ui-development**. Boost writes the guideline into `CLAUDE.md` and `AGENTS.md`, and installs the skill plus references into `.claude/skills/mach3ui-development/` and `.agents/skills/mach3ui-development/`. No separate `vendor:publish` command or provider change is required. Existing project instructions outside Boost's managed block are preserved.

Check `boost.json`: `agents` must include `claude_code` and `codex`, `guidelines` must be true, `packages` must include `mach3builders/mach3ui`, and `skills` must include `mach3ui-development`. A Composer installation alone does not activate agent discovery. After installation, start a new agent session and verify that the skill is listed and the project instructions contain the Mach3 UI guideline. Plain API/ChatGPT sessions without these repository-loading features need explicit skill attachment or loading by their host.

After releasing a new Mach3UI version, update the package in each project and refresh generated instructions:

```bash
composer update mach3builders/mach3ui --with-dependencies
php artisan boost:update
```

If the project already runs `boost:update` in Composer's `post-update-cmd`, the second command is automatic during an ordinary update with scripts enabled. A lockfile install or `--no-scripts` does not run that update hook. For those setups run `php artisan boost:update --no-interaction` explicitly in developer setup. Commit the package lock and `boost.json` through the normal project workflow. Do not edit generated skill copies; a future Boost update replaces them. Review local `.ai/skills` overrides and project UI rules that might still conflict.

Package maintainers update the handbook and skill together, preserve M3 IDs, and release through the normal package workflow. This distributes UI instructions; it does not install the preview's custom component overrides or migrate existing app screens. Prompt instructions improve consistency but are not a technical guarantee: verify the rendered UI and relevant interactions.

References: [Laravel Boost package guidelines and skills](https://laravel.com/docs/12.x/boost), [Codex skills](https://developers.openai.com/codex/skills), [Codex project instructions](https://developers.openai.com/codex/guides/agents-md), [Claude project instructions](https://code.claude.com/docs/en/memory).

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
