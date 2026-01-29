@props([
    'checked' => false,
    'description' => null,
    'indeterminate' => false,
    'label' => null,
])

@php
    $checkbox_classes = [
        'size-5 shrink-0 appearance-none rounded-[5px] border cursor-pointer bg-center bg-no-repeat',
        'border-gray-300 bg-white',
        'dark:border-gray-600 dark:bg-gray-800',
        'checked:border-blue-600 checked:bg-blue-600',
        'dark:checked:border-blue-500 dark:checked:bg-blue-500',
        "checked:bg-[url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22white%22%20stroke-width%3D%223%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpath%20d%3D%22M20%206%209%2017l-5-5%22%2F%3E%3C%2Fsvg%3E')]",
        'checked:bg-[length:16px]',
        'indeterminate:border-blue-600 indeterminate:bg-blue-600',
        'dark:indeterminate:border-blue-500 dark:indeterminate:bg-blue-500',
        "indeterminate:bg-[url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22white%22%20stroke-width%3D%223%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpath%20d%3D%22M5%2012h14%22%2F%3E%3C%2Fsvg%3E')]",
        'indeterminate:bg-[length:16px]',
        'focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:ring-offset-0',
        'dark:focus:ring-blue-500/20',
        'disabled:cursor-not-allowed disabled:opacity-50',
    ];
@endphp

@if ($label || $description)
    <label @class([
        'group inline-flex gap-2.5 cursor-pointer has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50',
        'items-center' => !$description,
        'items-start' => $description,
    ])>
        <input
            type="checkbox"
            {{ $attributes->class(array_merge($checkbox_classes, [$description ? 'mt-0.5' : ''])) }}
            @checked($checked)
            @if ($indeterminate) x-init="$el.indeterminate = true" @endif
            data-checkbox
        />

        <span class="flex flex-col gap-0.5">
            @if ($label)
                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $label }}</span>
            @endif

            @if ($description)
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $description }}</span>
            @endif
        </span>
    </label>
@else
    <input
        type="checkbox"
        {{ $attributes->class([...$checkbox_classes, 'block']) }}
        @checked($checked)
        @if ($indeterminate) x-init="$el.indeterminate = true" @endif
        data-checkbox
    />
@endif
