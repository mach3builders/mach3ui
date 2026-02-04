# Component Styling Reference

Alle components gebruiken theme colors (`primary`, `secondary`, `danger`, etc.) en Tailwind's `gray-*` voor neutrals.

## Button

```blade
@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
])

@php
    $tag = $href ? 'a' : 'button';
    
    $classes = UI::classes()
        ->add('inline-flex items-center justify-center font-medium rounded transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2')
        ->add($variant, [
            'primary' => 'bg-primary text-white hover:bg-primary-hover focus:ring-primary',
            'secondary' => 'bg-secondary text-gray-800 hover:bg-secondary-hover focus:ring-secondary dark:text-gray-200',
            'danger' => 'bg-danger text-white hover:bg-danger-hover focus:ring-danger',
            'warning' => 'bg-warning text-white hover:bg-warning-hover focus:ring-warning',
            'success' => 'bg-success text-white hover:bg-success-hover focus:ring-success',
            'ghost' => 'text-gray-600 hover:bg-gray-100 focus:ring-gray-500 dark:text-gray-400 dark:hover:bg-gray-800',
            'outline' => 'border border-gray-300 text-gray-700 hover:bg-gray-50 focus:ring-gray-500 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-800',
        ])
        ->add($size, [
            'xs' => 'px-2 py-1 text-xs gap-1',
            'sm' => 'px-3 py-1.5 text-sm gap-1.5',
            'md' => 'px-4 py-2 text-sm gap-2',
            'lg' => 'px-5 py-2.5 text-base gap-2',
            'xl' => 'px-6 py-3 text-lg gap-2.5',
        ])
        ->when($attributes->has('disabled'), 'opacity-50 cursor-not-allowed pointer-events-none')
        ->merge($attributes);
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
>
    {{ $slot }}
</{{ $tag }}>
```

---

## Input

```blade
@props([
    'label' => null,
    'name' => null,
    'size' => 'md',
    'hint' => null,
])

@php
    $error = $name ? ($errors->first($name) ?? null) : null;
    
    $labelClasses = UI::classes()
        ->add('block font-medium text-gray-700 dark:text-gray-300')
        ->add($size, [
            'sm' => 'text-xs mb-1',
            'md' => 'text-sm mb-1.5',
            'lg' => 'text-base mb-2',
        ]);
    
    $inputClasses = UI::classes()
        ->add('block w-full rounded border bg-white transition-colors focus:outline-none focus:ring-2 dark:bg-gray-900')
        ->add($size, [
            'sm' => 'px-2.5 py-1.5 text-sm',
            'md' => 'px-3 py-2 text-sm',
            'lg' => 'px-4 py-2.5 text-base',
        ])
        ->add($error ? 'error' : 'default', [
            'default' => 'border-gray-300 focus:border-primary focus:ring-primary dark:border-gray-600',
            'error' => 'border-danger focus:border-danger focus:ring-danger',
        ])
        ->when($attributes->has('disabled'), 'bg-gray-50 text-gray-500 cursor-not-allowed dark:bg-gray-800')
        ->merge($attributes);
    
    $hintClasses = UI::classes()
        ->add('mt-1 text-gray-500 dark:text-gray-400')
        ->add($size, [
            'sm' => 'text-xs',
            'md' => 'text-sm',
            'lg' => 'text-sm',
        ]);
    
    $errorClasses = UI::classes()
        ->add('mt-1 text-danger')
        ->add($size, [
            'sm' => 'text-xs',
            'md' => 'text-sm',
            'lg' => 'text-sm',
        ]);
@endphp

<div>
    @if($label)
        <label @if($name) for="{{ $name }}" @endif class="{{ $labelClasses }}">
            {{ $label }}
        </label>
    @endif

    <input
        @if($name) name="{{ $name }}" id="{{ $name }}" @endif
        @if($error) aria-invalid="true" aria-describedby="{{ $name }}-error" @endif
        {{ $attributes->except('class') }}
        class="{{ $inputClasses }}"
    >

    @if($hint && !$error)
        <p class="{{ $hintClasses }}">{{ $hint }}</p>
    @endif

    @if($error)
        <p id="{{ $name }}-error" role="alert" class="{{ $errorClasses }}">{{ $error }}</p>
    @endif
</div>
```

---

## Textarea

```blade
@props([
    'label' => null,
    'name' => null,
    'size' => 'md',
    'hint' => null,
])

@php
    $error = $name ? ($errors->first($name) ?? null) : null;
    
    $labelClasses = UI::classes()
        ->add('block font-medium text-gray-700 dark:text-gray-300')
        ->add($size, [
            'sm' => 'text-xs mb-1',
            'md' => 'text-sm mb-1.5',
            'lg' => 'text-base mb-2',
        ]);
    
    $textareaClasses = UI::classes()
        ->add('block w-full rounded border bg-white transition-colors focus:outline-none focus:ring-2 resize-y dark:bg-gray-900')
        ->add($size, [
            'sm' => 'px-2.5 py-1.5 text-sm',
            'md' => 'px-3 py-2 text-sm',
            'lg' => 'px-4 py-2.5 text-base',
        ])
        ->add($error ? 'error' : 'default', [
            'default' => 'border-gray-300 focus:border-primary focus:ring-primary dark:border-gray-600',
            'error' => 'border-danger focus:border-danger focus:ring-danger',
        ])
        ->when($attributes->has('disabled'), 'bg-gray-50 text-gray-500 cursor-not-allowed dark:bg-gray-800')
        ->merge($attributes);
@endphp

<div>
    @if($label)
        <label @if($name) for="{{ $name }}" @endif class="{{ $labelClasses }}">
            {{ $label }}
        </label>
    @endif

    <textarea
        @if($name) name="{{ $name }}" id="{{ $name }}" @endif
        @if($error) aria-invalid="true" @endif
        {{ $attributes->except('class') }}
        class="{{ $textareaClasses }}"
    >{{ $slot }}</textarea>

    @if($hint && !$error)
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $hint }}</p>
    @endif

    @if($error)
        <p role="alert" class="mt-1 text-sm text-danger">{{ $error }}</p>
    @endif
</div>
```

---

## Select

```blade
@props([
    'label' => null,
    'name' => null,
    'size' => 'md',
    'options' => [],
    'placeholder' => null,
])

@php
    $error = $name ? ($errors->first($name) ?? null) : null;
    
    $labelClasses = UI::classes()
        ->add('block font-medium text-gray-700 dark:text-gray-300')
        ->add($size, [
            'sm' => 'text-xs mb-1',
            'md' => 'text-sm mb-1.5',
            'lg' => 'text-base mb-2',
        ]);
    
    $selectClasses = UI::classes()
        ->add('block w-full rounded border bg-white transition-colors focus:outline-none focus:ring-2 dark:bg-gray-900')
        ->add($size, [
            'sm' => 'px-2.5 py-1.5 pr-8 text-sm',
            'md' => 'px-3 py-2 pr-10 text-sm',
            'lg' => 'px-4 py-2.5 pr-10 text-base',
        ])
        ->add($error ? 'error' : 'default', [
            'default' => 'border-gray-300 focus:border-primary focus:ring-primary dark:border-gray-600',
            'error' => 'border-danger focus:border-danger focus:ring-danger',
        ])
        ->when($attributes->has('disabled'), 'bg-gray-50 text-gray-500 cursor-not-allowed dark:bg-gray-800')
        ->merge($attributes);
@endphp

<div>
    @if($label)
        <label @if($name) for="{{ $name }}" @endif class="{{ $labelClasses }}">
            {{ $label }}
        </label>
    @endif

    <select
        @if($name) name="{{ $name }}" id="{{ $name }}" @endif
        @if($error) aria-invalid="true" @endif
        {{ $attributes->except('class') }}
        class="{{ $selectClasses }}"
    >
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach($options as $value => $text)
            <option value="{{ $value }}">{{ $text }}</option>
        @endforeach
    </select>

    @if($error)
        <p role="alert" class="mt-1 text-sm text-danger">{{ $error }}</p>
    @endif
</div>
```

---

## Checkbox

```blade
@props([
    'label' => null,
    'name' => null,
    'size' => 'md',
])

@php
    $checkboxClasses = UI::classes()
        ->add('rounded border-gray-300 text-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-900')
        ->add($size, [
            'sm' => 'h-3.5 w-3.5',
            'md' => 'h-4 w-4',
            'lg' => 'h-5 w-5',
        ])
        ->when($attributes->has('disabled'), 'opacity-50 cursor-not-allowed')
        ->merge($attributes);
    
    $labelClasses = UI::classes()
        ->add('text-gray-700 dark:text-gray-300')
        ->add($size, [
            'sm' => 'text-xs ml-1.5',
            'md' => 'text-sm ml-2',
            'lg' => 'text-base ml-2.5',
        ]);
@endphp

<div class="flex items-center">
    <input
        type="checkbox"
        @if($name) name="{{ $name }}" id="{{ $name }}" @endif
        {{ $attributes->except('class') }}
        class="{{ $checkboxClasses }}"
    >
    @if($label)
        <label @if($name) for="{{ $name }}" @endif class="{{ $labelClasses }}">
            {{ $label }}
        </label>
    @endif
</div>
```

---

## Radio

```blade
@props([
    'label' => null,
    'name' => null,
    'size' => 'md',
])

@php
    $radioClasses = UI::classes()
        ->add('border-gray-300 text-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-900')
        ->add($size, [
            'sm' => 'h-3.5 w-3.5',
            'md' => 'h-4 w-4',
            'lg' => 'h-5 w-5',
        ])
        ->when($attributes->has('disabled'), 'opacity-50 cursor-not-allowed')
        ->merge($attributes);
    
    $labelClasses = UI::classes()
        ->add('text-gray-700 dark:text-gray-300')
        ->add($size, [
            'sm' => 'text-xs ml-1.5',
            'md' => 'text-sm ml-2',
            'lg' => 'text-base ml-2.5',
        ]);
@endphp

<div class="flex items-center">
    <input
        type="radio"
        @if($name) name="{{ $name }}" @endif
        {{ $attributes->except('class') }}
        class="{{ $radioClasses }}"
    >
    @if($label)
        <label class="{{ $labelClasses }}">
            {{ $label }}
        </label>
    @endif
</div>
```

---

## Modal

```blade
@props([
    'name' => null,
    'size' => 'md',
])

@php
    $panelClasses = UI::classes()
        ->add('bg-white rounded shadow-xl transform transition-all dark:bg-gray-800')
        ->add($size, [
            'sm' => 'max-w-sm w-full p-4',
            'md' => 'max-w-lg w-full p-6',
            'lg' => 'max-w-2xl w-full p-6',
            'xl' => 'max-w-4xl w-full p-8',
            'full' => 'max-w-full w-full m-4 p-6',
        ])
        ->merge($attributes);
@endphp

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
        <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
            <div 
                x-show="open"
                x-transition:enter="ease-out duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-150"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                x-on:click="open = false" 
                class="fixed inset-0 bg-black/50"
            ></div>
            
            <div 
                x-show="open"
                x-transition:enter="ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                {{ $attributes->except('class') }}
                class="{{ $panelClasses }}"
            >
                {{ $slot }}
            </div>
        </div>
    </template>
</div>
```

---

## Dropdown

```blade
@props([
    'align' => 'left',
    'width' => 'md',
])

@php
    $contentClasses = UI::classes()
        ->add('absolute z-50 mt-2 bg-white rounded shadow-lg border border-gray-200 py-1 dark:bg-gray-800 dark:border-gray-700')
        ->add($align, [
            'left' => 'left-0 origin-top-left',
            'right' => 'right-0 origin-top-right',
        ])
        ->add($width, [
            'sm' => 'w-32',
            'md' => 'w-48',
            'lg' => 'w-64',
            'xl' => 'w-80',
            'full' => 'w-full',
        ])
        ->merge($attributes);
@endphp

<div x-data="{ open: false }" class="relative">
    <div x-on:click="open = !open">
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        x-on:click.outside="open = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        {{ $attributes->except('class') }}
        class="{{ $contentClasses }}"
    >
        {{ $slot }}
    </div>
</div>
```

---

## Dropdown Item

```blade
@props([
    'href' => null,
    'variant' => 'default',
])

@php
    $tag = $href ? 'a' : 'button';
    
    $classes = UI::classes()
        ->add('block w-full px-4 py-2 text-left text-sm transition-colors')
        ->add($variant, [
            'default' => 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700',
            'danger' => 'text-danger hover:bg-red-50 dark:hover:bg-red-900/20',
        ])
        ->when($attributes->has('disabled'), 'opacity-50 cursor-not-allowed pointer-events-none')
        ->merge($attributes);
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
>
    {{ $slot }}
</{{ $tag }}>
```

---

## Alert

```blade
@props([
    'variant' => 'info',
    'dismissable' => false,
])

@php
    $classes = UI::classes()
        ->add('rounded p-4 border')
        ->add($variant, [
            'info' => 'bg-primary/10 text-primary border-primary/20',
            'success' => 'bg-success/10 text-success border-success/20',
            'warning' => 'bg-warning/10 text-warning border-warning/20',
            'danger' => 'bg-danger/10 text-danger border-danger/20',
        ])
        ->merge($attributes);
@endphp

<div 
    @if($dismissable) x-data="{ show: true }" x-show="show" @endif
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
>
    <div class="flex items-start gap-3">
        <div class="flex-1">
            {{ $slot }}
        </div>
        
        @if($dismissable)
            <button x-on:click="show = false" class="opacity-50 hover:opacity-100">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        @endif
    </div>
</div>
```

---

## Badge

```blade
@props([
    'variant' => 'default',
    'size' => 'md',
])

@php
    $classes = UI::classes()
        ->add('inline-flex items-center font-medium rounded-full')
        ->add($variant, [
            'default' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
            'primary' => 'bg-primary/10 text-primary',
            'success' => 'bg-success/10 text-success',
            'warning' => 'bg-warning/10 text-warning',
            'danger' => 'bg-danger/10 text-danger',
        ])
        ->add($size, [
            'sm' => 'px-2 py-0.5 text-xs',
            'md' => 'px-2.5 py-0.5 text-sm',
            'lg' => 'px-3 py-1 text-sm',
        ])
        ->merge($attributes);
@endphp

<span {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $slot }}
</span>
```

---

## Card

Subcomponenten: `card.header`, `card.title`, `card.description`, `card.body`, `card.footer`

### card (index)
```blade
@props([
    'description' => null,
    'title' => null,
    'variant' => 'default', {{-- default | inverted --}}
])

@php
    $classes = Ui::classes()
        ->add('rounded-xl p-1.5')
        ->add($variant, [
            'default' => 'bg-gray-30 dark:bg-gray-830',
            'inverted' => 'bg-white shadow-xs dark:bg-gray-800',
        ])
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-card data-variant="{{ $variant }}">
    @if ($title || $description)
        <ui:card.header>
            @if ($title)
                <ui:card.title>{{ $title }}</ui:card.title>
            @endif
            @if ($description)
                <ui:card.description>{{ $description }}</ui:card.description>
            @endif
        </ui:card.header>
    @endif

    {{ $slot }}
</div>
```

### card.header
```blade
@props([
    'icon' => null,
    'icon:boxed' => false,
    'icon:color' => 'gray',
    'icon:size' => 'md',
])

@php
    $classes = Ui::classes()
        ->add('flex gap-3 px-4.5 pb-5 pt-5')
        ->when($hasAction, 'relative')
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-card-header>
    {{-- icon slot --}}
    <div class="{{ $contentClasses }}">
        {{ $slot }}
    </div>
    {{-- action slot --}}
</div>
```

### card.title
```blade
@props([])

@php
    $classes = Ui::classes()
        ->add('text-lg font-semibold leading-none tracking-tight text-gray-900 dark:text-white')
        ->merge($attributes);
@endphp

<h3 {{ $attributes->except('class') }} class="{{ $classes }}" data-card-title>
    {{ $slot }}
</h3>
```

### card.description
```blade
<ui:text variant="muted" {{ $attributes }} data-card-description>
    {{ $slot }}
</ui:text>
```

### card.body
```blade
@props([
    'flush' => false,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('relative z-10 flex-1 rounded-lg border shadow-xs')
        ->add('[&:has(+[data-card-footer])]:rounded-b-none [&:has(+[data-card-footer])]:border-b-0 [&:has(+[data-card-footer])]:shadow-none')
        ->add($variant, [
            'default' => 'border-gray-60 bg-white dark:border-gray-740 dark:bg-gray-800',
            'inverted' => 'border-gray-80 bg-gray-30 dark:border-gray-740 dark:bg-gray-820',
        ])
        ->unless($flush, 'px-4.5 py-4')
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-card-body>
    {{ $slot }}
</div>
```

### card.footer
```blade
@props([
    'divided' => false,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('relative z-0 rounded-b-lg border border-t-0 shadow-xs')
        ->add($variant, [
            'default' => 'border-gray-60 bg-white dark:border-gray-760 dark:bg-gray-800',
            'inverted' => 'border-gray-80 bg-gray-30 dark:border-gray-700 dark:bg-gray-820',
        ])
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-card-footer>
    @if ($divided)
        <ui:divider />
    @endif
    <div class="flex items-center gap-2 px-4.5 py-4">
        {{ $slot }}
    </div>
</div>
```

---

## Tabs

```blade
@props(['default' => null])

<div x-data="{ active: '{{ $default }}' }">
    <nav class="border-b border-gray-200 dark:border-gray-700">
        <div class="-mb-px flex gap-4">
            {{ $tabs }}
        </div>
    </nav>
    
    <div class="py-4">
        {{ $slot }}
    </div>
</div>
```

## Tab

```blade
@props(['name'])

<button
    x-on:click="active = '{{ $name }}'"
    :class="active === '{{ $name }}' 
        ? 'border-primary text-primary' 
        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
    {{ $attributes->except('class') }}
    class="px-1 py-3 text-sm font-medium border-b-2 transition-colors"
>
    {{ $slot }}
</button>
```

## Tab Panel

```blade
@props(['name'])

<div x-show="active === '{{ $name }}'" {{ $attributes }}>
    {{ $slot }}
</div>
```
