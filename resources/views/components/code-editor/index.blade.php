@props([
    'language' => 'html',
    'placeholder' => '',
    'readonly' => false,
    'disabled' => false,
    'lineNumbers' => true,
    'minHeight' => '8rem',
    'maxHeight' => null,
    'tabSize' => 4,
    'invalid' => null,
    'name' => null,
])

@php
$showName = isset($name);

if (! isset($name)) {
    $name = $attributes->whereStartsWith('wire:model')->first();
}

$invalid ??= ($name && $errors->has($name));

$classes = Flux::classes()
    ->add('block w-full overflow-hidden rounded-lg border')
    ->add('shadow-xs [&[disabled]]:shadow-none')
    ->add('bg-white dark:bg-white/10 dark:[&[disabled]]:bg-white/[7%]')
    ->add($invalid
        ? 'border-red-500'
        : 'border-zinc-200 border-b-zinc-300/80 dark:border-white/10'
    );
@endphp

<div
    {{ $attributes->except(['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.lazy', 'wire:model.debounce'])->class($classes) }}
    data-flux-code-editor
    @if($disabled) disabled @endif
    x-data="{ ready: false, minHeight: @js($minHeight), _cleanup: null }"
    x-init="
        let mount = () => {
            if (!window._mountCodeEditor) { setTimeout(mount, 50); return; }
            _cleanup = window._mountCodeEditor($refs.editor, $refs.textarea, {
                language: @js($language),
                readonly: @js((bool) ($readonly || $disabled)),
                lineNumbers: @js((bool) $lineNumbers),
                placeholder: @js($placeholder),
                minHeight: @js($minHeight),
                maxHeight: @js($maxHeight),
                tabSize: @js((int) $tabSize),
                wireModel: @js($name),
            }, $wire);
            ready = true;
        };
        mount();
    "
    x-on:destroy="if (_cleanup) _cleanup()"
>
    {{-- Loading skeleton --}}
    <div x-show="!ready" class="animate-pulse rounded bg-zinc-100 dark:bg-white/5" :style="`min-height: ${minHeight}`"></div>

    {{-- CodeMirror mount point --}}
    <div x-ref="editor" x-show="ready" x-cloak wire:ignore></div>

    {{-- Hidden textarea for wire:model binding --}}
    <textarea
        x-ref="textarea"
        @if($showName) name="{{ $name }}" @endif
        class="sr-only"
        tabindex="-1"
        aria-hidden="true"
        {{ $attributes->only(['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.lazy', 'wire:model.debounce']) }}
    ></textarea>
</div>

@assets
<style>
[data-flux-code-editor] .cm-editor { height: auto; background-color: transparent !important; }
[data-flux-code-editor] .cm-editor.cm-focused { outline: none; }
[data-flux-code-editor] .cm-scroller { font-family: ui-monospace, SFMono-Regular, "SF Mono", Menlo, Consolas, "Liberation Mono", monospace; font-size: 0.8125rem; line-height: 1.5; padding: 0.5rem 0; }
[data-flux-code-editor] .cm-gutters { background-color: transparent !important; }
[data-flux-code-editor] .cm-no-line-numbers .cm-gutters { display: none; }
</style>
@endassets
