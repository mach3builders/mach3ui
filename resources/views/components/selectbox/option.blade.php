@props([
    'disabled' => false,
    'value' => null,
])

@php
    $classes = Ui::classes()
        ->add(
            'flex w-full cursor-pointer items-center gap-2 rounded-md px-2.5 py-2 text-left text-sm transition-colors',
        )
        ->add('text-gray-700 hover:bg-gray-50')
        ->add('dark:text-gray-200 dark:hover:bg-gray-750')
        ->add('focus:bg-gray-50 focus:outline-none')
        ->add('dark:focus:bg-gray-750')
        ->add('[&[data-selected]]:bg-gray-100 [&[data-selected]]:font-medium')
        ->add('dark:[&[data-selected]]:bg-gray-700')
        ->add('[&[data-focused]]:bg-gray-50')
        ->add('dark:[&[data-focused]]:bg-gray-750')
        ->when($disabled, 'cursor-not-allowed opacity-50 pointer-events-none')
        ->merge($attributes);

    $jsValue = \Illuminate\Support\Js::from($value);
@endphp

<button type="button" role="option"
    x-on:click="select({{ $jsValue }}, $el.querySelector('[data-label]')?.textContent?.trim() ?? $el.textContent.trim())"
    x-bind:data-selected="isSelected({{ $jsValue }}) ? '' : null"
    x-bind:data-focused="Array.from(visibleOptions)[focusedIndex] === $el ? '' : null"
    x-bind:aria-selected="isSelected({{ $jsValue }})" data-value="{{ $value }}"
    @if ($disabled) disabled aria-disabled="true" @endif {{ $attributes->except('class') }}
    class="{{ $classes }}" data-selectbox-option>
    <span class="flex-1 truncate" data-label>{{ $slot }}</span>
    <ui:icon name="check" class="size-4 shrink-0"
        x-bind:class="isSelected({{ $jsValue }}) ? 'opacity-100' : 'opacity-0'" />
</button>
