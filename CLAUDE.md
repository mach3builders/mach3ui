# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Mach3Builders UI is a Laravel package providing:
1. A Blade UI component library (accordion, buttons, cards, forms, modals, tables, etc.)
2. Laravel Boost - AI-assisted development tools with MCP server, guidelines, and skills
3. Multi-agent support (Claude Code, Cursor, Copilot, Codex, Junie, OpenCode, Gemini)

## Commands

```bash
# Run tests
composer test
vendor/bin/pest tests/ExampleTest.php      # single file
vendor/bin/pest --filter="test_name"       # specific test

# Code quality
composer format                             # Laravel Pint
composer analyse                            # PHPStan level 5
```

### Boost Artisan Commands

```bash
php artisan boost:install           # Interactive setup for guidelines, skills, MCP
php artisan boost:update            # Update guidelines & skills to latest
php artisan boost:mcp               # Start MCP server (from mcp.json)
php artisan boost:add-skill <repo>  # Add skills from GitHub (e.g., owner/repo)
```

## Architecture

### Namespace Structure
- `Mach3Builders\Ui\` - Main package (UI components, facades)
- `Laravel\Boost\` - Boost functionality (MCP, agents, guidelines, skills)

### Directory Structure

```
src/
├── Install/              # Installation & configuration system
│   ├── Agents/           # AI agent implementations (ClaudeCode, Cursor, etc.)
│   ├── Detection/        # Strategy pattern for detecting installed tools
│   ├── Enums/            # Platform, McpInstallationStrategy
│   ├── Mcp/              # MCP file writers
│   └── Concerns/         # Shared traits (DiscoverPackagePaths)
├── Mcp/                  # MCP Server implementation
│   ├── Tools/            # MCP tools (see below)
│   ├── Prompts/          # MCP prompts (LaravelCodeSimplifier, UpgradeLivewireV4)
│   ├── Resources/        # MCP resources
│   └── Methods/          # Custom MCP method handlers
├── Skills/               # Remote skill system
│   └── Remote/           # GitHub skill provider & downloader
├── Console/              # Artisan commands
├── Contracts/            # Interfaces (SupportsGuidelines, SupportsMcp, SupportsSkills)
├── Support/              # Config (boost.json), Composer helpers
└── Services/             # BrowserLogger

.ai/                      # AI guideline templates (Laravel, Livewire, Pest, etc.)
├── {package}/            # Package-specific guidelines
│   ├── core.blade.php    # Core guidelines
│   ├── {version}/        # Version-specific guidelines
│   └── skill/            # Skills for this package
└── skills/               # User-defined skills (custom)

resources/views/components/  # Blade UI components (72 components)
```

## UI Components

### Component Conventions
- **Prefix**: Always use `<ui:...>` - never `<x-...>` for UI components
- **Structure**: Each component in its own folder with `index.blade.php`
- **Styling**: Tailwind classes in Blade, no separate CSS files
- **Interactivity**: Alpine.js inline, no separate JS files
- **Livewire**: Components must work without Livewire (no hardcoded `wire:` directives)
- **Data attribute**: Root element needs `data-{component}` for CSS targeting

### Component Structure
```
resources/views/components/[component]/
├── index.blade.php      # <ui:[component]>
├── item.blade.php       # <ui:[component].item> (if needed)
└── [sub].blade.php      # <ui:[component].[sub]> (if needed)
```

### Variant Pattern
Components use class arrays for variants, sizes, and states:
```blade
$variant_classes = [
    'default' => ['light classes', 'hover classes', 'dark: classes'],
    'primary' => [...],
];
$size_classes = ['xs' => [...], 'sm' => [...], 'md' => [...], 'lg' => [...]];
```

Apply with spread operator: `...$variant_classes[$variant] ?? $variant_classes['default']`

### Standard Variants
`default`, `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `ghost`, `subtle`, `outline-*`

### Standard Sizes
`xs`, `sm`, `md` (default), `lg`, `xl`

### MCP Tools Available
- `ApplicationInfo` - App metadata and environment
- `DatabaseSchema` - Database structure (MySQL, PostgreSQL, SQLite)
- `DatabaseQuery` - Execute database queries
- `DatabaseConnections` - List configured connections
- `ListRoutes` - Application routes
- `ListArtisanCommands` - Available artisan commands
- `GetConfig` / `ListAvailableConfigKeys` - Configuration access
- `ListAvailableEnvVars` - Environment variables
- `ReadLogEntries` - Laravel log entries
- `BrowserLogs` - Browser console logs (via injected JS)
- `LastError` - Most recent error
- `SearchDocs` - Semantic documentation search
- `Tinker` - Execute PHP code via Tinker
- `GetAbsoluteUrl` - URL generation

### Agent Contract System
Agents implement contracts to declare capabilities:
- `SupportsGuidelines` - Can receive AI guidelines (guidelinesPath)
- `SupportsMcp` - Can use MCP server (installMcp, getPhpPath, getArtisanPath)
- `SupportsSkills` - Can receive agent skills (skillsPath)

### Skills System
Skills are discovered from three sources:
1. **Boost built-in** - From `.ai/{package}/skill/` directories
2. **Third-party packages** - Via `Composer::packagesDirectoriesWithBoostSkills()`
3. **User-defined** - From `.ai/skills/` (marked as custom)
4. **Remote** - Downloaded from GitHub via `boost:add-skill`

Each skill requires a `SKILL.md` or `SKILL.blade.php` with YAML frontmatter containing `name` and `description`.

### Configuration
Boost stores its state in `boost.json` at project root:
- `agents` - Selected AI agents
- `guidelines` - Whether guidelines are enabled
- `skills` - List of installed skill names
- `mcp` - Whether MCP is configured
- `packages` - Selected third-party guideline packages
- `sail` - Whether to use Laravel Sail for MCP
- `herd_mcp` - Whether Herd MCP is installed

## Testing

Uses Pest PHP with Orchestra Testbench. Architecture tests enforce no debugging functions (`dd`, `dump`, `ray`).

## Code Style

- Laravel Pint with strict comparison (`strict_comparison`, `strict_param`)
- PHPStan level 5 with Octane compatibility and model property checking
- Rector for automated refactoring (PHP 8.4 required, Rector PHP 8.1 ruleset)

### Auto-formatting Hooks
After Edit/Write operations, these hooks run automatically:
- `vendor/bin/pint --dirty` - PHP code formatting
- `blade-formatter` - Blade template formatting
