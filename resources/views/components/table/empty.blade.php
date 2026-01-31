@props([
    'colspan' => 1,
    'description' => null,
    'icon' => 'search-x',
    'title' => null,
])

@php
    $resolvedTitle = $title ?? __('ui::ui.table_empty.title');
    $resolvedDescription = $description ?? __('ui::ui.table_empty.description');
@endphp

<tr>
    <td colspan="{{ $colspan }}" class="py-12 text-center">
        <div class="mb-3 text-gray-300 dark:text-gray-600">
            <ui:icon :name="$icon" class="mx-auto size-12" />
        </div>

        <p class="text-sm font-medium text-gray-900 dark:text-white">
            {{ $resolvedTitle }}
        </p>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            {{ $resolvedDescription }}
        </p>

        {{ $slot }}
    </td>
</tr>
