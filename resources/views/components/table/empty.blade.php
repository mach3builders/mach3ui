@props([
    'colspan' => 1,
    'description' => 'No results found matching your criteria.',
    'icon' => 'search-x',
    'title' => 'No data found',
])

<tr>
    <td colspan="{{ $colspan }}" class="py-12 text-center">
        <div class="mb-3 text-gray-300 dark:text-gray-600">
            <ui:icon :name="$icon" class="mx-auto size-12" />
        </div>

        <p class="text-sm font-medium text-gray-900 dark:text-white">
            {{ $title }}
        </p>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            {{ $description }}
        </p>

        {{ $slot }}
    </td>
</tr>
