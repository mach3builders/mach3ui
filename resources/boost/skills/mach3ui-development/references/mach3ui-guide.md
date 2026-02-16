#Mach3UI Reference

## Blade/HTML

- Add a blank line between sibling HTML elements at the same indentation level
- Always use `<ui:*>` components from the mach3ui package when a matching component exists. Never use plain HTML for elements that have a ui component equivalent.
- Available components: accordion, action-bar, alert, avatar, badge, box, breadcrumbs, button, buttons, card, checkbox, datepicker, definition-list, divider, dropdown, editor, error, field, file-upload, heading, hint, icon, input, input.otp, kbd, label, layout.*, link, list, logo, modal, nav, pagination, progress, radio, section, select, selectbox, skeleton, slider, steps, switch, table (thead, tbody, tr, th, td), tabs, text, textarea, timepicker, toast, toaster, toggle, tooltip, theme-switcher
- Check the component source in `../mach3ui/resources/views/components/` for available props and slots before using a component.
- Use `:prop` syntax only on Blade components (`<x-*>`, `<ui:*>`). On plain HTML elements, use `{{ }}` interpolation instead (e.g., `action="{{ route('login') }}"`, not `:action="route('login')"`)
- In Blade views with PHP `use` imports, always reference classes via their imported name (e.g., `Account::class`), never inline FQCN (e.g., `\App\Models\Account::class`)
- Confirm modals (delete, invite, etc.) must display key record info inside a `<ui:box>` with a `<ui:definition-list>`. Use `space-y-6` on the modal body.

### Buttons

- **Create actions**: `variant="primary"`, no icon
- **Table destructive/edit actions**: icon-only with `variant="ghost" size="sm" square` + tooltip (`common.destroy` / `common.edit`)
- **Table invite action**: `size="sm"` (default variant) with label `common.invite`
- **Form submit (persists data)**: text-only, no icon. Use `variant="success"` for single-form pages, `variant="secondary"` when multiple save sections exist
- **Form submit (triggers action, e.g. sending an invite)**: `variant="secondary"` with text
