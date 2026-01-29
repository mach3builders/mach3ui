@props([
    'action' => null,
    'confirmLabel' => 'Delete',
    'label' => 'Delete',
    'size' => null,
    'title' => 'Delete',
    'variant' => 'default',
])

@aware(['grouped' => false])

@php
    $id = 'confirm-delete-' . Str::random(8);
    $has_wire_click = $attributes->has('wire:click');
    $wire_click = $attributes->get('wire:click');
@endphp

@if ($grouped)
    <ui:dropdown.item :label="$label" icon="trash-2" variant="danger"
        onclick="document.getElementById('{{ $id }}').showModal()" {{ $attributes->except(['wire:click']) }} />
@else
    <ui:button :variant="$variant" :size="$size" icon="trash-2"
        onclick="document.getElementById('{{ $id }}').showModal()" {{ $attributes->except(['wire:click']) }} />
@endif

@pushOnce('modals')
    <div id="action-modals"></div>
@endPushOnce

@push('modals')
    <ui:modal :id="$id" :title="$title" :description="$slot->toHtml()" size="sm" closeable>
        <x-slot name="footer">
            <ui:button variant="ghost" x-on:click="closeModal()">
                Cancel
            </ui:button>

            @if ($action)
                <form method="POST" action="{{ $action }}">
                    @csrf
                    @method('DELETE')

                    <ui:button type="submit" variant="danger">
                        {{ $confirmLabel }}
                    </ui:button>
                </form>
            @elseif ($has_wire_click)
                <ui:button variant="danger" wire:click="{{ $wire_click }}" x-on:click="closeModal()">
                    {{ $confirmLabel }}
                </ui:button>
            @endif
        </x-slot>
    </ui:modal>
@endpush
