<?php

namespace Mach3Builders\Ui;

class ClassMerger
{
    // Hiërarchische groepen: als user 'p-4' geeft, verwijder ook px-, py-, pt-, etc.
    private const HIERARCHY_GROUPS = [
        'p' => ['p', 'px', 'py', 'pt', 'pr', 'pb', 'pl', 'ps', 'pe'],
        'px' => ['px', 'pl', 'pr', 'ps', 'pe'],
        'py' => ['py', 'pt', 'pb'],
        'm' => ['m', 'mx', 'my', 'mt', 'mr', 'mb', 'ml', 'ms', 'me'],
        'mx' => ['mx', 'ml', 'mr', 'ms', 'me'],
        'my' => ['my', 'mt', 'mb'],
        'gap' => ['gap', 'gap-x', 'gap-y'],
        'size' => ['size', 'w', 'h'],
        'inset' => ['inset', 'inset-x', 'inset-y', 'top', 'right', 'bottom', 'left'],
        'inset-x' => ['inset-x', 'left', 'right'],
        'inset-y' => ['inset-y', 'top', 'bottom'],
        'rounded' => ['rounded', 'rounded-t', 'rounded-r', 'rounded-b', 'rounded-l',
            'rounded-tl', 'rounded-tr', 'rounded-br', 'rounded-bl'],
    ];

    // Semantische subgroepen voor ambigue prefixes
    private const TEXT_SIZES = ['text-xs', 'text-sm', 'text-base', 'text-lg', 'text-xl',
        'text-2xl', 'text-3xl', 'text-4xl', 'text-5xl', 'text-6xl',
        'text-7xl', 'text-8xl', 'text-9xl'];

    private const TEXT_ALIGNS = ['text-left', 'text-center', 'text-right', 'text-justify',
        'text-start', 'text-end'];

    private const FONT_FAMILIES = ['font-sans', 'font-serif', 'font-mono'];

    private const BORDER_STYLES = ['border-solid', 'border-dashed', 'border-dotted',
        'border-double', 'border-hidden', 'border-none'];

    public static function merge(string $componentClasses, string $userClasses): string
    {
        if (empty(trim($userClasses))) {
            return $componentClasses;
        }

        $userGroups = self::extractGroups($userClasses);
        $filteredComponent = self::filterClasses($componentClasses, $userGroups);

        return trim($filteredComponent.' '.$userClasses);
    }

    /**
     * @return array<string>
     */
    private static function extractGroups(string $classes): array
    {
        $groups = [];
        foreach (preg_split('/\s+/', trim($classes)) as $class) {
            $group = self::getGroup($class);
            if ($group !== null) {
                $groups[] = $group;
                // Expand hierarchical groups
                if (isset(self::HIERARCHY_GROUPS[$group])) {
                    $groups = array_merge($groups, self::HIERARCHY_GROUPS[$group]);
                }
            }
        }

        return array_unique($groups);
    }

    private static function getGroup(string $class): ?string
    {
        // Strip variants (hover:, dark:, md:, etc.)
        $base = preg_replace('/^([a-z0-9-]+:)+/', '', $class);
        if ($base === null) {
            return null;
        }
        // Strip negative prefix and ! modifiers
        $base = trim($base, '-!');

        // Semantic subgroups for ambiguous prefixes
        if (in_array($base, self::TEXT_SIZES, true)) {
            return 'text-size';
        }
        if (in_array($base, self::TEXT_ALIGNS, true)) {
            return 'text-align';
        }
        if (str_starts_with($base, 'text-')) {
            return 'text-color';
        }

        if (in_array($base, self::FONT_FAMILIES, true)) {
            return 'font-family';
        }
        if (str_starts_with($base, 'font-')) {
            return 'font-weight';
        }

        if (in_array($base, self::BORDER_STYLES, true)) {
            return 'border-style';
        }
        if (preg_match('/^border(-[trblxyse])?-\d/', $base) === 1) {
            return 'border-width';
        }
        if (preg_match('/^border(-[trblxyse])?-[a-z]+-\d/', $base) === 1) {
            return 'border-color';
        }

        // Generic prefix extraction: "px-4" → "px", "bg-red-500" → "bg"
        if (preg_match('/^([a-z]+(?:-[a-z]+)*?)(?:-(?:\d|auto|full|screen|min|max|fit|\[).*)$/', $base, $m) === 1) {
            return $m[1];
        }

        return $base; // Fallback to full class as its own group
    }

    /**
     * @param  array<string>  $groupsToRemove
     */
    private static function filterClasses(string $classes, array $groupsToRemove): string
    {
        $result = [];
        foreach (preg_split('/\s+/', trim($classes)) as $class) {
            $group = self::getGroup($class);
            if ($group === null || ! in_array($group, $groupsToRemove, true)) {
                $result[] = $class;
            }
        }

        return implode(' ', $result);
    }
}
