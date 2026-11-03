# Mach3UI package

For UI implementation, component changes with UI effects, and UI reviews, read `resources/boost/skills/mach3ui-development/SKILL.md` before coding and follow its references to the shared UI handbook. Pure backend tasks without UI effects do not require it.

The canonical handbook is `resources/boost/skills/mach3ui-development/references/ui-handbook.md`. Maintain its stable M3 IDs, the skill and `resources/boost/guidelines/core.blade.php` together. Consumers receive generated copies through Laravel Boost; never maintain per-product copies as independent standards.

Use the existing checkout. Do not create worktrees. New branches use `feature/` for features and `hotfix/` for fixes; never `codex/`.
