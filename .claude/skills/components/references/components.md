# Component Implementaties (Unstyled)

Alle componenten zijn unstyled. Styling wordt toegevoegd via `ui-styles` skill.

---

## Name Auto-Detection Pattern

Voor form componenten: detecteer `name` automatisch uit `wire:model` of `x-model` voor error handling.

```php
$name = $name
    ?: (method_exists($attributes, 'wire') ? $attributes->wire('model')->value() : null)
    ?: collect($attributes->getAttributes())->first(fn($v, $k) => str_starts_with($k, 'x-model'));

$error = $name ? ($errors->first($name) ?? null) : null;
```

**Waarom:**
- `method_exists($attributes, 'wire')` — voorkomt errors als Livewire niet is geïnstalleerd
- `$attributes->wire('model')->value()` — retourneert lege string als niet gezet (falsy voor `?:`)
- `collect(...)->first()` — pakt x-model waarde (bijv. `x-model="foo"` → `"foo"`)

**Prioriteit:** `name` prop → `wire:model` → `x-model`

---

## Simpele Componenten

### Input

```blade
@props([
    'label' => null,
    'name' => null,
    'hint' => null,
])

@php
    $error = $name ? ($errors->first($name) ?? null) : null;
@endphp

<div>
    @if($label)
        <label @if($name) for="{{ $name }}" @endif>
            {{ $label }}
        </label>
    @endif

    <input
        @if($name) name="{{ $name }}" id="{{ $name }}" @endif
        @if($error) aria-invalid="true" @endif
        {{ $attributes }}
    >

    @if($hint && !$error)
        <p>{{ $hint }}</p>
    @endif

    @if($error)
        <p role="alert">{{ $error }}</p>
    @endif
</div>
```

### Textarea

```blade
@props([
    'label' => null,
    'name' => null,
    'hint' => null,
])

@php
    $error = $name ? ($errors->first($name) ?? null) : null;
@endphp

<div>
    @if($label)
        <label @if($name) for="{{ $name }}" @endif>
            {{ $label }}
        </label>
    @endif

    <textarea
        @if($name) name="{{ $name }}" id="{{ $name }}" @endif
        @if($error) aria-invalid="true" @endif
        {{ $attributes }}
    >{{ $slot }}</textarea>

    @if($hint && !$error)
        <p>{{ $hint }}</p>
    @endif

    @if($error)
        <p role="alert">{{ $error }}</p>
    @endif
</div>
```

### Select

```blade
@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'placeholder' => null,
])

@php
    $error = $name ? ($errors->first($name) ?? null) : null;
@endphp

<div>
    @if($label)
        <label @if($name) for="{{ $name }}" @endif>
            {{ $label }}
        </label>
    @endif

    <select
        @if($name) name="{{ $name }}" id="{{ $name }}" @endif
        @if($error) aria-invalid="true" @endif
        {{ $attributes }}
    >
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach($options as $value => $text)
            <option value="{{ $value }}">{{ $text }}</option>
        @endforeach
    </select>

    @if($error)
        <p role="alert">{{ $error }}</p>
    @endif
</div>
```

### Checkbox

```blade
@props([
    'description' => null,
    'indeterminate' => false,
    'label' => null,
    'name' => null,
])

@php
    // Auto-detect name (zie pattern hierboven)
    $name = $name
        ?: (method_exists($attributes, 'wire') ? $attributes->wire('model')->value() : null)
        ?: collect($attributes->getAttributes())->first(fn($v, $k) => str_starts_with($k, 'x-model'));

    $hasLabel = $label || $description;
    $error = $name ? ($errors->first($name) ?? null) : null;
@endphp

<div>
    @if($hasLabel)
        <label>
    @endif

    <input
        type="checkbox"
        @if($name) name="{{ $name }}" id="{{ $name }}" @endif
        @if($indeterminate) x-init="$el.indeterminate = true" @endif
        @if($error) aria-invalid="true" @endif
        {{ $attributes }}
    >

    @if($hasLabel)
            <span>
                @if($label)<span>{{ $label }}</span>@endif
                @if($description)<span>{{ $description }}</span>@endif
            </span>
        </label>
    @endif

    @if($error)
        <p role="alert">{{ $error }}</p>
    @endif
</div>
```

### Checkbox Card

```blade
@props([
    'description' => null,
    'icon' => null,
    'indeterminate' => false,
    'name' => null,
    'reversed' => false,
    'title' => null,
])

@php
    $name = $name
        ?: (method_exists($attributes, 'wire') ? $attributes->wire('model')->value() : null)
        ?: collect($attributes->getAttributes())->first(fn($v, $k) => str_starts_with($k, 'x-model'));
@endphp

<label {{ $attributes->whereStartsWith('data-') }}>
    @if($icon)
        <ui:icon :name="$icon" />
    @endif

    <div>
        @if($title)<div>{{ $title }}</div>@endif
        @if($description)<div>{{ $description }}</div>@endif
        {{ $slot }}
    </div>

    <input
        type="checkbox"
        @if($name) name="{{ $name }}" id="{{ $name }}" @endif
        @if($indeterminate) x-init="$el.indeterminate = true" @endif
        {{ $attributes->whereStartsWith(['wire:', 'x-model']) }}
    >
</label>
```

### Radio

```blade
@props([
    'label' => null,
    'name' => null,
])

<div>
    <label>
        <input
            type="radio"
            @if($name) name="{{ $name }}" @endif
            {{ $attributes }}
        >
        @if($label)
            <span>{{ $label }}</span>
        @endif
    </label>
</div>
```

### Button

```blade
@props([
    'variant' => 'primary',
    'href' => null,
])

@php
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    data-variant="{{ $variant }}"
    {{ $attributes }}
>
    {{ $slot }}
</{{ $tag }}>
```

---

## Grijze Gebied Componenten

### Modal

```blade
@props([
    'name' => null,
])

<div 
    x-data="{ open: false }"
    @if($name) 
        x-on:open-modal-{{ $name }}.window="open = true"
        x-on:close-modal-{{ $name }}.window="open = false"
    @endif
    x-on:keydown.escape.window="open = false"
>
    <div x-on:click="open = true">
        {{ $trigger ?? '' }}
    </div>

    <template x-teleport="body">
        <div x-show="open" x-cloak {{ $attributes }}>
            <div x-on:click="open = false" data-modal-backdrop></div>
            
            <div data-modal-content>
                {{ $slot }}
            </div>
        </div>
    </template>
</div>
```

Gebruik:
```blade
<ui:modal name="confirm-delete">
    <x-slot:trigger>
        <ui:button variant="danger">Verwijderen</ui:button>
    </x-slot:trigger>

    <h2>Weet je het zeker?</h2>
    <ui:button x-on:click="open = false">Annuleren</ui:button>
    <ui:button variant="danger" wire:click="delete">Verwijderen</ui:button>
</ui:modal>

{{-- Openen vanuit Livewire --}}
<button wire:click="$dispatch('open-modal-confirm-delete')">Open</button>
```

### Dropdown

```blade
@props([
    'align' => 'left',
])

<div x-data="{ open: false }" {{ $attributes }}>
    <div x-on:click="open = !open">
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        x-on:click.outside="open = false"
        data-align="{{ $align }}"
        data-dropdown-content
    >
        {{ $slot }}
    </div>
</div>
```

### Tabs

```blade
{{-- tabs.blade.php --}}
@props(['default' => null])

<div x-data="{ active: '{{ $default }}' }" {{ $attributes }}>
    {{ $slot }}
</div>
```

```blade
{{-- tab.blade.php --}}
@props(['name'])

<button
    x-on:click="active = '{{ $name }}'"
    :data-active="active === '{{ $name }}'"
    {{ $attributes }}
>
    {{ $slot }}
</button>
```

```blade
{{-- tab-panel.blade.php --}}
@props(['name'])

<div x-show="active === '{{ $name }}'" {{ $attributes }}>
    {{ $slot }}
</div>
```

### Accordion

```blade
{{-- accordion.blade.php --}}
@props(['multiple' => false])

<div 
    x-data="{ 
        active: {{ $multiple ? '[]' : 'null' }},
        toggle(name) {
            @if($multiple)
                this.active.includes(name) 
                    ? this.active = this.active.filter(i => i !== name)
                    : this.active.push(name)
            @else
                this.active = this.active === name ? null : name
            @endif
        },
        isOpen(name) {
            return {{ $multiple ? 'this.active.includes(name)' : 'this.active === name' }}
        }
    }"
    {{ $attributes }}
>
    {{ $slot }}
</div>
```

```blade
{{-- accordion-item.blade.php --}}
@props(['name'])

<div {{ $attributes }}>
    <button x-on:click="toggle('{{ $name }}')" :aria-expanded="isOpen('{{ $name }}')">
        {{ $trigger }}
    </button>
    
    <div x-show="isOpen('{{ $name }}')" x-collapse>
        {{ $slot }}
    </div>
</div>
```

---

## Complexe Componenten

### Custom Select (met Livewire binding)

```blade
@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'placeholder' => 'Selecteer...',
])

@php
    $wireModel = $attributes->wire('model')->value();
@endphp

<div
    x-data="{
        open: false,
        selected: null,
        options: {{ json_encode($options) }},
        init() {
            @if($wireModel)
                this.selected = $wire.get('{{ $wireModel }}');
                $watch('selected', value => $wire.set('{{ $wireModel }}', value));
            @endif
        },
        select(value) {
            this.selected = value;
            this.open = false;
        },
        get selectedLabel() {
            return this.options[this.selected] ?? '{{ $placeholder }}';
        }
    }"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
>
    @if($label)
        <label>{{ $label }}</label>
    @endif

    <button type="button" x-on:click="open = !open" data-trigger>
        <span x-text="selectedLabel"></span>
    </button>

    <div x-show="open" x-on:click.outside="open = false" data-options>
        @foreach($options as $value => $text)
            <button
                type="button"
                x-on:click="select('{{ $value }}')"
                :data-selected="selected === '{{ $value }}'"
            >
                {{ $text }}
            </button>
        @endforeach
    </div>

    @if($name)
        <input type="hidden" name="{{ $name }}" x-bind:value="selected">
    @endif
</div>
```

### Tags Input (met Livewire binding)

```blade
@props([
    'label' => null,
    'name' => null,
    'placeholder' => 'Voeg tag toe...',
])

@php
    $wireModel = $attributes->wire('model')->value();
@endphp

<div
    x-data="{
        tags: [],
        input: '',
        init() {
            @if($wireModel)
                this.tags = $wire.get('{{ $wireModel }}') || [];
                $watch('tags', value => $wire.set('{{ $wireModel }}', value));
            @endif
        },
        add() {
            if (this.input.trim() && !this.tags.includes(this.input.trim())) {
                this.tags.push(this.input.trim());
                this.input = '';
            }
        },
        remove(index) {
            this.tags.splice(index, 1);
        }
    }"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
>
    @if($label)
        <label>{{ $label }}</label>
    @endif

    <div data-tags-container>
        <template x-for="(tag, index) in tags" :key="index">
            <span data-tag>
                <span x-text="tag"></span>
                <button type="button" x-on:click="remove(index)">&times;</button>
            </span>
        </template>
        
        <input
            type="text"
            x-model="input"
            x-on:keydown.enter.prevent="add()"
            placeholder="{{ $placeholder }}"
        >
    </div>

    @if($name)
        <template x-for="(tag, index) in tags" :key="index">
            <input type="hidden" :name="'{{ $name }}[' + index + ']'" :value="tag">
        </template>
    @endif
</div>
```

---

## Layout Componenten

### Card

```blade
@props([])

<div data-card {{ $attributes }}>
    {{ $slot }}
</div>
```

### Alert

```blade
@props([
    'variant' => 'info',
    'dismissable' => false,
])

<div 
    @if($dismissable) x-data="{ show: true }" x-show="show" @endif
    data-variant="{{ $variant }}"
    {{ $attributes }}
>
    {{ $slot }}
    
    @if($dismissable)
        <button x-on:click="show = false" data-dismiss>&times;</button>
    @endif
</div>
```

### Badge

```blade
@props([
    'variant' => 'default',
])

<span data-variant="{{ $variant }}" {{ $attributes }}>
    {{ $slot }}
</span>
```
