@props([
    'checked' => false,
    'description' => null,
    'indeterminate' => false,
    'label' => null,
])

@php
    $checkboxClasses = Ui::classes()
        ->add('size-5 shrink-0 cursor-pointer appearance-none rounded-[5px] border bg-center bg-no-repeat')
        ->add('border-gray-300 bg-white')
        ->add('dark:border-gray-600 dark:bg-gray-800')
        ->add('checked:border-blue-600 checked:bg-blue-600 checked:bg-[length:16px]')
        ->add('dark:checked:border-blue-500 dark:checked:bg-blue-500')
        ->add(
            "checked:bg-[url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22white%22%20stroke-width%3D%223%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpath%20d%3D%22M20%206%209%2017l-5-5%22%2F%3E%3C%2Fsvg%3E')]",
        )
        ->add('indeterminate:border-blue-600 indeterminate:bg-blue-600 indeterminate:bg-[length:16px]')
        ->add('dark:indeterminate:border-blue-500 dark:indeterminate:bg-blue-500')
        ->add(
            "indeterminate:bg-[url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22white%22%20stroke-width%3D%223%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpath%20d%3D%22M5%2012h14%22%2F%3E%3C%2Fsvg%3E')]",
        )
        ->add('focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:ring-offset-0')
        ->add('dark:focus:ring-blue-500/20')
        ->add('disabled:cursor-not-allowed disabled:opacity-50');

    $labelClasses = Ui::classes()
        ->add('group inline-flex cursor-pointer gap-2.5 has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50')
        ->add($description ? 'items-start' : 'items-center');

    $inputClasses = Ui::classes($checkboxClasses)->when($description, 'mt-0.5');
@endphp

@if ($label || $description)
    <label class="{{ $labelClasses }}">
        <input type="checkbox" {{ $attributes->class($inputClasses) }} @checked($checked)
            @if ($indeterminate) x-init="$el.indeterminate = true" @endif data-checkbox />

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
    <input type="checkbox" {{ $attributes->class($checkboxClasses->add('block')) }} @checked($checked)
        @if ($indeterminate) x-init="$el.indeterminate = true" @endif data-checkbox />
@endif
