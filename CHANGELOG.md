# Changelog

All notable changes to `mach3ui` will be documented in this file.

## [Unreleased]

## [6.0.0] - 2026-02-26

### Changed
- Transformed from standalone UI library (67+ components) to Flux companion package
- All components now use `Flux::classes()` instead of `Ui::classes()`
- All components use zinc color palette and `data-flux-*` attributes
- `notify()` Livewire macro now uses `Flux::toast()` instead of custom dispatch
- Renamed `definition-list` to `list` with `variant="definition"`

### Added
- `livewire/flux-pro` as a required dependency

### Removed
- 60+ components replaced by Flux equivalents (button, input, modal, table, etc.)
- `ClassBuilder` — replaced by `Flux::classes()`
- `Ui` class and `Ui` facade
- `@mach3uiScripts` Blade directive — Flux handles dark mode and fonts
- `pluck()` and `wire()` attribute macros
- Translation files (en/nl)
- Custom gray color scale (gray-10 through gray-990)
- JavaScript assets (code-editor, ui.js)
- `mallardduck/blade-lucide-icons` dependency — Flux has its own icon system

## [5.0.0-beta.1] - 2026-02-05

### Added
- Initial standalone UI library with 65+ components
