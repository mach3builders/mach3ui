@props([
    'colspan' => 1,
    'description' => null,
    'icon' => 'search-x',
    'title' => null,
])

@php
    $resolvedTitle = $title ?? __('ui::ui.table_empty.title');
    $resolvedDescription = $description ?? __('ui::ui.table_empty.description');

    $cellClasses = Ui::classes()->add('py-12 text-center')->merge($attributes->only('class'));

    $iconClasses = Ui::classes()->add('mx-auto mb-3 size-12 text-gray-300')->add('dark:text-gray-600');

    $titleClasses = Ui::classes()->add('text-sm font-medium text-gray-900')->add('dark:text-white');

    $descriptionClasses = Ui::classes()->add('mt-1 text-sm text-gray-500')->add('dark:text-gray-400');
@endphp

<tr data-table-empty>
    <td colspan="{{ $colspan }}" class="{{ $cellClasses }}" {{ $attributes->except('class') }}>
        <ui:icon :name="$icon" :class="$iconClasses" />

        <p class="{{ $titleClasses }}" data-table-empty-title>
            {{ $resolvedTitle }}
        </p>

        <p class="{{ $descriptionClasses }}" data-table-empty-description>
            {{ $resolvedDescription }}
        </p>

        {{ $slot }}
    </td>
</tr>
